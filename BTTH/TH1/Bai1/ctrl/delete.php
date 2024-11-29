<?php
    include "db.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM flowers WHERE id=:id");
        $stmt->execute([
            "id"=>$id
        ]);
        header("LOcation: ../main.php");
    }
?>