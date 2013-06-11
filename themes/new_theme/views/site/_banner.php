<div id="banner">
    <div class="logo">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/logo_img_03.png", 'Logo'), $this->createDTUrl('site/index'));
        ?>
    </div>
    <div class="search_with_box">
        <div id="search-box">

            <form action='/search' id='search-form' method='get' target='_top'>
                <?php
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'serach_field',
                    'source' => $this->createUrl("/web/search/dosearch"),
                    // additional javascript options for the autocomplete plugin
                    'options' => array(
                        'minLength' => '1',
                    ),
                    'htmlOptions' => array(
                        'id' => 'search-text',
                        'value' => (isset($_POST['serach_field']) ? $_POST['serach_field'] : ""),
                        'placeholder' => 'type here',
                    ),
                ));
                ?>

                <button id='search-button' type='submit'><span>Search</span></button>
                <input id='search-text' name='q' placeholder='type here' type='text'/>
                <img src="images/search_03.png" />
            </form>
        </div>
    </div>
    <div class="cart_part">
        <div class="add_to_cart">
            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/shopping_cart_03.png" /></a>
        </div>
        <div class="wishlist">
            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/wishlist_img_03.png" /></a>
        </div>
    </div>
    <div id="bar">
        <div id="container">
            <div id="loginContainer">
                <a href="#" id="loginButton"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/navigation_img_02.png" /><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <div id="loginForm">
                        <ul class="makeMenu">
                            <h1>Browse Through</h1>
                            <li class="quran"><a href="#">Quran</a>
                                <ul>
                                    <h2>Islamic Books</h2>
                                    <li><a href="#">Aqeedah</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography of the Prophet</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fatawa</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fiqh</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Books</a>
                                <p><a href="#">Islamic Books</a></p>
                                <p><a href="#">General Books</a></p>
                                <ul>
                                    <h2>Islamic Books</h2>
                                    <li><a href="#">Aqeedah</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography of the Prophet</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fatawa</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fiqh</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Educational Toys</a>
                                <p><a href="#">Electronic Toys</a></p>
                                <p><a href="#">Wooden Blocks</a></p>
                                <ul>
                                    <h2>Islamic Books</h2>
                                    <li><a href="#">Aqeedah</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography of the Prophet</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fatawa</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fiqh</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Other Items</a>
                                <p><a href="#">Islamic Gifts</a></p>
                                <p><a href="#">Hijab and Sacarfs</a></p>
                                <ul>
                                    <h2>Islamic Books</h2>
                                    <li><a href="#">Aqeedah</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography of the Prophet</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Biography</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fatawa</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                    <li><a href="#">Fiqh</a>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="full_storage"><a href="#">Full Store Cateloge</a><span> > </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="best_seller">
            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/best_sellers_img_03.png" /></a>
        </div>
        <div id="footer_part">
            <div id="header_img">
                <div class="toggleBtnHolder">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/footer_open_img_03.png" class="btnToggle">
                    <div id="dvText">
                        <div id="div_text">
                            <div id="left_footer">
                                <h1>Connect to DARUSSALAM</h1>
                                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/f_img_06.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "facebook"))); ?>
                                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/t_img_06.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "twitter"))); ?>
                                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/in_img_06.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "linkedin"))); ?>
                                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/google_img_06.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "google"))); ?>
                                <div id = "left_under_footer">
                                    <li><img src = "<?php echo Yii::app()->theme->baseUrl ?>/images/phone_img_06.png" /> +(92) 42 35254654 - 54</li>
                                    <li><img src = "<?php echo Yii::app()->theme->baseUrl ?>/images/mail_img_06.png" />
                                        <?php echo CHtml::mailto("support@darussalam.com", "support@darussalam.com");
                                        ?>
                                    </li>
                                    <li><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/home_img_06.png" /> Darussalam Publishers</li>
                                </div>
                                <p>is a multilingual international Islamic publishing house, with headquarters in Riyadh, Kingdom of Saudi Arabia.</p>
                            </div>
                            <div id="middle_footer">
                                <h1>Navigation</h1>
                                <?php
                                $not_required_pages = array("Contact Us");
                                $pages = Pages::model()->getPages();
                                foreach ($pages as $page) {
                                    if (!in_array($page->title, $not_required_pages)) {
                                        echo CHtml::openTag("article");
                                        echo CHtml::link($page->title, Yii::app()->createUrl('/web/page/viewPage/', array("id" => $page->id)));
                                        echo CHtml::closeTag("article");
                                    }
                                }
                                echo CHtml::openTag("article");
                                echo CHtml::link('Contact Us', $this->createUrl('/site/contact'));
                                echo CHtml::closeTag("article");
                                if (!Yii::app()->user->isGuest) {
                                    echo CHtml::openTag("article");
                                    echo CHtml::link('User Profile', $this->createUrl('/web/userProfile', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                                    echo '<br>';
                                    echo CHtml::link('Customer History', $this->createUrl('/web/user/customerHistory', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                                    echo CHtml::closeTag("article");
                                }
                                ?>
                            </div>
                            <div id="right_footer">
                                <h1>What's New?</h1>
                                <p style='color: #888888;'>D-Tech - Working on technologies</p>
                                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                                <p style='color: #888888;'>D-Tech - Working on technologies</a></p>
                                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                                <section>&copy; 2013 Darussalam, Inc. All Rights Reserved.</section>
                            </div>
                        </div>
                        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/down_footer_img_03.png" class="btnToggle" id="div_img" />
                    </div>
                </div>
            </div>
        </div>
        <div class="left_bar">
            <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/banner_img_02.png" />
        </div>
        <div id="right_banner">
            <h2>Activites</h2>
            <div class="small_book">
                <div class="small_book_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_book_1_03.jpg" alt="scientific book" />
                </div>
                <div class="small_book_content">
                    <p><a href="#">Talha Jutt </a>recommended this book</p>
                    <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                    <p class="minutes">about 2 seconds ago</p>
                </div>
            </div>
            <div class="small_book">
                <div class="small_book_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_book_2_03.jpg" alt="scientific book" />
                </div>
                <div class="small_book_content">
                    <p><a href="#">Zain Khan </a>recommended this book</p>
                    <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                    <p>about 2 seconds ago</p>
                    <p class="blak">Sunt in culpa quie officia deserunt molit anim id est laborum sind occaecat.</p>
                </div>
            </div>
            <div class="small_book">
                <div class="small_book_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_book_3_03.jpg" alt="scientific book" />
                </div>
                <div class="small_book_content">
                    <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                    <p>7,165 people recommended this book</p>
                </div>
            </div>
            <div class="small_book">
                <div class="small_book_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_book_1_03.jpg" alt="scientific book" />
                </div>
                <div class="small_book_content">
                    <p><a href="#">Talha Jutt </a>recommended this book</p>
                    <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                    <p class="minutes">about 2 seconds ago</p>
                </div>
            </div>
            <div class="small_book">
                <div class="small_book_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_book_1_03.jpg" alt="scientific book" />
                </div>
                <div class="small_book_content">
                    <p><a href="#">Talha Jutt </a>recommended this book</p>
                    <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                    <p class="minutes">about 2 seconds ago</p>
                </div>
            </div>
        </div>
    </div>
</div>