<?php
class connection
{
    private $server = "localhost";                          //Variables para facilitar lectura de los args que se pasan al PDO
    private $username = "id21031159_admin";
    private $password = "Tadeo.123";
    private $connection;
    private $db = "id21031159_projects";

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);         //Al PDO se le pasan nombre de servidor, nombre de base, usuario y contraseña
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "Connection Failed" . $e;
        }
    }

    public function run($sql){                      //Método para ejecutar INSERT, UPDATE y DELETE. Devuelve id del último Insert.
        $this->connection->exec($sql);
        return $this->connection->lastInsertId();
    }

    public function request($sql){                          //Prepara un objeto en base a la orden SQL que pasemos. A través de ese objeto realiza un request a la db
        $sentence = $this->connection->prepare($sql);       // retorna un array.
        $sentence->execute();
        return $sentence->fetchAll();
    }
}
?>
