<?php
/* @var $this AuthorController */
/* @var $model Author */

$this->breadcrumbs = array(
    'Authors' => array('index'),
    $model->author_id,
);

if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>View Author #<?php echo $model->author_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'author_name',
    ),
));
?>
