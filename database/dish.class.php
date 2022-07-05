<?php

declare(strict_types=1);

class Dish
{
  public int $id;
  public string $name;
  public int $price;
  public int $idRestaurant;
  public string $photoPath;

  public function __construct(int $id, string $name, int $price, int $idRestaurant, string $photoPath)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->idRestaurant = $idRestaurant;
    $this->photoPath = $photoPath;
  }

  function name()
  {
    return $this->name;
  }

  function save($db)
  {
    $stmt = $db->prepare('
        UPDATE Dishes SET name = ?
        WHERE id = ?
      ');

    $stmt->execute(array($this->name, $this->id));
  }

  static function getDish(PDO $db, int $id): Dish
  {
    $stmt = $db->prepare('
        SELECT id, name, price, idRestaurant, photoPath
        FROM Dishes 
        WHERE id = ?
      ');

    $stmt->execute(array($id));
    $Dish = $stmt->fetch();

    return new Dish(
      (int) $Dish['id'],
      $Dish['name'],
      (int) $Dish['price'],
      (int) $Dish['idRestaurant'],
      $Dish['photoPath']
    );
  }

  static function getRestaurantDishes(PDO $db, int $idRestaurant) {
    $stmt = $db->prepare('
        SELECT name,id,price,idRestaurant,photoPath 
        FROM Dishes
        WHERE idRestaurant = ?
      ');
    $stmt->execute(array($idRestaurant));
    return $stmt->fetchAll();
  }
  static function getDishRestaurant(PDO $db, int $idDish) {
    $stmt = $db->prepare('
        SELECT Restaurant.id
        FROM Restaurant, Dishes
        WHERE Restaurant.id = Dishes.idRestaurant AND Dishes.id = ?
      ');
    $stmt->execute(array($idDish));
    $idRest = $stmt->fetch();
    return $idRest['id'];
  }

  static function getCategoryDishes(PDO $db, int $id) {
    $stmt = $db->prepare('
        SELECT Dishes.name,Dishes.id,Dishes.price,Dishes.idRestaurant,Dishes.photoPath 
        FROM Dishes, Restaurant
        WHERE Dishes.idRestaurant = Restaurant.id
        AND Restaurant.categoryID = ?
      ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  static function getMenuDishes(PDO $db, int $idMenu) {
    $stmt = $db->prepare('
        SELECT Dishes.name, Dishes.id, Dishes.price, Dishes.idRestaurant, Dishes.photoPath 
        FROM Dishes, MenuDish 
        WHERE id = MenuDish.idDish
        AND idMenu = ?
      ');
    $stmt->execute(array($idMenu));
    return $stmt->fetchAll();
  }
}
