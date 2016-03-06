<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class EducacaoResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'ano' => 'int',
      'codigo_regiao' => 'int',
      'descricao_regiao' => 'string',
      'escala_grupo' => 'string',
      'regime' => 'string',
      'nome_unidade_escolar' => 'string',
      'bairro' => 'string',
      'descricao' => 'string',
      'endereco_escola_demanda' => 'string',
      'logradouro_demanda' => 'string',
      'municipio_demanda' => 'string',
      'uf_demanda' => 'string',
      'cep_demanda' => 'string',
      'demanda' => 'string'
  );

  static $attributeMap = array(
      'id' => 'ID',
      'ano' => 'ano',
      'codigo_regiao' => 'codigoRegiao',
      'descricao_regiao' => 'descricaoRegiao',
      'escala_grupo' => 'escalaGrupo',
      'regime' => 'regime',
      'nome_unidade_escolar' => 'nomeUnidadeEscolar',
      'bairro' => 'bairro',
      'descricao' => 'descricao',
      'endereco_escola_demanda' => 'endereco_escola_demanda',
      'logradouro_demanda' => 'logradouro_demanda',
      'municipio_demanda' => 'municipio_demanda',
      'uf_demanda' => 'uf_demanda',
      'cep_demanda' => 'cep_demanda',
      'demanda' => 'demanda'
  );

  
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Ano do registro.
  */
  public $ano; /* int */
  /**
  * CÃ³digo da regiÃ£o.
  */
  public $codigo_regiao; /* int */
  /**
  * DescriÃ§Ã£o da regiÃ£o.
  */
  public $descricao_regiao; /* string */
  /**
  * CÃ³digo do grupo escolar (AG1: 0~1,5 anos, AG2: 1,5~3 anos, AG3: 3 ~5 anos).
  */
  public $escala_grupo; /* string */
  /**
  * DescriÃ§Ã£o do regime escolar.
  */
  public $regime; /* string */
  /**
  * Nome da Unidade escolar.
  */
  public $nome_unidade_escolar; /* string */
  /**
  * Nome do bairro onde a unidade escolar se encontra.
  */
  public $bairro; /* string */
  /**
  * DescriÃ§Ã£o da demanda.
  */
  public $descricao; /* string */
  /**
  * EndereÃ§o completo da unidade onde foi registrada a demanda.
  */
  public $endereco_escola_demanda; /* string */
  /**
  * Nome do logradouro da unidade onde foi registrada a demanda.
  */
  public $logradouro_demanda; /* string */
  /**
  * Nome do municÃ­pio da unidade onde foi registrada a demanda. (sempre Campinas)
  */
  public $municipio_demanda; /* string */
  /**
  * Sigla da unidade federativa do cadastro da demanda (sempre SP)
  */
  public $uf_demanda; /* string */
  /**
  * CEP registrado do endereÃ§o da unidade onde foi registrada a demanda.
  */
  public $cep_demanda; /* string */
  /**
  * Quantidade total do registro da demanda. Cada registro do webservice traz a tipificaÃ§Ã£o da demanda e este campo mostra os valores consolidados totais para a demanda.
  */
  public $demanda; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->ano = $data["ano"];
    $this->codigo_regiao = $data["codigo_regiao"];
    $this->descricao_regiao = $data["descricao_regiao"];
    $this->escala_grupo = $data["escala_grupo"];
    $this->regime = $data["regime"];
    $this->nome_unidade_escolar = $data["nome_unidade_escolar"];
    $this->bairro = $data["bairro"];
    $this->descricao = $data["descricao"];
    $this->endereco_escola_demanda = $data["endereco_escola_demanda"];
    $this->logradouro_demanda = $data["logradouro_demanda"];
    $this->municipio_demanda = $data["municipio_demanda"];
    $this->uf_demanda = $data["uf_demanda"];
    $this->cep_demanda = $data["cep_demanda"];
    $this->demanda = $data["demanda"];
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
