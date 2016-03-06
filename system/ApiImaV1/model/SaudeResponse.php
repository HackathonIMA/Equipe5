<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class SaudeResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'distrito_vinculo' => 'string',
      'municipio' => 'string',
      'uf' => 'string',
      'local_atendimento' => 'string',
      'distrito_atendimento' => 'string',
      'data_atendimento' => 'DateTime',
      'codigo_tipo_atendimento' => 'int',
      'descricao_tipo_atendimento' => 'string',
      'descricao_grupo_atendimento' => 'string',
      'codigo_grupo_atendimento_sus' => 'int',
      'ocupacao_profissional' => 'string',
      'descricao_tipo_vinculo_sms' => 'string',
      'codigo_procedimento_sus' => 'int',
      'descricao_procedimento' => 'string',
      'codigo_atividade_profissional_sus' => 'int',
      'descricao_atividade_profissional' => 'string',
      'sexo' => 'string',
      'idade' => 'string',
      'hora' => 'string',
      'periodo' => 'string',
      'data_nascimento' => 'DateTime',
      'quantidade_realizada' => 'int'
  );

  static $attributeMap = array(
      'id' => 'id',
      'distrito_vinculo' => 'distritoVinculo',
      'municipio' => 'municipio',
      'uf' => 'uf',
      'local_atendimento' => 'localAtendimento',
      'distrito_atendimento' => 'distritoAtendimento',
      'data_atendimento' => 'dataAtendimento',
      'codigo_tipo_atendimento' => 'codigoTipoAtendimento',
      'descricao_tipo_atendimento' => 'descricaoTipoAtendimento',
      'descricao_grupo_atendimento' => 'descricaoGrupoAtendimento',
      'codigo_grupo_atendimento_sus' => 'codigoGrupoAtendimentoSUS',
      'ocupacao_profissional' => 'ocupacaoProfissional',
      'descricao_tipo_vinculo_sms' => 'descricaoTipoVinculoSMS',
      'codigo_procedimento_sus' => 'codigoProcedimentoSUS',
      'descricao_procedimento' => 'descricaoProcedimento',
      'codigo_atividade_profissional_sus' => 'codigoAtividadeProfissionalSUS',
      'descricao_atividade_profissional' => 'descricaoAtividadeProfissional',
      'sexo' => 'sexo',
      'idade' => 'idade',
      'hora' => 'hora',
      'periodo' => 'periodo',
      'data_nascimento' => 'dataNascimento',
      'quantidade_realizada' => 'quantidadeRealizada'
  );


  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Distrito onde o antendimento foi realizado.
  */
  public $distrito_vinculo; /* string */
  /**
  * Nome do municÃ­pio
  */
  public $municipio; /* string */
  /**
  * IndicaÃ§Ã£o da unidade federal.
  */
  public $uf; /* string */
  /**
  * Nome do local onde o atendimento foi feito.
  */
  public $local_atendimento; /* string */
  /**
  * Indicacao do distrito onde o atendimento ocorreu.
  */
  public $distrito_atendimento; /* string */
  /**
  * Data e hora que o atendimento ocorreu.
  */
  public $data_atendimento; /* DateTime */
  /**
  * CÃ³digo do tipo de atendimento.
  */
  public $codigo_tipo_atendimento; /* int */
  /**
  * Descricao do tipo de atendimento.
  */
  public $descricao_tipo_atendimento; /* string */
  /**
  * DescriÃ§Ã£o do grupo de atendimento.
  */
  public $descricao_grupo_atendimento; /* string */
  /**
  * CÃ³digo do grupo de atendimento vinculado ao SUS.
  */
  public $codigo_grupo_atendimento_sus; /* int */
  /**
  * Descricao formal da ocupaÃ§Ã£o do profissional.
  */
  public $ocupacao_profissional; /* string */
  /**
  * DescriÃ§Ã£o do tipo de vinculo com a Secretaria Municipal de SaÃºde.
  */
  public $descricao_tipo_vinculo_sms; /* string */
  /**
  * CÃ³digo do procedimento realizado pelo SUS
  */
  public $codigo_procedimento_sus; /* int */
  /**
  * Descricao do procedimento.
  */
  public $descricao_procedimento; /* string */
  /**
  * CÃ³digo do profissional SUS.
  */
  public $codigo_atividade_profissional_sus; /* int */
  /**
  * IndicaÃ§Ã£o da profissÃ£o do atendente.
  */
  public $descricao_atividade_profissional; /* string */
  /**
  * DescriÃ§Ã£o do sexo. ('MASCULINO' ou 'FEMININO')
  */
  public $sexo; /* string */
  /**
  * IndicaÃ§Ã£o da idade.
  */
  public $idade; /* string */
  /**
  * IndicaÃ§Ã£o da hora da ocorrÃªncia.
  */
  public $hora; /* string */
  /**
  * Descricao do periodo (Exemplo > MANHA)
  */
  public $periodo; /* string */
  /**
  * Data de nascimento do profissional.
  */
  public $data_nascimento; /* DateTime */
  /**
  * Quantidade de atendimento realizados.
  */
  public $quantidade_realizada; /* int */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->distrito_vinculo = $data["distrito_vinculo"];
    $this->municipio = $data["municipio"];
    $this->uf = $data["uf"];
    $this->local_atendimento = $data["local_atendimento"];
    $this->distrito_atendimento = $data["distrito_atendimento"];
    $this->data_atendimento = $data["data_atendimento"];
    $this->codigo_tipo_atendimento = $data["codigo_tipo_atendimento"];
    $this->descricao_tipo_atendimento = $data["descricao_tipo_atendimento"];
    $this->descricao_grupo_atendimento = $data["descricao_grupo_atendimento"];
    $this->codigo_grupo_atendimento_sus = $data["codigo_grupo_atendimento_sus"];
    $this->ocupacao_profissional = $data["ocupacao_profissional"];
    $this->descricao_tipo_vinculo_sms = $data["descricao_tipo_vinculo_sms"];
    $this->codigo_procedimento_sus = $data["codigo_procedimento_sus"];
    $this->descricao_procedimento = $data["descricao_procedimento"];
    $this->codigo_atividade_profissional_sus = $data["codigo_atividade_profissional_sus"];
    $this->descricao_atividade_profissional = $data["descricao_atividade_profissional"];
    $this->sexo = $data["sexo"];
    $this->idade = $data["idade"];
    $this->hora = $data["hora"];
    $this->periodo = $data["periodo"];
    $this->data_nascimento = $data["data_nascimento"];
    $this->quantidade_realizada = $data["quantidade_realizada"];
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
