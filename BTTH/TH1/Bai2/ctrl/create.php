<?php
    include "db.php";
    global $pdo;
    function saveQuestion($question, $pdo) {
        // Tách nội dung câu hỏi và đáp án
        $question_text = $question[0];
        $answer_a = substr($question[1], 3); // Bỏ "A. "
        $answer_b = substr($question[2], 3); // Bỏ "B. "
        $answer_c = substr($question[3], 3); // Bỏ "C. "
        $answer_d = substr($question[4], 3); // Bỏ "D. "
        $correct_answer = substr(end($question), -1); // Lấy ký tự cuối cùng

        // Câu lệnh SQL để chèn dữ liệu
        $sql = "INSERT INTO questions (question_text, answer_a, answer_b, answer_c, answer_d, correct_answer) 
                VALUES (:question_text, :answer_a, :answer_b, :answer_c, :answer_d, :correct_answer)";
        $stmt = $pdo->prepare($sql);

        // Thực thi câu lệnh
        $stmt->execute([
            ':question_text' => $question_text,
            ':answer_a' => $answer_a,
            ':answer_b' => $answer_b,
            ':answer_c' => $answer_c,
            ':answer_d' => $answer_d,
            ':correct_answer' => $correct_answer,
        ]);
    }

    if(isset($_FILES['input_file']))
    {
        try {
            $pdo->exec("TRUNCATE TABLE questions");
        } catch (PDOException $e) {
            die("Lỗi khi xóa dữ liệu cũ: " . $e->getMessage());
        }        
        $filename = $_FILES['input_file']['tmp_name'];
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $current_question = [];
        foreach ($questions as $line) {
            if (strpos($line, "Câu") === 0) {
                if (!empty($current_question)) {
                    saveQuestion($current_question, $pdo);
                }
                $current_question = [];
            }
            $current_question[] = $line;
        }

        if (!empty($current_question)) {
            saveQuestion($current_question, $pdo);
        }
        header("Location: ../index.php");
    }
?>