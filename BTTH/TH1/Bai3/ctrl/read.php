<?php
// Kết nối cơ sở dữ liệu (db.php là tệp chứa thông tin kết nối)
include "db.php";

global $pdo;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hiển thị Dữ liệu từ Cơ sở Dữ liệu</title>
</head>
<body>
    <div class="mt-5">
        <h2 class="text-center mb-4">Danh sách Người Dùng</h2>
        <?php
        try {
            // Câu lệnh SQL để lấy tất cả dữ liệu từ bảng 'users'
            $sql = "SELECT * FROM students";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Lấy tất cả dữ liệu
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($users) > 0) {
                // Bắt đầu tạo bảng
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead><tr>";
                
                // Hiển thị tiêu đề cột
                echo "<th scope='col'>Username</th><th scope='col'>Password</th><th scope='col'>Last Name</th><th scope='col'>First Name</th><th scope='col'>City</th><th scope='col'>Email</th><th scope='col'>Course</th>";
                echo "</tr></thead><tbody>";
                // Hiển thị các dữ liệu từ cơ sở dữ liệu
                foreach ($users as $user) {
                    echo "<tr scope='row'>";
                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['password']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['city']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['course1']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<div class='alert alert-warning'>Không có dữ liệu trong cơ sở dữ liệu.</div>";
            }
            echo "<div class='mt-4 text-center'>
                        <a href='../create.php' class='btn btn-success'>Tải dữ liệu khác</a>        
                </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
</body>
</html>
