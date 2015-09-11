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
            P_NAME => 'tissus de haute couture',
            P_IMG => 'images/img10.jpg',
            P_PRICE => 145,
            P_DESCRIP => 'Model pour femme',
        ),
        '365' => array(
            P_NAME => 'Bassin riche et Ganilla',
            P_IMG => 'images/img11.jpg',
            P_PRICE => 240,
            P_DESCRIP => 'Model pour couple',
        ),
        '897' => array(
            P_NAME => 'Nouveaute Nouveaute',
            P_IMG => 'images/img12.jpg',
            P_PRICE => 260,
            P_DESCRIP => 'Nouveau model ',
        ),
        '214' => array(
            P_NAME => 'Top model ',
            P_IMG => 'images/img13.jpg',
            P_PRICE => 190,
            P_DESCRIP => 'Model pour homme ',
        ),
  '254' => array(
            P_NAME => 'Top model ',
            P_IMG => 'images/img4.jpg',
            P_PRICE => 190,
            P_DESCRIP => 'Model pour homme ',
        ),
  '814' => array(
            P_NAME => 'Top model ',
            P_IMG => 'images/img6.png',
            P_PRICE => 190,
            P_DESCRIP => 'Model pour homme ',
        ),
  '218' => array(
            P_NAME => 'Top model ',
            P_IMG => 'images/img7.jpg',
            P_PRICE => 190,
            P_DESCRIP => 'Model pour homme ',
        ),
'222' => array(
            P_NAME => 'Top model ',
            P_IMG => 'images/img9.jpg',
            P_PRICE => 190,
            P_DESCRIP => 'Model pour homme ',
        ),

    );
}




