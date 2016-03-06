<?php

class ModelSaude extends Model {

    protected $saude;
    protected $solicitacoes;
    protected $resposta;

  public function __construct() {
    $this -> zconect();
    $this -> apiClient = new ApiImaV1\client\apiClient;
    $this -> saude = new ApiImaV1\SadeApi($this->apiClient);
    $this -> resposta = new ApiImaV1\model\SaudeResponse;
  }

  public function sincronizaSolicitacoes(){
    $sql = 'select count(*) as registros from saude';
    $result = $this->zpdo->query($sql);
    $valor = $result->fetch_object();
    $offset = $valor->registros;
    $limite = $offset+150;
    while ($offset < $limite){
      $this -> resposta = $this -> saude -> saudeGet($this->token, $offset, 10, null, null);
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
	}

  public function inserir($registro) {
    $table = 'saude';
    foreach($registro as $key => $value){
      $fields[] = $key;
      if (!is_a($value, "DateTime")){
        $values[] = $value;
      }else{
        $values[] = $value -> format('Y-m-d H:i:s');
      }
    }
/*    print_r($fields);
    echo '<br /><br />';
    print_r($values);
    echo '<br /><br /><br />';*/
    //$this -> insert($table, $fields, $values, 0);
    //return 'Solicitacao importada com sucesso !!!';
  }

  public function quantidadeAtendimentos() {
    $dataIni = date('Y/m/d', strtotime('2016/01/01'));
    $dataFim = date('Y/m/d');
    $table = "saude";
    $fields = "count(*) as quantidade";
    $where = "data_atendimento between '".$dataIni."' and '".$dataFim."'";
    $retorno = $this -> read($table, $fields, $where, null, null, null);
    return $retorno[0]->quantidade;
  }

}
