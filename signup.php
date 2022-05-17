
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Wish List</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" media="screen and (max-device-width: 480px)" href="iphone.css">
<link rel="stylesheet" media="screen and (min-device-width: 481px) and  (max-device-width: 1024px) and (orientation:portrait)" href="ipad-portrait.css">
<link rel="stylesheet" media="screen and (min-device-width: 481px) and  (max-device-width: 1024px) and (orientation:landscape)" href="ipad-landscape.css">
<link rel="stylesheet" media="screen and (min-device-width: 1025px)"
</style>

</head>

<body>
<h1>Welcome to </h1>
<form action="register.php" method="post">
<div>
    <label>Your Name：<label>
    <input type="text" name="name" required>
</div>
<div>
    <label>Creating Login Password(管理者側でもわかりません。)：<label>
    <input type="password" name="pass" required>
</div>
<div>
    <label>Group1：(仲間とシェアするグループ名キーワードになります。)<label>
    <input type="text" name="group_name1" value=" ">
</div>
<div>
    <label>Group2：（２つ目以降は空白でもＯＫです。後から追加できます。）<label>
    <input type="text" name="group_name2" value=" ">
</div>
<div>
    <label>Group3：<label>
    <input type="text" name="group_name3" value=" ">
</div>
<input type="submit" value="Register">
</form>
<p>If you already have your account<a href="login_form.php">click here</a></p>
</body>

</html>

