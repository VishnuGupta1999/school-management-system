<?php 
    $conn = new mysqli("localhost","root","","sample");
     if($conn->connect_error) {
         die("connection faild");
    }
    $sql = "SELECT * FROM school";
    $result = $conn->query($sql);

    
?>
<html>
	<head>        
        <style>
            table, th, td {
              border: 1px solid black;
              
              text-align: center;
            

            }
        </style>
	</head>
	<body>
		<table style="width:100%">
        <thead>
            <tr>
                <th>name</th>
                <th>hindi</th>
                <th>english</th>
                <th>marathi</th>
                <th>math</th>
                <th>socialscience</th>
                <th>science</th>
                <th>mark</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    
            ?>
            <tr>
                <td> <?php echo($row["name"]); ?> </td>
                <td> <?php echo($row["hindi"]); ?> </td>
                <td> <?php echo($row["english"]); ?> </td>
                <td> <?php echo($row["marathi"]); ?> </td>
                <td> <?php echo($row["math"]); ?> </td>
                <td> <?php echo($row["socialscience"]); ?> </td>
                <td> <?php echo($row["science"]); ?> </td>
                <td> <?php echo($row["mark"]); ?> </td>
                <td> <?php echo($row["action"]); ?>
                    <input type="button" value="Edit" name="edit" onclick="editdata('<?php echo($row["id"]); ?>');">
                    <a href="/php/class.php?vishnu=<?php echo($row["id"]); ?>"  >delete</a>
                    
                 </td>
            </tr>
            <?php 
                    }
                }
                   //echo "Record updated successfully";
            ?>
            

        </tbody>
    	</table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function editdata(valueid){
                window.location.href = "/php/class.php?id="+valueid;

            }

            function deleteids(valueid){
                window.location.href = "/php/class.php?id="+valueid;

            }
        </script>
	</body>
</html>