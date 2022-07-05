<?php

declare(strict_types=1);

class Restaurant
{
  public int $id;
  public string $name;
  public string $address;
  public int $categoryID;
  public int $ownerID;
  public int $phone;
  public string $photoPath;

  public function __construct(int $id, string $name, string $address, int $categoryID, int $ownerID,int $phone, string $photoPath)
  {
    $this->id = $id;
    $this->name = $name;
    $this->address = $address;
    $this->categoryID = $categoryID;
    $this->ownerID = $ownerID;
    $this->phone = $phone;
    $this->photoPath = $photoPath;
  }

  function name()
  {
    return $this->name;
  }

  function save($db)
  {
    $stmt = $db->prepare('
        UPDATE Restaurant SET name = ?
        WHERE id = ?
      ');

    $stmt->execute(array($this->name, $this->id));
  }

  

  static function getRestID(PDO $db, String $name) {
    $stmt = $db->prepare("
      SELECT id,name
      FROM Restaurant 
      WHERE name = ?
    ");

    $stmt->execute(array($name));
      $rest = $stmt->fetch();
      
      return (int) $rest['id'];
    }

  static function getRestaurant(PDO $db, int $id): Restaurant
  {
    $stmt = $db->prepare('
        SELECT id, name, address, categoryID, phone, ownerID, photoPath
        FROM Restaurant 
        WHERE id = ?
      ');

    $stmt->execute(array($id));
    $Restaurant = $stmt->fetch();

    return new Restaurant(
      (int) $Restaurant['id'],
      $Restaurant['name'],
      $Restaurant['address'],
      (int) $Restaurant['categoryID'],
      (int) $Restaurant['ownerID'],
      (int) $Restaurant['phone'],
      $Restaurant['photoPath']
    );
  }

  static function getRestaurantFromMenu(PDO $db, int $id): Restaurant
  {
    $stmt = $db->prepare('
        SELECT Restaurant.id, Restaurant.name, Restaurant.address, Restaurant.categoryId, Restaurant.ownerId,Restaurant.phone, Restaurant.photoPath
        FROM Restaurant, Menu
        WHERE Restaurant.id = Menu.restaurantID
        AND Menu.id = ?
      ');

    $stmt->execute(array($id));
    $Restaurant = $stmt->fetch();

    return new Restaurant(
      (int) $Restaurant['id'],
      $Restaurant['name'],
      $Restaurant['address'],
      (int)$Restaurant['categoryId'],
      (int)$Restaurant['ownerId'],
      (int)$Restaurant['phone'],
      $Restaurant['photoPath']
    );
  }

  static function getAllRestaurant(PDO $db) {
    $stmt = $db->prepare('
        SELECT name,id,address,categoryId,ownerId,phone,photoPath 
        FROM Restaurant 
      ');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  static function getAllOwnedRestaurant(PDO $db, int $id) {
    $stmt = $db->prepare('
        SELECT Restaurant.name,Restaurant.id,Restaurant.address,Restaurant.categoryId,Restaurant.ownerId,Restaurant.phone,Restaurant.photoPath 
        FROM Restaurant, User
        WHERE Restaurant.ownerId = User.id
        AND User.id = ?
      ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  static function getRestaurantMenus(PDO $db, int $RestaurantId) {
    $stmt = $db->prepare('
        SELECT id, name, restaurantID, photoPath 
        FROM Menu WHERE restaurantID = ?
      ');
    $stmt->execute(array($RestaurantId));
    return $stmt->fetchAll();
  }

  static function getRestaurantDishes(PDO $db, int $idRestaurant) {
    $stmt = $db->prepare('
        SELECT id, name, price, idRestaurant, photoPath 
        FROM Dishes WHERE idRestaurant = ?
      ');
    $stmt->execute(array($idRestaurant));
    return $stmt->fetchAll();
  }
}
