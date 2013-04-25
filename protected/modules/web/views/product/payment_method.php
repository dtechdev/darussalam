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
            <div class="left_method">
                <h3>Credit Card</h3>
                <div class="under_left_method">
                    <p>We accept Master Card, Visa, Discover and American Express.</p>
                    <p><span>*</span> First Name</p>
                    <input type="text" class="payment_text" />
                    <p><span>*</span> Last Name</p>
                    <input type="text" class="payment_text" />
                    <p><span>*</span>  Card Number <i>(the 16 digits on the front of the card)</i></p>
                    <input type="text" class="small_text" />
                    <input type="text" class="small_text" />
                    <input type="text" class="small_text" />
                    <input type="text" class="small_text" />
                    <div class="payment_small_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/visa_big_img_03.png" alt="Visa" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/master_card_big_img_03.png" alt="Master Mind" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/discover_big_img_03.png" alt="Discover" class="visa_img" /></a>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/americanexpress_big_img_03.png" alt="American Express" /></a>
                    </div>
                    <p><span>*</span> CVS or CVS <i>(Last 3 digits on back of card, Amex: 4 gigit code on front)</i></p>
                    <input type="text" class="small2_text" />
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/card_img_03.png" alt="scratch card" class="card_img" />
                    <p><span>*</span> Expiration Date</p>
                    <div class="payment_option">
                        <p class="monthnyear"> Month </p>
                        <select>
                            <option> - </option>
                            <option> 1 </option>
                            <option> 2 </option>
                        </select>
                        <span> Year </span>
                        <select>
                            <option> - </option>
                            <option> 1 </option>
                            <option> 2 </option>
                        </select>
                    </div>
                </div>
                <div class="paypal">
                    <span>PayPal</span>
                    <a href="<?php echo $this->createUrl('/web/product/confirmorder', array('type' => 'paypal')); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/paypal_img_03.png" alt="paypal img" class="paypal_img" /></a>
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
                            <td class="left_prefix"><select><option>Mr. </option><option>Mrs. </option></select></td>
                            <td class="right_prefix"><input type="text" class="small_right_text"></td>
                       	</tr>
                    </table>
                    <p><span>*</span> Last Name</p>
                    <input type="text" class="payment_text" />
                    <p><span>*</span> Address Line 1</p>
                    <input type="text" class="payment_text" />
                    <p><span>*</span> Address Line 2</p>
                    <input type="text" class="payment_text" />
                    <p><span>*</span> Country</i></p>
                    <div class="country_option">
                        <select>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <p><span>*</span> City</p>
                    <input type="text" class="payment_text" placeholder="Enter Your City" />
                    <table width="100%" class="state_table">
                        <tr>
                            <td class="left_state"><span>*</span> State / Province</td>
                            <td class="right_state"><span>*</span> Zip / Postal Code</td>
                        </tr>
                        <tr>
                            <td class="left_state"><select><option>Select State</option><option>Select State</option><option>Select State</option></select></td>
                            <td class="right_state"><input type="text" class="zip_text"></td>
                        </tr>
                    </table>
                    <p><span>*</span> Telephone Number <i>(10 gigits only, no dashes)</i></p>
                    <input type="text" class="payment_text" placeholder="Enter Your City" />
                </div>
            </div>
            <input type="button" value="Continue" name="continue" class="continue" />
            <a href="<?php echo $this->createUrl('/web/product/confirmorder', array('type' => 'card')); ?>">Credit Card</a>
        </div>
    </div>
