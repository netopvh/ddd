<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
