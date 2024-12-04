<?php 
    $products=[
        ['name'=>'Sản phẩm 1','price' => '1000'],
        ['name'=>'Sản phẩm 2','price' => '2000'],
        ['name'=>'Sản phẩm 3','price' => '3000'],
        ['name'=>'Sản phẩm 4','price' => '4000'],
        ['name'=>'Sản phẩm 5','price' => '5000'],
    ];
    $dem = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<header>
<div class="container mt-3 navbar p-3" style="background-color: blueviolet;">
        <h1 class="text-light"><b>Manage Products</b></h1>
        <div class="buttons">
            <!-- Button to trigger Delete Modal -->
            <a href="#" class="btn btn-danger mx-2" data-toggle="modal" data-target="#deleteEmployeeModal">
                <i class="fa-solid fa-circle-minus mx-2"></i><span>Delete</span>
            </a>
            <!-- Button to trigger Add Modal -->
            <a href="#" class="btn btn-success mx-2" data-toggle="modal" data-target="#addEmployeeModal">
                <i class="fa-solid fa-circle-plus mx-2"></i><span>Add new Product</span>
            </a>
        </div>
    </div>
</header>
<body>

<div class="container">
<table class="table mt-3">
  <thead>
    <tr style="border-top: solid 1px #000 ;">
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    
     <?php foreach ($products as $product): ?> 
     <tr>
        <th scope="row"><?=htmlspecialchars(++$dem)?></th>
        <td ><?= htmlspecialchars($product['name']) ?></td>
        <td><?= htmlspecialchars($product['price']) ?></td>
     </tr> 
     <?php endforeach; ?>

  </tbody>
</table>
</div>
</body>
<footer>
<div class="container navbar p-3">
        <p>Showing <b>5</b> out of <b>25</b> entrics</p>
        <ul class="nav">
            <li class="nav-item mx-2">Previous</li>
            <li class="nav-item mx-2">1</li>
            <li class="nav-item mx-2">2</li>
            <li class="bg-primary nav-item px-2">3</li>
            <li class="nav-item mx-2">4</li>
            <li class="nav-item mx-2">5</li>
            <li class="nav-item mx-2">Next</li>
        </ul>
    </div>
</footer>
</html>