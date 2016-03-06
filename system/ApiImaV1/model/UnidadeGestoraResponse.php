<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class UnidadeGestoraResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'descricao' => 'string',
      'gestao' => 'string'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'descricao' => 'descricao',
      'gestao' => 'gestao'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * DescriÃ§Ã£o da Unidade Gestora
  */
  public $descricao; /* string */
  /**
  * DescriÃ§Ã£o do tipo de gestÃ£o  ou CÃ³digo do tipo de GestÃ£o
  */
  public $gestao; /* string */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->descricao = $data["descricao"];
    $this->gestao = $data["gestao"];
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
