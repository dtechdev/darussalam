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

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $siteUrl = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $site_id = SelfSite::model()->getSiteId($siteUrl);
        Yii::app()->session['site_id'] = $site_id;
        $this->render('index');
    }

    public function actionStoreHome() {

        $city = City::model()->findByPk($_REQUEST['city_id']);
        $layout_id = $city['layout_id'];
        $layout = Layout::model()->findByPk($layout_id);
        $layout_name = $layout['layout_name'];

        Yii::app()->session['layout'] = $layout_name;
        Yii::app()->session['country_short_name'] = $_REQUEST['country'];
        Yii::app()->session['city_short_name'] = $_REQUEST['city'];
        Yii::app()->session['city_id'] = $_REQUEST['city_id'];
        Yii::app()->theme = Yii::app()->session['layout'];

        $order_detail = new OrderDetail;

        $limit = 3;
        $featured_products = $order_detail->featuredBooks($limit);
        $bestSellings = $order_detail->bestSellings($limit);

        $this->render('storehome', array('product' => $featured_products, 'best_sellings' => $bestSellings)
        );
    }

    public function actionfeaturedProducts() {
        //queries 

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('featured_products');
    }

    public function actionbestSellings() {
        //queries 

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('best_sellings');
    }

    public function actionproductListing() {

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('product_listing');
    }

    public function actionproductDetail() {

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('product_detail');
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
        Yii::app()->controller->layout = '//layouts/main';
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
        $model = new LoginForm;

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

                if (Yii::app()->user->isSuperAdmin) {
                    $this->redirect(array('user/admin'));
                }
                if (Yii::app()->user->isAdmin) {
                    $this->redirect(array('user/admin'));
                }
                if (Yii::app()->user->isCustomer) {
                    $this->redirect(array('site/index'));
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
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}