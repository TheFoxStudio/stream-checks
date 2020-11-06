// JavaScript Document
/*
el.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
    alert('success!');
    return false;
}, false);
*/

// edit an item label
function edit_label(current_text, id) {
	
	document.getElementById('item_input_box_' + id).style.width = "500px";
	document.getElementById('item_input_box_' + id).style.height = "auto";
	document.getElementById('item_text_' + id).style.width = "0px";
	document.getElementById('item_text_' + id).style.height = "0px";
		
	document.getElementById('item_text_input_' + id).value = current_text;
	
}

// safe the edited item label
function safe_label (event, text, id) {
	
	if(event.keyCode === 13){
        event.preventDefault(); // Ensure it is only this code that runs
        document.getElementById('item_text_' + id).innerHTML = document.getElementById('item_text_input_' + id).value;
		document.getElementById('item_input_box_' + id).style.width = "0px";
		document.getElementById('item_input_box_' + id).style.height = "0px";
		document.getElementById('item_text_' + id).style.width = "auto";
		document.getElementById('item_text_' + id).style.height = "auto";
        }
}


// create a new list item
function createitem() {
	
var newID = Date.now();
	
$('#list_box').append('<div id="wrapper_' + newID + '" class="list_wrapper">');
$('#wrapper_' + newID).append('<div id="item_' + newID + '" class="list_item">');
	
$('#item_' + newID).append('<label class="checkbox_container" id="label_' + newID + '">');
$('#label_' + newID).append('<input type="checkbox" id="checkbox_' + newID + '" onclick="checkoff('+ newID +')">');	
$('#label_' + newID).append('<span class="checkmark"></span>');

$('#item_' + newID).append('<div id="item_text_' + newID + '" class="item_text" oncontextmenu="edit_label(this.innerHTML, ' + newID + ')">New Item</div>');
$('#item_' + newID).append('<div id="item_input_box_' + newID + '" class="item_input_box">');
$('#item_input_box_' + newID).append('<input type="text" id="item_text_input_'+ newID +'" class="item_text_input" onkeypress="safe_label(event, this.value, ' + newID + ')">');

$('#item_' + newID).append('<div class="delete_icon" id="delete_' + newID + '">');
$('#delete_' + newID).append('<div id="delete_text" style="position: absolute; top: -1px; left: 8px;">-</div>');

$('#item_' + newID).append('<br style="clear: both">');
}

function checkoff(id){
	if (document.getElementById('checkbox_' + id).checked) {document.getElementById('item_text_' + id).style.textDecoration = "line-through";} 
	else {document.getElementById('item_text_' + id).style.textDecoration = "none";} 
}