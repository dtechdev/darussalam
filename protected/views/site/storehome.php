<h1>BROWSE BY CATEGORY</h1>

<div class="browse">
    <?php
      foreach($segments_footer_cats as $cats) :
            
    ?>
    <div class="section_list">
        <ul>
            <?php
                foreach($cats as $cat_id=>$cat){
                    echo CHtml::openTag("li");
                        echo CHtml::link($cat, $this->createUrl('/web/product/allproducts'));
                    echo CHtml::closeTag("li");
                    
                }
            ?>
  
        </ul>
    </div>
    <?php
    endforeach;
    ?>

  
</div>    
<div id="left_books">

    <h2>FEATURED PRODUCTS <span><?php echo CHtml::link('( VIEW ALL )', array('/web/product/featuredProducts', 'country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']), array('class' => 'blue-title-link')); ?></span></h2>

    <?php
    foreach ($product as $featured)
    {
        $name = $featured['product_name'];
        foreach ($featured['image'] as $image)
        {
            ?>
            <div class="books">
                <a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $featured['product_id'])); ?>"><img src="<?php echo Yii::app()->baseUrl . '/images/product_images/' . $image['image_small']; ?>" alt="Pen QURAN PAK" /></a>
                <p><a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $featured['product_id'])); ?>"><?php echo $name; ?></a></p>
            </div>
            <?php
            break;
        }
    }
    ?>
</div>
<div id="right_books">
    <h2>BEST SELLING BOOKS <span><?php echo CHtml::link('( VIEW ALL )', array('/web/product/bestSellings', 'country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']), array('class' => 'blue-title-link')); ?></h2>

    <?php
    foreach ($best_sellings as $bests)
    {
        $pro_name = $bests['product_name'];
        $orders = $bests['totalOrder'];
        foreach ($bests['image'] as $image)
        {
            ?>
            <div class="books2">
                <a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $bests['product_id'])); ?>"><img src="<?php echo Yii::app()->baseUrl . '/images/product_images/' . $image['image_small']; ?>" alt="Pen QURAN PAK" /></a>
                <p><a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $bests['product_id'])); ?>"><?php echo $pro_name . '(' . $orders . ')'; ?></a></p>
            </div>
            <?php
            break;
        }
    }
    ?>
</div>
