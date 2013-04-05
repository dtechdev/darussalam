<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div id="banner">
     	<div id="main_banner">
        	<div id="left_banner">
                <a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/darussalam-inner-logo.png" alt="logo" /></a>
                <nav>
                    <ul>
                        <li><a href="<?php echo $this->createUrl('/site/page',array('view'=>'about'))?>" >About Us</a></li>
                        <li><a href="<?php echo $this->createUrl('/site/contact')?>">Contact us</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </nav>
                <div class="txt">
                	<div class="search_img">
                    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/search_img_03.jpg" alt="search img" /></a>
                   	</div>
                	<input type="text" name="" value="" class="txt_bar" />
                	<input type="button" value="Search" name="" class="txt_btn" />
              	</div>
          	</div>
             <div id="right_banner">
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_1_03.jpg" alt="scientific book" />
                   	</div>
                    <div class="small_book_content">
                        <p><a href="#">Talha Jutt </a>recommended this book</p>
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p class="minutes">about 2 seconds ago</p>
                   	</div>
                </div>
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_2_03.jpg" alt="scientific book" />
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
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_3_03.jpg" alt="scientific book" />
                  	</div>
                    <div class="small_book_content">
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p>7,165 people recommended this book</p>
                   	</div>
                </div>
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_1_03.jpg" alt="scientific book" />
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
    <div id="content">
    	<div id="main_content">
        	<div id="left_content">
            	<h1>Over 1500 books for every type</h1>
            </div>
            <div id="right_content">
            	<ul>
                	<li><a href="#">Careers</a></li>
                    <li><a href="#">Becomes Our Partner</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section>
    	<div id="main_section">
          	<h1>BROWSE BY CATEGORY</h1>
            <div class="browse">
                <div class="section_list">
                    <ul>
                        <li><a href="#">Aqeedah</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Biography of the Prophet</a></li>
                        <li><a href="#">Children</a></li>
                        <li><a href="#">Fatawa</a></li>
                        <li><a href="#">Fiqh</a></li>
                    </ul>
                </div>
                
                <div class="section_list">
                    <ul>
                        <li><a href="#">General</a></li>
                        <li><a href="#">Hadith</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Islamic Culture</a></li>
                        <li><a href="#">Non-Muslim</a></li>
                        <li><a href="#">Worship</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">Packet or Set</a></li>
                        <li><a href="#">Qur'an</a></li>
                        <li><a href="#">Stories</a></li>
                        <li><a href="#">Supplication and Forgiveness</a></li>
                        <li><a href="#">Tafsir</a></li>
                        <li><a href="#">Women</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">Aqeedah</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Biography of the Prophet</a></li>
                        <li><a href="#">Children</a></li>
                        <li><a href="#">Fatawa</a></li>
                        <li><a href="#">Fiqh</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">General</a></li>
                        <li><a href="#">Hadith</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Islamic Culture</a></li>
                        <li><a href="#">Non-Muslim</a></li>
                        <li><a href="#">Worship</a></li>
                    </ul>
                </div>
          	</div>
          <?php echo $content; ?>
        </div>
    </section>
<?php $this->endContent(); ?>