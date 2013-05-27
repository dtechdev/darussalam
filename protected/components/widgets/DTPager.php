<?php

/**
 * class will be used to persist ajax based url
 * or server side on the base of parameters
 */
class DTPager extends CLinkPager {

    public $ajax = false;
    public $jsMethod = "";

    public function createPageButton($label, $page, $class, $hidden, $selected) {
        if ($this->ajax == true) {
            if ($hidden || $selected) {
                $class.=' ' . ($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
            }
            $htmlOptions = array();
            if ($this->jsMethod != "") {
                $htmlOptions = array("onclick" => $this->jsMethod);
            }
            return '<li class="' . $class . '">' . CHtml::link($label, $this->createPageUrl($page), $htmlOptions) . '</li>';
        } else {
            return parent::createPageButton($label, $page, $class, $hidden, $selected);
        }
    }

}

?>
