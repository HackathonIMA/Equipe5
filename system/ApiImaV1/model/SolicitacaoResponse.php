<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class SolicitacaoResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'nome_regional' => 'string',
      'codigo_regiao' => 'string',
      'nome_regiao' => 'string',
      'secretaria' => 'string',
      'codigo_bairro' => 'int',
      'nome_bairro' => 'string',
      'codigo_assunto' => 'int',
      'descricao_assunto' => 'string',
      'ano_solicitacao' => 'int',
      'tipo_solicitacao' => 'int',
      'descricao_tipo_solicitacao' => 'string',
      'status_solicitacao' => 'int',
      'descricao_status' => 'string',
      'data_cadastro' => 'DateTime',
      'data_previsao_resposta' => 'DateTime',
      'data_atendimento' => 'DateTime',
      'data_conclusao' => 'DateTime',
      'cep' => 'string',
      'tipo_logradouro' => 'string',
      'nome_logradouro' => 'string',
      'data_providencia' => 'DateTime'
  );

  static $attributeMap = array(
      'id' => 'id',
      'nome_regional' => 'nomeRegional',
      'codigo_regiao' => 'codigoRegiao',
      'nome_regiao' => 'nomeRegional',
      'secretaria' => 'secretaria',
      'codigo_bairro' => 'codigoBairro',
      'nome_bairro' => 'nomeBairro',
      'codigo_assunto' => 'codigoAssunto',
      'descricao_assunto' => 'descricaoAssunto',
      'ano_solicitacao' => 'anoSolicitacao',
      'tipo_solicitacao' => 'tipoSolicitacao',
      'descricao_tipo_solicitacao' => 'descricaoTipoSolicitacao',
      'status_solicitacao' => 'statusSolicitacao',
      'descricao_status' => 'descricaoStatus',
      'data_cadastro' => 'dataCadastro',
      'data_previsao_resposta' => 'dataPrevisaoResposta',
      'data_atendimento' => 'dataAtendimento',
      'data_conclusao' => 'dataConclusao',
      'cep' => 'cep',
      'tipo_logradouro' => 'tipoLogradouro',
      'nome_logradouro' => 'nomeLogradouro',
      'data_providencia' => 'dataProvidencia'
  );


  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Nome da administraÃ§Ã£o regional.
  */
  public $nome_regional; /* string */
  /**
  * CÃ³digo da regiÃ£o.
  */
  public $codigo_regiao; /* string */
  /**
  * Nome / DescriÃ§Ã£o da regiÃ£o.
  */
  public $nome_regiao; /* string */
  /**
  * Nome da secretÃ¡ria.
  */
  public $secretaria; /* string */
  /**
  * CÃ³digo da bairro.
  */
  public $codigo_bairro; /* int */
  /**
  * Nome do bairro.
  */
  public $nome_bairro; /* string */
  /**
  * CÃ³digo do assunto da solicitaÃ§Ã£o.
  */
  public $codigo_assunto; /* int */
  /**
  * DescriÃ§Ã£o do assunto da solicitaÃ§Ã£o.
  */
  public $descricao_assunto; /* string */
  /**
  * Ano em que a solicitaÃ§Ã£o ocorreu.
  */
  public $ano_solicitacao; /* int */
  /**
  * CÃ³digo referente ao tipo de solicitaÃ§Ã£o.
  */
  public $tipo_solicitacao; /* int */
  /**
  * DescriÃ§Ã£o do tipo de solicitaÃ§Ã£o realizada.
  */
  public $descricao_tipo_solicitacao; /* string */
  /**
  * CÃ³digo do status da solicitaÃ§Ã£o.
  */
  public $status_solicitacao; /* int */
  /**
  * DescriÃ§Ã£o do status.
  */
  public $descricao_status; /* string */
  /**
  * Data do cadastramento da solicitaÃ§Ã£o.
  */
  public $data_cadastro; /* DateTime */
  /**
  * Data da previsÃ£o de resposta da solicitaÃ§Ã£o depois de executada.
  */
  public $data_previsao_resposta; /* DateTime */
  /**
  * Data em que o atendimento ocorreu
  */
  public $data_atendimento; /* DateTime */
  /**
  * Data em que a solicitaÃ§Ã£o foi concluÃ­da.
  */
  public $data_conclusao; /* DateTime */
  /**
  * CEP
  */
  public $cep; /* string */
  /**
  * Tipo de logradouro (Exemplo > Rua, Avenida, etc.)
  */
  public $tipo_logradouro; /* string */
  /**
  * Nome da rua / logradouro.
  */
  public $nome_logradouro; /* string */
  /**
  * Data da providÃªncia
  */
  public $data_providencia; /* DateTime */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->nome_regional = $data["nome_regional"];
    $this->codigo_regiao = $data["codigo_regiao"];
    $this->nome_regiao = $data["nome_regiao"];
    $this->secretaria = $data["secretaria"];
    $this->codigo_bairro = $data["codigo_bairro"];
    $this->nome_bairro = $data["nome_bairro"];
    $this->codigo_assunto = $data["codigo_assunto"];
    $this->descricao_assunto = $data["descricao_assunto"];
    $this->ano_solicitacao = $data["ano_solicitacao"];
    $this->tipo_solicitacao = $data["tipo_solicitacao"];
    $this->descricao_tipo_solicitacao = $data["descricao_tipo_solicitacao"];
    $this->status_solicitacao = $data["status_solicitacao"];
    $this->descricao_status = $data["descricao_status"];
    $this->data_cadastro = $data["data_cadastro"];
    $this->data_previsao_resposta = $data["data_previsao_resposta"];
    $this->data_atendimento = $data["data_atendimento"];
    $this->data_conclusao = $data["data_conclusao"];
    $this->cep = $data["cep"];
    $this->tipo_logradouro = $data["tipo_logradouro"];
    $this->nome_logradouro = $data["nome_logradouro"];
    $this->data_providencia = $data["data_providencia"];
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
