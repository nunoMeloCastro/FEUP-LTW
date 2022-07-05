<?php
  class Session {
    private array $messages;

    public function __construct() {
      session_start();

      $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
      unset($_SESSION['messages']);
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id'])? true : false;    
    }

    public function logout() {
      session_destroy();
    }

    public function getId() : ?int {
      return isset($_SESSION['id']) ? $_SESSION['id'] : null;    
    }
    public function getDish() : ?int {
      return isset($_GET['dish']) ? $_GET['dish'] : null;    
    }

    public function getMenu() : ?int {
      return isset($_GET['menu']) ? $_GET['menu'] : null;    
    }

    public function getCartDish() : ?string {
      return isset($_SESSION['cartDish']) ? $_SESSION['cartDish'] : null;    
    }

    public function getCartMenu() : ?string {
      return isset($_SESSION['cartMenu']) ? $_SESSION['cartMenu'] : null;    
    }

    public function setCartDish(string $cartDish) {
      $_SESSION['cartDish'] = $cartDish;
    }

    public function setCartMenu(string $cartMenu) {
      $_SESSION['cartMenu'] = $cartMenu;
    }

    public function clearCartDish() {
      unset($_SESSION['cartDish']);
    }

    public function clearCartMenu() {
      unset($_SESSION['cartMenu']);
    }

    public function getName() : ?string {
      return isset($_SESSION['name']) ? $_SESSION['name'] : null;
    }
    public function setId(int $id) {
      $_SESSION['id'] = $id;
    }

    public function setName(string $name) {
      $_SESSION['name'] = $name;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
      return $this->messages;
    }
  }
?>