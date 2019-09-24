function newItem() {
  var item = document.getElementById("input").value;
  if (item=="") {
      window.alert("il campo non può essere vuoto");
  } else {
      var ul = document.getElementById("list");
      var li = document.createElement("li");
      li.className="lista";
      li.appendChild(document.createTextNode("🔹" + item));
      ul.appendChild(li);
      document.getElementById("input").value = "";
      colora(item);
      
  }

  li.onclick = removeItem;
}
//===================================================================================================  
document.body.onkeyup = function(e) {
  if (e.keyCode == 13) {
    newItem();
  }
};
//===================================================================================================  
function removeItem(e) {
  if (ConfermaOperazione()==true) {
    e.target.parentElement.removeChild(e.target);
    
  }
  
}
//===================================================================================================
function caricalista(){
  var str=''; // variable to store the options
  alimenti = new Array(["banane",1.3],["pere",2.2],["albicocche",4.2],["fragole",5.0],["pane",5.6],["latte",2.7],["salame",10]);
  for (var i=0; i < alimenti.length;++i){
      str += '<option value="'+alimenti[i][0]+' €'+alimenti[i][1]+'" class="'+alimenti[i][0]+'"/>'; // Storing options in variable
  }
  var my_list=document.getElementById("listaspesa");
  my_list.innerHTML = str;

}
//===================================================================================================
function ConfermaOperazione() {
  var richiesta = window.confirm("Cancellare l'elemento dalla lista?");
  return richiesta;
}
//===================================================================================================
window.onbeforeunload = function ()
 {
     return "";
 };
//===================================================================================================
 function distance(x1,y1,x2,y2){
   var dx=x2-x1;
   var dy=y2-y1;
   return Math.sqrt(dx*dx+dy*dy);
 }
 //===================================================================================================
 
dis=new Array();
cont=0;
//===================================================================================================
function calcolapercorso(){
 
 
  var distanza=0;
  if (dis.length==1) {
    
  } else {
    for (let i = 0; i < dis.length-1; i++) {
      distanza+=distance(dis[i].x,dis[i].y,dis[i+1].x,dis[i+1].y);
      
    }
   alert(distanza);
  }
  
}
//===================================================================================================
$(document).ready(function() {
  $('.opzioni').click(function(){


var recupero_id = $(this).attr("id");	


getcoordinate(recupero_id);

}); 
});
//===================================================================================================
function getcoordinate(ids){
  punto={
    x: 0,
    y: 0,
   };
  
  punto.x=document.getElementById(ids).style.left.substring(0,document.getElementById(ids).style.left.length-1);
  punto.y=document.getElementById(ids).style.top.substring(0,document.getElementById(ids).style.top.length-1);
  dis[cont]=punto;
  calcolapercorso();

  cont++;
}
//===================================================================================================
function colora(item){
    let a=item.split('');
    var newid=item.substring(0,a.indexOf('€')-1);

    document.getElementById(newid).style.backgroundColor="#dd356e";

}