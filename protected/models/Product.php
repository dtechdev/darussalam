<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $product_id
 * @property string $product_name
 * @property integer $city_id
 * @property string $is_featured
 * @property string $product_price
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property OrderDetail[] $orderDetails
 * @property ProductDiscount $discount
 * @property City $city
 * @property ProductCategories[] $productCategories
 * @property ProductImage[] $productImages
 * @property ProductProfile $productProfile
 */
class Product extends DTActiveRecord {

    public $no_image;

    public function __construct($scenario = 'insert') {
        $this->no_image = Yii::app()->baseUrl . "/images/product_images/noimages.jpeg";
        parent::__construct($scenario);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_name, city_id, is_featured, product_price,product_description', 'required'),
            array('create_time,create_user_id,update_time,update_user_id', 'required'),
            array('isbn', 'required'),
            array('activity_log', 'safe'),
            array('authors,isbn,discount_type,discount_value,languages', 'safe'),
            array('no_image,authors,isbn,discount_type,discount_value', 'safe'),
            array('city_id', 'numerical', 'integerOnly' => true),
            array('product_name', 'length', 'max' => 255),
            array('is_featured', 'length', 'max' => 1),
            array('product_price', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('product_id, product_name,product_description, city_id, is_featured, product_price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'carts' => array(self::HAS_MANY, 'Cart', 'product_id'),
            'orderDetails' => array(self::HAS_MANY, 'OrderDetail', 'product_id'),
            'discount' => array(self::HAS_MANY, 'ProductDiscount', 'product_id'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'productCategories' => array(self::HAS_MANY, 'ProductCategories', 'product_id'),
            'productImages' => array(self::HAS_MANY, 'ProductImage', 'product_id', 'order' => 'is_default DESC'),
            'productLanguage' => array(self::HAS_MANY, 'ProductLanguage', 'product_id'),
            'productProfile' => array(self::HAS_MANY, 'ProductProfile', 'product_id'),
            'product_reviews' => array(self::HAS_MANY, 'ProductReviews', 'product_id'),
        );
    }

    /**
     * Behaviour
     *
     */
    public function behaviors() {
        return array(
            'CSaveRelationsBehavior' => array(
                'class' => 'CSaveRelationsBehavior',
                'relations' => array(
                    'basicFeatures' => array("message" => "Please, fill required fields"),
                ),
            ),
            'CMultipleRecords' => array(
                'class' => 'CMultipleRecords'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'product_id' => 'Product',
            'product_name' => 'Product Name',
            'product_description' => 'Product Description',
            'city_id' => 'City',
            'authors' => 'Author',
            'is_featured' => 'Is Featured',
            'product_price' => 'Product Price',
            'product_rating' => 'Product Rating',
        );
    }

    /**
     *  get relavent product info
     * @param type $limit
     * @return type 
     */
    public function allProducts($limit = 30) {



        $all_pro = array();
        $city_id = Yii::app()->session['city_id'];

        $criteria = new CDbCriteria(array(
            'select' => '*',
            'condition' => "t.city_id='" . $city_id . "' ",
            'limit' => $limit,
            'order' => 't.product_id ASC',
                //'with'=>'commentCount' 
        ));

        if (isset($_POST['ajax'])) {
            $criteria->join = 'INNER JOIN product_categories  on t.product_id=product_categories.product_id';

            if (!empty($_POST['author'])) {
                $author = explode(",", $_POST['author']);
                $criteria->addInCondition("authors", $author);
            }
            if (!empty($_POST['langs'])) {
                $langs = explode(",", $_POST['langs']);
                $criteria->addInCondition("languages", $langs);
            }
            if (!empty($_POST['cat_id'])) {

                $criteria->addCondition("product_categories.category_id='" . $_POST['cat_id'] . "'");
            }
            $criteria->distinct = "t.product_id";
        }
        $data = Product::model()->findAll($criteria);


        $featured_products = array();
        $product = array();
        $images = array();
        foreach ($data as $products) {
            $product_id = $products->product_id;
            $criteria2 = new CDbCriteria;
            $criteria2->select = '*';  // only select the 'title' column
            $criteria2->condition = "product_id='" . $product_id . "'";
            $imagedata = ProductImage::model()->findAll($criteria2);
            $images = array();
            foreach ($imagedata as $img) {
                if ($img->is_default == 1) {
                    $images[] = array('id' => $img->id,
                        'image_large' => $img->image_url['image_large'],
                        'image_small' => $img->image_url['image_small'],
                    );
                    break;
                } else {
                    $images[] = array('id' => $img->id,
                        'image_large' => $img->image_url['image_large'],
                        'image_small' => $img->image_url['image_small'],
                    );
                    break;
                }
            }

            $all_pro[] = array(
                'product_id' => $products->product_id,
                'no_image' => $products->no_image,
                'product_name' => $products->product_name,
                'product_description' => $products->product_description,
                'product_price' => $products->product_price,
                'author' => $products->getAuthors(),
                'image' => $images
            );
        }

        return $all_pro;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_description', $this->product_description, true);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('is_featured', $this->is_featured, true);
        $criteria->compare('product_price', $this->product_price, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     *  get author info against book
     */
    public function getAuthors() {
        if (empty($this->authors)) {
            return array();
        }
        $authors = explode(",", $this->authors);

        $criteria = new CDbCriteria();
        $criteria->addInCondition("author_id", $authors);
        $criteria->select = "author_id,author_name";

        return CHtml::listData(Author::model()->findAll($criteria), "author_id", "author_name");
    }

    /**
     * get books languages
     */
    public function getBookLanguages() {
        if (empty($this->languages)) {
            return array();
        }
        $languages = explode(",", $this->languages);

        $criteria = new CDbCriteria();
        $criteria->addInCondition("language_id", $languages);
        $criteria->select = "language_id,language_name";

        return CHtml::listData(Language::model()->findAll($criteria), "language_id", "language_name");
    }

    /**
     *  get product images for some code
     * @return type 
     */
    public function getImage() {
        $images = array();
        foreach ($this->productImages as $img) {
            if ($img->is_default == 1) {
                $images[] = array('id' => $img->id,
                    'image_large' => $img->image_url['image_large'],
                    'image_small' => $img->image_url['image_small'],
                );
                break;
            } else {
                $images[] = array('id' => $img->id,
                    'image_large' => $img->image_url['image_large'],
                    'image_small' => $img->image_url['image_small'],
                );
                break;
            }
        }

        return $images;
    }

}