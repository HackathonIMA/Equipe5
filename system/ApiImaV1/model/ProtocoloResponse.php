<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class ProtocoloResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'codigo_regiao' => 'int',
      'nome_regiao' => 'string',
      'codigo_bairro' => 'int',
      'nome_bairro' => 'string',
      'codigo_expediente' => 'int',
      'secretaria_expediente' => 'string',
      'codigo_assunto' => 'int',
      'descricao_assunto' => 'string',
      'ano_processo' => 'int',
      'ponto_cadastramento' => 'int',
      'nome_ponto_cadastramento' => 'string',
      'data_cadastro' => 'DateTime',
      'data_atendimento' => 'DateTime',
      'data_cancelamento' => 'DateTime'
  );

  static $attributeMap = array(
      'id' => 'ID',
      'codigo_regiao' => 'codigoRegiao',
      'nome_regiao' => 'nomeRegiao',
      'codigo_bairro' => 'codigoBairro',
      'nome_bairro' => 'nomeBairro',
      'codigo_expediente' => 'codigoExpediente',
      'secretaria_expediente' => 'secretariaExpediente',
      'codigo_assunto' => 'codigoAssunto',
      'descricao_assunto' => 'descricaoAssunto',
      'ano_processo' => 'anoProcesso',
      'ponto_cadastramento' => 'pontoCadastramento',
      'nome_ponto_cadastramento' => 'nomePontoCadastramento',
      'data_cadastro' => 'dataCadastro',
      'data_atendimento' => 'dataAtendimento',
      'data_cancelamento' => 'dataCancelamento'
  );

  
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * CÃ³digo da regiÃ£o onde foi registrado o protocolo.
  */
  public $codigo_regiao; /* int */
  /**
  * Nome da Ã¡rea onde a regiÃ£o se encontra. (Exemplo > \"NORTE\")
  */
  public $nome_regiao; /* string */
  /**
  * CÃ³digo de bairro referente ao protocolo.
  */
  public $codigo_bairro; /* int */
  /**
  * Nome do bairro.
  */
  public $nome_bairro; /* string */
  /**
  * CÃ³digo do expediente emissor do protocolo.
  */
  public $codigo_expediente; /* int */
  /**
  * DescriÃ§Ã£o da Secretaria expediente do protocolo.
  */
  public $secretaria_expediente; /* string */
  /**
  * CÃ³digo do assunto referente ao protocolo.
  */
  public $codigo_assunto; /* int */
  /**
  * DescriÃ§Ã£o do assunto do protocolo.
  */
  public $descricao_assunto; /* string */
  /**
  * Ano em que o processo foi iniciado.
  */
  public $ano_processo; /* int */
  /**
  * CÃ³digo do ponto onde o protocolo foi cadastrado.
  */
  public $ponto_cadastramento; /* int */
  /**
  * Nome do ponto de cadastramento.
  */
  public $nome_ponto_cadastramento; /* string */
  /**
  * Data do cadastro do protocolo.
  */
  public $data_cadastro; /* DateTime */
  /**
  * Data do atendimento.
  */
  public $data_atendimento; /* DateTime */
  /**
  * Data em que o protocolo foi cancelado.
  */
  public $data_cancelamento; /* DateTime */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->codigo_regiao = $data["codigo_regiao"];
    $this->nome_regiao = $data["nome_regiao"];
    $this->codigo_bairro = $data["codigo_bairro"];
    $this->nome_bairro = $data["nome_bairro"];
    $this->codigo_expediente = $data["codigo_expediente"];
    $this->secretaria_expediente = $data["secretaria_expediente"];
    $this->codigo_assunto = $data["codigo_assunto"];
    $this->descricao_assunto = $data["descricao_assunto"];
    $this->ano_processo = $data["ano_processo"];
    $this->ponto_cadastramento = $data["ponto_cadastramento"];
    $this->nome_ponto_cadastramento = $data["nome_ponto_cadastramento"];
    $this->data_cadastro = $data["data_cadastro"];
    $this->data_atendimento = $data["data_atendimento"];
    $this->data_cancelamento = $data["data_cancelamento"];
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
