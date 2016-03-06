<?php
class Uteis {

  public function deleta($char, $texto) {
    return str_replace($char, '', $texto);
  }

  public function ponto($texto) {
    $posicao = strpos($texto, ',');
    if ("'$posicao'" != "''") {
      return str_replace(',', '.', $this -> deleta('.', $texto));
    } else {
      return $texto;
    }
  }

  public function virgula($texto) {
    $posicao = strpos($texto, '.');
    if ("'$posicao'" != "''") {
      return str_replace('.', ',', $this -> deleta(',', $texto));
    } else {
      return $texto;
    }
  }

  public function mponto($texto) {
    $tmp = $this -> ponto($texto);
    return number_format($tmp, 2, '.', '');
  }

  public function mvirgula($texto) {
    $tmp = $this -> ponto($texto);
    return number_format($tmp, 2, ',', '');

  }

  public function criarLink($var) {
    $var = str_replace(" ", "_", $var);
    $var = strtolower($var);
    $var = $this -> normalizar($var);
    return urlencode($var);
  }

  public function lerLink($var) {
    $var = str_replace("_", " ", $var);
    return urldecode($var);
  }

  public function normalizar($var) {
    $acentos = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç");
    $normais = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C");
    return str_replace($acentos, $normais, $var);
  }

  public function validar($texto, $tamanho) {
    if (strlen($texto) < $tamanho)
      $texto = '';
    $texto = str_replace('*', '', $texto);
    $texto = str_replace('=', '', $texto);
    $texto = str_replace('--', '', $texto);
    $texto = str_replace("'", '', $texto);
    $texto = str_replace(';delete', '', $texto);
    $texto = str_replace(';alter', '', $texto);
    $texto = str_replace(';drop', '', $texto);
    $texto = str_replace(';insert', '', $texto);
    $texto = str_replace('; delete ', '', $texto);
    $texto = str_replace('; alter ', '', $texto);
    $texto = str_replace('; drop ', '', $texto);
    $texto = str_replace('; insert ', '', $texto);
    $texto = str_replace(' or ', '', $texto);
    return $texto;
  }

  public function converterData($var) {
    return implode('/', array_reverse(explode('/', $var)));
  }

  function validarCPF($cpf) {
    //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cpf em diferentes formatos como "000.000.000-00", "00000000000", "000 000 000 00" etc...
    if (strlen(trim($cpf)) > 0) {
      $j = 0;
      for ($i = 0; $i < (strlen($cpf)); $i++) {
        if (is_numeric($cpf[$i])) {
          $num[$j] = $cpf[$i];
          $j++;
        }
      }
      //Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
      if (count($num) != 11) {
        $isCpfValid = false;
      }
      //Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares e por isso precisam ser filtradas nesta parte.
      else {
        for ($i = 0; $i < 10; $i++) {
          if ($num[0] == $i && $num[1] == $i && $num[2] == $i && $num[3] == $i && $num[4] == $i && $num[5] == $i && $num[6] == $i && $num[7] == $i && $num[8] == $i) {
            $isCpfValid = false;
            break;
          }
        }
      }
    } else {
      $isCpfValid = false;
    }
    //Etapa 4: Calcula e compara o primeiro dígito verificador.
    if (!isset($isCpfValid)) {
      $j = 10;
      for ($i = 0; $i < 9; $i++) {
        $multiplica[$i] = $num[$i] * $j;
        $j--;
      }
      $soma = array_sum($multiplica);
      $resto = $soma % 11;
      if ($resto < 2) {
        $dg = 0;
      } else {
        $dg = 11 - $resto;
      }
      if ($dg != $num[9]) {
        $isCpfValid = false;
      }
    }
    //Etapa 5: Calcula e compara o segundo dígito verificador.
    if (!isset($isCpfValid)) {
      $j = 11;
      for ($i = 0; $i < 10; $i++) {
        $multiplica[$i] = $num[$i] * $j;
        $j--;
      }
      $soma = array_sum($multiplica);
      $resto = $soma % 11;
      if ($resto < 2) {
        $dg = 0;
      } else {
        $dg = 11 - $resto;
      }
      if ($dg != $num[10]) {
        $isCpfValid = false;
      } else {
        $isCpfValid = true;
      }
    }
    return $isCpfValid;
  }

  function validarCEP($CEP) {
    $padrao = '/[0-9]{5}\-[0-9]{3}/';
    $padrao2 = '/[0-9]{8}/';
    if (preg_match($padrao, trim($CEP)) || preg_match($padrao2, trim($CEP)))
      return true;
    else
      return false;
  }

  function validarEmail($email) {
    $padrao = '/[[:alnum:]]\@[[:alnum:]]+(\.[[:alnum:]])+/';
    if (preg_match($padrao, trim($email)))
      return true;
    else
      return false;
  }

}
