<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
    </div>
</div>
<div id="cart_container">
    <?php
        $this->renderPartial("_view_cart",array("cart"=>$cart));
    ?>
</div>