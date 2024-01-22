<?php
$search_string = '';

if (isset($_POST['search_string'])) {
    $search_string = $_POST['search_string'];
}

if ($search_string !== '') {
  
    $url = "https://api-adresse.data.gouv.fr/search/?q=". urlencode($search_string) ;
    $request = file_get_contents($url);
    $data = json_decode($request,true);
    foreach ($data['features'] as $feature) {
        echo $feature['properties']['name']. " ";
        echo $feature['properties']['city'] . " ";
        echo $feature['properties']['postcode'] . '<br>';

    }
   
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
.form {
            width: 800px; /* Largeur du sélecteur */
            font-size: 40px;
            padding: 20px 25px;
            box-shadow:4px 4px 4px 2px rgba(190, 26, 199, 0.7);
           
        }
 .row{
        background-color: #f8d7da; /* Couleur de fond */
            
        border-radius:180px;
    }  
    .btn-custom {
            
            font-size: 20px; /* Taille du texte */
            padding: 10px 20px; /* Espacement intérieur */
            
        }  
.btn{
    font-size: 20px; /* Taille du texte */
            padding: 10px 20px; /* Espacement intérieur */
            
} 
 
</style>   
    <title>Recherche d'adresse de lieu</title>
    
</head>
<body>
<div class="form"> 
    <div class="row"> 
    <form method="post" action="">
        <input class="btn"type="text" name="search_string" placeholder="Entrez un code postal ou le nom d'une ville">
        <input class="btn-custom" type="submit" value="Rechercher">
    </form>
    </div> 
    </div> 
</body>
</html>