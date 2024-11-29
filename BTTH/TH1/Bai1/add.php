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
            Thêm hoa
    </h2>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="ctrl/add.php"
        method="POST" class="w-50">
            <div class="mb-3">
                <label for="flower_name">Tên</label>
                <input class="form-control" id="flower_name" name="flower_name" type="text" placeholder="Tên hoa">
            </div>
            <div class="mb-3">
                <label for="flower_description">Mô tả</label>
                <textarea class="form-control" name="flower_description" id="flower_description" style="height: 200px;" placeholder="Mô tả"></textarea>
            </div>
            <div class="mb-3">
                <label for="image_path">File ảnh</label>
                <input class="form-control" id="image_path" name="image_path" type="file" accept="image/*">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Xác nhận</button>
            </div>
        </form>
    </div>
</body>
</html>