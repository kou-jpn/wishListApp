<?php include ( dirname(__FILE__) . '/header.php' ); ?> 
<?php require_once 'sql.php'; ?>
<?php
$id=$_POST['delete_id'];
$location="Location: ";
$pdo = get_pdo();
try {
$sql = 'DELETE FROM items WHERE id =:id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam( ':id', $id, PDO::PARAM_INT);
$stmt->execute();
$pdo = null;

//member.php");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
  }
 