<?php
$Quiz = file("Quiz.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài Trắc Nghiệm</h1>
        <form action="submit.php" method="POST">
            <?php
            $number = 1;
            $current_question = [];
            
            foreach ($Quiz as $line) {
                if (strpos($line, "ANSWER:") === 0) {
                    continue;
                }

                if (preg_match("/^[A-D]\./", $line)) {
                    $current_question[] = $line;
                } else {
                    if (!empty($current_question)) {
                        echo "<div class='card mb-4'>";
                        echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
                        echo "<div class='card-body'>";
                        for ($i = 1; $i < count($current_question); $i++) {
                            $answer = substr($current_question[$i], 0, 1); 
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                            echo "<label class='form-check-label' for='question{$number}{$answer}'>{$current_question[$i]}</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                        $number++;
                    }
                    $current_question = [$line];
                }
            }

            // Hiển thị câu hỏi cuối cùng
            if (!empty($current_question)) {
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
                echo "<div class='card-body'>";
                for ($i = 1; $i < count($current_question); $i++) {
                    $answer = substr($current_question[$i], 0, 1);
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                    echo "<label class='form-check-label' for='question{$number}{$answer}'>{$current_question[$i]}</label>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
            ?>
            <button type="submit" class="btn btn-primary d-block mx-auto">Nộp bài</button>
        </form>
    </div>
</body>
</html>
