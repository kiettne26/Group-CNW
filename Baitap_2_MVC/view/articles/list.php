<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">


    <div class="danhsach container">
        <?php 
            include './view/categories/Header.php';
        ?>
        <h1 style="text-align: center;">Quản lý Hoa</h1>
        <a href="index.php?controller=hoa&action=add" class="btn btn-success">Thêm mới</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach($data as $value){
                ?>
                <tr>
                    <td><?php echo $value['tenhoa']; ?></td>
                    <td><?php echo $value['mota']; ?></td>
                    <td>
                        <img src="images/<?php echo $value['hinhanh']; ?>" alt="<?php echo $value['tenhoa']; ?>" style="width: 100px;">
                    </td>
                    <td>
                        <a href="index.php?controller=hoa&action=edit&id=<?php echo $value['id']; ?>" class="">                        
                            <i class="fa-solid fa-pen" style="color: blue;"></i>
                        </a>
                        <a onclick="return confirm('bạn có chắc chắn muốn xóa không')" href="index.php?controller=hoa&action=delete&id=<?php echo $value['id']; ?>" class="">
                            <i class="fa-solid fa-trash" style="color: blue;"></i>
                        </a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        <?php 
            include './view/categories/Footer.php';
        ?>
    </div>


