<?php

namespace app\modules\v1\controllers;

class DefaultController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Todo';

    public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }
}
