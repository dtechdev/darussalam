<?php
/**
 * form for getting PAYMENT METHOD detail
 * 
 */
?>
<div class="left_method">
    <?php
    $this->renderPartial("_credit_card", array("model" => $model, "form" => $form));
    ?>
    <?php
    $this->renderPartial("_paypal", array("model" => $model, "form" => $form));
    ?>
    <?php
    $this->renderPartial("_manual", array("model" => $model, "form" => $form));
    ?>

</div>
