 <?php
 
 
 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;
 
 if ($next == 8)
 	$next = 1;
 
 $refresh = round(340 + rand(1, 60));
 
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">    
  <head>      
    <title>Lvl 8 gangs</title>      
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/godfather-hack/attackLvl8Ctrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
    <iframe src="http://127.0.0.1/godfather-hack/attack8.php?hood=<?php echo $current; ?>" width="10" height="10"></iframe>
  </body>  
</html>   