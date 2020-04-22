<?php 

// Require external librarys
require_once('../config/config.php');
require_once('../includes/library.php');

// Require classes
require_once('../includes/PapaToDo/todo.class.php');

// Define classes
$todo = new ToDo();

// Get lists
$lists = $todo->getLists();
$tasks = $todo->getTasks();

// Assign template variables
$smarty->assign('action', 	'none');
$smarty->assign('lists', 	$lists);
$smarty->assign('tasks', 	$tasks);

// Get page from url
$module = !empty($_GET['p']) 	? $_GET['p'] 	: '';

if($module == ''){
	// Show index page
	$smarty->display(TEMPLATE_DIR.'index.tpl.php');
}
else {
	// Require page module
	require_once('../modules/'.$module.'.php');
}

// Exit script
exit();

 ?>