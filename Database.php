<?php
class Database 
{
    private $host;
    private $db_name;
    private $username;
    private $password;

    private $conn = null;
    private static $instance;

    // Singleton konstruktor
    private function __construct() 
    {
        $config = include('./config.php');
        $this->host = $config['host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['username'];
        $this->password = $config['password'];

        try 
        {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException $e) 
        {
            echo "Greška prilikom povezivanja s bazom podataka: " . $e->getMessage();
        }
    }

    // instanca klase
    public static function getInstance() 
    {
        if (!self::$instance) 
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // objekt
    public function getConnection() 
    {
        return $this->conn;
    }
}

?>