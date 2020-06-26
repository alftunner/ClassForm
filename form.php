<?php

$errors = array();

class form
{
    public $name;
    public $login = "<input type='text' name='log' value=''>";
    public $password = "<input type='password' name='pass' value=''>";
    public $email = "<input type='email' name='email' value=''>";
    public $button_ok = "<input type= 'submit' value='OK' name='click'>";
    public $button_exit = "<input type= 'submit' value='Выйти с сайта' name='exit'>";
    public $inputs = array();
    public  function __construct($name)
    {
        $this->name = "<form method='post' name='$name'>";
        $this->inputs = [
            "log" => $this->login,
            "pass" => $this->password,
            "email" => $this->email,
            "confirm" => $this->button_ok
        ];
    }
    public function show()
    {
        echo $this->name;
        foreach ( $this->inputs as $key => $value)
        {
            echo $key . " : " . $value . "<br><br>";
        }
        echo "<input type='hidden' name='already_seen'>";
        echo "</form>";
    }

    public function validate()
    {
        global $errors;
        if(!$_REQUEST['log'] || !$_REQUEST['pass'] || !$_REQUEST['email'])
           $errors[] = "<font color='red'>Все поля обязательны для заполнения</font>";
    }
    public function show_error()
    {
        global $errors;
        foreach ($errors as $error)
        {
            echo $error . "<br>";
        }
    }


    public function click_button_exit()
    {
        if(isset ($_POST['exit']))
        {
            unset($_COOKIE['LogCookie']);
            unset($_COOKIE['PassCookie']);
            unset($_COOKIE['EmailCookie']);
        }
    }
}