<?php

session_start();

require '../includes/dbh.php';

$guidetitle = $_POST['GuideTitle'];
$champion = $_POST['Champion'];
$role = $_POST['Role'];
$patch = $_POST['Patch'];
$author = $_SESSION['UserID'];
$corebuild = $_POST['CoreBuild'];
$description = $_POST['Description'];
$situational = $_POST['Situations'];

$myObj = new StdClass;

$sql = "INSERT INTO `guides` (`ID`, `DateUploaded`, `GuideTitle`, `Champion`, `Role`, `Patch`, `AuthorID`, `CoreBuild`, `Description`, `Situations`) VALUES (NULL, NOW(), '$guidetitle', '$champion', '$role', '$patch', '$author', '$corebuild', '$description', '$situational');";

if (mysqli_query($connection, $sql)) {
    $myObj->success = true;


} else {
	$myObj->success = false;
}
$myJSON = json_encode($myObj);
echo $myJSON;

mysqli_close($connection);
?>