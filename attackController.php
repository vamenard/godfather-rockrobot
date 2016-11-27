 <?php

$current = $_GET['hood'];
$next = $_GET['hood'] + 1;
if ($next == 9)
	  $next = 1; // hood number

$refresh = round(200 + rand(1, 60)); 	// 22 min

 ?>

 <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Attack Controller</title>
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/godfather-rockrobot/attackController.php?hood=<?php echo $next; ?>'" />
  </head>
  <body>

<?php
  // Some time based multiple mi attacks
  if ($_GET['hood'] == 1) {
  	  echo '<iframe src="http://127.0.0.1/godfather-rockrobot/attackMI3.php?hood='.$current.'" width="10" height="10"></iframe>';
	if (round(date("H")) < 10)
  	  echo '<iframe src="http://127.0.0.1/godfather-rockrobot/attackMI2.php?hood='.$current.'" width="10" height="10"></iframe>';
  } else {
	    echo '<iframe src="http://127.0.0.1/godfather-rockrobot/attackMI1.php?hood='.$current.'" width="10" height="10"></iframe>';
	}
?>

  </body>
</html>
