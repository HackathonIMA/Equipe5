<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class SubItensContasResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'descricao' => 'string'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'descricao' => 'descricao'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * DescriÃ§Ã£o do SubItem de Despesa
  */
  public $descricao; /* string */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->descricao = $data["descricao"];
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
