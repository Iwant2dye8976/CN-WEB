<?php
include "db.php"; // Đảm bảo bạn đã kết nối thành công với cơ sở dữ liệu

global $pdo;

function saveUser($user, $pdo) {
    // Tách các giá trị từ mảng $user
    $username = $user[0];
    $password = $user[1];
    $lastname = $user[2];
    $firstname = $user[3];
    $city = $user[4];
    $email = $user[5];
    $course1 = $user[6];

    // Câu lệnh SQL để chèn dữ liệu vào bảng users
    $sql = "INSERT INTO students (username, password, lastname, firstname, city, email, course1) 
            VALUES (:username, :password, :lastname, :firstname, :city, :email, :course1)";
    $stmt = $pdo->prepare($sql);

    // Thực thi câu lệnh
    $stmt->execute([
        ':username' => $username,
        ':password' => $password,// Mã hóa password trước khi lưu
        ':lastname' => $lastname,
        ':firstname' => $firstname,
        ':city' => $city,
        ':email' => $email,
        ':course1' => $course1,
    ]);
}

if (isset($_FILES['input_file'])) {
    // Kiểm tra file đã được tải lên thành công
    $file = $_FILES['input_file'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Có lỗi xảy ra khi tải file lên.");
    }

    // Đọc file CSV
    $filename = $file['tmp_name'];

    try {
        $pdo->exec("TRUNCATE TABLE students");
    } catch (PDOException $e) {
        die("Lỗi khi xóa dữ liệu cũ: " . $e->getMessage());
    }
    

    if (($handle = fopen($filename, 'r')) !== FALSE) {
        // Dòng đầu tiên có thể là tiêu đề, bỏ qua
        $headers = fgetcsv($handle);

        // Đọc từng dòng dữ liệu và lưu vào cơ sở dữ liệu
        while (($data = fgetcsv($handle)) !== FALSE) {
            // $data là một mảng chứa các giá trị từ một dòng CSV
            if (count($data) == 7) { // Đảm bảo có đủ 7 cột dữ liệu
                saveUser($data, $pdo);
            }
        }

        fclose($handle);
    }

    // Chuyển hướng sau khi hoàn tất
    header("Location: read.php");
}
?>
