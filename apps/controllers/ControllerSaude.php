<?php

class ControllerSaude extends Controller {

  public function inicial() {
    $model = new ModelSaude();
    $model -> sincronizaSolicitacoes();


//    $model = new ModelSaude();
//    $model -> solicitacoes();
    /*$this -> produtos = $model -> listagemInicial();
    $this -> promocao = $model -> listarPromocoes();
    $this -> total = count($this -> produtos);
    $this -> parcial = ceil($this -> total / 2);*/
    //$this -> view('Home');
  }

  public function sol(){
    $model = new ModelSaude();
    $model -> consultarMedia('01/01/2016');
  }

}
