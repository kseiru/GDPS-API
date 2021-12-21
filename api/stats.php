<?php
include "../incl/lib/connection.php";

$getTotalAccounts = $db->prepare("SELECT count(*) FROM users");
$getTotalAccounts->execute();
$totalAccounts = $getTotalAccounts->fetchColumn();

$getRegAccounts = $db->prepare("SELECT count(*) FROM accounts");
$getRegAccounts->execute();
$regAccounts = $getRegAccounts->fetchColumn();

$getNonRegAccounts = $db->prepare("SELECT count(*) FROM users WHERE isRegistered=0");
$getNonRegAccounts->execute();
$nonRegAccounts = $getNonRegAccounts->fetchColumn();

$getTotalLevels = $db->prepare("SELECT count(*) FROM levels");
$getTotalLevels->execute();
$totalLevels = $getTotalLevels->fetchColumn();

$getRatedLevels = $db->prepare("SELECT count(*) FROM levels WHERE starStars!=0");
$getRatedLevels->execute();
$ratedLevels = $getRatedLevels->fetchColumn();

$getDemons = $db->prepare("SELECT count(*) FROM levels WHERE starDemon!=0");
$getDemons->execute();
$demons = $getDemons->fetchColumn();

$getFeatured = $db->prepare("SELECT count(*) FROM levels WHERE starFeatured!=0");
$getFeatured->execute();
$featured = $getFeatured->fetchColumn();

$getEpic = $db->prepare("SELECT count(*) FROM levels WHERE starEpic!=0");
$getEpic->execute();
$epic = $getEpic->fetchColumn();

$stats = array(
    "totalAccounts"=>$totalAccounts,
    "regAccounts"=>$regAccounts,
    "nonRegAccounts"=>$nonRegAccounts,
    "totalLevels"=>$totalLevels,
    "ratedLevels"=>$ratedLevels,
    "demons"=>$demons,
    "featuredLevels"=>$featured,
    "epicLevels"=>$epic
);

echo json_encode($stats);

?>