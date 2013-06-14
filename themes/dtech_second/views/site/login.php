<div id="login_content">
    <?php 
       echo CHtml::image(Yii::app()->theme->baseUrl."/images/shopping_cart_img_03.png"); 
        ?>
    <h6>Already a member?</h6>
    <div class="login_part">
        <p>User Name</p>
        <input type="text" class="text" />
        <p>Password</p>
        <input type="password" class="text" />
        <article><a href="#">Forget Password?</a></article>
        <div id="main_login_pointer">
        </div>
        <input type="button" value="User Login" class="user_login_button" />
    </div>
</div>