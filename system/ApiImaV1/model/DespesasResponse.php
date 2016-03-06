<?php


namespace ApiImaV1\model;

use \ArrayAccess;

class DespesasResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'links' => 'array[LinksModel]',
      'id' => 'string',
      'ano_mes_emissao' => 'int',
      'dia_lancamento' => 'int',
      'dia_vencimento' => 'int',
      'nota_empenho' => 'string',
      'processo_descricao' => 'string',
      'valor_empenho' => 'int',
      'valor_liquidado' => 'int',
      'valor_a_liquidar' => 'int',
      'valor_pago' => 'int',
      'valor_a_pagar' => 'int',
      'valor_acrescimo_empenho' => 'int',
      'valor_acrescimo_liquidado' => 'int',
      'valor_acrescimo_a_liquidar' => 'int',
      'valor_acrescimo_pago' => 'int',
      'valor_acrescimo_a_pagar' => 'int'
  );

  static $attributeMap = array(
      'links' => 'links',
      'id' => 'ID',
      'ano_mes_emissao' => 'anoMesEmissao',
      'dia_lancamento' => 'diaLancamento',
      'dia_vencimento' => 'diaVencimento',
      'nota_empenho' => 'notaEmpenho',
      'processo_descricao' => 'processoDescricao',
      'valor_empenho' => 'valorEmpenho',
      'valor_liquidado' => 'valorLiquidado',
      'valor_a_liquidar' => 'valorALiquidar',
      'valor_pago' => 'valorPago',
      'valor_a_pagar' => 'valorAPagar',
      'valor_acrescimo_empenho' => 'valorAcrescimoEmpenho',
      'valor_acrescimo_liquidado' => 'valorAcrescimoLiquidado',
      'valor_acrescimo_a_liquidar' => 'valorAcrescimoALiquidar',
      'valor_acrescimo_pago' => 'valorAcrescimoPago',
      'valor_acrescimo_a_pagar' => 'valorAcrescimoAPagar'
  );

  
  public $links; /* array[LinksModel] */
  /**
  * Identificador do registro.
  */
  public $id; /* string */
  /**
  * Ano e MÃªs da EmissÃ£o da Nota de Empenho
  */
  public $ano_mes_emissao; /* int */
  /**
  * Ano , Mes e Dia do LanÃ§amento da Nota de Empenho
  */
  public $dia_lancamento; /* int */
  /**
  * Ano , Mes e Dia do Vencimento da Nota de Empenho
  */
  public $dia_vencimento; /* int */
  /**
  * Numero da Nota de Empenho
  */
  public $nota_empenho; /* string */
  /**
  * Numero do Processo de Compra
  */
  public $processo_descricao; /* string */
  /**
  * Valor Empenhado
  */
  public $valor_empenho; /* int */
  /**
  * Valor Liquidado
  */
  public $valor_liquidado; /* int */
  /**
  * Valor a Liquidar
  */
  public $valor_a_liquidar; /* int */
  /**
  * Valor Pago
  */
  public $valor_pago; /* int */
  /**
  * Valor a Pagar
  */
  public $valor_a_pagar; /* int */
  /**
  * Valor de AcrÃ©scimo do Empenho
  */
  public $valor_acrescimo_empenho; /* int */
  /**
  * Valor de AcrÃ©scimo Liquidado
  */
  public $valor_acrescimo_liquidado; /* int */
  /**
  * Valor de AcrÃ©scimo a Liquidar
  */
  public $valor_acrescimo_a_liquidar; /* int */
  /**
  * Valor de AcrÃ©cimo Pago
  */
  public $valor_acrescimo_pago; /* int */
  /**
  * Valor de AcrÃ©scimo a Pagar
  */
  public $valor_acrescimo_a_pagar; /* int */

  public function __construct(array $data = null) {
    $this->links = $data["links"];
    $this->id = $data["id"];
    $this->ano_mes_emissao = $data["ano_mes_emissao"];
    $this->dia_lancamento = $data["dia_lancamento"];
    $this->dia_vencimento = $data["dia_vencimento"];
    $this->nota_empenho = $data["nota_empenho"];
    $this->processo_descricao = $data["processo_descricao"];
    $this->valor_empenho = $data["valor_empenho"];
    $this->valor_liquidado = $data["valor_liquidado"];
    $this->valor_a_liquidar = $data["valor_a_liquidar"];
    $this->valor_pago = $data["valor_pago"];
    $this->valor_a_pagar = $data["valor_a_pagar"];
    $this->valor_acrescimo_empenho = $data["valor_acrescimo_empenho"];
    $this->valor_acrescimo_liquidado = $data["valor_acrescimo_liquidado"];
    $this->valor_acrescimo_a_liquidar = $data["valor_acrescimo_a_liquidar"];
    $this->valor_acrescimo_pago = $data["valor_acrescimo_pago"];
    $this->valor_acrescimo_a_pagar = $data["valor_acrescimo_a_pagar"];
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
