<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/27
 * Time: 17:49
 */
namespace app\models;

use yii\base\Model;

class TestForm extends Model
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