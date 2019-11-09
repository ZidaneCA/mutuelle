
$(document).ready(function(){
  console.log("blabla");

  $( "#input1" ).change(function() {
    var tp= $("#span1").text();
    console.log(tp);
    console.log("blabla");
var  po=  document.getElementById('input1').value;
var to= new Date(po );

to.setDate(to.getDate()+tp*30);

var day = ("0" + to.getDate()).slice(-2);
var month = ("0" + (to.getMonth() + 1)).slice(-2);

var final = to.getFullYear()+"-"+(month)+"-"+(day) ;


$("#input2").val(final);


});



$( "#input3" ).change(function() {
  var tpe= $("#span2").text();
  console.log(tpe);
  console.log("blabla");
var  poe=  document.getElementById('input3').value;
var toe= new Date(poe );

toe.setDate(toe.getDate()+tpe*30);

var daye = ("0" + toe.getDate()).slice(-2);
var monthe = ("0" + (toe.getMonth() + 1)).slice(-2);

var finale = toe.getFullYear()+"-"+(monthe)+"-"+(daye) ;


$("#input4").val(finale);


});







})
