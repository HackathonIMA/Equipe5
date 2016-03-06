<?php

require_once ('PHPMailer/class.phpmailer.php');

class Mail {

  private $mail;

  public function __construct($assunto, $endereco) {
    $this->mail = new PHPMailer();
    $this->mail->IsSMTP();
    $this->mail->IsHTML(true);
    $this->mail->CharSet = 'utf-8';
    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = "ssl";
    $this->mail->Host = "smtp.gmail.com";
    $this->mail->Port = 465;
    $this->mail->Username = "design@zonebloom.com.br";
    $this->mail->Password = "4n4t34m0";
    $this->mail->SetFrom('design@zonebloom.com.br', 'Teste Loja - Varejão Amparense');
    $this->mail->Subject = $assunto;
    $this->mail->AddAddress($endereco);
    $this->mail->AltBody = "Para visualizar esta mensagem você precisa ativar o modo HTML!";
  }

  public function destinatario($endereco) {
    $this->mail->AddAddress($endereco);
  }

  public function carbono($endereco) {
    $this->mail->AddCC($endereco);
  }

  public function devolucao($endereco, $apelido = null) {
    $this->mail->ClearReplyTos();
    $this->mail->AddReplyTo($endereco, $apelido);
  }

  public function mensagem($arquivo, $dados = null) {
    $caminho = './apps/mails/' . $arquivo;
    $conteudo = file_get_contents($caminho);
    $msg = $this->carregar($conteudo, $dados);
    $this->mail->MsgHTML($msg);
  }

  private function carregar($conteudo, $vars = Array()) {
    $blocos = $this->blocos($conteudo);
    $procurados = $blocos[0][1];
    $descartados = $blocos[1][1];
    $for = $blocos[2][1];
    $encontrados = Array();
    if (sizeof($vars) > 0) {
      foreach ($vars as $variavel => $dados) {
        if (!is_array($dados)) {
          $conteudo = str_ireplace("{" . $variavel . "}", $dados, $conteudo);
          for ($i = 0; $i < count($procurados); $i ++ ) {
            if (strtolower($variavel) == strtolower($procurados[$i])) {
              $encontrados[] = $procurados[$i];
            }
          }
        }
      }
    }
    $procurados = $this->excluirArray($procurados, $encontrados);
    $descartados = $this->excluirArray($descartados, $encontrados);
    $conteudo = $this->ativarBloco($conteudo, $encontrados, 1);
    $conteudo = $this->ativarBloco($conteudo, $descartados, 0);
    $conteudo = $this->excluirBloco($conteudo, $procurados, 1);
    $conteudo = $this->excluirBloco($conteudo, $encontrados, 0);
    $conteudo = $this->forBloco($conteudo, $for, $vars);
    return $conteudo;
  }

  private function excluirArray($array, $found) {
    foreach ($found as $busca) {
      $indice = array_search($busca, $array);
      if ($indice !== FALSE) {
        unset($array[$indice]);
      }
    }
    return array_values($array);
  }

  private function ativarBloco($conteudo, $blocos, $tipo) {
    if ($tipo == 1) {
      foreach ($blocos as $bloco) {
        $buscas = Array("<if $bloco>\n", "</if $bloco>\n", "<if $bloco>", "</if $bloco>");
        foreach ($buscas as $busca) {
          $conteudo = str_ireplace($busca, '', $conteudo);
        }
      }
    }
    if ($tipo == 0) {
      foreach ($blocos as $bloco) {
        $buscas = Array("<ifnot $bloco>\n", "</ifnot $bloco>\n", "<ifnot $bloco>", "</ifnot $bloco>");
        foreach ($buscas as $busca) {
          $conteudo = str_ireplace($busca, '', $conteudo);
        }
      }
    }

    return $conteudo;
  }

  private function forBloco($conteudo, $blocos, $vars) {
    foreach ($blocos as $bloco) {
      $buscas = Array("<for $bloco>\n", "</for $bloco>\n", "</for $bloco>");
      $inicial = stripos($conteudo, $buscas[0]);
      $final = stripos($conteudo, $buscas[1]);
      if ($final === FALSE) {
        $final = stripos($conteudo, $buscas[2]);
        $final = $final + strlen($buscas[2]);
        $blocof = $buscas[2] . ' ';
      } else {
        $final = $final + strlen($buscas[1]);
        $blocof = $buscas[1];
      }
      $cabecalho = substr($conteudo, 0, $inicial);
      $rodape = substr($conteudo, $final, strlen($conteudo));
      $macroi = $inicial + strlen($buscas[0]);
      $macrof = ($final - strlen($blocof)) - $macroi;
      $modelo = substr($conteudo, $macroi, $macrof);
      if (sizeof($vars) > 0) {
        $retorno = null;
        foreach ($vars as $var => $dados) {
          if ($var == strtolower($bloco)) {
            for ($i = 0; $i < count($dados); $i ++ ) {
              $newmodelo = $modelo;
              foreach ($dados[$i] as $chave => $valor) {
                $newmodelo = str_ireplace("{" . $chave . "}", $valor, $newmodelo);
              }
              $retorno .= $newmodelo;
            }
          }
        }

      }
      $conteudo = $cabecalho . $retorno . $rodape;
    }
    return $conteudo;
  }

  private function excluirBloco($conteudo, $blocos, $tipo) {
    if ($tipo == 1) {
      foreach ($blocos as $bloco) {
        $buscas = Array("<if $bloco>", "</if $bloco>\n", "</if $bloco>");
        $inicial = stripos($conteudo, $buscas[0]);
        $final = stripos($conteudo, $buscas[1]);
        if ($final === FALSE) {
          $final = stripos($conteudo, $buscas[2]);
          $final = $final + strlen($buscas[2]);
        } else {
          $final = $final + strlen($buscas[1]);
        }
        $conteudo = substr($conteudo, 0, $inicial) . substr($conteudo, $final, strlen($conteudo));
      }
    }
    if ($tipo == 0) {
      foreach ($blocos as $bloco) {
        $buscas = Array("<ifnot $bloco>", "</ifnot $bloco>\n", "</ifnot $bloco>");
        $inicial = stripos($conteudo, $buscas[0]);
        if ($inicial !== FALSE) {
          $final = stripos($conteudo, $buscas[1]);
          if ($final === FALSE) {
            $final = stripos($conteudo, $buscas[2]);
            $final = $final + strlen($buscas[2]);
          } else {
            $final = $final + strlen($buscas[1]);
          }
          $conteudo = substr($conteudo, 0, $inicial) . substr($conteudo, $final, strlen($conteudo));
        }
      }
    }
    return $conteudo;
  }

  private function blocos($conteudo) {
    $reg = "/<if\s+(([[:alnum:]]|_)+)>/im";
    preg_match_all($reg, $conteudo, $procurados);
    $reg = "/<ifnot\s+(([[:alnum:]]|_)+)>/im";
    preg_match_all($reg, $conteudo, $descartados);
    $reg = "/<for\s+(([[:alnum:]]|_)+)>/im";
    preg_match_all($reg, $conteudo, $for);
    return Array($procurados, $descartados, $for);
  }

  public function enviar() {
    if (!$this->mail->Send()) {
      return "erro";
    } else {
      return "ok";
    }
  }

}
