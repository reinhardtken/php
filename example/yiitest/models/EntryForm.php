<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 8/22/18
 * Time: 10:42 AM
 */




namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}