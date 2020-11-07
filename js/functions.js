// JavaScript Document
/*
el.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
    alert('success!');
    return false;
}, false);
*/

Sortable.create(list_box, {handle: '.list_handle', animation: 150});

// edit an item label
function edit_label(current_text, id) {
	
	document.getElementById('item_input_box_' + id).style.width = "500px";
	document.getElementById('item_input_box_' + id).style.height = "22px";
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
		document.getElementById('item_text_' + id).style.height = "22px";
        }
}

// cross off checked list items
function checkoff(id){
	if (document.getElementById('checkbox_' + id).checked) {document.getElementById('item_text_' + id).style.textDecoration = "line-through";} 
	else {document.getElementById('item_text_' + id).style.textDecoration = "none";} 
}

function listreset() {
	
	var checkboxes = new Array(); 
	checkboxes = document.getElementsByTagName('input');

	for(var i = 0; i < checkboxes.length; i++){
		if(checkboxes[i].type == 'checkbox'){
			checkboxes[i].checked = false;
			var boxid = checkboxes[i].id.substring(9);
			document.getElementById('item_text_' + boxid).style.textDecoration = "none";
			
		}
	}
	
}

function deleteitem(id){
	
	document.getElementById('delete_' + id).style.width = "80px";
	document.getElementById('delete_' + id).innerHTML = "";
	document.getElementById('delete_' + id).style.fontWeight = "normal";
	document.getElementById('delete_' + id).style.fontSize = "11pt";
	setTimeout(function(){ 
		document.getElementById('delete_' + id).innerHTML = "Delete?";
		document.getElementById('delete_' + id).setAttribute('onclick', 'deleteconfirm(' + id + ')') ;
	}, 500);
}

function deleteconfirm(id) {
	
	document.getElementById('wrapper_' + id).style.opacity = "0";
	
	setTimeout(function(){ 
		document.getElementById('wrapper_' + id).style.display = "none";
	}, 1000);
	
	
}


// create a new list item
function createitem() {
	
var newID = Date.now();
	
$('#list_box').append('<div id="wrapper_' + newID + '" class="list_wrapper">');
$('#wrapper_' + newID).append('<div id="item_' + newID + '" class="list_item">');

$('#item_' + newID).append('<div class="list_handle"><img src="img/handle.png" style="height: 22px;"></div>');	

$('#item_' + newID).append('<div id="label_wrapper_' + newID + '" class="label_wrapper">');	
	
$('#label_wrapper_' + newID).append('<label class="checkbox_container" id="label_' + newID + '">');
$('#label_' + newID).append('<input type="checkbox" id="checkbox_' + newID + '" onclick="checkoff('+ newID +')">');	
$('#label_' + newID).append('<span class="checkmark"></span>');

	
	
	
$('#item_' + newID).append('<div id="item_text_' + newID + '" class="item_text" oncontextmenu="edit_label(this.innerHTML, ' + newID + ')">New Item</div>');
$('#item_' + newID).append('<div id="item_input_box_' + newID + '" class="item_input_box">');
$('#item_input_box_' + newID).append('<input type="text" id="item_text_input_'+ newID +'" class="item_text_input" onkeypress="safe_label(event, this.value, ' + newID + ')">');

$('#item_' + newID).append('<div class="delete_icon" id="delete_' + newID + '" onclick="deleteitem(' + newID + ')">');
$('#delete_' + newID).append('<div id="delete_text" style="position: absolute; top: -2px; left: 6px;">-</div>');

$('#item_' + newID).append('<br style="clear: both">');

setTimeout(function(){ 
	document.getElementById('item_' + newID).style.boxShadow = "box-shadow: inset 0px 0px 40px -10px rgba(39,156,214,0.88);";
	setTimeout(function(){ 
		document.getElementById('item_' + newID).style.boxShadow = "box-shadow: inset 0px 0px 40px -10px rgba(39,156,214,0.0);";
	}, 1000);
}, 100);


	
}