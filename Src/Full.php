<?php

namespace UEditor;

use UEditor\Assets\FullAssets;
use yii\helpers\Html;
use yii\web\AssetManager;
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
        return Html::textarea($this->name,$this->value,$this->options);
    }

    private function getInitScript()
    {
        $editor_var = Html::getInputId($this->model,$this->attribute);
        $options = json_encode($this->options['clientOptions']);
        $js = <<<_JS_
var ue_{$editor_var} = UE.getEditor('$editor_var',$options);
_JS_;

        return [];
    }
}
