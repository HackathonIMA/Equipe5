<?php

class Model {


  protected $zpdo;

  private $host = '127.0.0.1';
  private $database = 'hackaton';
  private $user = 'root';
  private $pass = '';


  public $retorno;

  protected $token = '2k0dDwZl4c39';//'ndxs2FxqyVy9';
  protected $apiClient;

  public function zconect() {
    $this->zpdo = new mysqli($this->host, $this->user, $this->pass, $this->database);
    $this->zpdo->set_charset("utf8");
  }

  //Insere os valores($values) nos campos($fields) da tabela($table)
  public function insert($table, $fields, $values, $debug = null) {
    if (($fields == null) || ($values == null))
      return '01-Vazio';
    if (count($fields) <> count($values))
      return '01-Array';
    $count = count($fields);
    $sql = "INSERT INTO $table (";
    for ($i = 0; $i < $count; $i ++ ) {
      $sql .= $fields[$i];
      if ($i < $count - 1)
        $sql .= ", ";
    }
    $sql .= ") VALUES (";
    for ($i = 0; $i < $count; $i ++ ) {
      $sql .= "'" . $values[$i] . "'";
      if ($i < $count - 1)
        $sql .= ", ";
    }
    $sql .= ")";
    if ($debug == 1) {
      echo "<br />$sql<br /><br />";
    }
    if ($this->zpdo->query($sql)) {
      return '01-Ok-' . $this->zpdo->affected_rows;
    } else {
      return '01-Erro';
    }
  }


    public function select($table, $fields = null, $where = null, $order = null, $limit = null, $offset = null, $debug = null) {
      if (trim($table) == null)
        return '04-Vazio';
      if ($fields == null)
        $sql = "SELECT *";
      else
        $sql = "SELECT $fields";
      $sql .= " FROM $table";
      if (!trim($where) == null)
        $sql .= " WHERE $where";
      if (!trim($order) == null)
        $sql .= " ORDER BY $order";
      if (!trim($limit) == null)
        $sql .= " LIMIT $limit";
      if (!trim($offset) == null)
        $sql .= " OFFSET $offset";
      if ($debug == 1)
        echo "<br />$sql<br /><br />";
      if ($result = $this->zpdo->query($sql)) {
        $this->retorno = $result;
        return '04-Ok' . $result->num_rows;
      } else
        return '04-Erro';
    }

    public function read($table, $fields = null, $where = null, $order = null, $limit = null, $offset = null, $debug = null) {
      if ($this->select($table, $fields, $where, $order, $limit, $offset, $debug) != '04-Erro') {
        $all = null;
        while ($row = $this->retorno->fetch_object()) {
          $all[] = $row;
        }
        return $all;
      }
    }

    public function open($sql) {
      if ($sql != null) {
        if ($result = $this->zpdo->query($sql)) {
          $this->retorno = $result;
        }
        while ($row = $this->retorno->fetch_object()) {
          $all[] = $row;
        }
        return $all;
      }
    }

}
