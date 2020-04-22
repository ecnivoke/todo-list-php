<!-- include header -->
{include file='header.tpl.php'}

<!-- <div id='popup_1' class='hidden popup' data-dropped='false'>
	<div class='row'>
		<div class='small-12 medium-6 columns text-center'>
			<div class='row'>
				
			</div>
			<a id='confirm' href="?p=delete&type=tasks&id=task_id">	Ja</a>
			<a id='popup_btn_1' class='popup_btn' href="#">			Nee</a>
		</div>
	</div>
</div> -->

<div id='content'>
	<div class='row'>
		<div class='small-12 columns text-center'>
			<h2>ToDo Lijst</h2>
		</div>	
	</div>

	<form action="?p=add" method="POST">

		<input type="hidden" name="action" value="add_list">
		<input type="hidden" name="status" value="active">

		<div class='row'>
			<div class='small-12 medium-6 large-6 columns small-centered'>
				<div class="row">
					<div class='small-12 medium-6 large-6 columns'>
						<input type="text" name="list_name" placeholder="Naam Lijst" value="{if $action=='add'}{$input.list_name}{/if}">
					</div>
					<div class='small-12 medium-6 large-6 columns end'>
						<input type="submit" name="" value="Toevoegen">
					</div>
				</div>
				
			</div>
		</div>

	</form>

	{if !empty($lists)}
		{foreach $lists as $list}
			<div class='row'>
				<div class='small-12 medium-6 columns'>
					<h4><span id='drop_btn_{$list.id}' class='dropdown_btn'>v</span> - {$list.list_name} <a class='delete' href="?p=delete&type=lists&id={$list.id}">x</a> <a href="?p=edit&id={$list.id}&action=edit"><img class="icon_edit" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NjkuMzM2IDQ2OS4zMzYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ2OS4zMzYgNDY5LjMzNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ1Ni44MzYsNzYuMTY4bC02NC02NC4wNTRjLTE2LjEyNS0xNi4xMzktNDQuMTc3LTE2LjE3LTYwLjM2NSwwLjAzMUw0NS43NjMsMzAxLjY4MiAgICBjLTEuMjcxLDEuMjgyLTIuMTg4LDIuODU3LTIuNjg4LDQuNTg3TDAuNDA5LDQ1NS43M2MtMS4wNjMsMy43MjItMC4wMjEsNy43MzYsMi43MTksMTAuNDc4YzIuMDMxLDIuMDMzLDQuNzUsMy4xMjgsNy41NDIsMy4xMjggICAgYzAuOTc5LDAsMS45NjktMC4xMzYsMi45MjctMC40MDdsMTQ5LjMzMy00Mi43MDNjMS43MjktMC41LDMuMzAyLTEuNDE4LDQuNTgzLTIuNjlsMjg5LjMyMy0yODYuOTgzICAgIGM4LjA2My04LjA2OSwxMi41LTE4Ljc4NywxMi41LTMwLjE5MlM0NjQuODk5LDg0LjIzNyw0NTYuODM2LDc2LjE2OHogTTI4NS45ODksODkuNzM3bDM5LjI2NCwzOS4yNjRMMTIwLjI1NywzMzMuOTk4ICAgIGwtMTQuNzEyLTI5LjQzNGMtMS44MTMtMy42MTUtNS41LTUuODk2LTkuNTQyLTUuODk2SDc4LjkyMUwyODUuOTg5LDg5LjczN3ogTTI2LjIwMSw0NDMuMTM3TDQwLjA5NSwzOTQuNWwzNC43NDIsMzQuNzQyICAgIEwyNi4yMDEsNDQzLjEzN3ogTTE0OS4zMzYsNDA3Ljk2bC01MS4wMzUsMTQuNTc5bC01MS41MDMtNTEuNTAzbDE0LjU3OS01MS4wMzVoMjguMDMxbDE4LjM4NSwzNi43NzEgICAgYzEuMDMxLDIuMDYzLDIuNzA4LDMuNzQsNC43NzEsNC43NzFsMzYuNzcxLDE4LjM4NVY0MDcuOTZ6IE0xNzAuNjcsMzkwLjQxN3YtMTcuMDgyYzAtNC4wNDItMi4yODEtNy43MjktNS44OTYtOS41NDIgICAgbC0yOS40MzQtMTQuNzEybDIwNC45OTYtMjA0Ljk5NmwzOS4yNjQsMzkuMjY0TDE3MC42NywzOTAuNDE3eiBNNDQxLjc4NCwxMjEuNzJsLTQ3LjAzMyw0Ni42MTNsLTkzLjc0Ny05My43NDdsNDYuNTgyLTQ3LjAwMSAgICBjOC4wNjMtOC4wNjMsMjIuMTA0LTguMDYzLDMwLjE2NywwbDY0LDY0YzQuMDMxLDQuMDMxLDYuMjUsOS4zODUsNi4yNSwxNS4wODNTNDQ1Ljc4NCwxMTcuNzIsNDQxLjc4NCwxMjEuNzJ6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg=="/></a></h4>
				</div>
				<div id='drop_{$list.id}' data-dropped='true'>
					{foreach $tasks as $task}
						{if !empty($task.task_name)}
							{if $task.list_id == $list.id}
								<div class='small-12 columns'>
									<a href="?p=delete&type=tasks&id={$task.id}" id='popup_btn_1' class='delete popup_btn' data-id='{$task.id}'>x</a><span id='drop_btn_{$task.id}' class='dropdown_btn'>v</span> - {$task.task_name} <span id='dropdown_confirm_{$task.id}'></span>
								</div>
								<div id='drop_{$task.id}' class='hidden description small-12 columns' data-dropped='false'>
									<span>Tijd:</span> {$task.task_time} <br />
									<span>Description:</span> {$task.task_description}
								</div>
							{/if}
						{/if}
					{/foreach}
					<form action="?p=add" method="POST">
						<div class='small-12 columns'>
						
							<input type="hidden" name="action" 		value="add_task">
							<input type="hidden" name="status" 		value="active">
							<input type="hidden" name="list_id"	 	value="{$list.id}">
							<input type="hidden" name="task_count" 	value="0" 			id="task_counter_{$list.id}">

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
						</div>
					</form>
					<div class='small-12 columns'>
						<a class='a_action' id='action_{$list.id}' href="#add_task">+</a>
					</div>
				</div>
			</div>
			<hr>
		{/foreach}
	{/if}
</div>

<!-- include footer -->
{include file='footer.tpl.php'}
