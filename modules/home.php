<?php 

// Require classes
require_once('../includes/PapaToDo/todo.class.php');

// Define classes
$todo = new ToDo();

// Get content
$lists = $todo->getLists();
$tasks = $todo->getTasks();

// Assign template variables
$smarty->assign('action', 	'none');
$smarty->assign('lists', 	$lists);
$smarty->assign('tasks', 	$tasks);

// Show index page
header('Location');
$smarty->display(TEMPLATE_DIR.'index.tpl.php');

 ?>