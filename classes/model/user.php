<?php

namespace InfusedAuth;

class Model_User extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'username',
        'password',
        'group',
        'email',
        'last_login',
        'login_hash',
        'profile_fields',
        'created_at',
        'updated_at'
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );

    public function profile_fields($field_name=null){
        $fields = json_decode($this->profile_fields,true);

        if(empty($field_name)) return $fields;
        if(isset($fields[$field_name])) return $fields[$field_name];
        return false;
    }

}
