<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Manage Products</title>
</head>
<body>
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

</body>
</html>
