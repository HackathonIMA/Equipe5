<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class CredorResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'descricao' => 'string',
      'municipio_descricao' => 'string'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'descricao' => 'descricao',
      'municipio_descricao' => 'municipioDescricao'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Descricao do credor
  */
  public $descricao; /* string */
  /**
  * Municipio do credor
  */
  public $municipio_descricao; /* string */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->descricao = $data["descricao"];
    $this->municipio_descricao = $data["municipio_descricao"];
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
