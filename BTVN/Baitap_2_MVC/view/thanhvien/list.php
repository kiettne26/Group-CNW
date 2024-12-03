<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <div class="danhsach container">
        <div class="tim kiem pt-3">
            <form action="" method="GET">
                <table class="">
                    <tr class="">
                        <input type="hidden" name="controller" value="thanh-vien">
                        <td><input type="text" class="form-control" name="tukhoa" placeholder="Nhập từ tìm kiếm"></td>
                        <td><input type="submit" class="btn btn-success ms-2" value="Tìm kiếm"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="tim-kiem">
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên thành viên</th>
                    <th>Năm sinh</th>
                    <th>Quê quán</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 1;
                    foreach($data as $value){

                    
                ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['hoten']; ?></td>
                    <td><?php echo $value['namsinh']; ?></td>
                    <td><?php echo $value['quequan'];?></td>
                    <td>
                        <a href="index.php?controller=thanh-vien&action=edit&id=<?php echo $value['id']; ?>" class="">Edit</a>
                        <a onclick="return confirm('bạn có chắc chắn muốn xóa không')" href="index.php?controller=thanh-vien&action=delete&id=<?php echo $value['id']; ?>" class="">Delete</a>
                    </td>


                </tr>
                <?php 
                    $stt++;
                    }
                ?>
            </tbody>
        </table>
    </div>


