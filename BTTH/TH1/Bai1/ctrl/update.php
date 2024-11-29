<?php
    include "db.php";
    if(isset($_POST['image_path']) &&
        isset($_POST['id']) &&
        isset($_POST['flower_name']) &&
        isset($_POST['flower_description'])
    ){
        $file = $_POST['image_path'];
        $flower_name = $_POST['flower_name'];
        $flower_description = $_POST['flower_description'];
        $id = $_POST['id'];
        global $pdo;
        $stmt = $pdo->prepare("UPDATE flowers SET
                                flower_name=:flower_name,
                                flower_description=:flower_description,
                                image_path=:image_path
                                WHERE id=:id");
        $stmt->execute([
            "id"=>$id,
            "flower_name"=>$flower_name,
            "flower_description"=>$flower_description,
            "image_path"=>"images/".$file,
        ]);
        header("Location: ../main.php");
    }
?>