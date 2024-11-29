<?php
    include "db.php";
    if(isset($_POST['flower_name']) &&
    isset($_POST['flower_description']) &&
    isset($_POST['image_path'])){
        $flower_name = $_POST['flower_name'];
        $flower_description = $_POST['flower_description'];
        $image_path = $_POST['image_path'];
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO flowers (flower_name, flower_description, image_path)
                            VALUES (:flower_name, :flower_description, :image_path)");
        $stmt->execute([
            "flower_name"=>$flower_name,
            "flower_description"=>$flower_description,
            "image_path"=>"images/".$image_path,
        ]);
        header("Location: ../main.php");
    }
    else{
        die("Có lỗi xảy ra!");
    }
?>