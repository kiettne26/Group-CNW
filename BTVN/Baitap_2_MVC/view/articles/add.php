<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoa</title>
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
                    <h6 class="card-title mb-3">Thêm loại hoa</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="tenhoa" class="form-control" type="text" placeholder="Tên hoa"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> 
                                    <input name="mota" class="form-control" type="text" placeholder="Mô tả"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <input name="hinhanh" class="form-control" type="file"> 
                        </div>
                    </div>
                    <td>&nbsp;</td>
                    <button class="btn btn-primary btn-block confirm-button mt-3" type="submit" value="Thêm mới" name="add">Thêm mới</button>
                </div>
            </form>
            <?php
                if(isset($thanhcong) && in_array('add_success', $thanhcong)){
                    echo "<p style='color: green; text-align:center'>Thêm mới thành công</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>