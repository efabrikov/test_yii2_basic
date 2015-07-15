<?php

namespace app\models;

use yii\base\Model;

/**
 * Description of EntryForm
 *
 * @author Eugene Fabrikov <eugene.fabrikov@gmail.com>
 */
class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email']
        ];
    }
}