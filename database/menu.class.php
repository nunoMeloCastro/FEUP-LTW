<?php

declare(strict_types=1);

class Menu
{
  public int $id;
  public int $restaurantID;
  public string $name;
  public string $photoPath;

  public function __construct(int $id, int  $restaurantID, string $name, string $photoPath)
  {
    $this->id = $id;
    $this->restaurantID = $restaurantID;
    $this->name = $name;
    $this->photoPath = $photoPath;
  }

  function name()
  {
    return $this->name;
  }

  function save($db)
  {
    $stmt = $db->prepare('
        UPDATE Menu SET Name = ?
        WHERE id = ?
      ');

    $stmt->execute(array($this->name, $this->id));
  }

  static function getMenu(PDO $db, int $id): Menu
  {
    $stmt = $db->prepare('
        SELECT id, restaurantID, name, photoPath
        FROM Menu 
        WHERE id = ?
      ');

    $stmt->execute(array($id));
    $Menu = $stmt->fetch();

    return new Menu(
      (int) $Menu['id'],
      (int) $Menu['restaurantID'],
      $Menu['name'],
      $Menu['photoPath']
    );
  }

  static function getAllMenus(PDO $db) {
    $stmt = $db->prepare('
        SELECT name, restaurantID, id, photoPath 
        FROM Menu 
      ');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  static function getRestaurantMenus(PDO $db, int $restaurantID) {
    $stmt = $db->prepare('
        SELECT name, restaurantID, id, photoPath 
        FROM Menu 
        WHERE restaurantID = ?
      ');
    $stmt->execute(array($restaurantID));
    return $stmt->fetchAll();
  }
  static function getRestaurantfromMenu(PDO $db, int $idMenu) {
    $stmt = $db->prepare('
        SELECT Restaurant.id
        FROM Restaurant, Menu
        WHERE Restaurant.id = Menu.restaurantID AND Menu.id = ?
      ');
    $stmt->execute(array($idMenu));
    $idRest = $stmt->fetch();
    return $idRest['id'];
  }

}
