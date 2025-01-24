<?php

namespace Http\Forms;

use Core\ValidationEception;
use core\Validator;

class LoginForm
{
    protected $errors = [];
    function __construct($attributes){
        if (!Validator::email($attributes['email'])) {
            $errors['email'] = 'Please provide a valide email address.';
        }
        if (!Validator::string($attributes['password'], 7, 255)) {
            $errors['password'] = 'Please provide a password of at least seven charactes.';
        }
    }
    public static function validate($attributes)
    {
        //validate the form inputs
        
        $insatance = new static($attributes);
        
        if ($insatance->failed()) {
            throw new ValidationEception();
        }
        return $insatance;
    }

    public function failed(){
        return count($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
    public function error($field,$messege){
        $this->errors[$field] = $messege;
    }
}
