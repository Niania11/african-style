<?php
define('P_PROD', 'produits');

define('P_NAME', 'name');
define('P_PRICE', 'price');
define('P_IMG', 'img');
define('P_DESCRIP', 'description');

function get_products()
{
   return array(
        '102' => array(
            P_NAME=>'Chaussette homme',
            P_IMG => 'images/image1.jpg',
            P_PRICE => 145,69,
            P_DESCRIP => 'Chaussette de luxe',
            ),
        '365' => array(
            P_NAME=>'pantalon homme',
            P_IMG => 'images/image1.jpg',
            P_PRICE => 145,69,
            P_DESCRIP => 'Chaussette de luxe',
        ),
        '897' => array(
            P_NAME=>'veste homme',
            P_IMG => 'images/image1.jpg',
            P_PRICE => 145,69,
            P_DESCRIP => 'Chaussette de luxe',
            ),
        '214' => array(
            P_NAME=>'chapeau homme',
            P_IMG => 'images/image1.jpg',
            P_PRICE => 145,69,
            P_DESCRIP => 'Chaussette de luxe',
            ),

   );
}

