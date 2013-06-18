<div id="right_description">
    <h4>Most Recent Customer Reviews</h4>
    <?php
    if (!empty($product->product_reviews)) {
        foreach ($product->product_reviews as $rev) {
            echo CHtml::openTag("div", array("class" => "stars_description"));
            echo CHtml::openTag("p");
            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
            //$this->dtdump($product);
            echo $rev->reviewType($rev->rating);
            echo CHtml::closeTag("p");
            echo CHtml::openTag("article");
            echo!empty($rev->reviews) ? $rev->reviews : "";
            echo CHtml::closeTag("article");
            echo CHtml::openTag("section");
            echo 'Published ' . $rev->calculateRemTime() . "ago by ";
            echo!empty($rev->user->userProfiles->last_name) ? $rev->user->userProfiles->last_name : $rev->user->user_email;
            echo CHtml::closeTag("section");
            echo CHtml::closeTag("div");



//        $this->widget('CStarRating', array(
//            'name' => 'rating' . $rev->reviews_id,
//            'minRating' => 1,
//            'maxRating' => 5,
//            'starCount' => 5,
//            'value' => $rev->rating,
//            'readOnly' => TRUE,
//        ));
        }
    } else {
        echo CHtml::openTag("div", array("class" => "stars_description"));
        echo CHtml::openTag("article");
        echo 'No Reviews Yet';
        echo CHtml::closeTag("article");
        echo CHtml::openTag("section");
        echo 'Be the first person to give the comment for this product';
        echo CHtml::closeTag("section");
        echo CHtml::closeTag("div");
    }

    $detail_img = $product->no_image;
    if (!empty($product->productProfile[0])) {
        if (!empty($product->productProfile[0]->productImages[0])) {
            $detail_img = CHtml::image($product->productProfile[0]->productImages[0]->image_url['image_large'], '', array('width' => '254px', 'height' => '404px'));
        } else {
            $detail_img = CHtml::image($product->no_image, '', array('width' => '254px', 'height' => '404px'));
        }
    }
    echo CHtml::link('Add Comments', Yii::app()->createUrl(''), array("class" => "topopup"));
    ?>
    <!--    <div class="stars_description">
            <p><?php //echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");          ?> I didn't understand the hype</p>
            <article>Read it for the second time after 10 years, but found that i didn't love it as much as i remembered. <a href="#">Read More</a></article>
            <section>Published 1 day ago by Audrey Miller.</section>
        </div>-->
</div>
<div id="toPopup"> 
    <div class="close" style="margin:-36px 50px;"></div>
    <div id="popup_content">
        <p>
            <?php
            echo $detail_img;
            ?>
        </p>
        <div class="para">
            <h6><?php echo $product['product_name']; ?></h6>
            <div class="main_div">

            </div>

            <?php
            /**
             * product comments will be called from here
             * 
             */
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'action' => $this->createUrl('/web/user/ProductReview'),
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>




            <?php
            $modelC = new ProductReviews;
            $pid = $product->product_id;

            if (Yii::app()->user->id != NUll) {
                echo $form->textArea($modelC, 'reviews', array('maxlength' => 350, 'rows' => '2', 'cols' => '67'));
            } else {
                echo $form->textArea($modelC, 'reviews', array('maxlength' => 350, 'rows' => '2', 'cols' => '67', 'readonly' => 'readonly'));
            }

            echo $form->hiddenField($modelC, 'product_id', array('value' => $pid));
            ?>

            <?php echo $form->checkBox($modelC, 'is_email'); ?>
            <span>Send me an email for each new comment.</span>
            <?php
            if (Yii::app()->user->id != NUll) {
                echo CHtml::submitButton('Add Comments', array('class' => 'user_login_button', "style" => "width:150px;margin:1px 100px 0px"));
            } else {
                echo CHtml::submitButton('Add Comments', $htmlOptions = array('class' => 'user_login_button', 'disabled' => 'disabled', "style" => "width:150px;margin:1px 100px 0px"));
            }
            ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>
</div>
</div>