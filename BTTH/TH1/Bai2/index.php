<?php include "ctrl/read.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách câu hỏi</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="fw-bold text-center">Danh sách câu hỏi</h2>
        <form action="nopbai.php" method="POST">
        <?php foreach ($questions as $index => $question): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <strong><?= htmlspecialchars($question['question_text']) ?></strong>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $question['id'] ?>" value="A" id="q<?= $question['id'] ?>a">
                        <label class="form-check-label" for="q<?= $question['id'] ?>a"><?= htmlspecialchars($question['answer_a']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $question['id'] ?>" value="B" id="q<?= $question['id'] ?>b">
                        <label class="form-check-label" for="q<?= $question['id'] ?>b"><?= htmlspecialchars($question['answer_b']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $question['id'] ?>" value="C" id="q<?= $question['id'] ?>c">
                        <label class="form-check-label" for="q<?= $question['id'] ?>c"><?= htmlspecialchars($question['answer_c']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $question['id'] ?>" value="D" id="q<?= $question['id'] ?>d">
                        <label class="form-check-label" for="q<?= $question['id'] ?>d"><?= htmlspecialchars($question['answer_d']) ?></label>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <div class="d-flex justify-content-center mb-4" style="gap: 15px;">
                <button type="submit" class="btn btn-primary">Nộp bài</button>
                <a href="create.php" class="btn btn-success">Thay bộ câu hỏi</a>
            </div>
        </form>
    </div>
</body>
</html>
