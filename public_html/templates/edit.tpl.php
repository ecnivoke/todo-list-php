<!-- include header -->
{include file='header.tpl.php' title='Edit Lijst'}

<div class='row'>
	<div class='small-12 columns text-center'>
		<h2><a href="index.php">Edit Lijst</a></h2>
	</div>	
</div>

<form action="?p=edit&id={$list.id}&action=edit" method="POST">

	<input type="hidden" name="action" 		value="edit">
	<input type="hidden" name="list_id"	 	value="{$list.id}">
	<input type="hidden" name="task_count" 	value="{count($tasks)}">
	<input type="hidden" name="list_status" value="active">

	<div class='row'>
		<div class='small-12 columns'>
			Lijst Naam: <input class="{if !empty($error.list_name)}error{/if}" type="text" name="list_name" value="{$list.list_name}">
		</div>
		{if !empty($tasks)}
			{$count = 0}<!-- keep track of inputs -->
			{foreach $tasks as $task}
				{if !empty($task.task_name)}
					<div class='small-12 columns task'>
						<input type="hidden" name="task_status{$count}" value="active">

						Taak Naam: 		<input type="text" name="task_name{$count}" value="{$task.task_name}">
						Tijd: 			<input type="time" name="task_time{$count}" value="{$task.task_time}">
						Description:	<textarea class='textarea' name="task_description{$count}">{$task.task_description}</textarea> 
					</div>
					{$count++}<!-- increment inputs -->
				{/if}
			{/foreach}
		{else}
			<div class='small-12 columns'>
				Geen taken gevonden bij deze lijst.
			</div>
		{/if}
		<div class='small-12 columns'>

			<div class="row">
				<div id='add_task_{$list.id}' 		class='small-6 medium-3 columns'></div>
				<div id='add_task_time_{$list.id}' 	class='small-6 medium-3 columns'></div>
					
				<div id='add_task_description_{$list.id}' class='small-12 medium-6 columns end'></div>
			</div>
			<div class="row">
				<div class='small-12 columns'>
					<div id='add_task_cnt_{$list.id}'></div>
				</div>
			</div>
			<input type="submit" value="Opslaan">
		</div>
	</div>
</form>
<hr />

<!-- include footer -->
{include file='footer.tpl.php'}
