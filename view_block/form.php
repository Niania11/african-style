<?php
/*define('P_EMAIL','email');
define('PASSWORD','password');
define('PSESSNAME_USERNAME','usermame');
$login_message = ''; // Msg � afficher en cas de bonne ou mauvaise connexion
$user_is_loggedIn = false; //Indique que l'utilisateur est connect� ou ne l'est pas
$username = null;// valeur du username
$password = null;//valeur du password
session_start();//D�marrage de connexion PHP
if (array_key_exists('connect', $_POST)
    && array_key_exists('username', $_POST)
    && array_key_exists('password', $_POST)) {
    // L'utilisateur cherche � se connecter ....
    $username = filter_input(INPUT_POST, P_EMAIL, FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, PASSWORD, FILTER_SANITIZE_STRING);
    require_once('_authenticate.php'); //Appel du script qui g�re l'authentification
    if (authenticate($username, $password)) {
        //l'utilisateur est authentifi�
        $_SESSION[P_EMAIL] = $username;
        $user_is_loggedIn = true;
        $login_message = "Bonjour $username";
    } else {
        //�chec de l'authentification
        $login_message = 'L\'identificateur et le mot de passe fournis ne concorde pas';
    }
}elseif (array_key_exists('disconnect', $_POST)){
    unset($_SESSION[P_EMAIL]); //Supprimer la variable 'username' de la session
    $user_is_loggedIn = false;

}else{
    //Cas du GET
    $user_is_loggedIn = array_key_exists(PASSWORD, $_SESSION);
    $username = $_SESSION[PASSWORD];
    $login_message = "Bonjour $username";
    //Sinon rien � faire
}
*/?>
<form name="contact_form" method="post">
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Log In</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" type="email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" type="password">
                </div>

                <p class="text-right"><a href="#">Forgot password?</a></p>
            </div>

            <div class="modal-footer">
                <div class="submit">
                    <input type="submit" value="login" name="login">
                </div>
            </div>
        </div>
    </div>
</div>

</form>
