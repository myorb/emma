<?php
namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\redis\ActiveRecord;

class Todo extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function attributes()
    {
        return ['id', 'todoText','done', 'created_at','updated_at'];
    }

    public function rules()
    {
        return [
            [['todoText'], 'required'],
            [['done'],'boolean'],
            [['created_at','updated_at'], 'integer'],
        ];
    }
}