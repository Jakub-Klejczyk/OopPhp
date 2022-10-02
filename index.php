<?php

class User {
    private $username;
    protected $email;
    public $role = 'member';

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    // public function __destruct() {
    //     echo "The user $this->username was removed.";
    // }

    public function __clone() {
        $this->username = $this->username . '(cloned)';
    }

    public function msg() {
        return "$this->email sent a new message";
    }

    public function addFriend() {
        return 'added a new friend to list of ' . $this->username;
    }

    // getter
    public function getData() {
        return 'Username is: '. $this->username . ' and emails is: ' . $this->email;
    }

    // setter
    public function setEmail($email) {
        if(strpos($email, '@') > -1) {
            $this->email = $email;
        } else {
            echo 'Invalid value';
        }
    }
}

$userOne = new User('mario', 'mario@gmial.com');

echo $userOne->setEmail('mario@gmial.com2');
echo '<br>';
echo $userOne->getData();
echo '<br>';
echo $userOne->addFriend();
echo '<br>';
echo $userOne->role;
echo '<br>';
echo $userOne->msg();
echo '<br>';

$userTwo = clone $userOne;


print_r(get_class_vars('User'));
print_r(get_class_methods('User'));
echo '<br>';

class AdminUser extends User {
    public $level;
    public $role = 'admin';

    public function __construct($username, $email, $level) {
        parent::__construct($username, $email);
        $this->level = $level;
    }

    public function msg() {
        return "$this->email, an admin, sent a new message";
    }

    public function setUsername($name) {
        $this->username = $name; 
    }
}

$userAdmin = new AdminUser('luigi', 'luigi@gmail.com', 3);

echo $userAdmin->getData();
echo '<br>';
echo $userAdmin->level;
echo '<br>';
echo $userAdmin ->msg();
echo '<br>';

class Weather {
    public static $tempConditions = ['cold', 'mild', 'warm'];

    public static function celsiusToFarenheit($c) {
        return $c * 9 /5 + 32;
    }

    public static function determineTempCondition($f) {
        if($f < 40) {
            return self::$tempConditions[0];
        } else if($f < 70) {
            self::$tempConditions[1];
        } else {
            return self::$tempConditions[2];
        }
    }
}

print_r(Weather::$tempConditions);
echo Weather::celsiusToFarenheit(30);
echo Weather::determineTempCondition(70);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>