<?php  
 require_once("functions.php");
 ini_set('display_errors', 1);
 error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yellow Pages</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<body>
<div id="wrapper">
	<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="http://www.tvi-mp3.com"><img width=300px src="mp3logo.png" alt="tvi logo"/></a></h1>
		</div>
	</div>
	</div>
	<div id="banner">
		<div class="container">
			<div class="title">
				<h2>YELLOW PAGE API</h2>
				<span class="byline">Dealerships and Autoshop Search List</span> 
			</div>		
		</div>
	</div>
	
	<div id="page" class="container">
    
<div class="title">
	  
	  <span class="byline">Please choose a dealer number, radius and key terms to search</span> 
		<br><br>
		
 
  
<form action="result3.php" method="post" class="basic-grey">
  <label>
    <select name="drop_1" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Select a Dealer Number</option>
      <?php
$query = "SELECT DISTINCT dealernumber FROM `dealer` ORDER BY `dealernumber` ASC";

$result = mysql_query($query) or die (mysql_error());
  while($tier = mysql_fetch_array( $result )) 
  
		{
			
		   echo '<option value="'.$tier['dealernumber'].'">'.$tier['dealernumber'].'</option>';
		}

?>
        
    </select> 
  </label>
   <label>
<span>Radius:</span><input type="text" name="radius"/>
 </label>
  <label>
<span>Key terms:</span><input type="text" name="terms"/>
 </label>
 <label>
<input class="button" type="submit" name="submit" value="submit"/> 
</label>
</form>
</div>
 </div>
</div>
<div id="copyright" class="container">
	<p>Copyright (c) 2014 TVI-MP3 All rights reserved. API copyrighted by Yellow Pages</p>
</div>

</body>
</html>
