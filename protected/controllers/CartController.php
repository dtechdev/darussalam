<?php

/**
 *  to handle every cart information 
 *  adding removing here
 */
class CartController extends Controller
{

    /**
     * 
     */
    public function actionAddtocart()
    {

        $ip = Yii::app()->request->getUserHostAddress();
        $cart_model = new Cart();
        if (isset(Yii::app()->user->id))
        {
            $cart = $cart_model->find('product_id=' . $_REQUEST['product_id'] . ' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
            $ip = '';
        }
        else
        {
            $cart = $cart_model->find('product_id=' . $_REQUEST['product_id'] . ' AND session_id="' . $ip . '"');
        }
        if ($cart != null)
        {
            $cart_model = $cart;
            $cart_model->quantity = $cart->quantity + $_REQUEST['quantity'];
        }
        else
        {
            $cart_model = new Cart();
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->product_id = $_REQUEST['product_id'];
            $cart_model->user_id = Yii::app()->user->id;
            $cart_model->city_id = Yii::app()->session['city_id'];
            $cart_model->added_date = date(Yii::app()->params['dateformat']);
            $cart_model->session_id = $ip;
            ;
        }
       
        $cart_model->save();
        

        //count total added products in cart
        if (isset(Yii::app()->user->id))
        {
            $tot = Yii::app()->db->createCommand()
                    ->select('sum(quantity) as cart_total')
                    ->from('cart')
                    ->where('city_id=' . Yii::app()->session['city_id'] . ' AND user_id=' . Yii::app()->user->id)
                    ->queryRow();
        }
        else
        {
            $tot = Yii::app()->db->createCommand()
                    ->select('sum(quantity) as cart_total')
                    ->from('cart')
                    ->where('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"')
                    ->queryRow();
        }
        CVarDumper::dump($tot,10,true);
        echo CJSON::encode(array('product_id' => '1', 'cart_counter' => $tot['cart_total']));
    }

}

?>
