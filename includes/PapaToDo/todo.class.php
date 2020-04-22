<?php
// Papa class
class ToDo {

	function __construct(){
		// Init database connection
		$this->database = connect();
	}

	function addList($input){

		// Set todays date
		$today = date('Y-m-d H:i:s');

		// Build SQL query
		$this->sql['add_list'] = "
			INSERT INTO ".DATABASE_PREFIX."lists(
				id, 
				list_name,
				status,
				created,
				updated
			) 
			VALUES (
				NULL,
				:list_name,
				:status,
				:created,
				:updated
			)
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['add_list']);

		// Bind inputs
		$query->bindParam(':list_name', 	$input['list_name']);
		$query->bindParam(':status', 		$input['status']);
		$query->bindParam(':created', 		$today);
		$query->bindParam(':updated', 		$today);

		// Execute SQL query
		$query->execute();

	}

	function addTask($input){

		// Set todays date
		$today = date('Y-m-d H:i:s');

		// Build SQL query
		$this->sql['add_task'] = "
			INSERT INTO ".DATABASE_PREFIX."tasks(
				id, 
				task_name,
				task_description,
				status,
				list_id,
				created,
				updated,
				task_time
			) 
			VALUES (
				NULL,
				:task_name,
				:task_description,
				:status,
				:list_id,
				:created,
				:updated,
				:task_time
			)
		";

		// Loop over number of tasks
		for($i = 0; $i < $input['task_count']; $i++){

			// Make indexes
			$name_index 		= 'task_name'.$i;
			$description_index 	= 'task_description'.$i;
			$time_index 		= 'task_time'.$i;

			// Prepare SQL query
			$query = $this->database->prepare($this->sql['add_task']);

			// Bind inputs
			$query->bindParam(':task_name', 		$input[$name_index]);
			$query->bindParam(':task_description', 	$input[$description_index]);
			$query->bindParam(':status', 			$input['status']);
			$query->bindParam(':list_id', 			$input['list_id']);
			$query->bindParam(':created', 			$today);
			$query->bindParam(':updated', 			$today);
			$query->bindParam(':task_time', 		$input[$time_index]);

			// Execute SQL query
			$query->execute();
		}
	}

	function getLists(){

		// Build SQL query
		$this->sql['get_lists'] = "
			SELECT 
				list.id,
				list.list_name
			FROM 
				".DATABASE_PREFIX."lists AS list
			WHERE 1 = 1
				AND list.status 	= 'active'
			ORDER BY 
				list.created DESC
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['get_lists']);

		// Execute SQL query
		$query->execute();

		// Fetch SQL query results
		$results = $query->fetchAll();

		// Output
		return $results;

	}

	function getList($id){

		// Build SQL query
		$this->sql['get_list'] = "
			SELECT 
				list.id,
				list.list_name
			FROM 
				".DATABASE_PREFIX."lists AS list
			WHERE 1 = 1
				AND list.status 	= 'active'
				AND list.id 		= ".$id."
			ORDER BY 
				list.created DESC
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['get_list']);

		// Execute SQL query
		$query->execute();

		// Fetch SQL query results
		$results = $query->fetchAll();

		// Output
		return $results[0];
	}

	function getTasks(){

		// Build SQL query
		$this->sql['get_tasks'] = "
			SELECT 
				task.id,
				task.task_name,
				task.task_description,
				task.list_id,
				task.task_time
			FROM 
				".DATABASE_PREFIX."tasks AS task,
				".DATABASE_PREFIX."lists AS list
			WHERE 1 = 1
				AND task.status 	= 'active'
				AND task.list_id 	= list.id
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['get_tasks']);

		// Execute SQL query
		$query->execute();

		// Fetch SQL query results
		$results = $query->fetchAll();

		// Output
		return $results;

	}

	function getTasksById($list){

		// Build SQL query
		$this->sql['get_tasks_by_id'] = "
			SELECT 
				task.id,
				task.task_name,
				task.task_description,
				task.list_id,
				task.task_time
			FROM 
				".DATABASE_PREFIX."tasks AS task
			WHERE 1 = 1
				AND task.status 	= 'active'
				AND task.list_id 	= ".$list."
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['get_tasks_by_id']);

		// Execute SQL query
		$query->execute();

		// Fetch SQL query results
		$results = $query->fetchAll();

		// Output
		return $results;
	}

	function deleteItem($id, $type){

		// Build SQL query
		$this->sql['delete_item'] = "
			UPDATE 
				".DATABASE_PREFIX.$type."
		";

		// Update properties
		$this->sql['delete_item'] .= "
			SET 
				status 	= 'deleted'
			WHERE 
				id 		= ".$id."
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['delete_item']);

		// Execute SQL query
		$query->execute();

	}

	function saveTasks($input) {

		// Get todays date
		$today = date('Y-m-d H:i:s');

		// Build SQL query
		$this->sql['save_tasks'] = "
			UPDATE 
				".DATABASE_PREFIX."tasks
			SET 
				task_name 			= :task_name,
				task_description 	= :task_description,
				status 				= :status,
				updated 			= :updated,
				task_time 			= :task_time
		";

		// Loop over number of tasks
		for($i = 0; $i < $input['task_count']; $i++){

			// Make indexes
			$name_index 		= 'task_name'.$i;
			$description_index 	= 'task_description'.$i;
			$time_index 		= 'task_time'.$i;
			$status_index 		= 'task_status'.$i;

			// Prepare SQL query
			$query = $this->database->prepare($this->sql['save_tasks']);

			// Bind params
			$query->bindParam(':task_name', 		$input[$name_index]);
			$query->bindParam(':task_description', 	$input[$description_index]);
			$query->bindParam(':status', 			$input[$status_index]);
			$query->bindParam(':updated', 			$today);
			$query->bindParam(':task_time', 		$input[$time_index]);

			// Execute SQL query
			$query->execute();
		}
	}

	function saveList($input){
		// Get todays date
		$today = date('Y-m-d H:i:s');

		// Build SQL query
		$this->sql['save_list'] = "
			UPDATE 
				".DATABASE_PREFIX."lists
			SET 
				list_name 			= :list_name,
				updated 			= :updated
			WHERE 
				id = 				".$input['list_id']."
		";

		// Prepare SQL query
		$query = $this->database->prepare($this->sql['save_list']);

		// Bind params
		$query->bindParam(':list_name', 		$input['list_name']);
		// $query->bindParam(':status', 		$input['list_status']);
		$query->bindParam(':updated', 			$today);

		// Execute SQL query
		$query->execute();

	}

	// End class
}

 ?>