<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 15/05/2016
 * Time: 12:24
 */
class KronosDb
{
    public $host, $dbname, $user, $pass, $charset, $pdo;

    public function __construct($host = null, $dbname = null, $user = null, $pass = null, $charset = null)
    {
        $this->host    = HOST;
        $this->dbname  = DBNAME;
        $this->user    = DBUSER;
        $this->pass    = DBPASS;
        $this->charset = 'utf8';

        $this->connect();
    }

    final protected function connect()
    {
        $pdoconf  = "mysql:host={$this->host};";
        $pdoconf .= "dbname={$this->dbname};";
        $pdoconf .= "charset={$this->charset};";

        try{
            $this->pdo = new PDO($pdoconf, $this->user, $this->pass);
            if (DEVMODE === true){
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }

            unset($this->host);
            unset($this->dbname);
            unset($this->user);
            unset($this->pass);
            unset($this->charset);
        } catch (PDOException $e){
            if (DEVMODE === true){
                echo "Erro: ".$e->getMessage();
            }
            die();
        }
    }

    /*
     * function query()
     *
     * consulta com PDO
     *
     * @param string $stmt statement (consulta)
     * @param array $data_array binding
     */
    public function query($stmt, $data_array = null)
    {
        $query = $this->pdo->prepare($stmt);
        $check_exec = $query->execute($data_array);

        if ($check_exec){
            return $query;
        } else {
            $error = $query->errorInfo();
            $this->error = $error[2];

            return false;
        }
    }

    /*
     * function insert()
     *
     * insere valores na tabelaa
     *
     * @param string $tabela Nome da tabela
     * @param array (campos e valores a serem inseridos)
     *
     * Exemplo:
     *
     * $db->insert('tabela',
     *              // uma linha
     *              array('campo' => 'valor', 'campo' => 'valor')
     *
     *              // outra linha
     *              array('campo' => 'valor', 'campo', 'valor')
     *            );
     */

    public function insert( $table )
    {
        $campos = array();

        $placeHolders = '(';

        $valores = array();

        $j = 1;

        $data = func_get_args();

        if (!isset($data[1]) || ! is_array($data[1])){
            return;
        }

        for ($i = 1; $i < count($data); $i++){
            foreach ($data[$i] as $camp => $val){

                if ($i === 1){
                    $campos[] = "$camp";
                }

                if ($j <> $i){
                    $placeHolders .= '), (';
                }

                $placeHolders .= '?, ';

                $valores[] = $val;

                $j = $i;
            }

            $placeHolders = substr( $placeHolders, 0, strlen( $placeHolders ) - 2 );
        }
        $campos = implode(', ', $campos);

        $stmt = "INSERT INTO $table ( $campos ) VALUES $placeHolders)";
       /* var_dump($stmt);
        echo '<br>';
        var_dump($placeHolders);
        return;*/

        $insert = $this->query($stmt, $valores);

        if ($insert){
            if (method_exists($this->pdo, 'lastInsertId') && $this->pdo->lastInsertId()){
                $this->lastId = $this->pdo->lastInsertId();
            }
            return $insert;
        }
        return;
    }

    public function update($table, $where_field, $where_field_value, $values)
    {
        if (empty($table) || empty($where_field) || empty($where_field_value)){
            return;
        }

        $stmt =  " UPDATE " . $table . " set ";

        $set = array();

        $where = " WHERE " . $where_field . " = ?";

        if (!is_array($values)){
            return;
        }

        foreach ($values as $column => $value){
            $set[] = $column . " = ? ";
        }

        $set = implode(', ', $set);

        $stmt .= $set . $where;

        $values[] = $where_field_value;

        $values = array_values($values);

        $update = $this->query($stmt, $values);

        if($update){
            return $update;
        }

        return;
    }

    public function delete($table, $where_field, $where_field_value)
    {
        if(empty($table) || empty($where_field) || empty($where_field_value)){
            return;
        }

        $stmt = " DELETE FROM " . $table;

        $where = " WHERE " . $where_field .  " = ? ";

        $stmt .= $where;

        $values = array($where_field_value);

        $delete = $this->query($stmt, $values);

        if($delete){
            return $delete;
        }

        return;
    }
}