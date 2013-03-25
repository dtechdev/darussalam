Some email vars:<br>
<?php //$this->widget('application.extensions.email.debug'); ?>

Email:<?php echo $email->subject ?>
<br>
From:<?php echo $email->from ?>
To:<?php echo $email->to ?>
<br>
<?php echo 'yahoo email was sent but no sure.....'; 
Yii::app()->user->setFlash('myMailView','Thank you for contacting us. We will respond to you as soon as possible.');

//$this->redirect(Yii::app()->user->returnUrl);
echo CHtml::Link('go back to Home....',Yii::app()->createUrl('site/login'));
 
exit(); ?>


