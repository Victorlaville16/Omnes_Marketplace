<?php 
  //session_start();
  include('fonctions.php');
?>

<!DOCTYPE html> 
<head> 
<title>Projet WEB</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/fad59fd69b.js" crossorigin="anonymous"></script>
<meta charset="utf-8" /> 
<link href="style.css" rel="stylesheet" type="text/css"/> 

<?php
   $db = connectBD();
   $request = $db->prepare("SELECT photo1 FROM vehicules WHERE ID_vendeur = 2");
        $request->execute();
        $result = $request->fetch();
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['photo1'] ).'"/>';
        
?>


</head> 
<body> 

<img class="image" src="<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['photo1'] ).'"/>' ?>" width="100%" height="100%" />



</body> 
</html>