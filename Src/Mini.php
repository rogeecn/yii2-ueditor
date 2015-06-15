<?php

namespace UEditor;

use UEditor\Assets\MiniAssets;
use yii\helpers\Html;

class Mini extends Editor
{
    public $language = 'zh-cn';
    public function run()
    {
        $view = $this->getView();
        MiniAssets::register($view);

        $initScript = $this->getInitScript();
        $view->registerJs($initScript);

        unset($this->options['clientOptions']);
        return Html::activeTextarea($this->model,$this->attribute,$this->options);
    }

    private function getInitScript()
    {
        $editor_id = Html::getInputId($this->model,$this->attribute);
        $options = $this->getOptions();

        $editor_var = md5($editor_id);
        $js = <<<_JS_
var um_{$editor_var} = UM.getEditor('$editor_id',$options);
_JS_;

        return $js;
    }
}
