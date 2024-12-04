<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{background-color:#FFEBEE}
        .card{width:400px;background-color:#fff;border:none;border-radius: 12px}
        label.radio{cursor: pointer;width: 100%}
        label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 7px 14px;border: 2px solid #eee;display: inline-block;color: #039be5;border-radius: 10px;width: 100%;height: 48px;line-height: 27px}label.radio input:checked+span{border-color: #039BE5;background-color: #81D4FA;color: #fff;border-radius: 9px;height: 48px;line-height: 27px}.form-control{margin-top: 10px;height: 48px;border: 2px solid #eee;border-radius: 10px}.form-control:focus{box-shadow: none;border: 2px solid #039BE5}.agree-text{font-size: 12px}.terms{font-size: 12px;text-decoration: none;color: #039BE5}.confirm-button{height: 50px;border-radius: 10px}
    </style>
</head>
<body>
    
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <form method="POST">
                <div class="card-body">
                    <h6 class="card-title mb-3">Sửa loại hoa</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="tenhoa" class="form-control" type="text" value="<?php echo $dataID['tenhoa']; ?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> 
                                    <input name="mota" class="form-control" type="text"  value="<?php echo $dataID['mota']; ?>"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="pt-1">
                            <img src="images/<?php echo $dataID['hinhanh']; ?>" alt="Hình ảnh hiện tại" style="width: 100px;">
                            <input name="hinhanh" class="form-control" type="file">
                        </div>
                    </div>
                    <td>&nbsp;</td>
                    <button class="btn btn-primary btn-block confirm-button mt-3" type="submit" name="edit">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>