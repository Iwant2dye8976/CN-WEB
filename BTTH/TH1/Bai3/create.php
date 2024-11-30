<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thông tin sinh viên</title>
</head>
<body>
    <div class="container w-25 mt-4 bg-light">
    <form action="ctrl/create.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="input_file" class="form-label">Tải lên file CSV:</label>
        <input class="form-control" type="file" name="input_file" id="input_file" accept=".csv" required>
        <div class="d-flex mt-4" style="gap: 10px;">
            <button type="submit" class="btn btn-success">Tải lên</button>
            <a href="ctrl/read.php" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
</body>
</html>
