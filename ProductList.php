<?php
session_start();
include_once 'dbconfig.php';

$products = $crud->getProducts($_POST['q']);
    //var_dump($products);exit;

if($_SESSION['user']['login']!=1){

    header("Location:login.php");
}
else{
 //$pd = $products->fetch(PDO::FETCH_ASSOC);
 if(isset($_POST['delete'])){
     $res = $crud->deleteProduct($_POST['id']);
     header("location:productList.php");
 }

 function logout() {
    unset($_SESSION['user']['login']);
        // header('Location: dashboard.html?user_id='.$res['id']);
        echo '<script>window.location="login.php"</script>';
}

if(isset($_POST['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>

<div class="container">
<div class="row"><div class="col-md-12"> 
     <div>
    <a href="productList.php"><button class="btn-success">Product List</button></a>
    </div>
    <div>
    <a href="addProduct.php"><button class="btn-danger">Add Product</button></a>
     </div>

     <form action="" method="post">
     <button  name="logout" class="btn-danger">Log Out</button>
     <input type="text"   name="q" id="myInput" placeholder="Search here.."> 
     <input type="submit"  class="btn btn-primary" value="Search/Reset">
      </form>

            

    <table border=1 width="100%"  >
    <thead>
    <th>Sl.No</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Image</th>
    <th>Action</th>
    </thead>
    <tbody>
   <?php foreach($products as $key => $product) {?> 
    <tr>
    <td><?= $key+1 ?></td>
    <td><?= $product['name']; ?></td>
    <td><?= $product['price']; ?></td>
    <td><?= $product['quantity']; ?></td>
    <td><img src="<?=$product['image'];?>" class="img-fluid" width="50" height="50" alt=""></td>
    <td><a href="addProduct.php?id=<?= $product['id'] ?>"><button>Edit</button></a></td>
    <td>
    <form method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <button type="submit" name="delete">Delete</button>
    </form>
    </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
<?php } ?>