<div class="mb-3">
        <a href="add.php" class="btn btn-success">Thêm</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th class="col-3">Tên</th>
            <th class="col-4">Mô tả</th>
            <th class="col-3 text-center">Ảnh</th>
            <th class="col-1">Sửa</th>
            <th class="col-1">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include "ctrl/read.php";
            $flowers = getAllFlowers();
            foreach($flowers as $f){
        ?>
        <tr>
            <td scope="row"><?php echo $f['flower_name']?></td>
            <td>
                <?php echo $f['flower_description']?>
            </td>
            <td>
                <div class="d-flex justify-content-center" >
                    <img src="<?php echo $f['image_path'];?>" alt="Image" style="height:150px;width: 150px;">
                </div>
            </td>
            <td>
                <a href='update.php?id=<?=$f['id']?>'>
                    <i class='fa-solid fa-pen-to-square text-primary'></i>
                </a>
            </td>
            <td>
                <a href='ctrl/delete.php?id=<?=$f['id']?>'>
                    <i class='fa-solid fa-trash text-primary'></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>