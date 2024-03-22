
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Details</legend><br>
		Name:<br><input type="text" name="name"><br><br>
		Amount:<br><input type="text" name="amount"><br><br>
		Discount:<br><input type="text" name="discount"><br><br>
		Quantity:<br><input type="text" name="quantity"><br><br>
		Image:<br><br><input type="file" name="image"><br><br>
		<input type="submit" name="submit">
	</fieldset>
</form>
</body>
</html>
<?php

include"conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_FILES["image"]))
	{
		echo "called";
	    $filename = $_FILES["image"]["name"];
	    // $tempname = $_FILES["uploadfile"]["tmp_name"];
	    $folder = "./image/" . $filename;
	}

	if(isset($_POST['name']))
	{
		$companyname = $_POST['name'];
	}

	if (isset($_POST['amount'])) {
		$amount = $_POST['amount'];
	}

	if(isset($_POST['discount'])) {
		$discount=$_POST['discount'];
	}



	
	if(isset($_POST['quantity']))
	{
		$quantity = $_POST['quantity'];
	}
	

	$sql = "INSERT INTO kids(name, amount,discount,quantity,image) VALUES('$companyname', '$amount', '$discount','$quantity','$filename')";

	$result = $conn->query($sql);

	if($result == TRUE)
	{
		header('location:view.php');
	}else
	{
		echo "Error:". $sql . "<br>". $conn->error;
	}
	$conn->close();
}
?>