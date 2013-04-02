<?php

class SiteController extends Controller
{
  
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
              
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
              echo   $siteUrl=$_SERVER['REQUEST_URI'];
              print "<pre>";
              print_r($_SERVER);
                $site_id= SelfSite::model()->getSiteId($siteUrl);
                Yii::app()->session['site_id'] = $site_id;
        	$this->render('index');
	}

        public function actionStoreHome()
	{
              
              $city= City::model()->findByPk($_REQUEST['id']);
              $layout_id=$city['layout_id'];
              $layout= Layout::model()->findByPk($layout_id);
              $layout_name=$layout['layout_name'];
              
              Yii::app()->session['layout']=$layout_name;
              Yii::app()->session['country_short_name']=$_REQUEST['country'];
              Yii::app()->session['city_short_name']=$_REQUEST['city'];
              Yii::app()->session['city_id']=$_REQUEST['id'];
              Yii::app()->theme=Yii::app()->session['layout'];
              
              $f='1';
             $criteria=new CDbCriteria;
             $criteria->select='*';  // only select the 'title' column
             //$criteria->condition="is_featured='".$f."'";
             $data=  Product::model()->findAll($criteria);
            
             
             $product=array();
             $images=array();
             foreach($data as $products)
             {
                  $product_id=$products->product_id;
                    $criteria2=new CDbCriteria;
                 $criteria2->select='*';  // only select the 'title' column
                 $criteria2->condition="product_id='".$product_id."'";
                $imagedata=  ProductImage::model()->findAll($criteria2);
                 $images=array();
                 //$imagedata= ProductImage::model()->findAll($criteria);
                    foreach($imagedata as $img)
                    {
                        //$featured_products=array();
                      $images[]=array('product_image_id'=>$img->product_image_id,
                                                                            'image_large'=>$img->image_large,
                                                                         'image_small'=>$img->image_small,
                                                                                       );
                     
                    }
                    
                    
                    
                    
                    
                 $product[]=array(
                     'product_id'=>$products->product_id,
                     'product_name'=>$products->product_name,
                     'product_description'=>$products->product_description,
                     'product_price'=>$products->product_price,
                     'image'=>$images
                     
                 );
                
           
           
                   
             }
             //print $product;
            // print_r($product);
             //exit();
             
             //echo $featured_product_id=$data->product_id;
            
            //print_r($criteria);
                
              $this->render('storehome',array('product'=>$product)
                      );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params["'adminEmail'=>'ubaidullah@darussalampk.com'"],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                        {
				
                            if(Yii::app()->user->isSuperAdmin)
                            {
                            $this->redirect(array('user/admin'));
                            }
                            if(Yii::app()->user->isAdmin)
                            {
                                $this->redirect(array('user/index'));
                            }
                            if(Yii::app()->user->isCustomer)
                            {
                                $this->redirect(array('site/index'));
                            }
                        }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        
        public function actionMail()
        {
            
            print_r(Yii::app()->email->send('ubaidullah@darussalampk.com','ubaidullah@darussalampk.com','hellow','whatasdf'));
           
				
        }
        
        
}