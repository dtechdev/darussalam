<div id="book_content">
    <div id="book_main_content">
        <div class="left_book_main_content">
            <a href="index.html"><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam-inner-logo.png", '', array('alt' => 'logo')) ?></a>
        </div>
        <div class="search_box">
            <input type="text" placeholder="Search keywords or image ids..." value="" class="search_text" />
            <input type="button" name="" value="" class="search_btn" /><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/searching_img_03.jpg", '', array('class' => 'searching_img')) ?>
        </div>
        <nav>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
    </div>
</div>
<div id="accounts">
    <div id="account_detail">
        <h5>Account Details</h5>
        <div id="page-wrap">
            <div class="tabs">
                <div class="tab">

                    

                    <input type="radio" id="tab-1" name="tab-group-1" checked>
                    <label for="tab-1" class="tab1">Profile</label>
                    <div class="conten">
                        
                        <?php
                    $form = $this->beginWidget(
                            'CActiveForm', array('id' => 'upload-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                            )
                    );
                    ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                  <?php echo $form->errorSummary($model); ?>
                        <table width="100%">
                            <tr>
                                <td>
                                    <table width="90%">
                                        <tr class="account_row">
                                            <td class="account_left">Email:</td>
                                            <td class="account_right"><span>zoomarts@gmail.com</span></td>
                                        </tr>
                                        
                                        <tr class="account_row">
                                            <td class="account_left"></td>
                                            <td class="account_right"><a href="#">Change Password</a></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left" valign="top">Profile Picture</td>
                                            <td class="account_right"><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/searching_img_03.jpg", '', array('class' => 'searching_img')) ?><img src="talha_mujahid_img_03.png"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Change Image:</td>
                                            <td class="account_right"><?php echo $form->fileField($model, 'avatar'); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Prefix</td>
                                            <td class="account_right"><select class="account_prefix"><option>Mr.</option><option>Mrs.</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">First Name</td>
                                            <td class="account_right"><?php echo $form->textField($model,'first_name',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Last Name</td>
                                            <td class="account_right"><?php echo $form->textField($model,'last_name',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Date Of Birth</td>
                                            <td class="account_right"><?php echo $form->textField($model,'date_of_birth',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Address Line 1</td>
                                            <td class="account_right"><?php echo $form->textField($model,'address',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Address Line 2</td>
                                            <td class="account_right"><?php echo $form->textField($model,'address2',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Country</td>
                                            <td class="account_right"><select class="account_country"><option>Pakistan</option><option>1</option><option>1</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">City</td>
                                            <td class="account_right"><?php echo $form->textField($model,'city',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">State/Province</td>
                                            <td class="account_right"><select class="account_country"><option>Pakistan</option><option>1</option><option>1</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Zip/Postal Code</td>
                                            <td class="account_right"><?php echo $form->textField($model,'zip_code',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Telephone Number</td>
                                            <td class="account_right"><?php echo $form->textField($model,'contact_number',array('class'=>'account_text')); ?></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left"></td>
                                            <td class="account_right"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?><input type="button" value="Save" class="account_save"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                       <?php $this->endWidget(); ?> </table>
                    </div>
                    
                </div>
                <div class="tab">
                    <input type="radio" id="tab-2" name="tab-group-1">
                    <label for="tab-2">Shipping Address</label>
                    <div class="conten">
                        <table width="100%">
                            <tr>
                                <td>
                                    <table width="90%">
                                        <tr class="account_row">
                                            <td class="account_left">Prefix</td>
                                            <td class="account_right"><select class="account_prefix"><option>Mr.</option><option>Mrs.</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">First Name</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Last Name</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Date Of Birth</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Address Line 1</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Address Line 2</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Country</td>
                                            <td class="account_right"><select class="account_country"><option>Pakistan</option><option>1</option><option>1</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">City</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">State/Province</td>
                                            <td class="account_right"><select class="account_country"><option>Pakistan</option><option>1</option><option>1</option></select></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Zip/Postal Code</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left">Telephone Number</td>
                                            <td class="account_right"><input type="text" class="account_text"></td>
                                        </tr>
                                        <tr class="account_row">
                                            <td class="account_left"></td>
                                            <td class="account_right"><input type="button" value="Save" class="account_save"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div> 
                </div>
                <div class="tab">
                    <input type="radio" id="tab-3" name="tab-group-1">
                    <label for="tab-3">Preferences</label>
                    <div class="conten">
                        <p>Preferences</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>