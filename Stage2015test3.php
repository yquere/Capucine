
<html>
<head><title>PHP Get Results</title></head>

<body>

<?php

$monfichier = fopen('fichier_capucine2.txt', 'a');
fputs($monfichier, " , ");
fputs($monfichier,"\n");
fclose($monfichier);

?>


</body>
</html>




