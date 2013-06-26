<?php $this->beginContent('//layouts/main'); ?>


<div class="container container-inner">
    <div style="position: fixed; margin-left: 178px; float: right;">

        <div class="hideShow hideImage" style="cursor: pointer; width:10px; height: 19px">  </div>
        <?php // echo CHtml::image(Yii::app()->request->baseUrl . "/images/hide.png", "Hide") ?>
        <!--        <a href="#" onclick="" class="hideShow hideImage"></a>-->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            /*
             * If configuration controller is called
             * 
             */
            if ($this->id == "configurations" || $this->id == "cmm") {
                $this->widget('zii.widgets.jui.CJuiAccordion', array(
                    'panels' => array(
                        'Settings' => '<ul class="accordion-ul">' .
                        '<li>' . CHtml::link('General Misc', array('/configurations/load',
                            "m" => "Misc", 'type' => 'general')) .
                        '</li>' .
                        '<li>' . CHtml::link('Branch Misc', array('/configurations/load',
                            "m" => "Misc", "type" => 'other')) .
                        '</li>' .
                        '<li>' . CHtml::link('Payment Methods', array('/configurations/load',
                            "m" => "PaymentMethods")) . '</li>' .
                        '</ul>',
                    ),
                    // additional javascript options for the accordion plugin
                    'cssFile' => Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/css/jq-aquradian.css'),
                    'options' => array(
                        'autoHeight' => false,
                        'navigation' => true,
                        'clearStyle' => true,
                        'resize' => true,
                    ),
                    'htmlOptions' => array('style' => 'font-size:12px;margin-top:0')
                ));
            } else {
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operations'),
                ));
            }
            if (isset($this->PcmWidget['filter'])) {
                $this->widget($this->PcmWidget['filter']['name'], $this->PcmWidget['filter']['attributes']);
                echo "<hr />";
            }
            ?>
        </div><!-- sidebar -->
    </div>
    <div class="span-18">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>
