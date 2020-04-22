<?php 

// Require classes
require_once('../includes/PapaToDo/todo.class.php');

// Define classes
$todo = new ToDo();

// Define variables
$input 	= $_POST;
$id 	= $_GET['id'];
$type 	= $_GET['type'];

// Delete item
$todo->deleteItem($id, $type);

// Show template
header('Location: index.php');

 ?>