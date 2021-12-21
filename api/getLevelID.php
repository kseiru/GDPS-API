<?php
$levelID = $_GET["levelid"];
include "../incl/lib/connection.php";

$check = $db->prepare("SELECT count(*) FROM levels WHERE levelID=:levelID");
$check->execute(["levelID"=>$levelID]);
if($check->fetchColumn()==0){
    exit('-2');
}

$getLevel = $db->prepare("SELECT * FROM levels WHERE levelID=:levelID");
$getLevel->execute(["levelID"=>$levelID]);
$level = $getLevel->fetchAll(PDO::FETCH_ASSOC)[0];

$creator = $level["userName"];
$levelID = $level["levelID"];
$levelName = $level["levelName"];
$levelDescriptionEnc = $level["levelDesc"];
$levelDescription = base64_decode($levelDescriptionEnc);
$version = $level["levelVersion"];
$levelLength = $level["levelLength"];
$pass = $level["password"];
$originalID = $level["original"];
$songID = $level["songID"];
$objects = $level["objects"];
$coins = $level["coins"];
$reqStars = $level["requestedStars"];
$starDifficulty = $level["starDifficulty"];
$downloads = $level["downloads"];
$likes = $level["likes"];
$isDemon = $level["starDemon"];
$isAuto = $level["starAuto"];
$stars = $level["stars"];
$uploadDate = $level["uploadDate"];
$updateDate = $level["updateDate"];
$rateDate = $level["rateDate"];
$isCoinsVerified = $level["starCoins"];
$isFeatured = $level["starFeatured"];
$isHall = $level["starHall"];
$isEpic = $level["starEpic"];
$demonDiff = $level["starDemonDiff"];
$originalReupload = $level["originalReup"];

$levelInfo = array(
    "levelName"=>$levelName,
    "levelID"=>$levelID,
    "creator"=>$creator,
    "levelDescr"=>$levelDescription,
    "version"=>$version,
    "length"=>$levelLength,
    "password"=>$pass,
    "originalID"=>$originalID,
    "songID"=>$songID,
    "object"=>$objects,
    "coins"=>$coins,
    "reqStars"=>$reqStars,
    "stars"=>$stars,
    "starDiff"=>$starDifficulty,
    "demonDiff"=>$demonDiff,
    "downloads"=>$downloads,
    "likes"=>$likes,
    "isDemon"=>$isDemon,
    "isAuto"=>$isAuto,
    "uploadDate"=>$uploadDate,
    "updateDate"=>$updateDate,
    "rateDate"=>$rateDate,
    "isCoinsVerified"=>$isCoinsVerified,
    "isFeatured"=>$isFeatured,
    "isEpic"=>$isEpic,
    "isHall"=>$isHall,
    "originalReupload"=>$originalReupload
);

echo json_encode($levelInfo);

?>