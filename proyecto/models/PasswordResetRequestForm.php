<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RequestForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class PasswordResetRequestForm extends Model
{
    public $email;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email is required
            [['email'], 'required'],
            ['email', 'email'],
        ];
    }

}