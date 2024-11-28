<?php
// Đọc nội dung file Quiz.txt
$Quiz = file("Quiz.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// Lấy đáp án đúng từ file Quiz.txt
$answers = [];
foreach ($Quiz as $line) {
    if (strpos($line, "ANSWER:") === 0) {
        $answers[] = trim(substr($line, strlen("ANSWER:")));
    }
}
$score = 0;
// Kiểm tra câu trả lời của người dùng
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT); // Lấy số thứ tự câu hỏi
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === strtoupper($userAnswer)) {
        $score++;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Trắc Nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kết Quả Trắc Nghiệm</h1>
        <div class='alert alert-success text-center'>
            Bạn trả lời đúng <strong><?php echo $score; ?></strong>/<?php echo count($answers); ?> câu.
        </div>
        <a href="index.php" class="btn btn-primary d-block mx-auto">Làm lại</a>
    </div>
</body>
</html>
