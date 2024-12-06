<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    form {
        width: 30%;
        margin: auto;
    }

    button {
        margin-top: 10px;
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <h3>Update Information About Fish</h3>
        <form action="?controller=editCa&id=<?=$ca->getID()?>" method="post">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $ca->getName(); ?>">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" id="Description" name="Description"
                    value="<?= $ca->getDescription(); ?>" required>
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" class="form-control" id="Image" name="Image" accept="image/*"
                    value="<?= $ca->getImage();?>">
                <button type="submit" class="btn btn-primary" name="btn_update">Cập nhật</button>
            </div>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </script>

</body>

</html>