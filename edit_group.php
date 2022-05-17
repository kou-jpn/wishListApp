<?php include ( dirname(__FILE__) . '/header.php' ); ?> 
<?php require_once 'sql.php'; ?>
<?php
$group_name1=trim(ucwords($str=mb_convert_encoding( $_POST['edit_group_name1'],"UTF-8","auto")));
$group_name2=trim(ucwords($str=mb_convert_encoding( $_POST['edit_group_name2'],"UTF-8","auto")));
$group_name3=trim(ucwords($str=mb_convert_encoding( $_POST['edit_group_name3'],"UTF-8","auto")));

$pdo = get_pdo();
try {
$sql = 'UPDATE users SET group_name1 = :group_name1, group_name2 = :group_name2, group_name3 = :group_name3 WHERE name =:name' ;
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $username);

$stmt->bindParam(':group_name1', $group_name1);
$stmt->bindParam(':group_name2', $group_name2);
$stmt->bindParam(':group_name3', $group_name3);
$stmt->execute();

} catch (PDOException $e) {
	echo $e->getMessage();
	die();
  }
?>

<body>
 	<h2>Your Group is changed.</h2>
 	<div class="input-area">
	 <?php
    $pdo = get_pdo();
    $sth = $pdo->query('select * from users');
    $sth->execute();
    foreach($sth as $row) {
        if($row['name']==$username){
            ?>
	 	<p>Your Group1：<?php echo $row['group_name1'];?></p>
		<p>Your Group2：<?php echo $row['group_name2'];?></p>
		<p>Your Group3：<?php echo $row['group_name3'];?></p>
		<?php }}
       ?>

	</div>
<br>
<a href="member.php">Back to MyPage</a>
<br>
<a href="logout.php">Log Out</a>
</body>