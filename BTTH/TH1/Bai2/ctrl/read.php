<?php
include "db.php";
global $pdo;
try {
    // Câu lệnh SQL để lấy dữ liệu từ bảng questions
    $sql = "SELECT * FROM questions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Lấy tất cả dữ liệu
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi khi đọc dữ liệu: " . $e->getMessage());
}
?>
