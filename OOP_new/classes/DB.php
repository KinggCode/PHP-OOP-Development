<!-- Database Wrap
PDO - PHP Data Object -> mysql db -->

<?php
// Singelton Pattern - use the db on a fly so no need to call everytime.

class DB{

    // pdo -- > object
    // query -> last query executed
    // result -> store result set
    // count --> count of result


    private static $_instance = null;
    private $_pdo ,
    $_query,
    $_error = false,
    $_results,
    $_count = 0;


    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'),Config::get('mysql/username'),Config::get('mysql/password'));
            // echo("Connected");
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }


    // Get new instance of class
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }



    // Querying
    public function query($sql,$params = array()){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }

            if($this->_query->execute()){
                $this->_results  = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count  = $this->_query->rowCount();
            }
            else{
                $this->_error = true;
            }

        }
        return $this;
    }



    // Actions
    private function action($action,$table,$where = array()){
        if(count($where) == 3){
            $operators = array('=','>','<','>=','<=');
            // $joins = array('and','or');

            $field          = $where[0];
            $operator       = $where[1];
            $value          = $where[2];

            if(in_array($operator,$operators)){
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ";
                if(!$this->query($sql,array($value))->error()){
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($table,$where){
        return $this->action('SELECT *',$table,$where);
    }

    public function delete($table,$where){
        return $this->action('DELETE',$table,$where);
    }

    public function insert($table,$fields = array()){
        if(count($fields)){
            $keys = array_keys($fields);
            $values = null;
            $x = 1;

        foreach($fields as $field){
            $values .= "?";
            if($x < count($fields)){
                $values .= ', ';
            }
            $x++;
        }

        // die($values);

        $sql = "INSERT INTO {$table} (`".implode('`,`',$keys)."`) VALUES ({$values})";
       if(!$this->query($sql,$fields)->error()){
            return true;
       }

        }
        return false;
    }


    public function update($table,$id,$fields){
        $set = '';
        $x = 1;

        foreach($fields as $name => $value){
            $set .= "{$name} = ?";
            if($x < count($fields)){
                $set .= ", ";
            }
            $x++;
        }

    $sql = "UPDATE {$table} set {$set} WHERE id = {$id}";
    // die($sql);

    if(!$this->query($sql,$fields)->error()){
        return true;
    }
    else{
        return false;
    }






    }


    public function results(){
        return $this->_results;
  }

  public function first(){
    return $this->results()[0];
}



    public function error(){
          return $this->_error;
    }

    public function count(){
        return $this->_count;
  }


}




?>
