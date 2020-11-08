<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Checks - Get your stream running the right way!</title>
<link rel="stylesheet" type="text/css" href="css/base_styles.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/additional.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/checkboxes.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body oncontextmenu="return false;">
<div class="content_container">
  <div class="content_header"> <img src="img/logo.png" alt="logo" style="width: 50px; height: 50px; padding-left: 30px;">
    <div style="position: relative; display: inline-block;">
      <div style="top: -50px; position: absolute; width: 280px; font-size: 30pt; display: inline-block; padding: 0px 10px;">Stream Checks</div>
      <div style="top: -35px; position: absolute; width: 50px; margin-left: 280px; font-size: 12pt; display: inline-block; line-height: 1;">by Palerius</div>
    </div>
  </div>
  <div class="content_header_menu">
	<div class="menu_button_icon" onClick=""><img src="img/settings.png" style="height: 20px;"></div>
    <div class="menu_button" onClick="listreset()">Reset List</div>
    <div class="menu_button" onClick="createitem(0, 'New Item'), savebutton();"><font style="font-size: 12pt; line-height: 0.4">+</font> Item</div>
    <div class="menu_button" onClick="creategroup(0, 'New Group'), savebutton();"><font style="font-size: 12pt; line-height: 0.4">+</font> Group</div>
    <div id="save_button" class="menu_button_save" onClick="savelist('test')">Save</div>
    <br style="clear: both">
  </div>
  <div id="list_box" class="content_main"> </div>
  <div class="content_footer">
    <div style="padding: 0px 10px; display: inline-block">GNU GENERAL PUBLIC LICENSE</div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://github.com/TheFoxStudio/stream-checks" target="_blank">Developed by Palerius</a></div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://streamelements.com/palerius/tip" target="_blank">Support the dev</div>
  </div>
</div>
<script src="js/Sortable.js"></script> 
<script src="js/functions.js"></script> 
<script language="JavaScript">

			
var Connect = new XMLHttpRequest();
Connect.open("GET", "data.xml", false);
Connect.setRequestHeader("Content-Type", "text/xml");
Connect.send(null);
	
// Place the response in an XML document.
var text ;
var checked ; 
var id ;
var thisitem;
var Document = Connect.responseXML;
// Place the root node in an element.
var items = Document.childNodes[0];
// Retrieve each customer in turn.
for (var i = 0; i < items.children.length; i++){
		var item = items.children[i];
		// Access each of the data values.
		text = item.getElementsByTagName('text');
		checked = item.getElementsByTagName('checked'); 
		id = item.getElementsByTagName('id');
		thisitem = item.getElementsByTagName('itemgroup');

		if(thisitem[0].innerHTML == 'false') {
			creategroup(id[0].innerHTML, text[0].innerHTML);
		} 

		if(thisitem[0].innerHTML == 'true') {
			createitem(id[0].innerHTML, text[0].innerHTML);
		}
	}
</script>
</body>
</html>