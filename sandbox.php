<?php
class user {
  public $email;
  public $name;

  public function __construct($name, $email)
  {
    $this->email = $email;
    $this->name = $name;

  }
  public function login(){
    echo $this->name . 'user are log';
  }
}
//   $userOne = new User();

//   $userOne->login();
//   echo $userOne->name . '<br />';
//   echo $userOne->email ;
$userTwo = new User('john', 'dsf@dsfd.fr');
echo $userTwo-> login();
?>
