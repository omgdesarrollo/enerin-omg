
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loading Data by Page Scenario - jsGrid Demo</title>

<!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/demos.css" />
    <link rel="stylesheet" type="text/css" href="/css/jsgrid.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/jsgrid-theme.min.css" />-->
<link href="../../assets/js-grid/ui.jqgrid.css" rel="stylesheet" type="text/css"/>


    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/cupertino/jquery-ui.css">-->
<!--    <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>-->
    
    <!--<script>window.jQuery || document.write('<script src="/js/jquery-1.8.3.js"><\/script>')</script>-->

    <!--<script src="/js/jsgrid.min.js"></script>-->
    <!--<script src="/js/i18n/jsgrid-fr.js"></script>-->
    <!--<script src="db.js"></script>-->
    <script src="../../assets/js-grid/db.js" type="text/javascript"></script>
    
    <script src="../../assets/js-grid/grid.locale-es.js" type="text/javascript"></script>
    <script src="../../assets/js-grid/jquery.jqGrid.min.js" type="text/javascript"></script>
    
    
    
</head>
<body>
<h1>Loading Data by Page Scenario</h1>

<style>
    .pager-panel {
        padding: 10px;
        margin: 10px 0;
        background: #fcfcfc;
        border: 1px solid #e9e9e9;
        display: inline-block;
    }
</style>

<div class="pager-panel">
    <label>Page:
        <select id="pager">
            <option>1</option>
            <option selected>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
        </select>
    </label>
</div>

<div id="jsGrid"></div>

<script>
$(function() {

    $("#jsGrid").jsGrid({
        height: "80%",
        width: "100%",

        autoload: true,
        paging: true,
        pageLoading: true,
        pageSize: 15,
        pageIndex: 2,

        controller: {
            loadData: function(filter) {
                var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                return {
                    data: db.clients.slice(startIndex, startIndex + filter.pageSize),
                    itemsCount: db.clients.length
                };
            }
        },

        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });


    $("#pager").on("change", function() {
        var page = parseInt($(this).val(), 10);
        $("#jsGrid").jsGrid("openPage", page);
    });

});
</script>

</body>
</html>