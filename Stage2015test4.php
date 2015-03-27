
<html>
<head><title>PHP Get Results</title></head>

<body>

<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
    

$monfichier = fopen('fichier_capucine.txt', 'a');
fputs($monfichier, $lat." , ".$lng);
fputs($monfichier,"\n");
fclose($monfichier);
        
?>


</body>


</html>




