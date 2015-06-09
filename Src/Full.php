<?php

namespace UEditor;

use UEditor\Assets\FullAssets;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class Full extends InputWidget
{
    public function run()
    {
        $view = $this->getView();
        FullAssets::register($view);
        $initScript = $this->getInitScript();
        $view->registerJs($initScript);

        unset($this->options['clientOptions']);
        return Html::activeTextarea($this->model,$this->attribute,$this->options);
    }

    private function getInitScript()
    {
        $editor_id = Html::getInputId($this->model,$this->attribute);
        $options = json_encode($this->options['clientOptions']);

        $editor_var = md5($editor_id);
        $js = <<<_JS_
var ue_{$editor_var} = UE.getEditor('$editor_id',$options);
_JS_;

        return $js;
    }
}
