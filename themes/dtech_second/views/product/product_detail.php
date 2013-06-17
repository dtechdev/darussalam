<?php
$this->webPcmWidget['filter'] = array('name' => 'DtechSecondSidebar',
    'attributes' => array(
        'cObj' => $this,
        'cssFile' => Yii::app()->theme->baseUrl . "/css/side_bar.css",
        ));
?>
<div id="left_description">
    <div id="image_detail">
        <div class="left_detail">
            <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/gems_and_jewels_book_03.png"); ?>
        </div>
        <div class="right_detail">
            <h1>Gems and Jewels</h1>
            <h2>Author: <span> Abdul Malik Mujahid</span></h2>
            <p>
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/stars_img_03.png"); ?>
                (7)</p>
            <article>Length :500 Pages</article>
            <div class="add_to_cart_button">
                <input type="button" value="Add to Cart >" class="add_to_cart_arrow" />
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/f_imgs_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "facebook")), array("onclick" => "dtech.doSocial('login-form',this);return false;")); ?>
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/bird_img_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "twitter")), array("onclick" => "dtech.doSocial('login-form',this);return false;")); ?>
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/p_img_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "google")), array("onclick" => "dtech.doSocial('login-form',this);return false;")); ?>
            </div>
        </div>
        <div class="product_detail">
            <h3>Product Detail</h3>
            <section>Product Details</section>
            <section>Hardcover: 416 pages</section>
            <section>Publisher: Harper Collins; 1st edition (March 2, 2004)</section>
            <section>Language: English</section>
            <section>ISBN-10: 0060391448</section>
            <section>ISBN-13: 978-0060391447</section>
            <section>Product Dimensions: 9.4 x 6.6 x 1.4 inches</section>
            <section>Shipping Weight: 1.2 pounds (View shipping rates and policies)</section>
            <section>Average Customer Review: 3.5 out of 5 stars  See all reviews (2,006 customer reviews)</section>
        </div>
    </div>
</div>
<div id="right_description">
    <h4>Most Recent Customer Reviews</h4>
    <div class="stars_description">
        <p><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png"); ?> Good</p>
        <article>Read it for the second time after 10 years, but found that i didn't love it as much as i remembered.</article>
        <section>Published 1 day ago by Audrey Miller.</section>
    </div>
    <div class="stars_description">
        <p><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png"); ?> Awesome!</p>
        <article>Read it for the second time after 10 years, but found that i didn't love it as much as i remembered.</article>
        <section>Published 1 day ago by Audrey Miller.</section>
    </div>
    <div class="stars_description">
        <p><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png"); ?> I didn't understand the hype</p>
        <article>Read it for the second time after 10 years, but found that i didn't love it as much as i remembered. <a href="#">Read More</a></article>
        <section>Published 1 day ago by Audrey Miller.</section>
    </div>
    <div class="stars_description">
        <p><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png"); ?> Not sci-fi / fanstasy</p>
        <article>Read it for the second time after 10 years, but found that i didn't love it as much as i remembered... <a href="#">Read More</a></article>
        <section>Published 1 day ago by Audrey Miller.</section>
    </div>
</div>
<div id="description_content">
    <h1>Book Description</h1>
    <article>Release date: March 2, 2004 | Series: Wicked Years (Book 1)</article>
    <p>This is the book that started it all! The basis for the smash hit Tony Award-winning Broadway musical, Gregory Maguire's breathtaking New York Times bestseller Wicked views the land of Oz, its inhabitants, its Wizard, and the Emerald City, through a darker and greener (not rosier) lens. Brilliantly inventive, Wicked offers us a radical new evaluation of one of the most feared and hated characters in all of literature: the much maligned Wicked Witch of the West who, as Maguire tells us, wasn’t nearly as Wicked as we imagined.</p>
    <h2>Editorial Reviews</h2>
    <h3>From Publishers Weekly</h3>
    <p>Born with green skin and huge teeth, like a dragon, the free-spirited Elphaba grows up to be an anti-totalitarian agitator, an animal-rights activist, a nun, then a nurse who tends the dying?and, ultimately, the headstrong Wicked Witch of the West in the land of Oz. Maguire's strange and imaginative postmodernist fable uses L. Frank Baum's Wonderful Wizard of Oz as a springboard to create a tense realm inhabited by humans, talking animals (a rhino librarian, a goat physician), Munchkinlanders, dwarves and various tribes. The Wizard of Oz, emperor of this dystopian dictatorship, promotes Industrial Modern architecture and restricts animals' right to freedom of travel; his holy book is an ancient manuscript of magic that was clairvoyantly located by Madam Blavatsky 40 years earlier. Much of the narrative concerns Elphaba's troubled youth (she is raised by a giddy alcoholic mother and a hermitlike minister father who transmits to her his habits of loathing and self-hatred) and with her student years. Dorothy appears only near novel's end, as her house crash-lands on Elphaba's sister, the Wicked Witch of the East, in an accident that sets Elphaba on the trail of the girl from Kansas?as well as the Scarecrow, the Tin Woodsman and the Lion?and her fabulous new shoes. Maguire combines puckish humor and bracing pessimism in this fantastical meditation on good and evil, God and free will, which should, despite being far removed in spirit from the Baum books, captivate devotees of fantasy. 50,000 first printing; $75,000 ad/promo; first serial to Word; author tour. </p>
    <article>Copyright 1995 Reed Business Information, Inc.</article>
    <h3>From School Library Journal</h3>
    <p>YA?Elphaba, the future Wicked Witch of the West, has gotten a bum rap. Her mother is embarrassed and repulsed by her bright-green baby with shark's teeth and an aversion to water. At college, the coed experiences disapproval and rejection by her roommate, Glinda, a silly girl interested only in clothes, money, and popularity. Elphaba is a serious and inquisitive student. When she learns that the Wizard of Oz is politically corrupt and causing economic ruin, Elphaba finds a sense of purpose to her life?to stop him and to restore harmony and prosperity to the land. A Tin Man, Cowardly Lion, Scarecrow, and an unknown species called a "Dorothy" appear in very small roles... The story presents Elphaba in a sympathetic and empathetic manner-readers will want her to triumph! The conclusion, however, is the same as L. Frank Baum's. The book has both idealism and cynicism in its discussion of social, religious, educational, and political issues present in Oz, and, more pointedly, present in our day and time. The idealism is whimsical and engaging; the cynicism is biting. Sometimes the earthy language seems appropriate and adds to the sense of place; sometimes the four-letter words and sexual explicitness distract from the charm of the tale. The multiple threads to the plot proceed unevenly, so that the pace of the story jumps rather than moves steadily forward. Wicked is not an easy rereading of The Wizard of Oz. It is for good readers who like satire, and love exceedingly imaginative and clever fantasy.?Judy Sokoll, Fairfax County Public Library, VA</p>
    <article>Copyright 1996 Reed Business Information, Inc.</article>
    <section>See all Editorial Reviews</section>
</div>
<div class="general_content">
    <div class="under_heading">
        <h6>Customers Who Bought This Item Also Bought</h6>
    </div>
    <div class="featured_books">
        <a href="#" class="topopup"><img src="images/moon_split_img_03.png" /></a>
        <h3>Moon Split</h3>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p> 
        <div id="toPopup"> 
            <div class="close"></div>
            <div id="popup_content">
                <p>
                    <img src="img/gems_and_jewels_big_img_03.png" />
                </p>
                <div class="para">
                    <h6>Friendship</h6>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Select Option</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Sale Price</p>
                        </div>
                        <div class="right_para">
                            <p>SAR 30.00</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Author:</p>
                        </div>
                        <div class="right_para">
                            <p>Abdul Malik Mujahid</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Language:</p>
                        </div>
                        <div class="right_para">
                            <p>English</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>ISBN No.:</p>
                        </div>
                        <div class="right_para">
                            <p>9960-897-59-1</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Availability:</p>
                        </div>
                        <div class="right_para">
                            <p>Yes</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Category</p>
                        </div>
                        <div class="right_para">
                            <p>Stories</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Enter Qunatity</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader"></div>
        <div id="backgroundPopup"></div>
    </div>
    <div class="featured_books">
        <a href="#" class="topopup"><img src="images/gems_and_jewels_img_03.png" /></a>
        <h3>Gems and Jewels</h3>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
        <div id="toPopup"> 
            <div class="close"></div>
            <div id="popup_content">
                <p>
                    <img src="img/gems_and_jewels_big_img_03.png" />
                </p>
                <div class="para">
                    <h6>Friendship</h6>
                    v <div class="main_div">
                        <div class="left_para">
                            <p>Select Option</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Sale Price</p>
                        </div>
                        <div class="right_para">
                            <p>SAR 30.00</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Author:</p>
                        </div>
                        <div class="right_para">
                            <p>Abdul Malik Mujahid</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Language:</p>
                        </div>
                        <div class="right_para">
                            <p>English</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>ISBN No.:</p>
                        </div>
                        <div class="right_para">
                            <p>9960-897-59-1</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Availability:</p>
                        </div>
                        <div class="right_para">
                            <p>Yes</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Category</p>
                        </div>
                        <div class="right_para">
                            <p>Stories</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Enter Qunatity</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader"></div>
        <div id="backgroundPopup"></div>
    </div>
    <div class="featured_books">
        <a href="#" class="topopup"><img src="images/oceans_and_animals_img_03.png" /></a>
        <h3>Oceans and Animals</h3>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
        <div id="toPopup"> 
            <div class="close"></div>
            <div id="popup_content">
                <p>
                    <img src="img/gems_and_jewels_big_img_03.png" />
                </p>
                <div class="para">
                    <h6>Friendship</h6>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Select Option</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Sale Price</p>
                        </div>
                        <div class="right_para">
                            <p>SAR 30.00</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Author:</p>
                        </div>
                        <div class="right_para">
                            <p>Abdul Malik Mujahid</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Language:</p>
                        </div>
                        <div class="right_para">
                            <p>English</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>ISBN No.:</p>
                        </div>
                        <div class="right_para">
                            <p>9960-897-59-1</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Availability:</p>
                        </div>
                        <div class="right_para">
                            <p>Yes</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Category</p>
                        </div>
                        <div class="right_para">
                            <p>Stories</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Enter Qunatity</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader"></div>
        <div id="backgroundPopup"></div>
    </div>
    <div class="featured_books">
        <a href="#" class="topopup"><img src="images/glimpse_img_03.png" /></a>
        <h3>Glimpses</h3>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona</p>
        <div id="toPopup"> 
            <div class="close"></div>
            <div id="popup_content">
                <p>
                    <img src="img/gems_and_jewels_big_img_03.png" />
                </p>
                <div class="para">
                    <h6>Friendship</h6>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Select Option</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Sale Price</p>
                        </div>
                        <div class="right_para">
                            <p>SAR 30.00</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Author:</p>
                        </div>
                        <div class="right_para">
                            <p>Abdul Malik Mujahid</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Language:</p>
                        </div>
                        <div class="right_para">
                            <p>English</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>ISBN No.:</p>
                        </div>
                        <div class="right_para">
                            <p>9960-897-59-1</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Availability:</p>
                        </div>
                        <div class="right_para">
                            <p>Yes</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Category</p>
                        </div>
                        <div class="right_para">
                            <p>Stories</p>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="left_para">
                            <p>Enter Qunatity</p>
                        </div>
                        <div class="right_para">
                            <select>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader"></div>
        <div id="backgroundPopup"></div>
    </div>
</div>