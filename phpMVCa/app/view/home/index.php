<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">TLU</h3>
        <!--<a href="<?= APP_ROOT.'/app/view/ca/add.php'; ?> class="btn btn-success">Thêm mới</a>-->
        <a href="?controller=addCa" class="btn btn-success">Add New</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
            foreach ($cas as $ca){
        ?>
                <tr>
                    <th scope="row"><?=$ca->getID();?></th>
                    <td><?=$ca->getName();?></td>
                    <td><?=$ca->getDescription();?></td>
                    <td><?=$ca->getImage();?></td>
                    <td>
                        <!--<a href="">Sửa</a>-->
                        <a href=" ?controller=editCa&id=<?= $ca->getID() ?>">
                            <i class="bi bi-pencil-square"></i>
                    </td>
                    <td>
                        <!--<a href="">Xóa</a>-->
                        <a href="?controller=deleteCa&id= <?= $ca->getID() ?>">
                            <i class="bi bi-trash3"></i>

                    </td>
                </tr>
                <?php
            }
    ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>;
</body>

</html>