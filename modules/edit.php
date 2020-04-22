<?php 

// Require classes
require_once('../includes/PapaToDo/todo.class.php');

// Define classes
$todo = new ToDo();

// Define variables
$input 	= $_POST;
$id 	= !empty($_GET['id']) 		? $_GET['id'] 		: '';
$action = !empty($_GET['action']) 	? $_GET['action'] 	: 'none';
$error 	= array();
$valid 	= false;
$edited = false;
$list 	= '';
$tasks 	= '';

// Validate
foreach($input as $field_name => $field_value){
	// Check if input is empty
	// Task description may be empty
	if(!empty($field_value) || strpos($field_name, 'task_description') !== false){
		// Not empty, clean input
		$input[$field_name] = test_input($field_value);
		// Set check to true
		$check[$field_name] = true;
		$valid 				= true;
	}
	else {
		// Empty, set valid to false
		$valid 				= false;
		// Set check to false
		$check[$field_name] = false;
		$error[$field_name] = true;
	}
}

// Save properties if valid is true
if($valid){
	switch($action){
		// Save properties
		case 'edit':
			// Save list properties
			$todo->saveList($input);
			// Save task properties
			$todo->saveTasks($input);
			// Change action
			$action = 'save';
		break;
	}
}

// if id is not empty
if(!empty($id)){
	// Get list and tasks
	$list 	= $todo->getList($id);
	$tasks 	= $todo->getTasksById($list['id']);
}

// Assign smarty variables
$smarty->assign('list', 	$list);
$smarty->assign('tasks', 	$tasks);
$smarty->assign('error', 	$error);
$smarty->assign('input', 	$input);

switch($action){

	case 'edit':
		$template = 'edit.tpl.php';
	break;
	case 'save':
		header('Location: index.php');
		exit();
	default:
		$template = 'edit.tpl.php';
	break;
}

// Show template
$smarty->display($template);

 ?>