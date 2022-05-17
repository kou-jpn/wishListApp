<?php require_once 'sql.php'; ?>
<?php
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$group_name1=trim(ucwords($str=mb_convert_encoding( $_POST['group_name1'],"UTF-8","auto")));
$group_name2=trim(ucwords($str=mb_convert_encoding( $_POST['group_name2'],"UTF-8","auto")));
$group_name3=trim(ucwords($str=mb_convert_encoding( $_POST['group_name3'],"UTF-8","auto")));
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

try {
    $dbh =get_pdo();
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $name);
$stmt->execute();
$member = $stmt->fetch();
if ($member['name'] == $name) {
    $msg = 'The same username is already existed.';
    $link = '<a href="signup.php">Back to registration.</a>';
} else { 
    
    //登録されていなければinsert 
    $sql = "INSERT INTO users(name, pass,group_name1,group_name2,group_name3) VALUES (:name, :pass, :group_name1, :group_name2, :group_name3)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':pass', $pass);
    $stmt->bindValue(':group_name1', $group_name1);
    $stmt->bindValue(':group_name2', $group_name2);
    $stmt->bindValue(':group_name3', $group_name3);
    $stmt->execute();
    $msg = 'Your account is created.';
    $link = '<a href="login_form.php">Go to Login Page.</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>
</body>
</html>
