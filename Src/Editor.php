<?php
/**
 * @author: Rogee<yanghao@chukong-inc.com>
 * @date 6/15/15
 */

namespace UEditor;


use yii\widgets\InputWidget;

class Editor extends InputWidget
{
    public $clientOptions = [];
    protected function getOptions (){
        $options = "{}";
        if (!empty($this->clientOptions)){
            if (!$this->clientOptions['style']){
                $style ="width: 100%;height: 300px;";
                $this->clientOptions['style'] = $style;
            }
            $options = "{";
            foreach($this->clientOptions as $key=>$value){
                $options .= sprintf("%s:%s",$key, json_encode($value)).",";
            }
            $options = rtrim($options,',');
            $options.="}";
        }
    }
}