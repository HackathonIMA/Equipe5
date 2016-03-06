<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class FonteDetalhadaResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'descricao' => 'string',
      'codigo_grupo' => 'string'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'descricao' => 'descricao',
      'codigo_grupo' => 'codigoGrupo'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * DescriÃ§Ã£o da fonte receita
  */
  public $descricao; /* string */
  /**
  * cÃ³digo grupo fonte receita
  */
  public $codigo_grupo; /* string */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->descricao = $data["descricao"];
    $this->codigo_grupo = $data["codigo_grupo"];
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
