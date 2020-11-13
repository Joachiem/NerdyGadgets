<?php
class DB
{
    private $host = 'localhost';
    private $db = 'nerdygadgets';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $conn;

    /**
     * Construcs mysql connection
     * @return mixed
     */
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Mysql check for result
     * @param mixed Result data
     * @return mixed Data or error
     */
    private function returnQuery($result)
    {
        try {
            if (!$result || mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                return '0 results found!';
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Closes mysqli connection
     */
    public function closeConnection()
    {
        try {
            mysqli_close($this->connection);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
