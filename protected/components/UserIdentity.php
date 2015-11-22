<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $user_id;
    public $user;
    public function authenticate()
    {
        // $record=TgiaQuantri::model()->findByAttributes(array('email'=>$this->username, 'off' => 0));
        $record = Accounts::model()->findByAttributes(array('username'=>$this->username, 'status' => 1));
        // var_dump($this)
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            
        }else if($record->password !== md5($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
            $this->user_id=$record->id;
            $this->setState('title', $record->username);
            $this->errorCode=self::ERROR_NONE;
            $this->setUser($record);
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->user_id;
    }
    public function getUser()
    {
        return $this->user;
    }
 
    public function setUser(CActiveRecord $user)
    {
        $record= Accounts::model()->findByPk($user->id);
        $role = array();
        
        if(count($record->accountGroups) > 0){
            foreach ($record->accountGroups as $accountGroups) {
                if(count($accountGroups->group->permissions) > 0 and $accountGroups->status == 1){
                    foreach ($accountGroups->group->permissions as $permissions) {
                        if($permissions->status == 1 and !in_array($permissions->role->key, $role)){
                            array_push($role, $permissions->role->key);
                        }
                    }
                }
            }
        }
        $this->user = array_merge($user->attributes, array('role'=>$role));
    }
}
?>