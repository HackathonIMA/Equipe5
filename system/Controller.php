<?php

class Controller {

// protected $uteis;
  protected $url;
  private $vars;
  private $params;

  public function __construct($params, $url) {
    $this->url = $url;
    $this->params = $params;
    $this->uteis = new Uteis();
  }

  protected function view($file) {
    if (file_exists(VIEWS . $file . ".php"))
      require_once (VIEWS . $file . ".php");
    else
      die("Erro arquivo " . VIEWS . $file . ".php n&atilde;o encontrado...");
  }

  protected function model($file) {
    $file = 'Model' . ucfirst($file);
    if (file_exists(MODELS . $file . ".php"))
      require_once (MODELS . $file . ".php");
    else
      die("Erro arquivo " . MODELS . $file . ".php n&atilde;o encontrado...");
  }

  public function __set($var, $val) {
    $this->vars[$var] = $val;
  }

  public function __get($var) {
    if (isset($this->vars[$var]))
      return $this->vars[$var];
    die("[__get] A variável $var n&atilde;o existe...");
  }

  public function getParams($name = null) {
    if (!empty($this->params) && array_key_exists($name, $this->params))
      return $this->params[$name];
    elseif (!empty($this->params) && $name == null)
      return $this->params;
  }

  public function getFalse($var) {
    if (isset($this->vars[$var])) {
      return $this->vars[$var];
    }
  }

  public function getUrl() {
    $url = str_replace('/', '|', $this->url);
    return urlencode($url);
  }

  public function corrigirUrl($url) {
    $parse = explode('|', urldecode($url));
    if ($parse[0] == 'login' && $parse[1] == 'route') {
      unset($parse[0]);
      unset($parse[1]);
    }
    return implode('|', $parse);
  }

  public function finalizarUrl($url) {
    $parse = explode('|', urldecode($url));
    if ($parse[0] == 'login' && $parse[1] == 'route') {
      unset($parse[0]);
      unset($parse[1]);
    }
    return implode('/', $parse);
  }

}
