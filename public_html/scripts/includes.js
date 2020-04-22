
// Get script container
cnt 	= document.getElementById('scripts');
body 	= document.body;

// Set script path
let path = 	'scripts/';

// Array of all files
let files = [
	'app.js',
	'dropdown.js'
	// 'popup.js'
];

// Make script for each file
for(let i = 0; i < files.length; i++){
	tag = document.createElement('script');
	tag.setAttribute('src', path + files[i]);
	cnt.appendChild(tag);
}