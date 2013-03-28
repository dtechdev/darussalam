<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
 $user_id = Yii::app()->user->id;
//$this->layout='column2';
if (Yii::app()->user->isAdmin || Yii::app()->user->isSuperAdmin) {
    $this->menu = array(
       // echo chtml::link(CHtml::encode('Change Your Profile'),array('changeProfile','id'=>$model->id))
        array('label'=>'Update Profile','url'=>array('/user/updateprofile/id/'.$user_id)),
        array('label' => 'Create Layout', 'url' => array('/layout/create')),
        array('label' => 'Manage Layout', 'url' => array('/layout/admin')),
        array('label' => 'Create User', 'url' => array('/user/create')),
        array('label' => 'Manage User', 'url' => array('/user/admin')),
        array('label' => 'Create City', 'url' => array('/city/create')),
        array('label' => 'Manage City', 'url' => array('/city/admin')),
        array('label' => 'Create Country', 'url' => array('/country/create')),
        array('label' => 'Manage Country', 'url' => array('/country/admin')),
        array('label'=>'Create Product', 'url'=>array('/product/create')),
	array('label'=>'Manage Product', 'url'=>array('/product/admin')),
        array('label'=>'Create Author', 'url'=>array('/author/create')),
	array('label'=>'Manage Author', 'url'=>array('/author/admin')),
        array('label'=>'Create Language', 'url'=>array('/language/create')),
	array('label'=>'Manage Language', 'url'=>array('/language/admin')),
        array('label'=>'Create Categories', 'url'=>array('/categories/create')),
	array('label'=>'Manage Categories', 'url'=>array('/categories/admin')),
    );
}
if(Yii::app()->user->isCustomer)
{
   
    $this->menu=array(array('label'=>'Update Profile','url'=>array('/user/updateprofile/id/'.$user_id)));
}
?>

<?php
$site_id = Yii::app()->session['site_id'];

$countries = Country::model()->findAll(array('condition' => 'site_id="' . $site_id . '"'));
$total = count($countries);
//$n=0;
for ($i = 0; $i < $total; $i++) {

    echo $country_name = $countries[$i]['country_name'];
    $country_short_name = $countries[$i]['short_name'];
    print "<br />";
    $country_id = $countries[$i]['country_id'];
    $cities = City::model()->findAll(array('condition' => 'country_id="' . $country_id . '"'));
    $totalcity = count($cities);
    //$n=0;
    for ($j = 0; $j < $totalcity; $j++) {
        $city_name = $cities[$j]['city_name'];
        $city_short_name = $cities[$j]['short_name'];
        $city_id = $cities[$j]['city_id'];
        echo CHtml::link($city_name, array('/site/storehome', 'country' => $country_short_name, 'city' => $city_short_name, 'id' => $city_id), array('class' => 'blue-title-link'));
    }
    print "<br />";
}
?>