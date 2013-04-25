<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
    </div>
</div>
<div id="payment_method">
    <div id="main_payment_method">
        <div class="top_payment_method">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/payment_method_img_03.png" alt="payment method" />
        </div>
        <div class="middle_payment_method">
            <div class="left_middle_payment_method">
                <h1>Secure Payments</h1>
                <h2>This is a secure 128 bit SSL encrypted payment</h2>
            </div>
            <div class="right_middle_payment_method">
                <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/norton_secured_img_03.png" alt="norton_secured" /></a>
            </div>
        </div>
        <div class="bottom_payment_method">
<!--                <form method="POST" action="<?php echo $this->createUrl('/web/Paypal/directpayment'); ?>">-->
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'card-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                    ));
            ?>

            <div class="left_method">
                <h3>Credit Card</h3>
                <div class="under_left_method">
                    <p>We accept Master Card, Visa, Discover and American Express.</p>
                    <p><span>*</span> First Name</p>

                    <?php echo $form->textField($model, 'first_name', array('class' => 'payment_text','value'=>'zahid')); ?>
                    <?php echo $form->error($model, 'first_name'); ?>


                    <p><span>*</span> Last Name</p>
                    <?php echo $form->textField($model, 'last_name', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                    <p><span>*</span> Card Type</p>
                    
                    <select>
                            <option>Visa</option>
                            <option>Master</option>
                            <option>Discover</option>
                            <option>American Express</option>
                        </select>

                    <?php echo $form->textField($model, 'card_type', array('class' => 'small2_text')); ?>
                    <?php echo $form->error($model, 'card_type'); ?>

                    <p><span>*</span>  Card Number <i>(the 16 digits on the front of the card)</i></p>
                    <?php echo $form->textField($model, 'card_number1', array('class' => 'small_text')); ?>
                    <?php echo $form->error($model, 'card_number1'); ?>
                    <?php echo $form->textField($model, 'card_number2', array('class' => 'small_text')); ?>
                    <?php echo $form->error($model, 'card_number2'); ?>
                    <?php echo $form->textField($model, 'card_number3', array('class' => 'small_text')); ?>
                    <?php echo $form->error($model, 'card_number3'); ?>
                    <?php echo $form->textField($model, 'card_number4', array('class' => 'small_text')); ?>
                    <?php echo $form->error($model, 'card_number4'); ?>


                    <div class="payment_small_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/visa_big_img_03.png" alt="Visa" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/master_card_big_img_03.png" alt="Master Mind" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/discover_big_img_03.png" alt="Discover" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/americanexpress_big_img_03.png" alt="American Express" /></a>
                    </div>

                    <p><span>*</span> CVS or CVS <i>(Last 3 digits on back of card, Amex: 4 gigit code on front)</i></p>

                    <?php echo $form->textField($model, 'cvc', array('class' => 'small2_text')); ?>
                    <?php echo $form->error($model, 'cvc'); ?>
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/card_img_03.png" alt="scratch card" class="card_img" />

                    <p><span>*</span> Expiration Date</p>
                    <div class="payment_option">
                        <p class="monthnyear"> Month </p>
                        <select name="exp_month">
                            <option> - </option>
                            <option> 01 </option>
                            <option> 02 </option>
                            <option> 03 </option>
                            <option> 04 </option>
                            <option> 05 </option>
                            <option> 06 </option>
                            <option> 07 </option>
                            <option> 08 </option>
                            <option> 09 </option>
                            <option> 10 </option>
                            <option> 11 </option>
                            <option> 12 </option>
                        </select>
                        <span> Year </span>
                        <select name="exp_year">
                            <option> - </option>
                            <option> 2013 </option>
                            <option> 2014 </option>
                            <option> 2015 </option>
                            <option> 2016 </option>
                            <option> 2017 </option>
                            <option> 2018 </option>
                            <option> 2019 </option>
                            <option> 2020 </option>
                            <option> 2021 </option>
                            <option> 2022 </option>
                            <option> 2023 </option>
                            <option> 2024 </option>
                            <option> 2025 </option>
                        </select>
                    </div>
                </div>
                <div class="paypal">
                    <span>PayPal</span>
                    <a href="<?php echo $this->createUrl('/web/Paypal/buy'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/paypal_img_03.png" alt="paypal img" class="paypal_img" /></a>
                </div>
                <div class="under_left_method">
                    <input type="checkbox" /><span class="payment_check"> Save your payment method for any future transactions</span>
                </div>
            </div>
            <div class="left_method">
                <h4>Shipping Address</h4>
                <p class="mandatory"><span>*</span> = Mandatory fields</p>
                <div class="under_left_method">
                    <table width="100%">
                       	<tr>
                            <td class="left_prefix"><span>*</span> Prefix</td>
                            <td class="right_prefix"><span>*</span> First Name</td>
                        </tr>
                        <tr>
                            <td class="left_prefix"><select name="shipping_prefix"><option>Mr. </option><option>Mrs. </option></select></td>
                            <td class="right_prefix">
                                <?php echo $form->textField($model, 'shipping_first_name', array('class' => 'small_right_text')); ?>
                                <?php echo $form->error($model, 'shipping_first_name'); ?>
                            </td>
                       	</tr>
                    </table>
                    <p><span>*</span> Last Name</p>
                    <?php echo $form->textField($model, 'shipping_last_name', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'shipping_last_name'); ?>
                    <p><span>*</span> Address Line 1</p>
                    <?php echo $form->textField($model, 'shipping_address1', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'shipping_address1'); ?>
                    <p><span>*</span> Address Line 2</p>
                    <?php echo $form->textField($model, 'shipping_address2', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'shipping_address2'); ?>
                    <p><span>*</span> Country</i></p>
                    <div class="country_option">
                        <select>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <p><span>*</span> City</p>
                    <?php echo $form->textField($model, 'shipping_city', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'shipping_city'); ?>
                    <table width="100%" class="state_table">
                        <tr>
                            <td class="left_state"><span>*</span> State / Province</td>
                            <td class="right_state"><span>*</span> Zip / Postal Code</td>
                        </tr>
                        <tr>
                            <td class="left_state"><select><option>Select State</option><option>Select State</option><option>Select State</option></select></td>
                            <td class="right_state">
                            <?php echo $form->textField($model, 'shipping_zip', array('class' => 'zip_text')); ?>
                            <?php echo $form->error($model, 'shipping_zip'); ?>
                        </tr>
                    </table>
                    <p><span>*</span> Telephone Number <i>(10 gigits only, no dashes)</i></p>
                    <?php echo $form->textField($model, 'shipping_phone', array('class' => 'payment_text')); ?>
                    <?php echo $form->error($model, 'shipping_phone'); ?>
                </div>
            </div>
            <?php echo CHtml::submitButton('continue',array('class'=>'continue')); ?>
<!--            <a href="<?php echo $this->createUrl('/web/product/confirmorder', array('type' => 'card')); ?>">Credit Card</a>-->
<?php $this->endWidget(); ?>
        </div>
    </div>
