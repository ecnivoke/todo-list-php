
// Get action and set onclick
let drop_elem = document.getElementsByClassName('dropdown_btn');

for(let i = 0; i < drop_elem.length; i++){

	drop_elem[i].onclick = drop;
}

function drop() {

	// Get clicked element
	let elem = event.target;

	// Get id
	let id 	= elem.getAttribute('id');
	id 		= id.replace('drop_btn_', '');

	// Get container
	let cnt = document.getElementById('drop_'+id);
	let cfr = document.getElementById('dropdown_confirm_'+id);

	// Check if element is already dropped
	let dropped = cnt.getAttribute('data-dropped');

	// Show or hide container
	dropped == 'false' ? cnt.classList.remove('hidden') : cnt.classList.add('hidden');
	cnt.setAttribute('data-dropped', dropped == 'false' ? 'true' : 'false');
	cfr.innerHTML = dropped == 'false' ? '->' : '';
}
