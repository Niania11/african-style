<header>





<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>africa style</title>
</head>
<body>


<div id="menu">
    <div id="logo">
        <h1>
            AFRICAN STYLE SHOP
        </h1>
    </div>
    <div id="IMG">
            <img src="image/tissus1.png" alt="TISSU"  width="758" height="120">  </img>
    </div>

        <h2><?php echo $view_data['title']?></h2>
    <ul>
        <?php
        foreach ($menu as $liste => $nomf) {
            echo '<li><a href="', $nomf ,'">', $liste ,'</a></li>';
        }
        ?>

    </ul>

</div>






</header>
