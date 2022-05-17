<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	
<link rel="stylesheet" href="style.css">	
    <title>Wish List ～仲間と欲しいものリストをシェアしましょう～</title>
</head>
<body>
<h1>Login Page</h1>
<p>"Username：guest、Password：guest"でログインできます。お試しください。個人情報や秘密は記載しないでください。</p>
<form action="login.php" method="post">
<div>
    <label>Username：<label>
    <input type="text" name="name" required>
</div>
<div>
    <label>Password：<label>
    <input type="password" name="pass" required>
</div>
<input type="submit" value="Login">
</form>

<p>If you don't have an account.<a href="signup.php">Here</a></p>
</body>
</html>
