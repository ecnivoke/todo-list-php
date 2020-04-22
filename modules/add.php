<?php 

// Require classes
require_once('../includes/PapaToDo/todo.class.php');

// Define classes
$todo = new ToDo();

// Define variables
$valid 	= true;
$check 	= array();
$action = $_POST['action'];
$input 	= $_POST;

// Validate
foreach($input as $field_name => $field_value){
	// Check if input is empty
	// Task description may be empty
	if(!empty($field_value) || strpos($field_name, 'task_description') !== false){
		// Not empty, clean input
		$input[$field_name] = test_input($field_value);
		// Set check to true
		$check[$field_name] = true;
	}
	else {
		// Empty, set valid to false
		$valid 				= false;
		// Set check to false
		$check[$field_name] = false;
	}
}

// Add if valid is true
if($valid){
	switch($action){
		// Add list
		case 'add_list':
			$todo->addList($input);
		break;
		// Add task
		case 'add_task':
			$todo->addTask($input);
		break;

	}
}

// Assign smarty variables
$smarty->assign('input', 	$input);
$smarty->assign('lists', 	$lists);
$smarty->assign('tasks', 	$tasks);

// Show template
header('Location: index.php');

 ?>