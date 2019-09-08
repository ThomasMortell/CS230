function myFunction() {
  var table = document.getElementById("Results");
  var rows = table.rows;


 for (var i = 2; i < rows.length; i++) {
    var cells = rows[i].cells;
    var sum = 0;
    var numbers = 0;
    for (var x = 2; x < (cells.length -1); x++) {
      var cell = cells[x];
      var addme = parseInt(cell.innerHTML);
      if(!isNaN(addme)) {
         sum += addme;
         numbers++;
      }
    }
    var average = sum / numbers;
    rows[i].cells[x].innerHTML = "<td>" + Math.round(average) +"%" + "</td>";



	if(average < 40)
	{
			rows[i].cells[x].style.background = "red";
			rows[i].cells[x].style.color = "white";
  }else{
  		rows[i].cells[x].style.background="white";
      rows[i].cells[x].style.color = "black";
  }
  }
  }


  var count = 2;
  if(document.getElementById('btn2').onclick){
	  count++;
  }


  function addColumn(){
	  var table = document.getElementById("Results");
	  var rows = table.rows.length;
	  var cells = table.rows[0].cells.length;
	  var cell;

	  for(var i = 1; i < rows;i++){
		  cell = table.rows[i].insertCell(table.rows[i].cells.length-1);
		  cell.innerHTML= "-";
		  if(i<2){
		  cell.innerHTML="Assignment " + count + ": ";
		  cell.setAttribute('contentEditable', 'true');
		  cell.setAttribute('class', 'center');
		  }
		  if(i!=cells-1){
		  cell.setAttribute('contentEditable', 'true');
		  cell.setAttribute('class', 'entry');


	  }
  }
  count++;
  }

  function addRow() {
	var table = document.getElementById("Results");
    var rows = document.getElementById('Results').rows;
    var cells = document.getElementById('Results').rows[2].cells.length;
    var row = table.insertRow();
    for (var i = 0; i<cells; i++){
        var extraCell = row.insertCell(i);
        extraCell.innerHTML = "-";
		if(i<2){
			extraCell.setAttribute('contentEditable', 'true');
			extraCell.setAttribute('class', 'left');
		}
		else{
		extraCell.setAttribute('contentEditable', 'true');
		extraCell.setAttribute('class', 'entry');
		}
    }
}
var counter_rows=0;
var counter_cells=0;

function saveTable() {
  var table = document.getElementById("Results");
  var num = table.rows[0].cells.length; // amount of rows
  var data = '';
  for (var i = 1; i < table.rows.length; i++) {
    for (var j = 0; j < table.rows[0].cells.length - 1; j++) {
      data += table.rows[i].cells[j].innerHTML + ";";
    }
  }
  data += table.rows.length + ";" + table.rows[0].cells.length + ";" + data.substring(0, data.length);  setCookie("data", data, 60);
  alert("Cookie Saved");
}
function setCookie(cname, cvalue, exdays) {

  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function LoadTable() {
}

function deleteRow(){
	var table = document.getElementById("Results"),
  	lastRow = document.getElementById('Results').rows.length-1,
    previous = document.getElementById('Results').rows.length-2;

    for(i = lastRow; i > previous; i--)
    {
    if(table.rows.length !=1){
    table.deleteRow(i);
    }
    }
    }



document.getElementById('myFunction').onclick = myFunction;
document.getElementById('btn1').onclick = addRow;
document.getElementById('btn2').onclick = addColumn;
document.getElementById('btn3').onclick = saveTable;
document.getElementById('btn4').onclick = LoadTable;
document.getElementbyId('btn5').onclick = deleteRow;
