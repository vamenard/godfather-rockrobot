 <?php
 // Vincent Menard - thabob@gmail.com
 // Rock Robot
 
 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;
 
 if ($next == 6)
 	$next = 1;
 
 $refresh = round(220 + rand(60, 120)); // 4 to 5 mins
 
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">    
  <head>      
    <title>Lvl 1 gangs</title>      
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/attackLvl1Ctrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
    <iframe src="http://127.0.0.1/attack1.php?hood=<?php echo $current; ?>" width="10" height="10"></iframe>
  </body>  
</html>   