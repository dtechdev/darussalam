<!DOCTYPE html>
<html>
    <head>
        <title>Darussalam</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/popup_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/footer_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/login_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/side_bar.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/dtech_new.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/script.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                dtech_new.toggleLogin();
                dtech_new.toggleSideBar();
                dtech_new.footerToggle();
                dtech_new.changeBookImgHover();
            });
        </script>
    </head>
    <body>
        <div id="wraper">
            <header>
                <div id="left_header">
                    <a href="javascript:void(0)">
                        <?php
                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/pak_flag_img_03.png");
                        ?>
                        <span>Change Country</span>                       
                        <?php
                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/pak_down_arrow_img_03.png");
                        ?>
                    </a>    
                </div>
                <div id="right_header">
                    <span><a href="#">Sign Up</a></span>
                    <span>
                        <div id="login_contain">
                            <a href="#" id="login_btn"><span>Login</span></a>
                            <div style="clear:both"></div>
                            <div id="login_bx">                
                                <form id="login_frm">
                                    <fieldset id="body">
                                        <div id="login_pointer">
                                        </div>
                                        <fieldset>
                                            <label for="email">User Name</label>
                                            <input type="text" name="email" id="email" />
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" />
                                        </fieldset>
                                    </fieldset>
                                    <input type="button" value="User Login" class="user_login_btn" />
                                </form>
                            </div>
                        </div>
                    </span>
                    <span><a href="#">Contact Us</a></span>
                    <span><a href="#">Blog</a></span>
                </div>
            </header>
            <div id="banner">
                <div id="upper_banner">
                    <div class="logo">
                        <a href="#">

                            <?php
                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/logo_img_03.png");
                            ?>
                        </a>
                    </div>
                    <div class="search_with_box">
                        <div id="search-box">
                            <form action='/search' id='search-form' method='get' target='_top'>
                                <button id='search-button' type='submit'><span>Search</span></button>
                                <input id='search-text' name='q' placeholder='type here' type='text'/>

                                <?php
                                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/search_03.png");
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="cart_part">
                        <div class="add_to_cart">
                            <ul>
                                <li>
                                    <a href="#">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_03.png");
                                        ?>
                                    </a>
                                    <ul class="sub-menu">
                                        <div id="pointer">
                                        </div>
                                        <h1>My Shopping Bag</h1>
                                        <div class="sub-sub-menu">
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                            <h2>Moon Split</h2>
                                            <span>5,96 PKR</span>
                                        </div>
                                        <div class="sub-sub-menu">
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                            <h2>Moon Split</h2>
                                            <span>5,96 PKR</span>
                                        </div>
                                        <div class="sub-sub-menu">
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                            <h2>Moon Split</h2>
                                            <span>5,96 PKR</span>
                                        </div>
                                        <div class="total">
                                            <img src="" />
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/total_little_img_03.png");
                                            ?>
                                            <h3>TOTAL:</h3>
                                            <h4>16,39 PKR</h4>
                                        </div>
                                        <div id="check_out_pointer">
                                        </div>
                                        <input type="button" value="CHECKOUT" class="check_out" />
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="wishlist">
                            <a href="#">

                                <?php
                                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/wishlist_img_03.png");
                                ?>
                            </a>
                            <span>500</span>
                        </div>
                    </div>
                </div>
                <div id="below_banner">
                    <div id="bar">
                        <div id="container">
                            <div id="sideBarContainer">
                                <a href="#" id="sideBarButton">

                                    <?php
                                    echo CHtml::image(Yii::app()->theme->baseUrl . "/images/navigation_img_02.png");
                                    ?>
                                    <em></em>
                                </a>
                                <div style="clear:both"></div>
                                <div id="sideBarBox">                
                                    <div id="sideBarForm">
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
                                                    <li><a 500href="#">Fatawa</a>
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
                            <a href="javascript:void(0)" onClick="underbestsHow()">

                                <?php
                                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/best_sellers_img_03.png");
                                ?>
                            </a>
                            <div class="under_best_seller">

                                <?php
                                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/crown_img_03.png", '', array("class" => "crown_img"));
                                ?>
                                <h1>Best Sellers</h1>
                                <div class="quran_pen">
                                    <div class="quran_img">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/quran_pen_img_03.png");
                                        ?>
                                    </div>
                                    <div class="quran_text">
                                        <h2>Quran Pen</h2>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
                                        <article>

                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                                            ?>
                                            (7)
                                        </article>
                                    </div>
                                </div>
                                <div class="shop_up">
                                    <input class="shop_now_arrow" type="button" value="Shop Now >" />
                                </div>
                                <div class="quran_pen">
                                    <div class="quran_img">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/quran_pen_img_03.png");
                                        ?>
                                    </div>
                                    <div class="quran_text">
                                        <h2>Quran Pen</h2>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
                                        <article>

                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                                            ?>
                                            (7)
                                        </article>
                                    </div>
                                </div>
                                <div class="shop_up">
                                    <input class="shop_now_arrow" type="button" value="Shop Now >" />
                                </div>
                                <div class="quran_pen">
                                    <div class="quran_img">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/quran_pen_img_03.png");
                                        ?>
                                    </div>
                                    <div class="quran_text">
                                        <h2>Quran Pen</h2>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
                                        <article>

                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                                            ?>
                                            (7)
                                        </article>
                                    </div>
                                </div>
                                <div class="shop_up">
                                    <input class="shop_now_arrow" type="button" value="Shop Now >" />
                                </div>
                                <div class="quran_pen">
                                    <div class="quran_img">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/quran_pen_img_03.png");
                                        ?>
                                    </div>
                                    <div class="quran_text">
                                        <h2>Quran Pen</h2>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
                                        <article>

                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                                            ?>
                                            (7)
                                        </article>
                                    </div>
                                </div>
                                <div class="shop_up">
                                    <input class="shop_now_arrow" type="button" value="Shop Now >" />
                                </div>
                                <div class="quran_pen">
                                    <div class="quran_img">

                                        <?php
                                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/quran_pen_img_03.png");
                                        ?>
                                    </div>
                                    <div class="quran_text">
                                        <h2>Quran Pen</h2>
                                        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
                                        <article>

                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                                            ?>
                                            (7)
                                        </article>
                                    </div>
                                </div>
                                <div class="shop_up">
                                    <input class="shop_now_arrow" type="button" value="Shop Now >" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            echo $content;
            ?>
            <script>
// 2010-03-10, 2010-10-23
// change the position of a “div#x0648e” element.

            var posY = 300; // verticle position from the top of the page
            var chasingFactor = .05; // the closing-in factor to desired position per update
            var updateFrequency = 50; //milisecond
            var idleCheckFrequency = 1 * 1000; //milisecond

            var yMoveTo = 0;
            var ydiff = 0;

            var g = document.getElementById("x0648e");
            g.style.position = "absolute";
            g.style.zIndex = "2";
            g.style.top = "34%";
            g.style.left = "1ex";
            g.style.fontSize = "7ex";
            g.style.color = "red";

            function ff() {
                // compute the distance user has scrolled the window
                if (navigator.appName == "Microsoft Internet Explorer") {
                    ydiff = yMoveTo - document.documentElement.scrollTop;
                } else {
                    ydiff = yMoveTo - window.pageYOffset;
                }
                if (Math.abs(ydiff) > 9) {
                    yMoveTo -= Math.round(ydiff * chasingFactor);
                    g.style.top = (yMoveTo + posY).toString() + "px";
                    setTimeout("ff()", updateFrequency);
                } else {
                    setTimeout("ff()", idleCheckFrequency);
                }
            }

            window.onload = ff;
            </script>
            <script>
                function underbestsHow() {
                    $(".under_best_seller").toggle('fast');
                }
            </script>
    </body>
</html>
