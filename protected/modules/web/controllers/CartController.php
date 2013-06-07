<?php

/**
 *  Cart Controller
 */
class CartController extends Controller {

    /**
     * view cart page
     */
    public function actionViewcart() {


        Yii::app()->user->SiteSessions;

        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $cart = Cart::model()->getCartLists();

        $this->render('viewcart', array('cart' => $cart));
    }

    /**
     * set Total amount in session
     */
    public function setTotalAmountSession($grand_total, $total_quantity, $description) {
        Yii::app()->session['total_price'] = round($grand_total, 2);
        Yii::app()->session['quantity'] = $total_quantity;
        Yii::app()->session['description'] = $description;
    }

    /**
     * edit or delete cart
     */
    public function actionEditcart() {

        if ($_REQUEST['type'] == 'delete_cart') {
            $cart_model = new Cart();

            Cart::model()->deleteByPk($_REQUEST['cart_id']);
        } else {
            $cart_model = new Cart();
            $cart = $cart_model->find('cart_id=' . $_REQUEST['cart_id']);
            $cart_model = $cart;
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->save();
        }
        $cart = Cart::model()->getCartLists();
        $cart_list_count = Cart::model()->getCartListCount();


        $_view_cart = $this->renderPartial("_view_cart", array('cart' => $cart), true, true);
        echo CJSON::encode(array("_view_cart" => $_view_cart, "cart_list_count" => $cart_list_count));
    }

}

?>
