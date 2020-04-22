
// Get action and set onclick
let popup_btn = document.getElementsByClassName('popup_btn');

for(let i = 0; i < popup_btn.length; i++){

	popup_btn[i].onclick = showPopup;
}

function showPopup() {

	// Get clicked element
	let elem = event.target;

	// Get id
	let id 		= elem.getAttribute('id');
	id 			= id.replace('popup_btn_', '');
	let task_id = elem.getAttribute('data-id');

	// Get container
	let cnt 		= document.getElementById('popup_'+id);
	let concnt 		= document.getElementById('content');
	let confirm 	= document.getElementById('confirm');

	// Set id in confirm
	let href 	= confirm.getAttribute('href');
	href 		= href.replace('task_id', task_id);
	confirm.setAttribute('href', href);

	// Check if element is already dropped
	let dropped = cnt.getAttribute('data-dropped');

	// Show or hide container
	dropped == 'false' ? cnt.classList.remove('hidden') : cnt.classList.add('hidden');
	dropped == 'false' ? concnt.classList.add('cpopup')	: concnt.classList.remove('cpopup');
	cnt.setAttribute('data-dropped', dropped == 'false' ? 'true' : 'false');
}
