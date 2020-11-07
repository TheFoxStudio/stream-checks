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
		
		<div class="content_header">
			<img src="" alt="logo" style="width: 100px; height: 100px">
			<div style="font-size: 30pt; display: inline-block; padding: 0px 10px;">Stream Checks</div>
			<div style="font-size: 12pt; display: inline-block"> by Palerius</div>		
		</div>
		
		<div class="content_header_menu">
			
			<div class="menu_button" onClick="listreset()">Reset List</div>
			<div class="menu_button" onClick="createitem()">+ Item</div>
			<div class="menu_button">+ Group</div>
	
			<br style="clear: both">
		</div>
		
		<div id="list_box" class="content_main">
			
			<?php include('example_list.php'); ?>
			
		</div>
		
		<div class="content_footer">
			<div style="padding: 0px 10px; display: inline-block">GNU GENERAL PUBLIC LICENSE</div>|
			<div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://github.com/TheFoxStudio/stream-checks" target="_blank">Developed by Palerius</a></div>|
			<div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://streamelements.com/palerius/tip" target="_blank">Support the dev</div>
		</div>
	
	</div>
	
		<script src="js/Sortable.js"></script>
		<script src="js/functions.js"></script>
</body>
</html>