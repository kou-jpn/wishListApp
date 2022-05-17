<?php include ( dirname(__FILE__) . '/header.php' ); ?> <!-- sessionと<HTML -->
<?php require_once 'sql.php'; ?>
<?php
$id=$_POST['delete_id'];
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
  ?>

<body>
<form action="complete.php" method="post">
 		<h2>Wish List</h2>
	 	<div class="input-area">
             <tb>Create New Wish</tb>
		 	<input type="text" id="wish_item" name="wish_item" placeholder="ここに欲しいもの記入" required>
             <tb>Choosing Group(シェアしたいグループを1つ選んでください。)</tb>
            <input type="hidden" id="username"name="username" value="<?php echo $username ?>">
            
<select name="group_name" id="group_name">
<?php
    $pdo = get_pdo();
    $sth = $pdo->query('select * from users');
    $sth->execute();
    foreach($sth as $row) {
        if($row['name']==$username){
?>
<option value="<?php echo $row['group_name1'] ?>"><?php echo $row['group_name1']  ?></option>
<option value="<?php echo $row['group_name2'] ?>"><?php echo $row['group_name2']  ?></option>
<option value="<?php echo $row['group_name3'] ?>"><?php echo $row['group_name3']  ?></option>

<?php }
 }?>
</select>
		</div>
	 	<div class="input-area">
	 		<input type="submit" name="submit" value="Add" class="btn-border">
	 	</div>
</form>
<h2>My Wish List</h2>

<?php
    $pdo = get_pdo();
    $sth = $pdo->query('select * from items');
    $sth->execute();
    foreach($sth as $row) {
        if($row['username']==$username){
?>
    <form action="member.php" method="POST">
    <?= $row['wish_item'] ?>
    <?= $row['group_name'] ?>
    <button type="submit"  name="delete">Delete</button>
    <input type="hidden" name="delete_id" id="delete_id" value="<?= $row['id'] ?>">
    <input type="hidden" name="delete" value="true">
    </form>          
<?php
    }else{
        continue;
    }
}
?>
<br>
<br>


<h2>Go to Your Group</h2>
<a>(こちらからGroupを選択してGroupページに行き、Group全部のWish Listを見ることができます。)</a>

<form action="group.php" method="post">
<select name="select_group_name">
    <?php
$pdo = get_pdo();
    $sth = $pdo->query('select * from users');
    $sth->execute();
    foreach($sth as $row) {
        if($row['name']==$username){
?>
<option value="<?php echo $row['group_name1'] ?>"><?php echo $row['group_name1']  ?></option>
<option value="<?php echo $row['group_name2'] ?>"><?php echo $row['group_name2']  ?></option>
<option value="<?php echo $row['group_name3'] ?>"><?php echo $row['group_name3']  ?></option>

<?php }} ?>
</select>
<input type="submit" name="submit" value="Go" class="btn-border">
</form>


<form action="edit_group.php" method="post">
 		<h2>Edit your group</h2>
         <a>（こちらからGroupを変更することができます。仲間と相談して決めてください。）</a>
	 	<div class="input-area">
         <?php
    $pdo = get_pdo();
    $sth = $pdo->query('select * from users');
    $sth->execute();
    foreach($sth as $row) {
        if($row['name']==$username){
            ?>
            <tb>Your Group1</tb>
		 	<input type="text" id="edit_group_name1" name="edit_group_name1" value="<?php echo $row['group_name1'] ?>">
             <tb>Your Group2</tb>
            <input type="text" id="edit_group_name2" name="edit_group_name2" value="<?php echo $row['group_name2'] ?>">
            <tb>Your Group3</tb>
            <input type="text" id="edit_group_name3" name="edit_group_name3" value="<?php echo $row['group_name3'] ?>">
            <input type="hidden" id="username"name="username" value="<?php echo $username ?>">
       <?php }}
       ?>
		</div>
	 	<div class="input-area">
	 		<input type="submit" name="submit" value="Change" class="btn-border">
	 	</div>
</form>

<a href="logout.php">Log Out</a>
</body>