<?php

namespace backend\models\customs;

use Yii;
use yii\base\Model;
//use frontend\models\RegisterForm;
//use common\models\UserAkses;
//use backend\models\MbLokasiPekerjaan;
use frontend\models\SignupForm;

use backend\models\customs\User;

/**
* extend frontend\models\SignupForm;
*/
class SignUp extends SignupForm
{
	public $role;
	public $status;
    public $skpd;

	public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['status', 'trim'],
            ['status', 'required'],
            ['status', 'integer'],

            ['skpd', 'trim'],
            ['skpd', 'required'],
            ['skpd', 'integer'],

            ['role', 'trim'],
            ['role', 'required'],
            ['role', 'string', 'min' => 3],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'skpd' => 'SKPD',
            'role' => 'Role',
            'status' => 'Status',
        ];
    }

	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$token = Yii::$app->security->generateRandomString() . '_' . time();

        $auth = Yii::$app->authManager;

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->status = $this->status;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		if ($user->save()) {
            $authorRole = $auth->getRole($this->role);
            $auth->assign($authorRole, $user->getId());
            return $user;
        } else {
            return null;
        }
        
        //return $user->save() ? $user : null;
    }
}