<?php include ( dirname(__FILE__) . '/header.php' ); ?>
<?php require_once 'sql.php'; ?>
<?php

try {
    $dbh = $pdo = get_pdo();
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "INSERT INTO items(wish_item, username, group_name) VALUES (:wish_item, :username, :group_name)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':wish_item', $_POST['wish_item']);
$stmt->bindValue(':username', $_POST['username']);
$stmt->bindValue(':group_name', $_POST['group_name']);
$stmt->execute();

?>

<body>
 	<h2>Your wish is registered.</h2>
 	<div class="input-area">
	 	<a>New Wish：</a><?php echo $_POST['wish_item'];?>
		<br>
		<br>
        <a>　Group：</a><?php echo $_POST['group_name'];?>
	</div>

	<a href="member.php">Go to MyPage</a>
<br>
<a href="logout.php">Log Out</a>
</body>