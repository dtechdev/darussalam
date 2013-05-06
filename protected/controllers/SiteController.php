<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        Yii::app()->user->SiteSessions;
        $this->redirect(array('/site/storehome', 'country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']));
    }

    /**
     *  partucular store 
     *  here will be available
     *  from session
     *  
     */
    public function actionStoreHome() {

        Yii::app()->user->SiteSessions;
        $order_detail = new OrderDetail;
        $limit = 3;
        $featured_products = $order_detail->featuredBooks($limit);
        $bestSellings = $order_detail->bestSellings($limit);
        $segments_footer_cats = Categories::model()->getCategoriesInSegment(5);
        $this->render('storehome', array(
            'product' => $featured_products,
            'best_sellings' => $bestSellings,
            'segments_footer_cats' => $segments_footer_cats,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        Yii::app()->user->SiteSessions;
        Yii::app()->controller->layout = '//layouts/slider';
        //Yii::app()->theme='admin';
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $to = Yii::app()->params->supportEmail;
                $from = Yii::app()->params->adminEmail;

                $headers = array(
                    'MIME-Version: 1.0',
                    'Content-type: text/html; charset=iso-8859-1',
                );
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';

                $message = "
                                <html>
                                    <body>
                                    Name : $model->name <br />
                                    From : $model->email <br />
                                    Subject : $model->subject <br /><br />
                                    Message : $model->body</body>
                            </html>";

                Yii::app()->email->send($from, $to, $subject, $message, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::app()->controller->layout = '//layouts/main';
        Yii::app()->user->SiteSessions;
        $model = new LoginForm;
        $ip = getenv("REMOTE_ADDR");
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                 Yii::app()->session['isSuper'] = 0;

                if (Yii::app()->user->isSuperAdmin) {
                     Yii::app()->session['isSuper'] = 1;
                    $this->redirect(array('user/index'));
                }
                if (Yii::app()->user->isAdmin) {
                    $this->redirect(array('user/admin'));
                }
                if (Yii::app()->user->isCustomer) {
                    $cart_model = new Cart();
                    $cart = $cart_model->findAll('session_id="' . $ip . '"');
                    foreach ($cart as $pro) {
                        $cart_model2 = new Cart();
                        $exitstProduct = $cart_model2->find("user_id=" . Yii::app()->user->id . " AND product_id=" . $pro->product_id);
                        if ($exitstProduct) {
                            $exitstProduct->quantity = $exitstProduct->quantity + $pro->quantity;
                            $cart_model2 = $exitstProduct;
                            Cart::model()->findByPk($pro->cart_id)->delete();
                        } else {
                            $cart_model2 = $pro;
                        }

                        $cart_model2->user_id = Yii::app()->user->id;

                        $cart_model2->session_id = '';
                        $cart_model2->save();
                    }
                    $user_profile = new UserProfile();
                    $user_profile_set = $user_profile->findAll('id=' . Yii::app()->user->id);
                    if ($user_profile_set)
                        $this->redirect(array('/web/product/allproducts', 'country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']));
                    else {
                        $this->redirect(array('/web/userProfile/index'));
                    }
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        unset(Yii::app()->user->isSuper);
        Yii::app()->user->logout();
        
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * use to change the store and on ajax call
     * and redirect ot particular path
     */
    public function actionStorechange() {

        $city_id = $_POST['city_id'];
        $city = City::model()->findByPk($city_id);
        $countries = Country::model()->findByPk($city['country_id']);
        $country_short_name = $countries['short_name'];
        $city_short_name = $city['short_name'];

        $layout_id = $city['layout_id'];
        $layout = Layout::model()->findByPk($layout_id);
        $layout_name = $layout['layout_name'];

        Yii::app()->session['layout'] = $layout_name;
        Yii::app()->session['country_short_name'] = $country_short_name;
        Yii::app()->session['city_short_name'] = $city_short_name;
        Yii::app()->session['city_id'] = $city['city_id'];
        Yii::app()->theme = Yii::app()->session['layout'];
        echo CJSON::encode(array('redirect' => $this->createUrl('/site/storehome', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']))));
    }

}