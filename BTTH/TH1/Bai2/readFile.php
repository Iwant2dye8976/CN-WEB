<?php 
    $filename = "C:/xampp/htdocs/TH1-Bai2/q.txt";
    $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $question = [];
    $current_question = [];
    $number = 0;
?>