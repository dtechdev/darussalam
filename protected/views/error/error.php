<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<div id="shopping_cart" style="height:308px;text-align:left; color:gray  ">
    <div id="main_shopping_cart"><h1>Error <?php echo $error['code'] ?></h1>
        <div class="left_right_cart">

            <?php
            echo "<b>Ooops ! No Page Found .  Invalid Request </b><br><p> Please contact ";
            echo $this->pageTitle = Yii::app()->name;
            ?>
            <div>
                <?php echo "Error". $error['message']; ?>
            </div>
        </div></div></div>
