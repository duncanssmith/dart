<?php namespace Acme\Forms;

//use Laracasts\Validation\FormValidator;

class Login extends FormValidator {

    /**
     * Validation rules for login form
     */
    protected $rules = [
        //'email' => 'required|email',
        'username' => 'required',
        'password' => 'required'
    ];

}

