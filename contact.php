<?php include('view_block/header.php'); ?>


<?php
$login_message = ''; // Msg à afficher en cas de bonne ou mauvaise connexion
$user_is_loggedIn = false; //Indique que l'utilisateur est connecté ou ne l'est pas
$username = null;// valeur du username
$password = null;//valeur du password
session_start();//Démarrage de connexion PHP
if (array_key_exists('connect', $_POST)
    && array_key_exists('username', $_POST)
    && array_key_exists('password', $_POST)) {
    // L'utilisateur cherche à se connecter ....
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    require_once('_authenticate.php'); //Appel du script qui gère l'authentification
    if (authenticate($username, $password)) {
        //l'utilisateur est authentifié
        $_SESSION[PSESSNAME_USERNAME] = $username;
        $user_is_loggedIn = true;
        $login_message = "Bonjour $username";
    } else {
        //échec de l'authentification
        $login_message = 'L\'identificateur et le mot de passe fournis ne concorde pas';
    }
}elseif (array_key_exists('disconnect', $_POST)){
    unset($_SESSION[PSESSNAME_USERNAME]); //Supprimer la variable 'username' de la session
    $user_is_loggedIn = false;

}else{
    //Cas du GET
    $user_is_loggedIn = array_key_exists(PSESSNAME_USERNAME, $_SESSION);
    if ($user_is_loggedIn) {
        $username = $_SESSION[PSESSNAME_USERNAME];
        $login_message = "Bonjour $username";
    }

    //Sinon rien à faire
}
?>


<h1>Vous êtes sur la page d'accueil</h1>
<div id="login_logout_form">
    <span><?php echo $login_message; ?></span>
    <?php if ($user_is_loggedIn) { ?>

        <form method="post">
            <input type="submit" name="disconnect" id="se_deconnecter" value="Déconnexion"/>
        </form>
    <?php } else { ?>

    <?php } ?>
</div>


<div class="col-lg-12"></div>
    <?php
    define('P_NOM','nom');
    define('P_COURRIEL', 'courriel');
    define('P_MESSAGE', 'message');
    define('P_SEXE', 'sexe');


    $validations = array(
        P_NOM => array(
            'value' => '',
            'isValid' => false,
            'errMsg' => ''
        ),
        P_COURRIEL => array(
            'value' => '',
            'isValid' => false,
            'errMsg' => ''
        ),
        P_MESSAGE => array(
            'value' => '',
            'isValid' => false,
            'errMsg' => ''
        ),
        P_SEXE => array(
            'value' => '',
            'isValid' => false,
            'errMsg' => ''
        )
    );

    // Vérifie si il y'a bien eu soumission du formulaire
    if ( array_key_exists('soumettre', $_POST) ) {
        $validations[P_NOM]['value'] = filter_input(INPUT_POST, P_NOM, FILTER_SANITIZE_STRING);
        $validations[P_NOM]['isValid'] = (strlen($validations[P_NOM]['value']) > 1); // on vérifie si le nb de char est supérieur a 1
        if (!$validations[P_NOM]['isValid']) { // Si non valid affect un message d'erreur
            $validations[P_NOM]['errMsg'] = 'NOM: Le nom doit etre au minimum de 1 caractere.';
        }

        $validations[P_COURRIEL]['value'] = filter_input(INPUT_POST, P_COURRIEL, FILTER_SANITIZE_EMAIL);
        $validations[P_COURRIEL]['isValid'] = (false !== (filter_var($validations[P_COURRIEL]['value'], FILTER_VALIDATE_EMAIL)));
        if (!$validations[P_COURRIEL]['isValid']) {
            $validations[P_COURRIEL]['errMsg'] = 'COURRIEL: Le courriel doit etre un courriel valide.';
        }

        $validations[P_MESSAGE]['value'] = filter_input(INPUT_POST, P_MESSAGE, FILTER_SANITIZE_STRING);
        $validations[P_MESSAGE]['isValid'] = (strlen($validations[P_MESSAGE]['value']) > 9); // on vérifie si le nb de char est au minimum de 10
        if (!$validations[P_MESSAGE]['isValid']) {
            $validations[P_MESSAGE]['errMsg'] = 'MESSAGE: Le message doit etre au minimum de 10 caracteres.';
        }

        // on vérifie si une valeur de raison a etais sélectionnée parmis les 4 options déja définie
        $validations[P_SEXE]['value'] = filter_input(INPUT_POST, P_SEXE, FILTER_SANITIZE_STRING);
        $option = $validations[P_SEXE]['value'];
        $validations[P_SEXE]['isValid'] = ( ($option == 'r_renc') || ($option == 'r_conn') || ($option == 'r_trav') || ($option == 'r_sout') );
        if (!$validations[P_SEXE]['isValid']) {
            $validations[P_SEXE]['errMsg'] = 'RAISON: Une valeur de raison doit etre selectionnee.';
        }

    }

    $isFormValid = true; // Initialise le formulaire comme valide
    foreach ($validations as $fields) { // parcours le tableau de validation
        if(!$fields['isValid']) { // si un des champs n'est pas valide
            // alors le formulaire n'est plus valide
            $isFormValid = false;
            break; // sort de la boucle
        }
    }

    // cas formulaire valide
    if ($isFormValid) {
        header('Location: index.php'); // l'utulisateur est redirigé vers la page d'acceuil
        exit(); // on sort du script
    }

    ?>
<p class="validation_message">
    <?php
    // cas formulaire non valide
    // affiche un message pour chaque champ non valide
    if (!$isFormValid) {
        echo '<ul>';
        foreach ($validations as $fields ) {
            echo '<li>', $fields['errMsg'], '</li>';
        }
        echo '</ul>';
    }
    ?>
</p>
<form name="contact_form" method="post">
    <div class="form-group">
        <label for="nom">Nom :</label>
        <!-- Si on a une donnée post avec le nom du champ alros affiche sa valeur dans l'input sinon une chaine vide -->
        <!-- Meme chose pour les champs email et text -->
        <input type="text" name="<?= P_NOM ?>" id="nom"
               value="<?= array_key_exists(P_NOM, $_POST) ? $_POST[P_NOM] : '' ?>"/>
    </div>

    <div class="form-group">
        <label for="courriel">Courriel :</label>
        <input type="text" name="<?= P_COURRIEL ?>" id="courriel"
               value="<?= array_key_exists(P_COURRIEL, $_POST) ? $_POST[P_COURRIEL] : '' ?>"/>
    </div>

    <div class="form-group">
        <label for="message">Message :</label>
        <input type="text" name="<?= P_MESSAGE ?>" id="message"
               value="<?= array_key_exists(P_MESSAGE, $_POST) ? $_POST[P_MESSAGE] : '' ?>"/>
    </div>

    <div class="form-group">
        <label>Sexe :</label>
        <!-- Si on a une donnée post avec le nom du champ alors on selectionne le bouton radio si la valeur post est égale a la valeur du bouton radio -->
        <input type="radio" name="<?= P_SEXE ?>" value="r_renc"
            <?= ( (array_key_exists(P_SEXE, $_POST)) && 'r_renc' == $_POST[P_SEXE]) ? 'checked="checked"' : '' ?> />&nbsp;BOUBOU HOMME
        <input type="radio" name="<?= P_SEXE ?>" value="r_conn"
            <?= ( (array_key_exists(P_SEXE, $_POST)) && 'r_conn' == $_POST[P_SEXE]) ? 'checked="checked"' : '' ?> />&nbsp;BOUBOU FEMME

    </div>

    <div class="submit">
        <input type="submit" value="Soumettre" name="soumettre">
    </div>
</form>




<?php include('view_block/form.php'); ?>
<?php include('view_block/footer.php'); ?>

