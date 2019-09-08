<?php

//connection
$servername = 'localhost';
$dbname = 'Assignment6';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "<script>console.log('Connected sucessfully')</script>";


$sql = "CREATE DATABASE Assignment6";
/*if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/
// sql to create table - Uncomment IF statement to check
$sql = "CREATE TABLE Users (
Name VARCHAR(50) NOT NULL,
Password VARCHAR(20) NOT NULL,
PRIMARY KEY (Name)
)";
/*if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

$result = mysqli_query($conn,$sql);


echo "
<div id = 'test'>
<center>
<form name='nameform' action = 'index.php' method='post'>
<h1> Hiragama Quiz </h1>
<h4> Please login or Sign up below if you wish to save progress! </h4>
<p>Username/Log in:<input type = 'text' name='firstname' id='username'><br></p>
<p>Password:<input type = 'text' name='password' id='password'><br></p>

<button id='submit' name='save' type='submit' onClick='return validate();'>Log in</button>
<button id='delete' type='reset'>Clear</button>

</form>

<script>
/*JS function that validates the form. Alert box will pop up if textboxes are empty*/
function validate() {
		if(document.getElementById('username').value == '' || document.getElementById('password').value == ''){
			alert('Please log-in with a valid username or password');
			return false;
		}
		return true;
}
</script>
</center>
</div>";
//Checks form, selects data and puts them in a new table
if (isset($_POST['showAssignment6'])) {
    $sql = "SELECT * FROM Users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     // output data of each row
echo "<table>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr>";
         echo "<td>".$row['id']."</td>";
         echo "<td>".$row['Name']."</td>";
				 echo "<td>".$row['Password']."</td>";
         echo"</tr>";
     }
} else {
     echo "0 results";
	}
}
//Inserts data into the database when the button named "save" is clicked
if(isset($_POST['save'])) {
$sql = "INSERT INTO Users (Name)
VALUES ('$_POST[firstname]')";
if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('User details stored!')</script>";
} else {
    echo "<script type='text/javascript'>alert('Welcome back!')</script>";
}

}
echo "<h1><center>Lab 6-8 / Assignment 4 , Hiragama SPA</center></h1>";
echo "

<div class='updateDiv'>
<form action='index.php' method='POST'>
<header><p><b> Menu </b></p></header>
</form>

<form id='form2' action='index.php' method='POST'>
<button name='button1' type='submit' >Show table of letters!</button>
</form>

<form id='quiz' action='index.php' method='POST'>
<button type='submit' name='button2'> Guess the Romaji Quiz! </button>
</form>

<form id='quiz2' action='index.php' method='POST'>
<button type='submit' name='button3'> Guess the Kana Quiz! </button>
</form>
";
if ($conn->query($sql) === TRUE) {
	echo"
<form id='showperformance' action='index.php' method='POST'>
<button type='submit' name='button4'>Show my user performance!</button>
</form>
";
}
else{
	echo"
<form id='showperformance' action='index.php' method='POST'>
<button type='submit' name='button4'>Show my user performance!</button>
</form>
";
}

echo"
<div>
<h4 class='title1'>Resources:</h4>
<p>
The images were found: <a href='https://en.wikipedia.org/wiki/Hiragana' target='_blank'>HERE</a><br>
The audio files were found: <a href='http://www.guidetojapanese.org/learn/complete/hiragana' target='_blank'>HERE</a><br>
The GIF'S were found: <a href='https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order_(animated_image_set)' target='_blank'>HERE</a><br>
</p>
</div>
</div>";

echo "<br><br>";

$counter;
if (isset($_REQUEST['button1'])){

$collector="";

echo " <p style='text-align:center'><b>Table of letters</b></p>
      <table class='tg'>
			<tr>
				<th class=\"tg-0lax\">
        <img src=\"images/A.png\" onmouseover=\"this.src='animations/Aan.gif'\" onmouseout=\"this.src='images/A.png'\" onclick=\"playAudio1()\" class=\"card\"><br><br>A</th>
        <th class=\"tg-0lax\">
        <img src=\"images/E.png\" onmouseover=\"this.src='animations/Ean.gif'\" onmouseout=\"this.src='images/E.png'\" onclick=\"playAudio2()\" class=\"card\"><br><br>E</th>
        <th class=\"tg-0lax\">
        <img src=\"images/HA.png\" onmouseover=\"this.src='animations/HAan.gif'\" onmouseout=\"this.src='images/HA.png'\" onclick=\"playAudio3()\" class=\"card\"><br><br>HA</th>
        <th class=\"tg-0lax\">
        <img src=\"images/HE.png\" onmouseover=\"this.src='animations/HEan.gif'\" onmouseout=\"this.src='images/HE.png'\" onclick=\"playAudio4()\" class=\"card\"><br><br>HE</th>
        <th class=\"tg-0lax\">
        <img src=\"images/HI.png\" onmouseover=\"this.src='animations/HIan.gif'\" onmouseout=\"this.src='images/HI.png'\" onclick=\"playAudio5()\" class=\"card\"><br><br>HI</th>
        <th class=\"tg-0lax\">
        <img src=\"images/HO.png\" onmouseover=\"this.src='animations/HOan.gif'\" onmouseout=\"this.src='images/HO.png'\" onclick=\"playAudio6()\" class=\"card\"><br><br>HO</th>
        <th class=\"tg-0lax\">
        <img src=\"images/HU.png\" onmouseover=\"this.src='animations/HUan.gif'\" onmouseout=\"this.src='images/HU.png'\" onclick=\"playAudio7()\" class=\"card\"><br><br>HU</th>
        </tr>

				<tr>
        <td class=\"tg-0lax\">
        <img src=\"images/I.png\" onmouseover=\"this.src='animations/Ian.gif'\" onmouseout=\"this.src='images/I.png'\" onclick=\"playAudio8()\" class=\"card\"><br><br>I</td>
        <td class=\"tg-0lax\">
        <img src=\"images/KA.png\" onmouseover=\"this.src='animations/KAan.gif'\" onmouseout=\"this.src='images/KA.png'\" onclick=\"playAudio9()\" class=\"card\"><br><br>KA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/KE.png\" onmouseover=\"this.src='animations/KEan.gif'\" onmouseout=\"this.src='images/KE.png'\" onclick=\"playAudio10()\" class=\"card\"><br><br>KE</td>
        <td class=\"tg-0lax\">
        <img src=\"images/KI.png\" onmouseover=\"this.src='animations/KIan.gif'\" onmouseout=\"this.src='images/KI.png'\" onclick=\"playAudio11()\" class=\"card\"><br><br>KI</td>
        <td class=\"tg-0lax\">
        <img src=\"images/KO.png\" onmouseover=\"this.src='animations/KOan.gif'\" onmouseout=\"this.src='images/KO.png'\" onclick=\"playAudio12()\" class=\"card\"><br><br>KO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/KU.png\" onmouseover=\"this.src='animations/KUan.gif'\" onmouseout=\"this.src='images/KU.png'\" onclick=\"playAudio13()\" class=\"card\"><br><br>KU</td>
        <td class=\"tg-0lax\">
        <img src=\"images/MA.png\" onmouseover=\"this.src='animations/MAan.gif'\" onmouseout=\"this.src='images/MA.png'\" onclick=\"playAudio14()\" class=\"card\"><br><br>MA</td>
        </tr>

			  <tr>
        <td class=\"tg-0lax\">
        <img src=\"images/ME.png\" onmouseover=\"this.src='animations/MEan.gif'\" onmouseout=\"this.src='images/ME.png'\" onclick=\"playAudio15()\" class=\"card\"><br><br>ME</td>
        <td class=\"tg-0lax\">
        <img src=\"images/MI.png\" onmouseover=\"this.src='animations/MIan.gif'\" onmouseout=\"this.src='images/MI.png'\" onclick=\"playAudio16()\" class=\"card\"><br><br>MI</td>
        <td class=\"tg-0lax\">
        <img src=\"images/MO.png\" onmouseover=\"this.src='animations/MOan.gif'\" onmouseout=\"this.src='images/MO.png'\" onclick=\"playAudio17()\" class=\"card\"><br><br>MO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/MU.png\" onmouseover=\"this.src='animations/MUan.gif'\" onmouseout=\"this.src='images/MU.png'\" onclick=\"playAudio18()\" class=\"card\"><br><br>MU</td>
        <td class=\"tg-0lax\">
        <img src=\"images/N.png\" onmouseover=\"this.src='animations/Nan.gif'\" onmouseout=\"this.src='images/N.png'\" onclick=\"playAudio19()\" class=\"card\"><br><br>N</td>
        <td class=\"tg-0lax\">
        <img src=\"images/NA.png\" onmouseover=\"this.src='animations/NAan.gif'\" onmouseout=\"this.src='images/NA.png'\" onclick=\"playAudio20()\" class=\"card\"><br><br>NA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/NE.png\" onmouseover=\"this.src='animations/NEan.gif'\" onmouseout=\"this.src='images/NE.png'\" onclick=\"playAudio21()\" class=\"card\"><br><br>NE</td>
        </tr>

				<tr>
        <td class=\"tg-0lax\">
        <img src=\"images/NI.png\" onmouseover=\"this.src='animations/NIan.gif'\" onmouseout=\"this.src='images/NI.png'\" onclick=\"playAudio22()\" class=\"card\"><br><br>NI</td>
        <td class=\"tg-0lax\">
        <img src=\"images/NO.png\" onmouseover=\"this.src='animations/NOan.gif'\" onmouseout=\"this.src='images/NO.png'\" onclick=\"playAudio23()\" class=\"card\"><br><br>NO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/NU.png\" onmouseover=\"this.src='animations/NUan.gif'\" onmouseout=\"this.src='images/NU.png'\" onclick=\"playAudio24()\" class=\"card\"><br><br>NU</td>
        <td class=\"tg-0lax\">
        <img src=\"images/O.png\" onmouseover=\"this.src='animations/Oan.gif'\" onmouseout=\"this.src='images/O.png'\" onclick=\"playAudio25()\" class=\"card\"><br><br>O</td>
        <td class=\"tg-0lax\">
        <img src=\"images/RA.png\" onmouseover=\"this.src='animations/RAan.gif'\" onmouseout=\"this.src='images/RA.png'\" onclick=\"playAudio26()\" class=\"card\"><br><br>RA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/RE.png\" onmouseover=\"this.src='animations/REan.gif'\" onmouseout=\"this.src='images/RE.png'\" onclick=\"playAudio27()\" class=\"card\"><br><br>RE</td>
        <td class=\"tg-0lax\">
        <img src=\"images/RI.png\" onmouseover=\"this.src='animations/RIan.gif'\" onmouseout=\"this.src='images/RI.png'\" onclick=\"playAudio28()\" class=\"card\"><br><br>RI</td>
        </tr>

			  <tr>
        <td class=\"tg-0lax\">
        <img src=\"images/RO.png\" onmouseover=\"this.src='animations/ROan.gif'\" onmouseout=\"this.src='images/RO.png'\" onclick=\"playAudio29()\" class=\"card\"><br><br>RO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/RU.png\" onmouseover=\"this.src='animations/RUan.gif'\" onmouseout=\"this.src='images/RU.png'\" onclick=\"playAudio30()\" class=\"card\"><br><br>RU</td>
        <td class=\"tg-0lax\">
        <img src=\"images/SA.png\" onmouseover=\"this.src='animations/SAan.gif'\" onmouseout=\"this.src='images/SA.png'\" onclick=\"playAudio31()\" class=\"card\"><br><br>SA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/SE.png\" onmouseover=\"this.src='animations/SEan.gif'\" onmouseout=\"this.src='images/SE.png'\" onclick=\"playAudio32()\" class=\"card\"><br><br>SE</td>
        <td class=\"tg-0lax\">
        <img src=\"images/SI.png\" onmouseover=\"this.src='animations/SIan.gif'\" onmouseout=\"this.src='images/SI.png'\" onclick=\"playAudio33()\" class=\"card\"><br><br>SI</td>
        <td class=\"tg-0lax\">
        <img src=\"images/SO.png\" onmouseover=\"this.sc='animations/SOan.gif'\" onmouseout=\"this.src='images/SO.png'\" onclick=\"playAudio34()\" class=\"card\"><br><br>SO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/SU.png\" onmouseover=\"this.src='animations/SUan.gif'\" onmouseout=\"this.src='images/SU.png'\" onclick=\"playAudio35()\" class=\"card\"><br><br>SU</td>
        </tr>

				<tr>
				<td class=\"tg-0lax\">
        <img src=\"images/TA.png\" onmouseover=\"this.src='animations/TAan.gif'\" onmouseout=\"this.src='images/TA.png'\" onclick=\"playAudio36()\" class=\"card\"><br><br>TA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/TE.png\" onmouseover=\"this.src='animations/TEan.gif'\" onmouseout=\"this.src='images/TE.png'\" onclick=\"playAudio37()\" class=\"card\"><br><br>TE</td>
        <td class=\"tg-0lax\">
        <img src=\"images/TI.png\" onmouseover=\"this.src='animations/TIan.gif'\" onmouseout=\"this.src='images/TI.png'\" onclick=\"playAudio38()\" class=\"card\"><br><br>TI</td>
        <td class=\"tg-0lax\">
        <img src=\"images/TO.png\" onmouseover=\"this.src='animations/TOan.gif'\" onmouseout=\"this.src='images/TO.png'\" onclick=\"playAudio39()\" class=\"card\"><br><br>TO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/TU.png\" onmouseover=\"this.src='animations/TUan.gif'\" onmouseout=\"this.src='images/TU.png'\" onclick=\"playAudio40()\" class=\"card\"><br><br>TU</td>
        <td class=\"tg-0lax\">
        <img src=\"images/U.png\" onmouseover=\"this.src='animations/Uan.gif'\" onmouseout=\"this.src='images/U.png'\" onclick=\"playAudio41()\" class=\"card\"><br><br>U</td>
        <td class=\"tg-0lax\">
        <img src=\"images/WA.png\" onmouseover=\"this.src='animations/WAan.gif'\" onmouseout=\"this.src='images/WA.png'\" onclick=\"playAudio42()\" class=\"card\"><br><br>WA</td>
        </tr>

			  <tr>
			  <td class=\"tg-0lax\">
        <img src=\"images/WO.png\" onmouseover=\"this.src='animations/WOan.gif'\" onmouseout=\"this.src='images/WO.png'\" onclick=\"playAudio43()\" class=\"card\"><br><br>WO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/YA.png\" onmouseover=\"this.src='animations/YAan.gif'\" onmouseout=\"this.src='images/YA.png'\" onclick=\"playAudio44()\" class=\"card\"><br><br>YA</td>
        <td class=\"tg-0lax\">
        <img src=\"images/YO.png\" onmouseover=\"this.src='animations/YOan.gif'\" onmouseout=\"this.src='images/YO.png'\" onclick=\"playAudio45()\" class=\"card\"><br><br>YO</td>
        <td class=\"tg-0lax\">
        <img src=\"images/YU.png\" onmouseover=\"this.src='animations/YUan.gif'\" onmouseout=\"this.src='images/YU.png'\" onclick=\"playAudio46()\" class=\"card\"><br><br>YU</td>
				</tr>

				<?php echo $collector
				</table>
			";
}

$counter;
if (isset($_REQUEST['button2'])){

	$collector="";

	echo "
	<h1>Quiz 1</h1>
	<div id = 'question-holder'>
		<p id='intro'>This quiz tests your ability to distinguish the <strong style='color:#ee9847'>Romaji</strong> for each <strong style='color:#ee9847'>Kana Element</strong>! You will be shown a number of Kana elements and you must choose the correct Romaji for that Kana!!!</p>
		<h1>Identify Romaji for the equivalent Kana Element:</h1>
		<h6>NOTE : Results are shown at the bottom of the page!</h6>
		<form name='inputForm' id='inputForm'>
		<div id='questions'>
				<h3>1)</h3>
				<!--This quiz gives the user four options to pick from the shown picture
					Note that I was going to try and block out the name of the pose by using an overlayed div
					but I ran out of time/thought it wasn't really worth the effort as it doesn't add any functionality.-->
					<div id='wrap1' class='wrap'>
						<img name='1' class='card1' src='images/A.png'/>
						<br>
						<br>
						<input type='radio' name='question-1-answers' id='question-1-answers-A' value='A' />
						<label for='question-1-answers-A'>A) 'HA'</label><br>

						<input type='radio' name='question-1-answers' id='question-1-answers-B' value='B' />
						<label for='question-1-answers-B'>B) 'HU'</label><br>

						<input type='radio' name='question-1-answers' id='question-1-answers-C' value='C' />
						<label for='question-1-answers-C'>C) 'NA'</label><br>

						<input type='radio' name='question-1-answers' id='question-1-answers-D' value='D' />
						<label for='question-1-answers-D'>D) 'A'</label><br>


					</div>

				<h3>2)</h3>

					<div id='wrap2' class='wrap'>

						<img name='2' class='card1' src='images/KA.png'/>
						<br>
						<br>
						<input type='radio' name='question-2-answers' id='question-2-answers-A' value='A' />
						<label for='question-2-answers-A'>A) 'KA'</label><br>

						<input type='radio' name='question-2-answers' id='question-2-answers-B' value='B' />
						<label for='question-2-answers-B'>B) 'O'</label><br>

						<input type='radio' name='question-2-answers' id='question-2-answers-C' value='C' />
						<label for='question-2-answers-C'>C) 'SA'</label><br>

						<input type='radio' name='question-2-answers' id='question-2-answers-D' value='D' />
						<label for='question-2-answers-D'>D) 'TE'</label><br>

					</div>


				<h3>3)</h3>

					<div id='wrap3' class='wrap'>

						<img name='3' class='card1' src='images/NI.png'/>
						<br>
						<br>
						<input type='radio' name='question-3-answers' id='question-3-answers-A' value='A' />
						<label for='question-3-answers-A'>A) 'HU'</label><br>

						<input type='radio' name='question-3-answers' id='question-3-answers-B' value='B' />
						<label for='question-3-answers-B'>B) 'WA'</label><br>

						<input type='radio' name='question-3-answers' id='question-3-answers-C' value='C' />
						<label for='question-3-answers-C'>C) 'NI'</label><br>

						<input type='radio' name='question-3-answers' id='question-3-answers-D' value='D' />
						<label for='question-3-answers-D'>D) 'YA'</label><br>

					</div>


				<h3>4)</h3>

					<div id='wrap4' class='wrap'>

						<img name='4' class='card1' src='images/O.png'/>
						<br>
						<br>
						<input type='radio' name='question-4-answers' id='question-4-answers-A' value='A' />
						<label for='question-4-answers-A'>A) 'TA'</label><br>

						<input type='radio' name='question-4-answers' id='question-4-answers-B' value='B' />
						<label for='question-4-answers-B'>B) 'SU'</label><br>

						<input type='radio' name='question-4-answers' id='question-4-answers-C' value='C' />
						<label for='question-4-answers-C'>C) 'MU'</label><br>

						<input type='radio' name='question-4-answers' id='question-4-answers-D' value='D' />
						<label for='question-4-answers-D'>D) 'O'</label><br>

					</div>

				<h3>5)</h3>
					<div id='wrap5' class='wrap'>

						<img name='5' class='card1' src='images/I.png'/>
						<br>
						<br>
						<input type='radio' name='question-5-answers' id='question-5-answers-A' value='A' />
						<label for='question-5-answers-A'>A) 'I'</label><br>

						<input type='radio' name='question-5-answers' id='question-5-answers-B' value='B' />
						<label for='question-5-answers-B'>B) 'E'</label><br>

						<input type='radio' name='question-5-answers' id='question-5-answers-C' value='C' />
						<label for='question-5-answers-C'>C) 'RE'</label><br>

						<input type='radio' name='question-5-answers' id='question-5-answers-D' value='D' />
						<label for='question-5-answers-D'>D) 'KA'</label>

					</div>

					<h3>6)</h3>
						<div id='wrap6' class='wrap'>

							<img name='6' class='card1' src='images/E.png'/>
							<br>
							<br>
							<input type='radio' name='question-6-answers' id='question-6-answers-A' value='A' />
							<label for='question-6-answers-A'>A) 'NE'</label><br>

							<input type='radio' name='question-6-answers' id='question-6-answers-B' value='B' />
							<label for='question-6-answers-B'>B) 'E'</label><br>

							<input type='radio' name='question-6-answers' id='question-6-answers-C' value='C' />
							<label for='question-6-answers-C'>C) 'A'</label><br>

							<input type='radio' name='question-6-answers' id='question-6-answers-D' value='D' />
							<label for='question-6-answers-D'>D) 'HI'</label>

						</div>

						<h3>7)</h3>
							<div id='wrap7' class='wrap'>

								<img name='7' class='card1' src='images/HA.png'/>
								<br>
								<br>
								<input type='radio' name='question-7-answers' id='question-7-answers-A' value='A' />
								<label for='question-7-answers-A'>A) 'MA'</label><br>

								<input type='radio' name='question-7-answers' id='question-7-answers-B' value='B' />
								<label for='question-7-answers-B'>B) 'HA'</label><br>

								<input type='radio' name='question-7-answers' id='question-7-answers-C' value='C' />
								<label for='question-7-answers-C'>C) 'NA'</label><br>

								<input type='radio' name='question-7-answers' id='question-7-answers-D' value='D' />
								<label for='question-7-answers-D'>D) 'TA'</label>

							</div>

							<h3>8)</h3>
								<div id='wrap8' class='wrap'>

									<img name='8' class='card1' src='images/SO.png'/>
									<br>
									<br>
									<input type='radio' name='question-8-answers' id='question-8-answers-A' value='A' />
									<label for='question-8-answers-A'>A) 'A'</label><br>

									<input type='radio' name='question-8-answers' id='question-8-answers-B' value='B' />
									<label for='question-8-answers-B'>B) 'SE'</label><br>

									<input type='radio' name='question-8-answers' id='question-8-answers-C' value='C' />
									<label for='question-8-answers-C'>C) 'SI'</label><br>

									<input type='radio' name='question-8-answers' id='question-8-answers-D' value='D' />
									<label for='question-8-answers-D'>D) 'SO'</label>

								</div>

								<h3>9)</h3>
									<div id='wrap9' class='wrap'>

										<img name='9' class='card1' src='images/WO.png'/>
										<br>
										<br>
										<input type='radio' name='question-9-answers' id='question-9-answers-A' value='A' />
										<label for='question-9-answers-A'>A) 'WO'</label><br>

										<input type='radio' name='question-9-answers' id='question-9-answers-B' value='B' />
										<label for='question-9-answers-B'>B) 'NE'</label><br>

										<input type='radio' name='question-9-answers' id='question-9-answers-C' value='C' />
										<label for='question-9-answers-C'>C) 'HI'</label><br>

										<input type='radio' name='question-9-answers' id='question-9-answers-D' value='D' />
										<label for='question-9-answers-D'>D) 'A'</label>

									</div>

									<h3>10)</h3>
										<div id='wrap10' class='wrap'>

											<img name='10' class='card1' src='images/KI.png'/>
											<br>
											<br>
											<input type='radio' name='question-10-answers' id='question-10-answers-A' value='A' />
											<label for='question-10-answers-A'>A) 'NO'</label><br>

											<input type='radio' name='question-10-answers' id='question-10-answers-B' value='B' />
											<label for='question-10-answers-B'>B) 'SE'</label><br>

											<input type='radio' name='question-10-answers' id='question-10-answers-C' value='C' />
											<label for='question-10-answers-C'>C) 'KI'</label><br>

											<input type='radio' name='question-10-answers' id='question-10-answers-D' value='D' />
											<label for='question-10-answers-D'>D) 'RE'</label>

										</div>

					<input type='submit' name='submit' value='Submit' id='btn' /><br><br><br>
					<div id = 'results'>
				</div><br>
		</div>
	</form>
	<?php echo $collector
</div>";
}

$counter;
if (isset($_REQUEST['button3'])){

$collector="";

echo "<h1>Quiz 1</h1>
<div id = 'question-holder'>
	<p id='intro'>This quiz tests your ability to distinguish the <strong style='color:#ee9847'>Kana Element</strong> for each <strong style='color:#ee9847'>Romaji</strong>! You will be shown a number of Kana elements and you must choose the correct Romaji for that Kana!!!</p>
	<h1>Identify Kana Element for the equivalent Romaji character:</h1>
	<h6>NOTE : Results are shown at the bottom of the page!</h6>
	<form name='inputForm' id='inputForm'>
	<div id='questions'>
			<h3>1)</h3>
			<!--This quiz gives the user four options to pick from the shown picture
				Note that I was going to try and block out the name of the pose by using an overlayed div
				but I ran out of time/thought it wasn't really worth the effort as it doesn't add any functionality.-->
				<div id='wrap1' class='wrap'>
					<h2 class='title'>'A'</h2>
					<br>
					<br>
					<input type='radio' name='question-1-answers' id='question-1-answers-A' value='A'/>
					<label for='question-1-answers-A'>A)<img src='images/HA.png' class ='card2'></label>

					<input type='radio' name='question-1-answers' id='question-1-answers-B' value='B' />
					<label for='question-1-answers-B'>B)<img src='images/HU.png' class ='card2'></label>

					<input type='radio' name='question-1-answers' id='question-1-answers-C' value='C' />
					<label for='question-1-answers-C'>C)<img src='images/NA.png' class ='card2'></label>

					<input type='radio' name='question-1-answers' id='question-1-answers-D' value='D' />
					<label for='question-1-answers-D'>D)<img src='images/A.png' class ='card2'></label>


				</div>

			<h3>2)</h3>

				<div id='wrap2' class='wrap'>

					<h2 class='title'>'KA'</h2>
					<br>
					<br>
					<input type='radio' name='question-2-answers' id='question-2-answers-A' value='A' />
					<label for='question-2-answers-A'>A)<img src='images/KA.png' class ='card2'></label>

					<input type='radio' name='question-2-answers' id='question-2-answers-B' value='B' />
					<label for='question-2-answers-B'>B)<img src='images/O.png' class ='card2'></label>

					<input type='radio' name='question-2-answers' id='question-2-answers-C' value='C' />
					<label for='question-2-answers-C'>C)<img src='images/SA.png' class ='card2'></label>

					<input type='radio' name='question-2-answers' id='question-2-answers-D' value='D' />
					<label for='question-2-answers-D'>D)<img src='images/TE.png' class ='card2'></label>

				</div>


			<h3>3)</h3>

				<div id='wrap3' class='wrap'>

					<h2 class='title'>'NI'</h2>
					<br>
					<br>
					<input type='radio' name='question-3-answers' id='question-3-answers-A' value='A' />
					<label for='question-3-answers-A'>A)<img src='images/HU.png' class ='card2'></label>

					<input type='radio' name='question-3-answers' id='question-3-answers-B' value='B' />
					<label for='question-3-answers-B'>B)<img src='images/WA.png' class ='card2'></label>

					<input type='radio' name='question-3-answers' id='question-3-answers-C' value='C' />
					<label for='question-3-answers-C'>C)<img src='images/NI.png' class ='card2'></label>

					<input type='radio' name='question-3-answers' id='question-3-answers-D' value='D' />
					<label for='question-3-answers-D'>D)<img src='images/YA.png' class ='card2'></label>

				</div>


			<h3>4)</h3>

				<div id='wrap4' class='wrap'>

					<h2 class='title'>'O'</h2>
					<br>
					<br>
					<input type='radio' name='question-4-answers' id='question-4-answers-A' value='A' />
					<label for='question-4-answers-A'>A)<img src='images/TA.png' class ='card2'></label>

					<input type='radio' name='question-4-answers' id='question-4-answers-B' value='B' />
					<label for='question-4-answers-B'>B)<img src='images/SU.png' class ='card2'></label>

					<input type='radio' name='question-4-answers' id='question-4-answers-C' value='C' />
					<label for='question-4-answers-C'>C)<img src='images/MU.png' class ='card2'></label>

					<input type='radio' name='question-4-answers' id='question-4-answers-D' value='D' />
					<label for='question-4-answers-D'>D)<img src='images/O.png' class ='card2'></label>

				</div>

			<h3>5)</h3>
				<div id='wrap5' class='wrap'>

					<h2 class='title'>'I'</h2>
					<br>
					<br>
					<input type='radio' name='question-5-answers' id='question-5-answers-A' value='A' />
					<label for='question-5-answers-A'>A)<img src='images/I.png' class ='card2'></label>

					<input type='radio' name='question-5-answers' id='question-5-answers-B' value='B' />
					<label for='question-5-answers-B'>B)<img src='images/E.png' class ='card2'></label>

					<input type='radio' name='question-5-answers' id='question-5-answers-C' value='C' />
					<label for='question-5-answers-C'>C)<img src='images/RE.png' class ='card2'></label>

					<input type='radio' name='question-5-answers' id='question-5-answers-D' value='D' />
					<label for='question-5-answers-D'>D)<img src='images/KA.png' class ='card2'></label>

				</div>

				<h3>6)</h3>
					<div id='wrap6' class='wrap'>

						<h2 class='title'>'E'</h2>
						<br>
						<br>
						<input type='radio' name='question-6-answers' id='question-6-answers-A' value='A' />
						<label for='question-6-answers-A'>A)<img src='images/NE.png' class ='card2'></label>

						<input type='radio' name='question-6-answers' id='question-6-answers-B' value='B' />
						<label for='question-6-answers-B'>B)<img src='images/E.png' class ='card2'></label>

						<input type='radio' name='question-6-answers' id='question-6-answers-C' value='C' />
						<label for='question-6-answers-C'>C)<img src='images/A.png' class ='card2'></label>

						<input type='radio' name='question-6-answers' id='question-6-answers-D' value='D' />
						<label for='question-6-answers-D'>D)<img src='images/HI.png' class ='card2'></label>

					</div>

					<h3>7)</h3>
						<div id='wrap7' class='wrap'>

							<h2 class='title'>'HA'</h2>
							<br>
							<br>
							<input type='radio' name='question-7-answers' id='question-7-answers-A' value='A' />
							<label for='question-7-answers-A'>A)<img src='images/MA.png' class ='card2'></label>

							<input type='radio' name='question-7-answers' id='question-7-answers-B' value='B' />
							<label for='question-7-answers-B'>B)<img src='images/HA.png' class ='card2'></label>

							<input type='radio' name='question-7-answers' id='question-7-answers-C' value='C' />
							<label for='question-7-answers-C'>C)<img src='images/NA.png' class ='card2'></label>

							<input type='radio' name='question-7-answers' id='question-7-answers-D' value='D' />
							<label for='question-7-answers-D'>D)<img src='images/TA.png' class ='card2'></label>

						</div>

						<h3>8)</h3>
							<div id='wrap8' class='wrap'>

								<h2 class='title'>'SO'</h2>
								<br>
								<br>
								<input type='radio' name='question-8-answers' id='question-8-answers-A' value='A' />
								<label for='question-8-answers-A'>A)<img src='images/A.png' class ='card2'></label>

								<input type='radio' name='question-8-answers' id='question-8-answers-B' value='B' />
								<label for='question-8-answers-B'>B)<img src='images/SE.png' class ='card2'></label>

								<input type='radio' name='question-8-answers' id='question-8-answers-C' value='C' />
								<label for='question-8-answers-C'>C)<img src='images/SI.png' class ='card2'></label>

								<input type='radio' name='question-8-answers' id='question-8-answers-D' value='D' />
								<label for='question-8-answers-D'>D)<img src='images/SO.png' class ='card2'></label>

							</div>

							<h3>9)</h3>
								<div id='wrap9' class='wrap'>

									<h2 class='title'>'WO'</h2>
									<br>
									<br>
									<input type='radio' name='question-9-answers' id='question-9-answers-A' value='A' />
									<label for='question-9-answers-A'>A)<img src='images/WO.png' class ='card2'></label>

									<input type='radio' name='question-9-answers' id='question-9-answers-B' value='B' />
									<label for='question-9-answers-B'>B)<img src='images/NE.png' class ='card2'></label>

									<input type='radio' name='question-9-answers' id='question-9-answers-C' value='C' />
									<label for='question-9-answers-C'>C)<img src='images/HI.png' class ='card2'></label>

									<input type='radio' name='question-9-answers' id='question-9-answers-D' value='D' />
									<label for='question-9-answers-D'>D)<img src='images/A.png' class ='card2'></label>

								</div>

								<h3>10)</h3>
									<div id='wrap10' class='wrap'>

										<h2 class='title'>'KI'</h2>
										<br>
										<br>
										<input type='radio' name='question-10-answers' id='question-10-answers-A' value='A' />
										<label for='question-10-answers-A'>A)<img src='images/NO.png' class ='card2'></label>

										<input type='radio' name='question-10-answers' id='question-10-answers-B' value='B' />
										<label for='question-10-answers-B'>B)<img src='images/SE.png' class ='card2'></label>

										<input type='radio' name='question-10-answers' id='question-10-answers-C' value='C' />
										<label for='question-10-answers-C'>C)<img src='images/KI.png' class ='card2'></label>

										<input type='radio' name='question-10-answers' id='question-10-answers-D' value='D' />
										<label for='question-10-answers-D'>D)<img src='images/RE.png' class ='card2'></label>

									</div>

				<input type='submit' name='submit' value='Submit' id='btn' /><br><br><br>
				<div id = 'results'>
			</div><br>
	</div>
</form>
<?php echo $collector
</div>";
}


if (isset($_REQUEST['button4'])){

$collector="";


echo "
<div class='StoredResultsDiv'>
<h2>Quiz 1 : </h2>
<form name='inputForm' id='inputForm'>
<div id = 'results'>
</div><br>
</div>


";
}
mysqli_close($conn);
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scripts.js"></script>
<script src="Quiz1script.js"></script>
<link rel="stylesheet" type"text/css" href="Quiz1style.css">
</html>
