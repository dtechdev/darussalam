<?php
/* @var $this UserRoleController */
/* @var $model UserRole */

$this->breadcrumbs = array(
    'User Roles' => array('index'),
    $model->role_id,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View User Role #<?php echo $model->role_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'role_title',
    ),
));
?>
