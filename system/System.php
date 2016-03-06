<?php

class System {

  private $controller;
  private $action;
  private $url;
  private $params;
  private $parsed;

  public function __construct() {
    session_start();
    $this -> setUrl();
    $this -> setParams();
    $this -> setController();
    $this -> setAction();
    $this -> parseParams();
    $this -> start();
  }

  private function setUrl() {
    $url = urldecode($_SERVER['REQUEST_URI']);
    $url = str_replace(PATH, '', $url);
    $url = str_replace(BASEPATH . 'index.php', '', $url);
    $url = str_replace(BASEPATH, '', $url);
    $this -> url = ($url != '') ? $url : 'home/inicial';
    //		$this->url = (isset($_GET['url']) ?  $_GET['url'] : 'home/inicial');
  }

  private function setParams() {
    $this -> params = explode('/', $this -> url);
    if ($this -> params[0] == 'pagina') {
      $this -> url = 'home/inicial/' . $this -> url;
      $this -> params = explode('/', $this -> url);
    }
    if (count($this -> params) > 1) {
      if ($this -> params[1] == 'pagina' || $this -> params[1] == 'nome' || $this -> params[1] == 'produto' || $this -> params[1] == 'route')
        array_splice($this -> params, 1, 0, 'inicial');
    }
  }

  private function setController() {
    $this -> controller = 'Controller' . ucfirst($this -> params[0]);
  }

  private function setAction() {
    $this -> action = (isset($this -> params[1]) ? $this -> params[1] : 'inicial');
    $this -> action = ($this -> action != '' ? $this -> action : 'inicial');
  }

  private function parseParams() {
    $parse = $this -> params;
    unset($parse[0], $parse[1]);
    if (end($parse) == null)
      array_pop($parse);
    if (count($parse) % 2)
      array_pop($parse);
    if (!empty($parse)) {
      $i = 0;
      foreach ($parse as $val) {
        if ($i % 2 == 0) {
          $inds[] = $val;
        } else {
          $values[] = $val;
        }
        $i++;
      }
    } else {
      $inds = Array();
      $values = Array();
    }
    if (!empty($inds) && !empty($values)) {
      if (count($inds) == count($values))
        $this -> parsed = array_combine($inds, $values);
    } else {
      $this -> parsed = null;
    }
  }

  private function start() {
    if (file_exists(CONTROLLERS . $this -> controller . '.php')) {
      require_once (CONTROLLERS . $this -> controller . '.php');
    } else {
      die('Erro arquivo ' . CONTROLLERS . $this -> controller . '.php n&atilde;o encontrado...');
    }
    $control = new $this->controller($this -> parsed, $this -> url);
    if (method_exists($control, $this -> action)) {
      $control -> {$this->action}();
    } else {
      die('A&ccedil;&atilde;o n&atilde;o existe no Controller...');
    }
  }

}
