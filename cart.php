<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj	1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
 <div class="row">
    <div class="col-lg-12 text-center border-rounded bg-light my-5">
    	<h1>MY CART</h1>
      <h5><a href="index.php">Home</a></h5>
    </div>
    <div class="col-lg-9">
    	<table class="table">
    		<thead class="text-center">
    			<tr>
    				<th>Seriel No.</th>&nbsp
    				<th> Name</th>&nbsp
    				<th>Price</th>&nbsp
    				<th>Quantity</th>&nbsp
            <th>Discount</th>&nbsp
    				<th>Total</th>&nbsp
            <th>Clear</th>
    			</tr>
    		</thead>
    		<tbody class="text-center">

     <?php
       
       include "conn.php";
       session_start();
       // echo print_r($_SESSION["products"]);
       $i=0;
       foreach($_SESSION["products"] as $x)
       {
          
          $query="select * from kids where id=".$x['id'];

          $result=$conn->query($query);
          $row=$result->fetch_assoc();
          echo "<tr><td>".$x["id"]."</td><td>".$row["name"]."</td><td>".$row["amount"]."</td><td>".$x["qty"]."</td><td>".$row["discount"]."</td><td>".$row['amount']-($row['amount']*($row['discount']/100))."</td><td><form action='cart.php' method='post'><input type='hidden' name='rsubmit' value='$i'><button>Remove</button></form></td></tr> ";
          $i++;

       }
        
       if(isset($_POST["rsubmit"]))
       {
          array_splice($_SESSION["products"],$_POST["rsubmit"],1);
       } 
       ?>

        </div>
       </tbody></table></div></div>
</script>
          <!-- &nbsp&nbsp <input type="submit" name="rsubmit" value="remove from cart"></a><br> -->


</body>
</html>