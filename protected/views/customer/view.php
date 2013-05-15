<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->user_id,
);

$this->renderPartial("/common/_left_menu");
?>


<div class="pading-bottom-5">
    <div class="left_float">
        <h1>View User #<?php echo $model->user_id; ?></h1>
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
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'user_email',
        'user_password',
        'role_id',
        'status_id',
        'city_id',
        'is_active',
        'site_id',
    ),
));
?>
