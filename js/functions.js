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
	document.getElementById('item_text_input_'+ id).select();
}

// safe the edited item label
function safe_label(text, id) {
	document.getElementById('item_text_' + id).innerHTML = document.getElementById('item_text_input_' + id).value;
	document.getElementById('item_input_box_' + id).style.width = "0px";
	document.getElementById('item_input_box_' + id).style.height = "0px";
	document.getElementById('item_text_' + id).style.width = "auto";
	document.getElementById('item_text_' + id).style.height = "22px";
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
	
	savebutton();
}

function savebutton() {

	document.getElementById('save_button').style.display = "block";
	
	setTimeout(function(){ 
		document.getElementById('save_button').style.opacity = "1";
	}, 1000);
}

function savelist() {

	var dataset = "";
	var item;
	var checked;
	var newlist = document.getElementsByName('data');

	for(var i = 0; i < newlist.length; i++) {

		var id = newlist[i].id;
		var newID = id.substring(5);

		if(document.getElementById('wrapper_' + newID).style.display != "none") {
			
			if(newlist[i].classList == 'list_item'){
				item = 'true';
				checked = document.getElementById('checkbox_' + newID).checked;
			}

			if(newlist[i].classList == 'list_group'){
				item = 'false';
				checked = 'false';
			}

			var text = document.getElementById('item_text_' + newID).innerHTML;

			dataset += '<item><id>' + newID + '</id><itemgroup>' + item + '</itemgroup><text>' + text + '</text><checked>' + checked + '</checked></item>';
		}
	}

	var xmlhead = '<?xml version="1.0" encoding="utf-8"?><list>';
	var xmlfoot = '</list>';
	var totalxml = xmlhead + dataset + xmlfoot;

	$.ajax({                                      
			url: 'save_list.php',       
			type: "POST",
			data: {xml: totalxml},
			success: function () { 
				
				document.getElementById('save_button').style.backgroundColor = "#00AB4D";
				document.getElementById('save_button').style.border = "1px solid #00C157";
				
				setTimeout(function(){ 
					document.getElementById('save_button').style.opacity = "0";
					setTimeout(function(){ 
						document.getElementById('save_button').style.display = "none";
						document.getElementById('save_button').style.backgroundColor = "#AB7500";
						document.getElementById('save_button').style.border = "1px solid #DFA427";
						
					}, 1000);
					
					
					
					
				}, 1000);
				
			},
		});

  
}

// create a new list item
function creategroup(newID, text) {

	setTimeout(function(){ 
	document.getElementById('item_' + newID).style.border = "1px solid #007FCC";
	
	setTimeout(function(){ 
		document.getElementById('item_' + newID).style.border = "1px solid #474C4F";
	}, 1000);
}, 100);
	
	if(newID == 0){
		var newID = Date.now();
	}
	
$('#list_box').append('<div id="wrapper_' + newID + '" class="list_wrapper_group">');
$('#wrapper_' + newID).append('<div name="data" id="item_' + newID + '" class="list_group">');

$('#item_' + newID).append('<div class="list_handle" onclick="savebutton()"><img src="img/handle.png" style="height: 22px;"></div>');	
	
$('#item_' + newID).append('<div id="item_text_' + newID + '" class="item_text" oncontextmenu="edit_label(this.innerHTML, ' + newID + ')">'+ text +'</div>');
$('#item_' + newID).append('<div id="item_input_box_' + newID + '" class="item_input_box">');
$('#item_input_box_' + newID).append('<input type="text" id="item_text_input_'+ newID +'" class="item_text_input" onfocusout="safe_label(this.value, ' + newID + ')">');

$('#item_' + newID).append('<div class="delete_icon" id="delete_' + newID + '" onclick="deleteitem(' + newID + ')">');
$('#delete_' + newID).append('<div id="delete_text" style="position: absolute; top: -2px; left: 6px;">-</div>');

$('#item_' + newID).append('<br style="clear: both">');
}

// create a new list item
function createitem(newID, text) {
	
	setTimeout(function(){ 
		document.getElementById('item_' + newID).style.border = "1px solid #007FCC";

		setTimeout(function(){ 
			document.getElementById('item_' + newID).style.border = "1px solid #474C4F";
		}, 1000);
	}, 100);
	
	if(newID == 0){
		var newID = Date.now();
	}
	
$('#list_box').append('<div id="wrapper_' + newID + '" class="list_wrapper">');
$('#wrapper_' + newID).append('<div name="data" id="item_' + newID + '" class="list_item">');

$('#item_' + newID).append('<div class="list_handle" onclick="savebutton()"><img src="img/handle.png" style="height: 22px;"></div>');	

$('#item_' + newID).append('<div id="label_wrapper_' + newID + '" class="label_wrapper">');	
	
$('#label_wrapper_' + newID).append('<label class="checkbox_container" id="label_' + newID + '">');
$('#label_' + newID).append('<input type="checkbox" id="checkbox_' + newID + '" onclick="checkoff('+ newID +')">');	
$('#label_' + newID).append('<span class="checkmark"></span>');

$('#item_' + newID).append('<div id="item_text_' + newID + '" class="item_text" oncontextmenu="edit_label(this.innerHTML, ' + newID + ')">'+ text +'</div>');
$('#item_' + newID).append('<div id="item_input_box_' + newID + '" class="item_input_box">');
$('#item_input_box_' + newID).append('<input type="text" id="item_text_input_'+ newID +'" class="item_text_input" onfocusout="safe_label(this.value, ' + newID + ')">');

$('#item_' + newID).append('<div class="delete_icon" id="delete_' + newID + '" onclick="deleteitem(' + newID + ')">');
$('#delete_' + newID).append('<div id="delete_text" style="position: absolute; top: -2px; left: 6px;">-</div>');

$('#item_' + newID).append('<br style="clear: both">');
	
}