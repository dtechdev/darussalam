<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/slider';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $_module;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $basePath = "";

    /**
     *  menu html for code
     * @var type 
     */
    public $menuHtml = "";

    /**
     * PCM Widget array
     * @var type 
     */
    public $PcmWidget;
    public $webPages = array();

    public function beforeAction($action) {

        parent::beforeAction($action);

        $this->setPages();
        $this->registerWidget();
        $this->basePath = Yii::app()->basePath;
        if (strstr($this->basePath, "protected")) {
            $this->basePath = realPath($this->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }
        return true;
    }

    /**
     *  set pages for system
     */
    public function setPages() {
        $module = $this->getModule();

        if ($this->id == "site" || get_class($module) == "WebModule") {

            $this->webPages = Pages::model()->getPages();
        }
    }

    /**
     * register widget
     * e.g gridview 
     */
    public function registerWidget() {
        Yii::app()->widgetFactory->widgets = array(
            'ItstGridView' => array(
                'cssFile' => Yii::app()->baseURL . '/css/gridview.css',
                'template' => '{items}{summary}{pager}<div class="clear"></div>',
                'pager' => array('cssFile' => Yii::app()->baseURL . '/css/pager.css'),
                'emptyText' => "No Record Found",
                'showTableOnEmpty' => false,
        ));
    }

    /**
     * handle client script to see 
     * no script will be loaded again 
     */
    public function handleClientScript() {
        Yii::app()->clientScript->scriptMap = array(
            (YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,
            'jquery-ui.min.js' => false,
            'jquery-ui.css' => false
        );
        /* Script Maping: Load necessary scripts in scriptMap array */
        $this->scriptMap = array(
            'jquery.js' => Yii::app()->request->baseUrl . '/packages/jui/js/jquery.js',
            'jquery-ui.min.js' => Yii::app()->request->baseUrl . '/packages/jui/js/jquery-ui.min.js',
            'jquery-ui.css' => Yii::app()->request->baseUrl . '/packages/jui/css/base/jquery-ui.css',
        );
        $this->cs = Yii::app()->clientScript;
    }

    /**
     * To Save multiple child records in view mode
     * @param Obj $model
     * @param String $child_relation_name
     * @param String $parent_relation_name
     * @param String $scanario
     * @param INT $redirect_to_parent_id 
     *  In-case to redirect to specific id, or saving some child's child data and have to show view of parent
     */
    public function manageChild($model, $child_relation_name, $parent_relation_name, $scanario = "", $redirect_id = 0, $redirect_path = "") {
        /* Get exact classs name */
        $activeRelation = $model->getActiveRelation($child_relation_name);
        $className = $activeRelation->className;

        /* if that child is posted */
        if (isset($_POST[$className])) {
            /* create child object of above class */

            $cModel = new $className($scanario);




            /*  */
            $repRes = $cModel->saveMultiple($parent_relation_name, $model->primaryKey);

            if ($repRes['result'] == false)
                $model->$child_relation_name = $repRes['models'];
            else {
                $id = ($redirect_id == 0 ? $model->primaryKey : $redirect_id);
                if (!empty($redirect_path)) {
                    $this->redirect($redirect_path);
                } else {
                    $this->redirect(array('view', 'id' => $id, '#' => $child_relation_name));
                }
            }
        }
    }

    /**
     *  used for 
     *  handling top menues
     *  in controller
     * @return int 
     */
    public function getRootParent() {
        $model = Menu::model()->findByAttributes(array("controller" => $this->id, "is_assigned" => "Yes"));
        if (count($model) == 1) {
            return $model->root_parent;
        } else {
            return 0;
        }
    }

    /**
     * get the navigation 
     * list for top menu
     * @param type $pid
     * @param type $level
     * @param type $root_parent
     * @param type $pidArray 
     */
    public function getNavigation($pid = 0, $level = 0, $root_parent = 0, $pidArray = array()) {

        $model = Menu::model()->findAllByAttributes(array("pid" => $pid, "is_assigned" => "Yes"));
        $l = $level;

        if (count($model) > 0) {
            if ($pid == 0) {
                $this->menuHtml .= '<ul id="nav">';
                $l = 1;
            } else {
                $this->menuHtml .='<ul class="' . ($level == 1 ? 'sub' : '') . '">';
                $l = 2;
            }
            $foundAny = false;

            foreach ($model as $menu) {
                $childCount = Menu::model()->count("pid = $menu->id");
                //if ($menu->min_permission == "" || ($menu->min_permission != "" && $this->getPermission(ucfirst($menu->controller) . "." . ucfirst($menu->min_permission)))) {
                $foundAny = true;

                $this->menuHtml .='<li ' . ($pid == 0 ? "class='top'" : "") . '>';
                $url = "#";
                if ($menu->controller != "") {
                    $url = $this->createUrl($menu->controller . "/" . $menu->action);
                }
                $this->menuHtml .='<a href="' . $url . '" class="' . ($pid == 0 ? "top_link " . ($menu->id == $root_parent ? "active " : "") . $menu->root_class : ($childCount > 0 ? "fly" : "")) . '">';
                if ($pid == 0)
                    $this->menuHtml .='<span class="down">';
                $this->menuHtml .=$menu->user_title;
                if ($pid == 0)
                    $this->menuHtml .='</span>';
                $this->menuHtml .='</a>';

                if (in_array($menu->id, $pidArray))
                    $this->getNavigation($menu->id, $l, 0, $pidArray);
                $this->menuHtml .='</li>';
            }
        }
        if ($foundAny == false)
            $this->menuHtml .='<span class="noItemFound"></span>';
        $this->menuHtml .='</ul>';
    }

    /**
     * general mesg for sending 
     * email
     * @param type $email
     * @return boolean 
     */
    public function sendEmail2($email = array()) {
        if (isset($email['To'])) {

            $mailer = Yii::createComponent('application.extensions.mailer.EMailer');



            $mailer->FromName = (isset($email['FromName']) && !empty($email['FromName']) ? $email['FromName'] : Yii::app()->name); //Yii::app()->user->name;

            if (Yii::app()->params['smtp'] == 1) {
                $mailer->IsSMTP();

                $mailer->SMTPAuth = true;
                $mailer->SMTPSecure = Yii::app()->params['mailSecuity'];
                $mailer->SMTPDebug = 0;
                $mailer->Host = Yii::app()->params['mailHost'];
                $mailer->Port = Yii::app()->params['mailPort'];
                $mailer->Username = Yii::app()->params['mailUsername'];
                $mailer->Password = Yii::app()->params['mailPassword'];
                //CVarDumper::dump($mailer,10,true);
            }

            $mailer->IsHTML(true);

            $mailer->AddAddress($email['To']);
            $mailer->From = $email['From'];
            $mailer->Subject = $email['Subject'];
            $mailer->Body = $email['Body'];



            $mailer->Send();
            $mailer->ClearAddresses();



            //$mailer->Send();
            //$mailer->ClearAddresses();
        }
        return true;
    }

    /**
     * 
     * @param type $route
     * @param type $params
     * @param type $ampersand
     * @return boolean
     */
    public function createUrl($route, $params = array(), $ampersand = '&') {

        $conCate = array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']);
        $params = array_merge($params, $conCate);
       
        return parent::createUrl($route, $params, $ampersand);
    }

}

