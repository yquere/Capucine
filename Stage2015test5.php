<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title></title>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>


</head>
<font size="25" face="Times New Roman">CAPUCINE</font>
<body onload='initialize();' BGCOLOR='#E69E9E'>
<div id="map_canvas" style="position:absolute;height:500px;width:700px;"></div> 

<?php
//$monfichier = fopen('fichier.txt', 'r');
  
  //  $tab = file('fichier.txt');
 //   $der_ligne = $tab[count($tab)-1];
  //  echo $der_ligne;
    $fp = fopen('fichier.txt', 'r'); 
    
    // Add each line to an array
    if ($fp) {
        $array = explode("\n", fread($fp, filesize('fichier.txt')));
    }
    $nb=sizeof($array);
    $nb1=$nb-1;
    $nb2=0;
    //echo $array[0];
    //echo $nb;
    //echo $array[$nb-2];
    $position1=explode(",",$array[$nb-2]); 
  //echo $array[0];
$lat3=$position1[7];
$lng3=$position1[8]; 
    
    $nbligne=1;
while ($nbligne<=$nb)
    {
        $position2=explode(",",$array[$nbligne-2]); 
        $lat3=$position2[7];
        $lng3=$position2[8];
        $lat4[$nbligne-1]=$lat3;
        $lng4[$nbligne-1]=$lng3;
        $nbligne++;
    }
    
    
fclose($fp);//echo $nb1;
    ?>

<script type="text/javascript">
var lat1 = "<?php Print($lat3); ?>";
var lng1 = "<?php Print($lng3); ?>";
var nb = "<?php Print($nb1); ?>";

function initialize() {
    var latlng = new google.maps.LatLng(lat1,lng1);
    //objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
    //de définir des options d'affichage de notre carte
    var mesoptions = {
    center: latlng,
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    //constructeur de la carte qui prend en paramêtre le conteneur HTML
    //dans lequel la carte doit s'afficher et les options
   var carte = new google.maps.Map(document.getElementById("map_canvas"), mesoptions);
   var marker = new google.maps.Marker({
                                        position: latlng,
                                        map: carte,
                                        title: 'Hello World!'});
    
    
    for (i = 0; i < 4; i++)
    {
        
        <?php 
        $nb1--;
        
        ?>
        
        var lat3 = "<?php Print($lat4[$nb1]); ?>";

        var lat2 = "<?php Print($lat4[$nb1]); ?>";
        var lng2 = "<?php Print($lng4[$nb1]); ?>";
        
        var marker = new google.maps.Marker({
                                            position: new google.maps.LatLng(lat3,lng2),
                                            map: carte,
                                            title: 'Hello World2!'});
    } 
    
}

</script>

<?php
    
    //echo $nb1;
    $monfichier = fopen('fichier.txt', 'r');
   // $i=0;
    while (!feof($monfichier)) {  
        //lecture et decoupage des lignes à chaque ;  
        $position=explode(",",fgets($monfichier,255)); 
        $id2.=$position[0];
        $time2.=date('r',$position[1])."//      ";
        $signal2.=$position[2];
        $rssi2.=$position[3];
        $avgSignal2.=$position[4];
        $station2.=$position[5];
        $data2.=$position[6];
        $lat2.=$position[7];
        $lng2.=$position[8]; }   
    
    //fseek($monfichier, 10);
    // 2 : on fera ici nos opérations sur le fichier...
    //fputs($monfichier, 'Texte à écrire');
    
    // 3 : quand on a fini de l'utiliser, on ferme le fichier
    fclose($monfichier);
    
    
    
    ?>

<div id="map_canvas" style="position:absolute;top:600px;height:700px;width:700px;">


<table style="text-align: left; width: auto;" border="1"  
cellpadding="2" cellspacing="2">  

<tr>  
<td style="vertical-align: top; width: 19px;">device<br>  
</td>  
<td style="vertical-align: top; width: 245px;">heure<br>  
</td>  
<td style="vertical-align: top; width: 19px;">signal<br>  
</td>  
<td style="vertical-align: top; width: 50px;">rssi<br>  
</td>  
<td style="vertical-align: top; width: 19px;">avgSignal<br>  
</td>  
<td style="vertical-align: top; width: 19px;">station<br>  
</td>  

<td style="vertical-align: top; width: 10px;">lat<br>  
</td> 
<td style="vertical-align: top; width: 10px;">long<br>  
</td> 
</tr>  

<tr>  
<td style="vertical-align: top;width: 19px;"><?php echo $id2; ?><br>  
</td>  
<td style="vertical-align: top;width: 245px;">



<?php echo $time2; ?><br>  


</td>  
<td style="vertical-align: top;width: 19px;"><?php echo $signal2; ?><br>  
</td>  
<td style="vertical-align: top;width: 50px;"><?php echo $rssi2; ?><br>  
</td>  
<td style="vertical-align: top;width: 19px;"><?php echo $avgSignal2; ?><br>  
</td>  
<td style="vertical-align: top;width: 19px;"><?php echo $station2; ?><br>  
</td>  
 
<td style="vertical-align: top;width: 10px;"><?php echo $lat2; ?><br>
</td> 
<td style="vertical-align: top;width: 10px;"><?php echo $lng2; ?><br> 
</td> 
</tr>  

</table>  
<br>  
<br>  
</div> 






</body>



</html>
