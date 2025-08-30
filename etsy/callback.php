<?php

// 1. 获取回调参数
$code  = isset($_GET['code']) ? $_GET['code'] : null;
$state = isset($_GET['state']) ? $_GET['state'] : null;
$error = isset($_GET['error']) ? $_GET['error'] : null;

echo $code;
echo "<br/>";
echo $state;
echo "<br/>";
echo $error;
echo "<br/>";


// 2. 检查是否有错误
if ($error) {
    $error_description = isset($_GET['error_description']) ? $_GET['error_description'] : 'Unknown error';
    die("Authorization failed: $error - $error_description");
}

// 3. 校验 state 防止 CSRF
if (!isset($_SESSION['oauth2_state']) || $state !== $_SESSION['oauth2_state']) {
    die("Invalid state parameter. Possible CSRF attack.");
}