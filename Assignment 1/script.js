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
    var average = (sum /(cells.length-3))/100 *(100/1);
    rows[i].cells[7].innerHTML = "<td>" + Math.round(average) +"%" + "</td>";



	if(average < 40)
	{
			rows[i].cells[7].style.background = "red";
			rows[i].cells[7].style.color = "white";
  }else{
  		rows[i].cells[7].style.background="white";
  }
  }
  }
document.getElementById('myFunction').onclick = myFunction;
