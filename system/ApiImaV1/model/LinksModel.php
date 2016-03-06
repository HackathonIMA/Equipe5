<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class LinksModel implements ArrayAccess {
  static $swaggerTypes = array(
      'rel' => 'string',
      'href' => 'string'
  );

  static $attributeMap = array(
      'rel' => 'rel',
      'href' => 'href'
  );

  
  /**
  * TODO
  */
  public $rel; /* string */
  /**
  * TODO
  */
  public $href; /* string */

  public function __construct(array $data = null) {
    $this->rel = $data["rel"];
    $this->href = $data["href"];
  }

  public function offsetExists($offset) {
    return isset($this->$offset);
  }

  public function offsetGet($offset) {
    return $this->$offset;
  }

  public function offsetSet($offset, $value) {
    $this->$offset = $value;
  }

  public function offsetUnset($offset) {
    unset($this->$offset);
  }
}
