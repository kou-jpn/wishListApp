<?php
#$header_link="member.php";
#$header_link="http://dry-hiji-8315.deci.jp/myPage/Portfolio/wishlist/member.php";
function get_pdo() {
#$dsn = 'mysql:host=localhost;dbname=wishListApp;charset=utf8';
#$username = 'root';
#$password = 'pro3620';

$dsn = 'mysql:host=mysql152.phy.lolipop.lan;dbname=LAA1326735-uc4m2f;charset=utf8';
$username = 'LAA1326735';
$password = 'CPqsaoiR';
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
return new PDO($dsn, $username, $password, $options);
}