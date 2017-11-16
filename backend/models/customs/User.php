<?php

namespace backend\models\customs;

use Yii;
use common\models\User As YiiUser;

/**
* extend common\models\User
*/
class User extends YiiUser
{
	public function getIdAkses()
    {
        return $this->hasOne(\common\models\UserAkses::className(), ['user_id' => 'id']);
    }
}