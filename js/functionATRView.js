var myTree;

function showArbol(data){
//    $("#treeboxbox_tree").html("g");
  // var data1=[];
  // data1.push([1,0,"1111"]);
  // data1.push([2,0,"2222"]);
  // data1.push([3,0,"33331"]);
  // data1.push([4,2,"child"]);
//  data.push([data1]);
//  data.push([{1,0,"1111"}]);
    myTree.parse(data, "jsarray");
//    myTree.parse([[1,0,"1111"], [2,0,"2222"], [3,0,"3333"], [4,2,"child"]], "jsarray");
    
    
}