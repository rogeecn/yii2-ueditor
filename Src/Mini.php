<?php

namespace UEditor;

use UEditor\Assets\MiniAssets;
use yii\widgets\InputWidget;

class Mini extends InputWidget
{
    public $language = 'zh-cn';
    public function run()
    {
        $view = $this->getView();
        MiniAssets::register($view);
        $view->registerJsFile("@vendor/rogeecn/yii2-ueditor/umeditor1_2_2-utf8-php/lang/{$this->lang}/{$this->lang}.js");
        $initScript = $this->getInitScript();
        $view->registerJs($initScript);

        unset($this->options['clientOptions']);
        return Html::textarea($this->name,$this->value,$this->options);
    }

    private function getInitScript()
    {
        $editor_id = Html::getInputId($this->model,$this->attribute);
        $options = json_encode($this->options['clientOptions']);

        $editor_var = md5($editor_id);
        $js = <<<_JS_
var um_{$editor_var} = UM.getEditor('$editor_id',$options);
_JS_;

        return $js;
    }
}
