<?php

class ControllerHome extends Controller {

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
    $this -> view('Home');
  }
}
