<?php require_once 'sql.php'; ?>
<?php
session_start();
$name = $_POST['name'];

try {
    $dbh = $dbh = $pdo = get_pdo();
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $name);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'Logged in';
    $link = '<a href="member.php">MyPageへ</a>';
} else {
    $msg = 'Please login with password.';
    $link = '<a href="login_form.php">Back to login page</a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <title>Wish List ～仲間と欲しいものリストをシェアしましょう～</title>
</head>
<body>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?> 
</body>
</html>
