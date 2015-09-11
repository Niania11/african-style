<?php
include('view_block/header.php');
include('data/data.php');
//var_dump(get_products());
$catalogue = get_products();
?>
<div class="container">
    <div class="col-md-12">

        <div class="center-block text-center">
            <h1>AFRICANSTYLE</h1>
            <p class="lead">VENTE DE VETEMENTS</p>
        </div>

        <div class="container">
            <div class="menu row">
                <div class="product col-sm-12">

                    <div class="product col-sm-3"></div>
                    <div class="product col-sm-6">
                        <hr>
                        <h2>AFRICAN STYLE</h2>
                        <p></p>
                        <hr>
                        <h2 class="text-right"></h2>

                    </div>
                    <div class="product col-sm-3">
                        <?php
                        foreach($catalogue as $k => $list) {
                            echo '<div class="produit">';
                            echo '<img src="', $list[P_IMG], '" alt="" />';
                            echo '<p>', $list[P_PRICE], '<p/>';
                            echo '<p>', $list[P_DESCRIP], '<p/>';
                            echo '<p>', $list[P_NAME], '<p/>';
                            echo '</div>';
                        }


                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('view_block/form.php'); ?>
<?php include('view_block/footer.php');?>

