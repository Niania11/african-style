<header>





<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>africa style</title>
</head>
<body>
<h2><?php echo $view_data['title']?></h2>

<div id="menu">
    <ul>
        <?php
        foreach ($menu as $liste => $nomf) {
            echo '<li><a href="', $nomf ,'">', $liste ,'</a></li>';
        }
        ?>
    </ul>
</div>






</header>
