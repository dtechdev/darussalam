<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','register','activate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','create'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('ubaidullah'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
                $user_profile=new UserProfile('create');
                $selfSite=new SelfSite();
                 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{         
                          
			$model->attributes=$_POST['User'];
                        $user_profile->attributes=$_POST['UserProfile'];
                        $model->user_name=$user_profile->getFullName();
                          if($model->site_id==NULL && $model->role_id==NULL && $model->status_id==NULL)
                       
                        {
                            $model->site_id='1';
                            $model->role_id='3';
                            $model->status_id='2';
                            $model->activation_key=sha1(mt_rand(10000, 99999).time().$user_profile->email);
                            $activation_url = $this->createUrl('user/activate', array('key'=>$model->activation_key));
                        
                          
                        }
                        if($model->save())
                        {
                          $user_profile->user_id=$model->user_id;
                       // $model->user_name=$user_profile->getFullName();
                      
                        if($user_profile->validate()){
                                    
                            $user_profile->save();  //getFull name is a getter function in profile model merge 1st + last name
                                  }
                                else
                                    {
                                    echo CHtml::errorSummary($user_profile);
                                         
                           // print_r($user_profile->attributes);
                                   // exit(); 
                                    }
                                $this->redirect(array('view','id'=>$model->user_id));
                }}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        
        public function  actionRegister()
        {
            
            $model=new User;
                $user_profile=new UserProfile();
                $selfSite=new SelfSite();
                 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{         
                          
			$model->attributes=$_POST['User'];
                        $user_profile->attributes=$_POST['UserProfile'];
                        $model->user_name=$user_profile->getFullName();
                          if($model->site_id==NULL && $model->role_id==NULL && $model->status_id==NULL)
                       
                        {
                            $model->site_id='1';
                            $model->role_id='3';
                            $model->status_id='2';
                            
                           
                            $model->activation_key=sha1(mt_rand(10000, 99999).time().$user_profile->email);
                            $activation_url = $this->createUrl('user/activate', array('key'=>$model->activation_key));
                         }
                        if($model->save())
                        {
                          $user_profile->user_id=$model->user_id;
                       // $model->user_name=$user_profile->getFullName();
                      
                        if($user_profile->validate()){
                          
                                    
                            if($user_profile->save())
                            {
                            
                              $identity=new UserIdentity($model->user_name,$model->user_password);
                                  $identity->authenticate();
                                  Yii::app()->user->login($identity,0);
                                  
                                  
                                           $to =$user_profile->email;
                                            $subject = "abc.com!";
                                            $message = "Thank you for joining!, we have sent you a separate email that contains your activation link";
                                            $from = "FROM: mr.cdef.com";
                                            
                                            mail($to,$subject,$message,$from);
                                            
                                            //echo $to.$subject.$message.$from;
                                            
                                           $headers  = 'MIME-Version: 1.0' . "\r\n";
                                           $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                           $headers .= 'From: Mr. Ghazali < mr.ghazali@gmail.com>' . "\r\n";
                                            
                                           $subject2 = "Your Activation Link";
    
                                           $message2 = "<html><body>Please click this below to activate your membership<br />".
                                              Yii::app()->createAbsoluteUrl('user/activate', array('email' =>$user_profile->email)).
                                                                    
                                              "Thanks you. ". sha1(mt_rand(10000, 99999).time().$user_profile->email) ." </body></html>";
                                           print_r($message2);
                                           exit();
                                                                    
                                          mail($to, $subject2, $message2, $headers);
                                            //email activation code end-----------------------------------------
                            }
                                            $this->redirect(Yii::app()->user->returnUrl);

                            //getFull name is a getter function in profile model merge 1st + last name
                                  }
                                else
                                    {
                                    echo CHtml::errorSummary($user_profile);
                                    }
                                     Yii::app()->user->setFlash('registration','Thank you for Registration...Please activate your account by vising your email account.');
                                $this->redirect(array('site/login'));  ///take him to login page....
                }}
                  
		$this->render('create',array(
			'model'=>$model,
		));
        }


        public  function actionActivate()
        {
            
            echo "donew";
            
        }

        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}
 
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
