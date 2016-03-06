<?php

class ControllerAtendimento extends Controller {

  public function inicial() {
    $modelA = new ModelAtendimento();
    $modelB = new ModelSaude();
//    $model -> sincronizaSolicitacoes();


    $this -> novasSolicitacoes = $modelA -> contarNovas();
    $this -> mediaEspera = $modelA -> contarEspera();
    $this -> mediaAtraso = $modelA -> contarAtraso();
    $this -> qtdAtendimentos = $modelB -> quantidadeAtendimentos();
    /*$this -> produtos = $model -> listagemInicial();
    $this -> promocao = $model -> listarPromocoes();
    $this -> total = count($this -> produtos);
    $this -> parcial = ceil($this -> total / 2);*/
    $this -> view('Solicitacoes');
  }


  public function sol(){
    $model = new ModelAtendimento();
    $retorno = $model -> consultarMedia('01/01/2016');
    print_r($retorno);
  }

}
