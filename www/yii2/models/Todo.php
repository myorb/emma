<?php
namespace app\models;
use yii\redis\ActiveRecord;

class Todo extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'name', 'gender', 'address', 'status','todoText','done'];
    }

    public function rules()
    {
        return [
            [['todoText'], 'required'],
            [['gender','status'], 'integer'],
            [['address'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }
}