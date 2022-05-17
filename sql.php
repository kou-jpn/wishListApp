<?php
#$header_link="member.php";
#$header_link="http://dry-hiji-8315.deci.jp/myPage/Portfolio/wishlist/member.php";
function get_pdo() {



$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
return new PDO($dsn, $username, $password, $options);
}
