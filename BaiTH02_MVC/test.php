<?php
// Mã hóa mật khẩu '1'
$hashedPassword = password_hash('1', PASSWORD_DEFAULT);

// In ra mật khẩu đã mã hóa để sao chép
echo $hashedPassword;
?>
