<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class ReceitaResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'ano_mes_emissao' => 'int',
      'codigo_origem_recurso' => 'string',
      'valor_previsao' => 'string',
      'valor_previsao_inicial' => 'string',
      'valor_previsao_adicional' => 'string',
      'valor_previsao_deducao' => 'string',
      'valor_previsao_anulacao' => 'string',
      'valor_realizado' => 'string',
      'valor_realizado_deduzido' => 'string',
      'valor_a_realizar' => 'string',
      'valor_a_realizar_deduzido' => 'string',
      'valor_previsao_acrescimo' => 'string',
      'valor_previsao_inicial_acrescimo' => 'string',
      'valor_previsao_adicional_acrescimo' => 'string',
      'valor_previsao_deducao_acrescimo' => 'string',
      'valor_previsao_anulacao_acrescimo' => 'string',
      'valor_realizado_acrescimo' => 'string',
      'valor_realizado_deduzido_acrescimo' => 'string',
      'valor_a_realizar_acrescimo' => 'string',
      'valor_a_realizar_deduzido_acrescimo' => 'string'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'ano_mes_emissao' => 'anoMesEmissao',
      'codigo_origem_recurso' => 'codigoOrigemRecurso',
      'valor_previsao' => 'valorPrevisao',
      'valor_previsao_inicial' => 'valorPrevisaoInicial',
      'valor_previsao_adicional' => 'valorPrevisaoAdicional',
      'valor_previsao_deducao' => 'valorPrevisaoDeducao',
      'valor_previsao_anulacao' => 'valorPrevisaoAnulacao',
      'valor_realizado' => 'valorRealizado',
      'valor_realizado_deduzido' => 'valorRealizadoDeduzido',
      'valor_a_realizar' => 'valorARealizar',
      'valor_a_realizar_deduzido' => 'valorARealizarDeduzido',
      'valor_previsao_acrescimo' => 'valorPrevisaoAcrescimo',
      'valor_previsao_inicial_acrescimo' => 'valorPrevisaoInicialAcrescimo',
      'valor_previsao_adicional_acrescimo' => 'valorPrevisaoAdicionalAcrescimo',
      'valor_previsao_deducao_acrescimo' => 'valorPrevisaoDeducaoAcrescimo',
      'valor_previsao_anulacao_acrescimo' => 'valorPrevisaoAnulacaoAcrescimo',
      'valor_realizado_acrescimo' => 'valorRealizadoAcrescimo',
      'valor_realizado_deduzido_acrescimo' => 'valorRealizadoDeduzidoAcrescimo',
      'valor_a_realizar_acrescimo' => 'valorARealizarAcrescimo',
      'valor_a_realizar_deduzido_acrescimo' => 'valorARealizarDeduzidoAcrescimo'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Ano e MÃªs da EmissÃ£o de Receita
  */
  public $ano_mes_emissao; /* int */
  /**
  * CÃ³digo da Origem do Recurso
  */
  public $codigo_origem_recurso; /* string */
  /**
  * Valor Prevista da receita
  */
  public $valor_previsao; /* string */
  /**
  * Valor de previsÃ£o inicial da Receita
  */
  public $valor_previsao_inicial; /* string */
  /**
  * Valor de previsÃ£o adicicional da receita
  */
  public $valor_previsao_adicional; /* string */
  /**
  * Valor de DeduÃ§Ã£o previsto da receita
  */
  public $valor_previsao_deducao; /* string */
  /**
  * valor de AnulaÃ§Ã£o previsto da receita
  */
  public $valor_previsao_anulacao; /* string */
  /**
  * Valor Realizado da receita
  */
  public $valor_realizado; /* string */
  /**
  * Valor Realizado Deduzido da Receita
  */
  public $valor_realizado_deduzido; /* string */
  /**
  * Valor a Realizar da Receita
  */
  public $valor_a_realizar; /* string */
  /**
  * Valor a Realizar deduzido da Receita
  */
  public $valor_a_realizar_deduzido; /* string */
  /**
  * Valor de AcrÃ©scimo previsto da receita
  */
  public $valor_previsao_acrescimo; /* string */
  /**
  * Valor de acrÃ©scimo previsto inicialmente da receita
  */
  public $valor_previsao_inicial_acrescimo; /* string */
  /**
  * Valor de AcrÃ©cimo Adicional previsto da receita
  */
  public $valor_previsao_adicional_acrescimo; /* string */
  /**
  * Valor de AcrÃ©scimo deduzido previsto da receita
  */
  public $valor_previsao_deducao_acrescimo; /* string */
  /**
  * Valor de Acrescimo anulado previsto da receita
  */
  public $valor_previsao_anulacao_acrescimo; /* string */
  /**
  * Valor de Acrescimo realizado da receita
  */
  public $valor_realizado_acrescimo; /* string */
  /**
  * Valor de Acrescimo deduzido realizado da receita
  */
  public $valor_realizado_deduzido_acrescimo; /* string */
  /**
  * Valor de Acrescimo a realizar da receita
  */
  public $valor_a_realizar_acrescimo; /* string */
  /**
  * Valor de Acrescimo deduzido a realizar da receita
  */
  public $valor_a_realizar_deduzido_acrescimo; /* string */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->ano_mes_emissao = $data["ano_mes_emissao"];
    $this->codigo_origem_recurso = $data["codigo_origem_recurso"];
    $this->valor_previsao = $data["valor_previsao"];
    $this->valor_previsao_inicial = $data["valor_previsao_inicial"];
    $this->valor_previsao_adicional = $data["valor_previsao_adicional"];
    $this->valor_previsao_deducao = $data["valor_previsao_deducao"];
    $this->valor_previsao_anulacao = $data["valor_previsao_anulacao"];
    $this->valor_realizado = $data["valor_realizado"];
    $this->valor_realizado_deduzido = $data["valor_realizado_deduzido"];
    $this->valor_a_realizar = $data["valor_a_realizar"];
    $this->valor_a_realizar_deduzido = $data["valor_a_realizar_deduzido"];
    $this->valor_previsao_acrescimo = $data["valor_previsao_acrescimo"];
    $this->valor_previsao_inicial_acrescimo = $data["valor_previsao_inicial_acrescimo"];
    $this->valor_previsao_adicional_acrescimo = $data["valor_previsao_adicional_acrescimo"];
    $this->valor_previsao_deducao_acrescimo = $data["valor_previsao_deducao_acrescimo"];
    $this->valor_previsao_anulacao_acrescimo = $data["valor_previsao_anulacao_acrescimo"];
    $this->valor_realizado_acrescimo = $data["valor_realizado_acrescimo"];
    $this->valor_realizado_deduzido_acrescimo = $data["valor_realizado_deduzido_acrescimo"];
    $this->valor_a_realizar_acrescimo = $data["valor_a_realizar_acrescimo"];
    $this->valor_a_realizar_deduzido_acrescimo = $data["valor_a_realizar_deduzido_acrescimo"];
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
