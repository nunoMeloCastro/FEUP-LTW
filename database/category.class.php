<?php

declare(strict_types=1);

class Category
{
  public int $id;
  public string $name;
  public string $photoPath;

  public function __construct(int $id, string $name, string $photoPath)
  {
    $this->id = $id;
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
        UPDATE Category SET name = ?
        WHERE id = ?
      ');

    $stmt->execute(array($this->name, $this->id));
  }

  static function getCategory(PDO $db, int $id): Category
  {
    //echo gettype($id);
    $stmt = $db->prepare('
        SELECT id, name, photoPath
        FROM Category 
        WHERE id = ?
      ');

    $stmt->execute(array($id));
    $Category = $stmt->fetch();
    return new Category((int) $Category['id'], $Category['name'], $Category['photoPath']);
  }

  static function getAllCategories(PDO $db) {
    $stmt = $db->prepare('
        SELECT name, id, photoPath 
        FROM Category 
      ');
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
