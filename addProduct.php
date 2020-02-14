<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

</head>
<?php
session_start(); 
if($_SESSION['user']['login']!=1){

    header("Location:login.php");
}
else{

include_once "dbconfig.php";
error_reporting(1);
if(isset($_GET['id'])){
    $product = $crud->getSingleProduct($_GET['id']);
    $type = "edit";
}else{
    $type = "add";
}

if(isset($_POST['add'])){

    // var_dump($_POST);exit;
        $res = $crud->createProduct($_POST);
    //var_dump($res);
    header("location:productList.php");

   
}
if(isset($_POST['edit'])){
    //var_dump(2);exit;
    $res = $crud->editProduct($_POST);
    header("location:productList.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row pb-5 pt-5">
<div class="col-md-6">
 <div>
    <a href="index.php">HOME</a>
    <form method="post" enctype="multipart/form-data">
    <input  class="form-control"type="text" placeholder="name" name="name" id="" value="<?= ($product) ?  $product['name'] :  "" ?>">
    <input type="hidden" name="<?= $type ?>" >
    <input class="form-control" type="hidden" name="id" value="<?=$product['id']?>">
    <input class="form-control" type="text"placeholder="Price" name="price" value="<?=$product['price']?>">
    <input  class="form-control"type="text" placeholder="Quantity" name="quantity" value="<?=$product['quantity']?>">
 
    <input type="file" name="image" id="image" class="form-control pagetitle"  placeholder=" photo..." value="<?php echo $product['image']; ?>"accept="image/*">
    <img src="<?php echo $product['image']; ?>" alt="">
                <br>
                <br>
                <br>
    <button type="submit">Submit</button>
    </form>
    </div>
</div></div></div>
   
</body>
</html>
<?php } ?>