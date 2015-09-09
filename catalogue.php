<?php
require_once 'data/data.php';
$view_data['title'] = 'Page catalogue';
$view_data['footer'] = 'Pied de page';
require_once 'view_block/_view_header.php';
require_once 'view_block/_view_footer.php';

//session
define('PFORMNAME_USERNAME', 'username');
define('PSESSNAME_USERNAME', 'username');

session_start(); // Démarrage mécanisme sessions
$username = ''; // Variable qui va contenir le username
if (array_key_exists(PFORMNAME_USERNAME, $_POST)) {
    // En réception données formulaire
    $username = $_POST[PFORMNAME_USERNAME];
    // On met cette valeur en session pour la sauvegarder
    $_SESSION[PSESSNAME_USERNAME] = $username;
} else { // On n'est pas en post (en GET donc)
    if (array_key_exists(PSESSNAME_USERNAME, $_SESSION)) {
        // On lit le username qui est enregistré dans la session
        $username = $_SESSION[PSESSNAME_USERNAME];
    } else {
        // L'utilisateur vient pour la première fois sur le site
        $username = '';
    }
}

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

// session
<h2>Formulaire simple et session PHP</h2>
<form name="login" method="post">
    <label for="username">Username : </label>
    <input type="text" name="<?= PFORMNAME_USERNAME ?>" id="username" value="<?= $username ?>"/>
    <input type="submit" name="soumettre" id="soumettre" value="Soumettre"/>
</form>



</body>
</html>





