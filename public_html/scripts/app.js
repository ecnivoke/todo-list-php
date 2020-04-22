
// Get action and set onclick
let action_elem = document.getElementsByClassName('a_action');

for(let i = 0; i < action_elem.length; i++){

	action_elem[i].onclick = addInput;
}

// Keep track of number of inputs
count = 0;

// Add input to container
function addInput(){

	// Get clicked element
	let elem = event.target;

	// Set action
	let action 	= elem.getAttribute('href');
	action 		= action.replace('#', '');

	// Get id
	let id 	= elem.getAttribute('id');
	id 		= id.replace('action_', '');

	// Get containers
	let cnt  	= document.getElementById(action+'_'+id); 					// Action container
	let tcnt 	= document.getElementById('add_task_time_'+id);				// Time container
	let scnt 	= document.getElementById('add_task_cnt_'+id);				// Name container
	let dcnt  	= document.getElementById('add_task_description_'+id);		// Description container
	let counter = document.getElementById('task_counter_'+id);				// Counter container

	switch(action){
		case 'add_task':
			// Create name input
			let input = document.createElement("input");
			// Set attributes
			input.setAttribute('type', 			'text');
			input.setAttribute('name', 			'task_name'+count);
			input.setAttribute('placeholder', 	'Naam Taak '+(count+1));
			// Append element
			cnt.appendChild(input);

			// Create time input
			input = document.createElement("input");
			// Set attributes
			input.setAttribute('type', 			'time');
			input.setAttribute('name', 			'task_time'+count);
			input.setAttribute('placeholder', 	'Tijd '+(count+1));
			// Append element
			tcnt.appendChild(input);

			// Create description textarea
			input = document.createElement("textarea");
			// Set attributes
			input.setAttribute('name', 			'task_description'+count);
			input.setAttribute('placeholder', 	'Omschrijving '+(count+1));
			input.setAttribute('rows', 			'1');
			// Append element
			dcnt.appendChild(input);

			// Incremenet count
			count++;
			// Incremenet task number
			counter.setAttribute('value', count);
		break;
	}

	// Add submit button if there are more than 0 inputs
	if(count == 1) {
		// Create element
		let submit = document.createElement("input");
		// Set attributes
		submit.setAttribute('type', 	'submit');
		submit.setAttribute('value', 	'Toevoegen');
		// Append element
		scnt.appendChild(submit);

		// Removes add task button by all other lists
		for(let i = 0; i < action_elem.length; i++){
			// Get id of current element
			let curr_id = action_elem[i].getAttribute('id');
			curr_id 	= curr_id.replace('action_', '');
			// Remove element
			if(curr_id != id){
				action_elem[i].classList.add('hidden');
			}
		}
	}
}
