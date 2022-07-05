<?php
  declare(strict_types = 1);

  class User {
    public int $id;
    public string $username;
    public string $name;
    public string $email;
    public string $password;
    public string $address;
    public int $phone;
    public string $photoPath;

    public function __construct(int $id, string $username, string $name, string $email,string $address , string $password, int $phone, string $photoPath)
    {
      $this->id = $id;
      $this->username = $username;
      $this->name = $name;
      $this->email = $email;
      $this->address = $address;
      $this->phone = $phone;
      $this->password = $password;
      $this->photoPath = $photoPath;
    }

    function username() {
      return $this->username ;
    }

    function save($db) {
      $stmt = $db->prepare('
        UPDATE User SET username = ?
        WHERE id = ?
      ');

      $stmt->execute(array($this->username, $this->id));
    }
    
    static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
      $stmt = $db->prepare('
        SELECT id, username, name, email, address, password, phone, photoPath
        FROM User 
        WHERE lower(username) = ? AND password = ?
      ');

      $stmt->execute(array(strtolower($username), sha1($password)));
  
      if ($User = $stmt->fetch()) {
        return new User(
          (int) $User['id'],
          $User['username'],
          $User['name'],
          $User['email'],
          $User['address'],
          $User['password'],
          (int) $User['phone'],
          $User['photoPath']
        );
      } else return null;
    }

    static function getUser(PDO $db, int $id) : User {
      $stmt = $db->prepare("
        SELECT id, username, name, email,IFNULL(address,'') address, password, IFNULL(phone,0) phone, IFNULL(photoPath,'') photoPath
        FROM User 
        WHERE id = ?
      ");

      $stmt->execute(array($id));
      $User = $stmt->fetch();
      
      return new User(
        (int) $User['id'],
        $User['username'],
        $User['name'],
        $User['email'],
        $User['address'],
        $User['password'],
        (int) $User['phone'],
        $User['photoPath']
      );
    }
    static function getUserID(PDO $db, String $username) {
      $stmt = $db->prepare("
        SELECT id,username
        FROM User 
        WHERE username = ?
      ");

      $stmt->execute(array($username));
      $User = $stmt->fetch();
      
      return (int) $User['id'];
    }
    static function isOwner(PDO $db, int $id) : bool {
      $stmt = $db->prepare("
        SELECT IFNULL(id,0) id
        FROM RestaurantOwner 
        WHERE id = ?
      ");

      $stmt->execute(array($id));
      $User = $stmt->fetch();
      if($User['id'] == 0) return false;
      else return true;
    }

    static function getRestaurantOwner(PDO $db, int $id)
  {
      $stmt = $db->prepare('
        SELECT User.id, User.username, User.name, User.email, User.password, User.address, User.phone, User.photoPath
        FROM Restaurant, RestaurantOwner, User
        WHERE Restaurant.ownerId = RestaurantOwner.id
        AND RestaurantOwner.id = User.id
        AND Restaurant.id = ?
      ');
      $stmt->execute(array($id));
      $User = $stmt->fetch();

      return new User(
        (int) $User['id'],
        $User['username'],
        $User['name'],
        $User['email'],
        $User['address'],
        $User['password'],
        (int) $User['phone'],
        $User['photoPath']
      );
  }

  static function getFavRests(PDO $db, int $id) {
    $stmt = $db->prepare('
        SELECT Restaurant.id, Restaurant.name, Restaurant.address, Restaurant.categoryId, Restaurant.ownerId,Restaurant.phone, Restaurant.photoPath
        FROM User, UserFavRest, Restaurant 
        WHERE User.id = UserFavRest.userID
        AND UserFavRest.restID = Restaurant.id
        AND User.id = ?
      ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  static function getFavDishes(PDO $db, int $id) {
    $stmt = $db->prepare('
        SELECT Dishes.name,Dishes.id,Dishes.price,Dishes.idRestaurant,Dishes.photoPath
        FROM User, UserFavDish, Dishes 
        WHERE User.id = UserFavDish.userID
        AND UserFavDish.dishID = Dishes.id
        AND User.id = ?
      ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  }

  class Customer extends User{
  }
  class RestaurantOwner extends User{
    function getRestaurant(PDO $db, int $OwnerId)
    {
      $stmt = $db->prepare('
        SELECT id
        FROM Restaurant 
        WHERE ownerId = ?
      ');
      $stmt->execute(array($OwnerId));
      return $stmt->fetchAll();
    }
  }
?>