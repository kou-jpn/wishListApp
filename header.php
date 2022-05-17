<?php
session_start();
$username = $_SESSION['name'];

if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'Hello!　　' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8');
    $link = '<a href="logout.php">Logout</a>';
} else {//ログインしていない時
    $msg = '
    You are not logged in.';
    header("location:login_form.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Wish List ～仲間と欲しいものリストをシェアしましょう～</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" media="screen and (max-device-width: 480px)" href="iphone.css">
<link rel="stylesheet" media="screen and (min-device-width: 481px) and  (max-device-width: 1024px) and (orientation:portrait)" href="ipad-portrait.css">
<link rel="stylesheet" media="screen and (min-device-width: 481px) and  (max-device-width: 1024px) and (orientation:landscape)" href="ipad-landscape.css">
<link rel="stylesheet" media="screen and (min-device-width: 1025px)"
</style>

</head>

<body>
<p><?php echo $msg; ?>さん</p>
</body>
</html>
