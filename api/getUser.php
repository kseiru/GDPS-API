<?php
$userName = $_GET["username"];
include "../incl/lib/connection.php";

$check = $db->prepare("SELECT count(*) FROM accounts WHERE userName=:userName");
$check->execute(["userName"=>$userName]);
if($check->fetchColumn()==0){
    exit('-2');
}

$getAccID = $db->prepare("SELECT accountID FROM accounts WHERE userName=:userName");
$getAccID->execute(["userName"=>$userName]);
$accID = $getAccID->fetchColumn();

$getRegDate = $db->prepare("SELECT registerDate FROM accounts WHERE userName=:userName");
$getRegDate->execute(["userName"=>$userName]);
$regDate = $getRegDate->fetchColumn();

$getUser = $db->prepare("SELECT * FROM users WHERE userName=:userName AND isRegistered=1");
$getUser->execute(["userName"=>$userName]);
$user = $getUser->fetchAll(PDO::FETCH_ASSOC)[0];

$userName = $user["userName"];
$stars = $user["stars"];
$demons = $user["demons"];
$icon = $user["icon"];
$col1 = $user["color1"];
$col2 = $user["color2"];
$coins = $user["coins"];
$userCoins = $user["userCoins"];
$cp = $user["creatorPoints"];
$diamonds = $user["diamonds"];
$orbs = $user["orbs"];

$userInfo = array(
    "userName"=>$userName,
    "accountID"=>$accID,
    "stars"=>$stars,
    "diamonds"=>$diamonds,
    "orbs"=>$orbs,
    "coins"=>$coins,
    "userCoins"=>$userCoins,
    "demons"=>$demons,
    "creatorPoints"=>$cp,
    "registerDate"=>$regDate,
    "iconID"=>$icon,
    "color1"=>$col1,
    "color2"=>$col2
);

echo json_encode($userInfo);

?>