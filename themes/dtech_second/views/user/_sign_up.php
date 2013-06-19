<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/form.css');
?>

<div class="form_container">
    <div class="row_left_form row_center_form" style="min-height: 430px;" >
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableClientValidation' => TRUE,
        ));
        ?>
        <div class="shipping_address_heading">
            <h2>Create Your Account</h2>
            <div class="clear"></div>
            <article><span>*</span>Mandatory Fields</article>
        </div>
        <?php //echo CHtml::submitButton($model->isNewRecord ? 'Sign Up' : 'Save', array('class' => 'row_button')); ?>

        <div class="row_input">
            <div class="row_text">
                <article></article>
            </div>
            <div class="row_input_type">
                <div style="color: red;font-size:13px;">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            </div>

        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'user_name'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'user_name', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'user_name');      ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'user_email'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'user_email', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'user_email');      ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'user_password'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'user_password', array('class' => 'row_text_type')); ?>
                <?php //echo $form->passwordField($model, 'user_password', array('class' => 'row_text_type', 'onKeyUp' => 'javascript:validata_password(this.value)')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'user_password');      ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'user_password2'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'user_password2', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'user_password2');      ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article>Special Offers</article>
            </div>
            <div class="row_input_type">
                <?php
                echo $form->checkBox($model, 'special_offer');
                ?>
                <span style="color:#3b3b3b; font-size:12px;">
                    Email me for new and special offers from Darussalam
                </span>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'special_offer');      ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'agreement_status'); ?>*</article>
            </div>
            <div class="row_input_type">
                <?php echo $form->checkBox($model, 'agreement_status'); ?>
                <span style="color:#3b3b3b; font-size:12px;">
                    I agree with Darussalam's Website Terms and conditions
                </span>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'agreement_status');      ?></article>
            </div>
        </div>
        <div class="row_input">
            <div class="row_input_type">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Sign Up' : 'Save', array('class' => 'row_button')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
<script>
    function validata_password()
    {
        dtech.custom_alert('Quantity should be Numeric....!');
    }
</script>