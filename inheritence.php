<?php

class User
{
  public $username;
  protected $email;
  public $role = 'member';

  public function __construct($username, $email)
  {
    $this->username = $username;
    $this->email = $email;
  }

  // 實例被銷毀時呼叫
  public function __destruct()
  {
    echo "The user {$this->username} was removed";
  }

  public function __clone()
  {
    $this->email = $this->email . '(cloned)<br>';
  }

  public function addFriend()
  {
    return "{$this->email} add a new friend";
  }

  public function sentMessage()
  {
    return "{$this->email} send a new message!";
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    if (strpos($email, '@') > -1) {
      $this->email = $email;
    }
  }
}

class AdminUser extends User
{
  public $level;

  // 覆蓋原本的 'member'
  public $role = 'admin';

  public function __construct($username, $email, $level)
  {
    $this->level = $level;

    // 類似 javascript 的 super
    parent::__construct($username, $email);
  }

  public function sentMessage()
  {
    return "{$this->email}, an admin, sent a new message";
  }
}

$userThree = new AdminUser('Yoshi', 'Yoshi@gmail.com', 5);


echo $userThree->sentMessage() . '<br>';
echo $userThree->role;
// unset($userThree);
$userFour = clone ($userThree);
echo $userFour->getEmail();
