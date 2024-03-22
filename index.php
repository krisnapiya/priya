<!DOCTYPE html>
<head>
	<title>Shopping Cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <nav class="navbar bg-light fixed-top shadow">
    <div class="container-fluid mx-5">
      <a class="navbar-brand">PRANA</a>

       <a href="cart.php">My Cart</a>

      <form class="d-flex" role="search">

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

      </form>
    </div>
  </nav>

  <div class="container-fluid my-5 py-5">
<p align="center"><strong>Products For You</strong></p>
 </div>

<?php
include "conn.php";

session_start();
$product_array=[];
if(gettype($_SESSION["products"])!=gettype([]))
{
  $_SESSION["products"]=array(); 
}
else{
  $_SESSION["products"]=array();  
}
$sql="SELECT * from kids";
$result=$conn->query($sql);
?>

<div class="container-fluid">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body"></div>
			<?php
           if($result->num_rows>0)
           {
           	while($row=$result->fetch_assoc())
           	{
           		?>
              
               <div class="card-body">
             <img src="<?php echo $row['image'];?>" width=150 height=100></div>
               <div class="card-header">
           			<?php echo $row['id'];?> <?php echo $row['name'];?> <br>
               $<?php echo $row['amount'];?> <?php echo $row['discount'];?>% <br><br>
                <div class="card-footer">
           			

               <!-- <form action="cart.php" method="post">-->
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                Type quantity<input type="text" name="qty" value="0">
                <input type="hidden" name="pid" value="<?php echo $row['id'];?>">
                <br><br>
                <!-- <button type="submit">Add to cart</button> -->
                <input type="submit" name="submit" value="Add to cart"></a><br>

              </form>
                       
           			</div></div>
                
           		<?php
           	}
           }
         
			?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <!-- <input type="submit" name="rsubmit" value="remove from cart"></a><br> -->
</form>
</div></div>
<?php
// class product
// {
//   public $id;
//   public $qty;

//   public function setData($i,$q)
//   {
//     $this->id=$i;
//     $this->qty=$q;
//   }
// }

if(isset($_POST['submit'])){
                  // $p=new product();
                  // $p->setData($_POST['pid'],$_POST['qty']);
                  $product=array(
                    'id'=>$_POST['pid'],
                    'qty'=>$_POST['qty']
                  );
                  // array_push($product_array, $product);
                  // $product_array$product;

                  array_push($_SESSION["products"],$product);
                ?>   
                <!-- <h1><?php print_r($_SESSION["products"]);?></h1> -->
                <?php

}

if(isset($_POST['rsubmit'])){

                  $_SESSION["products"]=array();

}

?>   

<div class="container-fluid">
<div class="row">
  <div class="col-sm-12 bg-info">
    <p><center><i class="material-icons" style="font-size:30px;color:red">local_florist</i> <i class="material-icons" style="font-size:30px;color:red">local_grocery_store</i>&nbsp CREATED BY PRIYA &nbsp <i class="material-icons" style="font-size:30px;color:red">local_grocery_store</i> <i class="material-icons" style="font-size:30px;color:red">local_florist</i></center></p>
  </div>
</div>
</div>
</div></div>
</body>
</html>