<?php
require_once 'data/data.php';
$view_data['title'] = 'Page de produit';
$view_data['footer'] = 'Pied de page';
require_once 'view_block/_view_header.php';
require_once 'view_block/_view_footer.php';



?>


<form name="mess" action="" method="post" onSubmit="return verifmess();">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="71%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#0099CC">
    <tr>
      <td height="30" align="left" valign="middle" class="Stylec2 Style3"> Sexe</td>
        <td align="left" valign="middle"><span class="Style3">Masculin</span>
          <input name="sexe" type="radio" id="radio" value="Mr" checked="checked" />
          <span class="Style3">          Feminin          </span>
          <input type="radio" name="sexe" id="radio2" value="Melle" />
          <span class="Style3">          Autre          </span>
          <input type="radio" name="sexe" id="radio3" value="Autre" /></td>
      </tr>
    <tr>
      <td width="280" height="31" align="left" valign="middle" class="Stylec2 Style4"> Nom et prenom:</td>
        <td width="356" align="left" valign="middle"><input type="text" name="nom" value="" size="32" />          </td>
      </tr>
    <tr>
      <td height="34" align="left" valign="middle" class="Stylec2 Style3">Adresse e-mail:</td>
        <td align="left" valign="middle"><input type="text" name="mail" value="" size="40" />          </td>
      </tr>
    <tr>
      <td height="32" align="left" valign="middle" class="Stylec2 Style3">Objet:</td>
        <td align="left" valign="middle"><input type="text" name="objet" value="" size="20" /></td>
      </tr>
    <tr>
      <td align="left" valign="middle"><p class="Stylec2 Style4">Messeage:</p></td>
        <td align="left" valign="middle"><textarea class="Stylec4" name="message" rows="7" cols="42"></textarea></td>
      </tr>
    <tr>
      <td colspan="2" align="left" valign="middle"><input name="submit" type="submit" class="submit" value="Envoyer" /></td>
      </tr>
    <tr>
      <td colspan="2" align="left" valign="middle" class="Style3">          </td>
      </tr>
    <tr>
      <td colspan="2" align="center" valign="middle" class="Style3"><p align="center" class="Style21">&nbsp;</p>
          <p align="center" class="Style21">&nbsp;</p>
          <div id="adress3">
            <p align="center" class="Style21"><strong> AFRICAN STYLE SHOP </strong></p>
            <p class="Style21">Importateur et Distributeur de Produits African</p>

          </div>
          <p align="center" class="Style21"><br />
        </p></td>
          </tr>
    </table>
  </form>


