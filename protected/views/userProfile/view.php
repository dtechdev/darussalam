<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->user_profile_id,
);

$this->renderPartial("/common/_left_menu");
?>


<div class="pading-bottom-5">
    <div class="left_float">
       <h1>View User Profile #<?php echo $model->user_profile_id; ?></h1>
    </div>

    <?php /* Convert to Monitoring Log Buttons */ ?>
    <div class = "right_float">
        <span class="creatdate">
            <?php
            echo CHtml::link("Edit", $this->createUrl("update", array("id" => $model->primaryKey)), array('class' => "print_link_btn"))
            ?>
        </span>
    </div>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_profile_id',
		'user_id',
		'first_name',
		'last_name',
		'address',
		'contact_number',
		'city',
		'gender',
		'avatar',
	),
)); ?>
