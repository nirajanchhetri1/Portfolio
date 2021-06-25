<?php

class Db
{
  private $conn;

  public function __construct()
  {
    $dns = 'mysql:host=localhost;dbname=portfolio';
    $pdo = new PDO($dns, 'root', '');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $this->conn = $pdo;
  }

  public function getConnection()
  {
    $dns = 'mysql:host=localhost;dbname=portfolio';
    $pdo = new PDO($dns, 'root', '');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
  }

  public function query($sql, $data, $fetch = false, $single = false)
  {
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute($data);

    if ($fetch)
      return isset($single) ? $this->fetchSingle($result) : $this->fetchAll($result);

    if ($result)
      return true;
    else
      return false;
  }



  public function create($table, $data)
  {
    $query = $this->buildInsertQuery($table, $data);
    if ($this->executeQuery($query, $data)) {
      $insertedId = $this->conn->lastInsertId();
      return $this->getData($table, null, $insertedId);
    }
    return false;
  }

  public function getData($table, $select = array(), $id = null, $limit = null)
  {
    $sql = "SELECT ";
    if (isset($select) && count($select) > 0) {
      $sql .= implode(', ', $select);
    } else {
      $sql .= '*';
    }
    $sql .= " FROM $table ";
    $sql .= isset($id) && $id > 0 ? " WHERE id = :id" : '';

    if (isset($limit)) {
      $sql .= " LIMIT $limit";
    }
    // return $sql;
    if (isset($id)) {
      $executedQuery = $this->executeQuery($sql, ['id' => $id]);
    } else {
      $executedQuery = $this->executeQuery($sql);
    }
    return isset($id) && $id > 0 ? $this->fetchSingle($executedQuery) : $this->fetchAll($executedQuery);
  }

  public function getWhereData($table, $where = array(), $select = array(), $single = false)
  {
    $sql = 'SELECT ';
    if (isset($select) && count($select) > 0) {
      $sql .= implode(', ', $select);
    } else {
      $sql .= '*';
    }

    $sql .= " FROM $table";
    foreach ($where as $key => $value) {
      $sql .= " WHERE $key = :$key";
    }
    $executedQuery = $this->executeQuery($sql, $where);
    return $single ? $this->fetchSingle($executedQuery) : $this->fetchAll($executedQuery);
  }

  private function prepareQuery($query)
  {
    return $this->conn->prepare($query);
  }

  private function executeQuery($query, $data = null)
  {
    $stmt = $this->prepareQuery($query);
    if (isset($data))
      $stmt->execute($data);
    else
      $stmt->execute();
    return $stmt;
  }

  private function buildInsertQuery($table, $data)
  {
    if (is_array($data)) {
      $keys = array();
      $valuesArr = array();
      foreach ($data as $key => $value) {
        array_push($keys, $key);
        array_push($valuesArr, ':' . $key);
      }
      $fields = implode(',', $keys);
      $values = implode(',', $valuesArr);
      $sql = "INSERT INTO $table ($fields) VALUES($values)";
      return $sql;
    } else {
      return false;
    }
  }

  private function fetchAll($stmt)
  {
    return $stmt->fetchAll();
  }

  private function fetchSingle($stmt)
  {
    $data = $stmt->fetch();

    return $data;
  }
}
