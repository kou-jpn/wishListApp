<?php include ( dirname(__FILE__) . '/header.php' ); ?> <!-- sessionと<HTML -->
<?php require_once 'sql.php'; ?>

<?php $select_group_name=$_POST['select_group_name'] ?>
<h1><?php echo $select_group_name ?> 's Group Wish List!</h1>
<?php
    //$select_group_name=$_POST['select_group_name'];
    //var_dump($select_group_name);
    $pdo = get_pdo();
    $sth = $pdo->query('select * from items');
    $sth->execute();
    foreach($sth as $row) {
        if($row['group_name']==$select_group_name){
?>
    <form method="POST">
    <?= $row['wish_item']?>
    <tb>　　　</tb>
    <?= $row['username']?>
    <tb>さん</tb>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="hidden" name="delete" value="true">
    </form>          
<?php
    }else{
        continue;
    }
}
?>
<a href="member.php">Go to MyPage</a>
<br>
<a href="logout.php">Log Out</a>