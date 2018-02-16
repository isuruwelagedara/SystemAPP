<?php


require_once '../config.php';

$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM manager_table WHERE name LIKE (:keyword) ORDER BY id ASC LIMIT 0, 10";

$query = $DBcon->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();


foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
	// add new option

    echo '<li onclick="set_item2(\''.str_replace("'", "\'", $rs['name']).'\')">'.$country_name.'</li>';
}



?>