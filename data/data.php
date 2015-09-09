<?php
define('P_PROD', 'produits');
define('P_NAME', 'name');
define('P_PRICE', 'price');
define('P_DESCRIP', 'description');
$menu = array(
    'Accueil' => 'index.php', // <a href="index.php">Accueil</a>
    'Contact' => 'contact.php',
    'catalogue' => 'catalogue.php',
    'produit' => 'produit.php');

define('model_tissus_ganilla', 'ganilla');



function get_tissus()
{
    return array(
        '102' => array('model'=>'femme',   'tissus' => model_tissus_ganilla),
        '136' => array('model'=>'homme',  'tissus' => model_tissus_ganilla),

    );
}

