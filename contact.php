<?php
require_once 'data/data.php';
$view_data['title'] = 'Page de contact';
$view_data['footer'] = 'Pied de page';
require_once 'view_block/_view_header.php';
require_once 'view_block/_view_footer.php';



?>


<?php
//  INTIALISATION
//var_dump($_POST);
define ('P_NOM','nom');
define('P_CATEGORIE', 'OpCat');
define('P_DEPARTEMENT', 'ListeDep');
define('P_SITUATION', 'OpSituation');
define('P_ANNEE', 'annee');
define('P_VILLE', 'ville');

$options_situation = array(
    'op_ass' => 'Associé',
    'op_emp' => 'Employée',
    'op_ben' => 'Bénévolat',
);


$nom_valide = false;
$nom = '';
$categorie_valide = false;
$categorie = '';
$ville_valide = false;
$ville = '';
$departement_valide = false;
$departement ='-1';
$situations_valide = false;
$situations = array(); // Les différentes situa
$ville_valide = false;
$ville = '';
$annee_valide = false;
$annee = '';

$result = ''; // Contenu final sous forme de chaîne

//   VALIDATION DU NOM
if (array_key_exists(P_NOM , $_POST)){
    $nom_valide=true;
//    $nom = $_POST[P_NOM];
    $nom = filter_input(INPUT_POST, P_NOM, FILTER_SANITIZE_STRING);
}


//  VALIDATION DES BOUTONS RADIO
if (array_key_exists(P_CATEGORIE , $_POST)) {
    $categorie_valide = true;
    $categorie = $_POST[P_CATEGORIE][0];
}

//  VALIDATION DU SELECT LISTE DEP
if (array_key_exists(P_DEPARTEMENT , $_POST)) {
    $departement_valide = ($_POST[P_DEPARTEMENT] != '-1');
    $departement = $_POST[P_DEPARTEMENT];
}

//  VALIDATION CHECKBOXES SITUATION
$situations_valide = true;
if (array_key_exists(P_SITUATION , $_POST)) {
    $situations = $_POST[P_SITUATION];
}

//  VALIDATION INPUT ANNEE
if (array_key_exists(P_ANNEE , $_POST)) {
    $annee_valide = is_numeric($_POST[P_ANNEE]) && ($_POST[P_ANNEE] >= 2000);
    $annee = $_POST[P_ANNEE];
}

//  VALIDATION INPUT VILLE
if (array_key_exists(P_VILLE , $_POST)) {
    $ville = filter_input(INPUT_POST, P_VILLE, FILTER_SANITIZE_STRING);
    $ville_valide = strlen($ville) >= 2;
}


/*var_dump($nom_valide);
var_dump($categorie_valide);
var_dump($ville_valide);
var_dump($departement_valide);
var_dump($annee_valide);*/

if ($nom_valide && $categorie_valide && $ville_valide && $departement_valide && $annee_valide) {
    $msg_situations = '';
    foreach ($situations as $s) {
        $msg_situations .= $options_situation[$s] . ', ';
    }
    $msg_situations = trim($msg_situations, ', '); // Retirer la virgule finale
    $result = "L'employe $nom (categorie $categorie), originiaire de la ville $ville est affecté au departement $departement depuis $annee. Il a les options ($msg_situations).";
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        h2{
            text-align: center;
            color: darkred;
        }
        input, select, input[type="radio"]{
            border: solid 1px cornflowerblue;
        }
        .container{
            width: 50%;
            height: 50%;
            margin-right: auto;
            margin-left: auto;
            padding: 2px;
            border: solid 5px darkred;
        }
        .form-inline{
            padding: 3em;
            border: solid darkred;
        }
        .form-group label{
            /*padding: 1px;*/
            /* border:1px solid;*/
            width: 8em;
            display: inline-block;
            padding-right: 1%;
            text-align: right;
        }
        .envoyer{
            /*border: solid 1px red ;*/
            width: 30%;
            /*height: 30%;*/
            margin-right: auto;
            margin-left: auto;

        }
    </style>
</head>


<body>
<h2>Formulaire Attestation</h2>
<p><?= $result ?></p>
<div class="container">
    <form class="form-inline" action="formulaire_attestation.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?= isset($_POST[P_NOM]) ? $_POST[P_NOM] : '' ?>"/>
        </div>

        <div class="form-group">
            <label>Categorie :</label>
            <input type="radio" name="OpCat[]" value="1" <?= (1 == $categorie) ? 'checked="checked"' : '' ?> />1
            <input type="radio" name="OpCat[]" value="2" <?= (2 == $categorie) ? 'checked="checked"' : '' ?> />2
            <input type="radio" name="OpCat[]" value="3" <?= (3 == $categorie) ? 'checked="checked"' : '' ?> />3
            <input type="radio" name="OpCat[]" value="4" <?= (4 == $categorie) ? 'checked="checked"' : '' ?> />4
        </div>

        <div class="form-group">
            <label>Departement :</label>
            <select name="ListeDep" >
                <option value="-1" <?= ('-1' == $departement) ? 'selected="selected"' : '' ?> >Choisir ...</option>
                <option value="informatique" <?= ('informatique' == $departement) ? 'selected="selected"' : '' ?> >Informatique</option>
                <option value="marketing" <?= ('marketing' == $departement) ? 'selected="selected"' : '' ?>>Marketing</option>
            </select>
        </div>

        <div class="form-group">
            <label>Cadre :</label>
            <select name="ListeCadre">
                <option value="-1" select="selected" >Choisir ...</option>
                <option value="ingenieur" select="selected" >Ingenieur</option>
                <option value="developpeur">Developpeur</option>
            </select>
        </div>

        <div class="form-group">
            <!--            <label for="op_ass"><?/*= $options_situation['op_ass'] */?></label><input type="checkbox" id="op_ass" value="op_ass"  <?/*= in_array('op_ass', $situations) ? 'checked="checked"' : '' */?> name="OpSituation[]" />
            <label for="op_emp"><?/*= $options_situation['op_emp'] */?></label><input type="checkbox" id="op_emp"  value="op_emp" <?/*= in_array('op_emp', $situations) ? 'checked="checked"' : '' */?> name="OpSituation[]" />
            <label for="op_ben"><?/*= $options_situation['op_ben'] */?></label><input type="checkbox" id="op_ben"  value="op_ben" <?/*= in_array('op_ben', $situations) ? 'checked="checked"' : '' */?> name="OpSituation[]" />
-->
            <!--            Le code "statique" au dessus est remplacé par la boucle suivante:-->
            <?php foreach ($options_situation as $value => $libelle) {?>
                <label for="<?= $value ?>"><?= $libelle ?></label><input type="checkbox" id="<?= $value ?>" value="<?= $value ?>"  <?= in_array($value, $situations) ? 'checked="checked"' : '' ?> name="OpSituation[]" />
            <?php } ?>

        </div>

        <div class="form-group">
            <label>Annee Affectation :</label><input type="text" name="annee" value="<?= isset($_POST[P_ANNEE]) ? $_POST[P_ANNEE] : '' ?>" />
        </div>

        <div class="form-group">
            <label>Ville origine :</label><input type="text" name="ville" value="<?= isset($_POST[P_VILLE]) ? $_POST[P_VILLE] : '' ?>" />
        </div>

        <div class="envoyer">
            <input type="submit" value="Envoyer">
        </div>

    </form>
</div>
</body>
</html>


