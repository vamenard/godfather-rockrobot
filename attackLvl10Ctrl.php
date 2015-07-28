 <?php
 // Vincent Menard - thabob@gmail.com
 // Rock Robot
 
 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;
 
 if ($next == 9)
 	$next = 1; // hood number

//$refresh = round(125 + rand(1, 60)); 	// 15 minutes - care to not abuse
$refresh = round(200 + rand(1, 60)); 	// 22 min
//$refresh = round(290 + rand(1, 60)); 	// 30
//$refresh = round(338); 				// 45 minus
//$refresh = round(500);
 
	
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">    
  <head>      
    <title>Lvl 10 gangs</title>      
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/attackLvl10Ctrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
  <?php

 	
	echo '<iframe src="http://127.0.0.1/attackMI1.php?hood='.$current.'" width="10" height="10"></iframe>';
		
		
		?>
	
  </body>  
</html>   