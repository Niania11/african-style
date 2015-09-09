<?php
require_once 'data/data.php';
$view_data['title'] = 'Page catalogue';
$view_data['footer'] = 'Pied de page';
require_once 'view_block/_view_header.php';
require_once 'view_block/_view_footer.php';




?>



<?php
define('COOKIE_NAME', 'nom_du_cookie');
/* Pour lire le cookie
 array_key_exists(COOKIE_NAME, $_COOKIE)
 puis $_COOKIE[COOKIE_NAME]
 pour écrire : setcookie(COOKIE_NAME, 'valeur cookie', time() + 3600 * 24 * 30);
 Place un cookie dans la réponse pour une dirée de 30 jours (exprimé en secondes)*/
//setcookie(COOKIE_NAME, 'Bonjour navigateur !', time() + 3600 * 24 * 30);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8">
    <title>Exo php</title>
</head>
<body>
<?php
if (array_key_exists(COOKIE_NAME, $_COOKIE)){
    echo  $_COOKIE[COOKIE_NAME];
}else{
    echo 'Pas de cookie nommée ' . COOKIE_NAME . ' sur ce navigateur !';
}
?>
<form method="post">
    <input type="text" name="textname" value="text" />
    <input type="submit" value="Soumettre">
    <?php
    if (array_key_exists("textname", $_POST)){
        setcookie(COOKIE_NAME, $_POST["textname"], time() + 3600 * 24 * 30);
    }
    ?>
</form>
</body>
</html>
