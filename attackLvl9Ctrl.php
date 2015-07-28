 <?php
 // Vincent Menard - thabob@gmail.com
 // Rock Robot
 
 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;
 
 if ($next == 8)
 	$next = 1;
 // les then 15 340
 // more is 178
 $refresh = round(250 + rand(1, 10));
 
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">    
  <head>      
    <title>Lvl 9 gangs</title>      
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/attackLvl9Ctrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
    <iframe src="http://127.0.0.1/attack9.php?hood=<?php echo $current; ?>" width="10" height="10"></iframe>
    <iframe src="http://127.0.0.1/Slots.php?hood=<?php echo $current; ?>" width="10" height="10"></iframe>
	<iframe src="http://127.0.0.1/trainDogs.php?hood=<?php echo $current; ?>" width="10" height="10"></iframe>
	</body>  
</html>   