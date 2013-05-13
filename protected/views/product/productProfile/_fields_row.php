<?php
/* mean it is called by ajax. */
if (!isset($display)) {
    $display = 'none';
}
$mName = "ProductProfile";
$relationName = "productProfile";
?>
<div class="grid_fields" style="display:<?php echo $display; ?>">


    <div class="field" style="width:50px">
        <?php
        if ($load_for == "view") {
            echo CHtml::activeHiddenField($model, '[' . $index . ']id');
        }

        echo CHtml::activeTextField($model, '[' . $index . ']item_code');
        ?>
    </div>

    <div class="field" style="width:80px">
        <?php
        $criteria = new CDbCriteria();
        $criteria->select = "language_id,language_name";
        $languages = Language::model()->findAll($criteria);
        echo CHtml::activeDropDownList($model, '[' . $index . ']language_id', CHtml::listData($languages, "language_id", "language_name"));
        ?>
    </div>
    <div class="field" style="width:60px">
        <?php
         echo CHtml::activeDropDownList($model, '[' . $index . ']discount_type',
                 array("fixed"=>"fixed","percentage"=>"percentage"));
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']discount_value');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']size');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']no_of_pages');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']binding');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']printing');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']paper');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']edition');
        ?>
    </div>
    <div class="field" style="width:50px">
        <?php
        echo CHtml::activeTextField($model, '[' . $index . ']isbn');
        ?>
    </div>



    <div class="del del-icon" >
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/plus.gif', 'Add'), '#', array(
            'class' => 'plus',
            'onclick' =>
            "
                
					u = '" . Yii::app()->controller->createUrl("loadChildByAjax", array("mName" => "$mName", "dir" => $dir, "load_for" => $load_for,)) . "&index=' + " . $relationName . "_index_sc;
                    add_new_child_row(u, '" . $dir . "', '" . $fields_div_id . "', 'grid_fields', true);
                    
                    " . $relationName . "_index_sc++;
                    return false;
                    "
        ));
        ?>
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/cross.gif', 'Delete'), '#', array('onclick' => 'delete_fields(this, 2, "#' . $relationName . '-form", ".grid_fields"); return false;', 'title' => 'sc'));
        ?>
    </div>

    <div class="clear"></div>
</div>
<div class="clear"></div>
