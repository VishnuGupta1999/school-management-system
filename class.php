<html>
<head>
</head>
<body>
	<?php
		if (isset($_GET['id'])) { 
			$conn = new mysqli("localhost","root","","sample");
			if($conn->connect_error) {
			   die("connection faild");
			}
			$sql = "SELECT * FROM school where id=".$_GET['id'];
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
    ?>
			<form method="POST">
				<label>name:</label><br>
				<input type="text" name="name" value='<?php echo $row["name"]; ?>' ><br>
				<label>hindi:</label><br>
				<input type="varcar" name="hindi" value='<?php echo $row["hindi"]; ?>' ><br>
				<label>english:</label><br>
				<input type="varcar" name="english" value='<?php echo $row["english"]; ?>' ><br>
				<label>marathi:</label><br>
				<input type="varcar" name="marathi" value='<?php echo $row["marathi"]; ?>' ><br>
				<label>math:</label><br>
				<input type="varcar" name="math" value='<?php echo $row["math"]; ?>' ><br>
				<label>socialscience:</label><br>
				<input type="varcar" name="socialscience" value='<?php echo $row["socialscience"]; ?>' ><br>
				<label>science:</label><br>
				<input type="varcar" name="science" value='<?php echo $row["science"]; ?>' ><br>
				<label>mark:</label><br>
				<input type="varcar" name="mark" value='<?php echo $row["mark"]; ?>' ><br><br>
				<input type="submit" name="submit">
			</form>
	 <?php  }
            }
              }else{ ?>
	 		<form method="POST">
				<label>name:</label><br>
				<input type="text" name="name"><br>
				<label>hindi:</label><br>
				<input type="varcar" name="hindi"><br>
				<label>english:</label><br>
				<input type="varcar" name="english"><br>
				<label>marathi:</label><br>
				<input type="varcar" name="marathi"><br>
				<label>math:</label><br>
				<input type="varcar" name="math"><br>
				<label>socialscience:</label><br>
				<input type="varcar" name="socialscience"><br>
				<label>science:</label><br>
				<input type="varcar" name="science"><br>
				<label>mark:</label><br>
				<input type="varcar" name="mark"><br><br>
				<input type="submit" name="submit">
			</form>
		<?php } ?>
</body>
</html>

<?php
$conn = new mysqli("localhost","root","","sample");
 if($conn->connect_error) {
	 die("connection faild");
}
if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$hindi = $_POST['hindi'];
	$english = $_POST['english'];
	$marathi = $_POST['marathi'];
	$math = $_POST['math'];
	$socialscience = $_POST['socialscience'];
	$science = $_POST['science'];
	$mark = $_POST['mark'];

	if($_GET['id']){
		$sql = 'UPDATE school SET name="'.$name.'",hindi="'.$hindi.'",english="'.$english.'",marathi="'.$marathi.'",math="'.$math.'",socialscience="'.$socialscience.'",science="'.$science.'",mark="'.$mark.'" WHERE id='.$_GET['id'];
				
	if ($conn->query($sql) === TRUE) {
		  header("Location:/php/student.php");
		} else {
		  echo "Error updating record: " . $conn->error;
		}				
	}
else{
		$sql = 'insert into school(name,hindi,english,marathi,math,socialscience,science,mark) VALUES ("'.$name.'","'.$hindi.'","'.$english.'","'.$marathi.'","'.$math.'","'.$socialscience.'","'.$science.'","'.$mark.'")';
		if ($conn->query($sql) === TRUE) {
		  header("Location:/php/student.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

if (isset($_GET['vishnu']) ) {
	$sql = "DELETE FROM school WHERE id=".$_GET['vishnu'];
	if ($conn->query($sql) === TRUE) {
		echo " deleting record: ";
			 // header("Location:/php/student.php");
			} else {
			echo "Error deleting record: " . $conn->error;
	}
}

$conn->close();

?>