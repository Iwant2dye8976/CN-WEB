<?php
    include "db.php";
    function getAllFlowers()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM flowers");
        return $stmt->fetchAll();
    }
    function getFlowerById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM flowers WHERE id = :id");
        $stmt->execute([
            "id" => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>