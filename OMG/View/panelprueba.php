
<!DOCTYPE html>
<html>
<head>
	<title>File Explorer Demo</title>
	<meta name="viewport" c ontent="width=device-width, initial-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="types/ftypes.css"/>
	<link rel="stylesheet" type="text/css" href="../../skins/material/dhtmlx.css"/>
	<link rel="stylesheet" type="text/css" href="../../codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="../../codebase/fonts/font_awesome/css/font-awesome.min.css"/>
	<script type="text/javascript" src="../../codebase/dhtmlx.js"></script>
	<script type="text/javascript" src="types/ftypes.js"></script>
	<style>
		html, body {
			width: 100%;
			height: 100%;
			overflow: hidden;
			margin: 0px;
			background-color: #fafafa;
		}
		div.image_preview {
			position: relative;
			width: 100%;
			height: 100%;
			padding: 0px;
			margin: 0px;
			background-position: center center;
			background-repeat: no-repeat;
			overflow: hidden;
		}
		div.intro {
			width: 100%;
			height: 100%;
			overflow: auto;
			font-size: 14px;
			font-family: Roboto, Arial, Helvetica;
			color: #404040;
		}
		.dhx_toolbar_material.dhxtoolbar_icons_24 div.dhx_toolbar_btn i {
			font-size: 18px;
			color: #7d7d7d;
		}
	</style>
	<script>
		var myLayout, myTreeView, myGrid, myDataView, myMenu, myToolbar;
		var gl_view_type = "dlist";
		var gl_view_bg = "";

		function doOnLoad() {
			myLayout = new dhtmlXLayoutObject(document.body, "2U");
			myLayout.cells("a").setWidth(250);
			myLayout.cells("a").setText("Folders");
			myLayout.cells("b").hideHeader();
			showIntro();

			myMenu = myLayout.attachMenu({
				iconset: "awesome",
				xml: "xml/menu.xml"
			});
			
			myToolbar = myLayout.attachToolbar({
				icons_size: 24,
				iconset: "awesome",
				xml: "xml/toolbar.xml"
			});
			
			myMenu.attachEvent("onClick", defineTypeAndLoad);
			myToolbar.attachEvent("onClick", defineTypeAndLoad);
			
			myTreeView = myLayout.cells("a").attachTreeView({
				root_id: "",
				iconset: "font_awesome",
				items: "xml/directoryTree.php?id={id}"
			});
			myTreeView.attachEvent("onSelect", showDirContent);
			
		}

		function showDirContent(dir) {
			if (dir==null) return;
			myTreeView.openItem(dir);
			if (gl_view_type == "dlist") {
				showDList(dir);
			}else{
				showOtherViews(dir);
			}
		}
		//show About Application
		function showIntro() {
			var dObj = document.createElement("DIV");
			dObj.className = "intro";
			dObj.innerHTML = document.getElementById("intro_text").innerHTML;
			myLayout.cells("b").attachObject(dObj);
		}

		//this function we'll use for toolbar and menu event handlers
		function defineTypeAndLoad(id) {
			switch (id) {
				case "levelup":
					myTreeView.selectItem(myTreeView.getParentId(myTreeView.getSelectedId()), true);
					break;
				case "about": //about application
					showIntro();
					break;
				case "close": //close application
					window.close();
					break;
				case "view_dlist":
					gl_view_type="dlist";
					break;
				case "view_icons":
					gl_view_type="icons";
					break;
				case "view_tiles":
					gl_view_type="tiles";
					break;
			}
			
			if (id.toString().indexOf("view") == 0) {
				showDirContent(myTreeView.getSelectedId());
				return true;
			}
		}

		function showFileContent(id) {
			
			var allowdExt = {"gif":1,"jpg":1,"png":1,"html":1,"shtml":1,"css":1,"xml":1,"txt":1,"php":1};
			var ext = id.match(/\.([a-z0-9]{1,5})$/);
			
			if (ext != null) {
				
				if (ext[1] != null && allowdExt[ext[1]] == 1) {
					
					if (!myLayout.dhxWins) myLayout.dhxWins = new dhtmlXWindows();
					if (!myLayout.dhxWins.window("popup")) {
						var w1 = myLayout.dhxWins.createWindow("popup",10000,10000,800,600);
						w1.setText("Preview");
						w1.denyResize();
						w1.button("park").hide();
						w1.button("minmax").hide();
						w1.attachEvent("onClose", function(win) {
							win.setModal(false);
							win.hide();
						});
						w1.attachEvent("onContentLoaded", function(win) {
							win.show();
							win.setDimension(800, 600);
							win.center();
						});
					} else {
						w1 = myLayout.dhxWins.window("popup");
					}
					if (ext[1] == "gif" || ext[1] == "jpg" || ext[1] == "png") {
						w1.setModal(true);
						var idd = "img_"+window.dhx4.newId();
						var i = document.createElement("IMG");
						document.body.appendChild(i);
						i.border = 0;
						i.style.position = "absolute";
						i.style.left = "-2000px";
						i.style.top = "0px";
						i.style.margin = "10px";
						i.onload = function() {
							w1.attachHTMLString("<div class='image_preview' style='background-image:url("+this.src+");'></div>");
							w1.show();
							w1.setDimension(Math.max(this.offsetWidth+38,180), Math.max(this.offsetHeight+65, 130));
							w1.center();
							this.onload = null;
						}
						i.src = "./getFile.php?file="+id;
					} else {
						w1.setModal(true);
						w1.attachURL("./getFile.php?file="+id);
					}
				} else {
					alert("There is no action associated with this file type");
				}
				
			}
		}

		function showDList(dir) {
			myGrid = myLayout.cells("b").attachGrid();
			//myGrid.setImagePath("../../dhtmlxGrid/codebase/imgs/");
			myGrid.setIconsPath("icons/grid/");
			myGrid.setHeader("&nbsp;,Name,Size,Type,Modified");
			myGrid.setColTypes("img,ro,ro,ro,ro"); 
			myGrid.setInitWidths("40,250,90,150,*");
			myGrid.setColAlign("center,left,right,left");
			myGrid.load("xml/directoryContent.php?dir="+dir);
			myGrid.attachEvent("onRowDblClicked",function(id) {
				if (myTreeView.isItem(id)) myTreeView.selectItem(id,true);
				showFileContent(id);
			});
			myGrid.attachEvent("onRowCreated", function(id, r) {
				var size = myGrid.cells(id, 2).getValue();
				if (!isNaN(size) && size != "") myGrid.cells(id, 2).setValue(readableSize(size));
			});
			myGrid.init();
			gl_view_bg = "grid";
		}

		function showOtherViews(dir) {
			dhtmlx.DataDriver.xml.records="/*/row";
			myDataView = myLayout.cells("b").attachDataView({type: "ficons"});
			myDataView.attachEvent("onItemDblclick",function(id) {
				if (myTreeView.isItem(id)) myTreeView.selectItem(id,true);
				showFileContent(id);
			});
			myDataView.clearAll();
			myDataView.load("xml/directoryContent.php?dir="+dir);
			
			if (gl_view_type == "icons") {
				myDataView.define("type", "ficons");
			} else if (gl_view_type == "tiles") {
				myDataView.define("type", "ftiles");
			}
			gl_view_bg = "folders";
		}
		
		// format file size
		function readableSize(t) {
			var i = false;
			var b = ["b","Kb","Mb","Gb","Tb","Pb","Eb"];
			for (var q=0; q<b.length; q++) if (t > 1024) t = t / 1024; else if (i === false) i = q;
			if (i === false) i = b.length-1;
			return Math.round(t*100)/100+" "+b[i];
		}
		dhtmlXTreeView.prototype.isItem = function(id){
			return (this.items[id]!=null);
		}
	</script>
</head>

<body onload="doOnLoad()" style="width:100%; height:100%; margin:0px; overflow:hidden;">
	
	<div id="intro_text" style="display:none;">
		<div style="margin: 30px;">
			<h1>dhtmlxFileExplorer Demo Application</h1>
			<p>The purpose of this demo is to illustrate the possibility of building Windows File Explorer like application using dhtmlx library. The following components were used:</p>
			<ul>
				<li>dhtmlxLayout/dhtmlxWindows - as interface base</li>
				<li>dhtmlxMenu</li>
				<li>dhtmlxToolbar</li>
				<li>dhtmlxTree - for navigation tree</li>
				<li>dhtmlxGrid - for table view</li>
				<li>dhtmlxDataView - for Icons and Tiles views</li>
			</ul>
			
			<p>For step-by-step instructions of building this kind of application, please <a href="http://docs.dhtmlx.com/tutorials__building_web_interfaces__index.html" target="_blank">go here</a></p>
			
			<p>Current implementation demonstrates basic possibilities, which can be extended with more complex functionality, like: 
				<ul>
					<li>drag-n-drop</li>
					<li>context menu</li>
					<li>files operations (create, rename, delete, move etc.)</li>
					<li>sorting of various types</li>
					<li>filtering</li>
					<li>thumbnails view</li>
				</ul>
			and more. All these features can be added using present possibilities of dhtmlx components.</p>
			
			<p>&copy; Dinamenta, UAB.</p>
		</div>
	</div>

<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-11031269-1', 'auto');
    ga('send', 'pageview');
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter43004664 = new Ya.Metrika({ id:43004664, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/43004664" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
