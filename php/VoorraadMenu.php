<?php 

require_once('classes/Database.php');
$db = new Database;

if (isset($_POST['submit'])) { 

    if (isset($_POST['product_name']) && isset($_POST['product_omschrijving']) && isset($_POST['product_hoeveelheid']) && isset($_POST['categorie_id'])) {
        $product_naam = $_POST['product_name'];
        $product_omschrijving = $_POST['product_omschrijving'];
        $product_categorie = $_POST['categorie_id'];
        $product_hoeveelheid = $_POST['product_hoeveelheid'];

        try {
            $db->insertProducts($product_naam, $product_omschrijving, $product_categorie, $product_hoeveelheid);
        } 
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>