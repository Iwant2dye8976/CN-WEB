<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Hoa đẹp</title>
</head>
<body>
    <?php include "header.php" ?>
    <h2 class="text-center fw-bold mb-4">
            Cập nhật thông tin
    </h2>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="ctrl/update.php"
        method="POST" class="w-50">
        <?php 
            include "ctrl/read.php";
            if(isset($_GET['id']))
            {
                $f = getFlowerById($_GET['id']);
            }
        ?>
            <div class="mb-3">
                <label for="flower_name">Tên</label>
                <input class="form-control" id="flower_name" name="flower_name" type="text" 
                value="<?= $f['flower_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="flower_description">Mô tả</label>
                <textarea class="form-control" name="flower_description" id="flower_description" style="height: 200px;"><?= trim(htmlspecialchars($f['flower_description'])); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image_path">File ảnh</label>
                <input class="form-control" id="image_path" type="file" name="image_path" accept="image/*">
            </div>
            <input type="text" value="<?= $f['id']?>" name="id" hidden>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Xác nhận</button>
            </div>
        </form>
    </div>
</body>
</html>