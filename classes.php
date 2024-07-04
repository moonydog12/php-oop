<?php
// classes are like blueprints for objects
// properties: length, color, top-speed
// methods: accelerate, brake

class User
{
  public $username;
  private $email;

  // 建構式
  public function __construct($username, $email)
  {
    $this->username = $username;
    $this->email = $email;
  }

  public function addFriend()
  {
    // this指向當前實例
    return "{$this->email} add a new friend";
  }

  // getters
  public function getEmail()
  {
    return $this->email;
  }

  // setters
  public function setEmail($email)
  {
    if (strpos($email, "@") > -1) {
      $this->email = $email;
    }
  }
}

// 實例化
$userOne = new User("Mario", "Mario@gmail.com");
$userTwo = new User("Luigi", "Luigi@gmail.com");

$userOne->setEmail("Yoshi@gmail.com");

echo $userOne->getEmail() . "<br>";
echo $userOne->addFriend() . "<br>";
echo $userTwo->addFriend() . "<br>";
echo $userTwo->getEmail() . "<br>";
