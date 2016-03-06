<?php

class ModelAtendimento extends Model {

  protected $atendimento;
  protected $solicitacoes;
  protected $resposta;

  public function __construct() {
    $this -> zconect();
    $this -> apiClient = new ApiImaV1\client\apiClient;
    $this -> atendimento = new ApiImaV1\AtendimentoApi($this->apiClient);
    $this -> resposta = new ApiImaV1\model\SolicitacaoResponse;
  }

	public function sincronizaSolicitacoes(){
    $sql = 'select count(*) as registros from solicitacoes';
    $result = $this->zpdo->query($sql);
    $valor = $result->fetch_object();
    $offset = 0;//$valor->registros;
    $limite = $offset+150;
    while ($offset < $limite){
      $this -> resposta = $this -> atendimento -> atendimentoGet($this->token, $offset, 10, null, null);
      //$this -> resposta = $this -> atendimento -> atendimentoIdGet($this->token,'7fbc8b82a76d',null);quit();
      if ($this -> resposta != null){
        foreach($this->resposta as $registro){
          $this -> inserir ($registro);
        }
      }else{
        echo 'vazio';
        break;
      }
      $offset = $offset+10;
    }
    echo 'concluido';
/*
    $offset = 0;
    $filtros = 'data_cadastro:2016-03-01';
    $this -> resposta = $this -> atendimento -> atendimentoGet($this->token, $offset, 10, null, $filtros);
    foreach($this->resposta as $registro){
      print_r($registro);
      echo '<br /><br /><br />';
    }*/

	}

	public function listarSolicitacoes($pagina = 0){
    $table = "solicitacoes";
    $fields = "id, categoria";
    $where = null;
    $order = "id";
    $limit = null;
    $offset = $pagina*10;
    return $this -> read($table, $fields, $where, $order, $limit, $offset);
  }

  public function consultarMedia($data = null){
    if($data == null){
      $dataIni = date('Y/m/d', strtotime("-60 days"));
    }else{
      $dataIni = implode('/', array_reverse(explode('/', $data)));
    }
    $comando = 'select tipo_solicitacao, descricao_tipo_solicitacao ,
                count(*) Total_Abertos,
                avg(DATEDIFF (CURRENT_DATE(), data_cadastro)) Media_dias_Atraso
                from solicitacoes
                where data_conclusao is null
                and data_cadastro >= ('.$dataIni.')
                group by tipo_solicitacao, descricao_tipo_solicitacao;';
    $retorno = $this -> open($comando);
    foreach($retorno as $objeto){
      $valores[] = get_object_vars($objeto);
    }
    return json_encode($valores);
  }

  public function consultarMediaAtraso($data = null){
    if($data == null){
      $dataIni = date('Y/m/d', strtotime("-60 days"));
    }else{
      $dataIni = implode('/', array_reverse(explode('/', $data)));
    }
    $comando = 'select descricao_assunto,
      avg(DATEDIFF (data_conclusao, data_cadastro)) Media_dias_Atraso
      from solicitacoes
      group by descricao_assunto;';
    $retorno = $this -> open($comando);
  }


  public function inserir($registro) {
    $table = 'solicitacoes';
    foreach($registro as $key => $value){
      $fields[] = $key;
      if (!is_a($value, "DateTime")){
        $values[] = $value;
      }else{
        $values[] = $value -> format('Y-m-d H:i:s');
      }
    }
    $this -> insert($table, $fields, $values, 0);
//    return 'Solicitacao importada com sucesso !!!';
  }

}
