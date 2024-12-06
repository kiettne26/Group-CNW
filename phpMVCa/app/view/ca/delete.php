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
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">Delete Fish</h3>
        <form action="?controller=deleteCa&id=<?= $ca->getID()?>" method="post">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $ca->getName();?>">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" name="Description" id="Description"
                    value="<?= $ca->getDescription();?>">
                <button type="submit" class="btn btn-danger" name="btn_delete">Xóa</button>
            </div>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        intergrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        crossorigin="anonymous"></script>
    </script>
</body>

</html>