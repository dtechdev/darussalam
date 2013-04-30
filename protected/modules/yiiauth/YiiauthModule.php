<?php

class YiiauthModule extends CWebModule {

    private $_assetsUrl;
    public $userClass;
    public $config;

    public function init() {

        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'yiiauth.models.*',
            'yiiauth.components.*',
        ));
        $this->initConfigurations();

        $this->config['base_url'] = Yii::app()->request->hostInfo . Yii::app()->baseUrl . "/hybridauth";
    }

    /**
     *  for installing init configurations
     */
    public function initConfigurations() {
        $criteria = new CDbCriteria();
        $criteria->addCondition("city_id='" . Yii::app()->session['city_id'] . "'");
        $selected = array("fb_key", "fb_secret", "google_key", "google_secret", "twitter_key", 'twitter_secret');
        $criteria->addInCondition("param", $selected);
        $conf = ConfMisc::model()->findAll($criteria);
        if (!empty($conf)) {
            foreach ($conf as $data) {
                Yii::app()->params[$data->param] = $data->value;
            }
        }
        

        /** set initial variables of soical engines * */
        $this->config['providers']['Facebook']['keys']['id'] = Yii::app()->params['fb_key'];
        $this->config['providers']['Facebook']['keys']['secret'] = Yii::app()->params['fb_secret'];

        $this->config['providers']['Google']['keys']['id'] = Yii::app()->params['google_key'];
        $this->config['providers']['Google']['keys']['secret'] = Yii::app()->params['google_secret'];

        $this->config['providers']['Twitter']['keys']['key'] = Yii::app()->params['twitter_key'];
        $this->config['providers']['Twitter']['keys']['secret'] = Yii::app()->params['twitter_secret'];

        $this->config['providers']['LinkedIn']['keys']['key'] = Yii::app()->params['linkedin_key'];
        $this->config['providers']['LinkedIn']['keys']['secret'] = Yii::app()->params['linkedin_secret'];
      
    }

    /**
     * @return string the base URL that contains all published asset files of this module.
     */
    public function getAssetsUrl() {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'));
        return $this->_assetsUrl;
    }

    /**
     * @param string the base URL that contains all published asset files of this module.
     */
    public function setAssetsUrl($value) {
        $this->_assetsUrl = $value;
    }

    public function registerCss($file, $media = 'all') {
        $href = $this->getAssetsUrl() . '/css/' . $file;
        return '<link rel="stylesheet" type="text/css" href="' . $href . '" media="' . $media . '" />';
    }

    public function registerImage($file) {
        return $this->getAssetsUrl() . '/images/' . $file;
    }

    public function beforeControllerAction($controller, $action) {

        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

}
