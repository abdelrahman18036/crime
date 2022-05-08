<?php 

include_once('include/config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){

	$db->delete('students',array('id'=>$_REQUEST['delId']));

	header('location: contact.php?msg=rds');

	exit;

}

?>