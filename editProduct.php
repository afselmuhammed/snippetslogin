<?php 

include_once "dbconfig.php";

$product = $crud->getSingleProduct($_GET['id']);
//var_dump($product);
if(isset($_POST['add'])){
   // var_dump(1);
    $res = $crud->createProduct($_POST);
    //var_dump($res);
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
    <div>
    <form method="post">
    <input type="text" name="name" id="">
    <button type="submit" name="add">Add</button>
    </form>
    </div>
</body>
</html>