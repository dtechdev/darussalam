<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/form.css');
?>
<div class="form_container">
    <div class="row_left_form row_center_form row_signup_form" style="min-height: 430px;" >

        <div class="shipping_address_heading">
            <h2>Shipping Address</h2><article><span>*</span>Mandatory Fields</article>
        </div>
        <input type="button" value="Save" class="secure_button" />
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>Address Line 1</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>Address Line 2</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>Country</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>State / Province</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>City</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
        <div class="secure_input">
            <div class="secure_text">
                <article><span>*</span>Zipcode</article>
            </div>
            <div class="secure_input_type">
                <input type="text" class="secure_text_type" />
            </div>
        </div>
    </div>
</div>