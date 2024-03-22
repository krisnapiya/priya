<?php
include"conn.php";

$sql="SELECT * from kids";
$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Amount</th>
				<th>Discount</th>
				<th>Quantity</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php
           if($result->num_rows>0)
           {
           	while($row=$result->fetch_assoc())
           	{
           		?>
           		<tr>
           			<td><?php echo $row['id'];?> </td>
           			<td><?php echo $row['name'];?> </td>
           			<td><?php echo $row['amount'];?> </td>
           			<td><?php echo $row['discount'];?> </td>
           			<td><?php echo $row['quantity'];?> </td>
           			<td><?php echo $row['image'];?> </td>

           			<td> <a class="btn btn-info" href="delete.php? id=<?php echo $row['id']; ?>">Delete</a>
           			</td>
           		</tr>
           		<?php
           	}
           }

			?>
		</tbody>
	</table>
</div>
</body>
</html>