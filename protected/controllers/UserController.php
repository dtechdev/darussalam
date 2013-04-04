<?php

class UserController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'register', 'activate','forgot'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create','updateprofile'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('create','update','updateprofile'),
                'expression' => 'Yii::app()->user->isAdmin',
            //the 'user' var in an accessRule expression is a reference to Yii::app()->user
            ),
            array('allow',
                'actions' => array('admin', 'delete','update','updateprofile'),
                'expression' => 'Yii::app()->user->isSuperAdmin',
            //the 'user' var in an accessRule expression is a reference to Yii::app()->user
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        $user_profile = new UserProfile('create');
        $selfSite = new SelfSite();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            $user_profile->attributes = $_POST['UserProfile'];
            $date=strtotime($model->join_date);
             $model->join_date=$date;
            //$model->user_name = $user_profile->getFullName();
            if ($model->site_id == NULL && $model->role_id == NULL && $model->status_id == NULL) {
                $model->site_id = '1';
                $model->role_id = '3';
                $model->status_id = '2';
                $model->activation_key = sha1(mt_rand(10000, 99999) . time() . $model->user_email);
                $activation_url = $this->createUrl('user/activate', array('key' => $model->activation_key));
                $model->user_password = md5($model->user_password);
            }
            if ($model->save()) {
                $user_profile->user_id = $model->user_id;
                // $model->user_name=$user_profile->getFullName();

                if ($user_profile->validate()) {

                    $user_profile->save();  //getFull name is a getter function in profile model merge 1st + last name
                } else {
                    echo CHtml::errorSummary($user_profile);
                      }
                $this->redirect(array('view', 'id' => $model->user_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionRegister() {

        $model = new User;
        //$user_profile = new UserProfile();
        $selfSite = new SelfSite();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            //$user_profile->attributes = $_POST['UserProfile'];
            
            $date=strtotime($model->join_date);
             $model->join_date=$date;
             // $model->user_name = $user_profile->getFullName();
            if ($model->site_id == NULL && $model->role_id == NULL && $model->status_id == NULL) {
                $model->site_id = '1';
                $model->role_id = '3';
                $model->status_id = '0';
                
            }

               $model->activation_key = sha1(mt_rand(10000, 99999) . time() . $model->user_email);
              
                $activation_url = $this->createUrl('user/activate', array('key' => $model->activation_key));
            if ($model->save()) {
                
                 $model->user_password = md5($model->user_password);
                 $model->user_password2 = md5($model->user_password2);
                 $model->save();
                 
//                $user_profile->user_id = $model->user_id;
//                // $model->user_name=$user_profile->getFullName();
//
//                if ($user_profile->validate()) {
//
//                 if ($user_profile->save()) {
//
//                        // $identity=new UserIdentity($model->user_name,$model->user_password);
//                        //   $identity->authenticate();
//                        // Yii::app()->user->login($identity,0);
//                       
//                       
//                        //email activation code end-----------------------------------------
//                    }
//                    //$this->redirect(Yii::app()->user->returnUrl);
//                    
//                } else {
//                    echo CHtml::errorSummary($user_profile);
//                }
                        $to = $model->user_email;
                        $from = "zahid.nadeem@darussalampk.com";
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= 'From: DTech.com' . "\r\n";

                        $subject = "Your Activation Link";

                        $message = "<html><body>Please click this below to activate your account <br />" .
                                Yii::app()->createAbsoluteUrl('user/activate', array('key' => $model->activation_key,'user_id'=>$model->user_id)).
                                "<br> Thanks you. ".$model->user_email . " </body></html>";

                       Yii::app()->email->send($from,$to,$subject, $message);
                Yii::app()->user->setFlash('registration', 'Thank you for Registration...Please activate your account by vising your email account.');
                $this->redirect(array('site/login'));  ///take him to login page....
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionActivate() {
        $user_id=$_GET['user_id'];
        $activation_key=$_GET['key'];
         $criteria=new CDbCriteria;
        $criteria->select='*';
       $conditions=array();

            $conditions[]='t.user_id='.$user_id;
            $conditions[]="activation_key='".$activation_key."'";
            $criteria->condition=implode(' AND ',$conditions);
                  
        $obj=User::model()->findAll($criteria);
        if($obj!=NULL)
        {
            $modelUser=new User;
            $modelUser->updateByPk($user_id,array('status_id'=>'1'));
        
            Yii::app()->user->setFlash('login','Thank You ! Login Please...Your account has been activated....Now Login');
            $this->redirect(array('site/login'));
       
        }
         else 
             {
                echo 'hello not data in object model';     
     
            }
        //print_r($obj);
        //print_r($obj->activation_key);
         exit();
       // $this->render('contact',array('model'=>$model)); 
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->user_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    
    
    public function actionUpdateProfile($id)
        {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->user_id));
        }

        $this->render('update_profile', array(
            'model' => $model,
        ));
    }
    
    public function actionForgot()
    {
        if(isset($_POST['email']))
        {
        $email=$_POST['email'];
        
        $record=  User::model()->find(array(
        'select'=>'*',
        'condition'=>"user_email='".$email."'"
               
         )
         );
        if($record===null)
        {
          Yii::app()->user->setFlash('incorrect_email','Email does not exists...Please try correct email address');
            
        }
       else {  
           
                       $pass_new=substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 7)), 0, 9);
//                        
//                        $subject = "Forgot Password";
//                        $message = "Thank you for joining!, we have send you a seperate message that contain your new password. Use this password to login";
//                        
//
//                         Yii::app()->email->send($from ,$to, $subject, $message);
                        
                        //echo $to.$subject.$message.$from;

                        $from = 'zahid.nadeem@darussalampk.com';
                        $to = $record->user_email;
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= 'From: Dtech.com' . "\r\n";

                        $subject2 = "Your New Password";

                        $message2 = "Your New Password : ".$pass_new;

                       $isSent= Yii::app()->email->send($from,$to,$subject2, $message2);
                        
                        $user_id= $record->user_id;
                        $role_id=$record->role_id;
                        if($role_id!=1)
                        {
                        $modelUser=new User;
                        $pass_new=md5($pass_new);
                        if($modelUser->updateByPk($user_id,array('user_password'=>"$pass_new")))
                        {
                        //User::updateAll(array('email=>'), $condition='', $params=array());
                       
                        Yii::app()->user->setFlash('password_reset','Your passowrd has been sent to your Email.Please get your new password form your email account');
                        }
                        
                        }
                        else
                        {
                          Yii::app()->user->setFlash('superAdmin','Sorry we can not change your password  ');   
                        }
            }
        }
         
         $this->render('forgot_password',array('model'=>  UserProfile::model(),));
       
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
