<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <?php 
        include './products.php';
        static $dem=0;
    ?>
    <title>Document</title>
</head>
<body>
    
<div class="container">
<table class="table mt-3">
  <thead>
    <tr style="border-top: solid 1px #000 ;">
      <th >STT</th>
      <th >Name</th>
      <th >Price</th> 
      <th >Image</th> 
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
     <?php session_start();

     if(isset($_SESSION['products']))
     $products = $_SESSION['products'];
     
     foreach ($products as $index =>$product): ?> 
     <tr>
        <th ><?=++$dem?></th>
        <td ><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><img src="<?= $product['image'] ?>" width="50px" alt=""></td>
        <td><a href="editForm.php?index=<?= $index?>"><i class="fa-solid fa-pen mx-2"></i></a><a href="deleteForm.php?index=<?= $index?>"><i class="fa-solid fa-trash mx-2"></i></a></td>
     </tr> 
     <?php endforeach; ?>

  </tbody>
</table>
</div>
</body>
</html>