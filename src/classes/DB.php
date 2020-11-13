<?php
class DB
{
    private $servername = 'school.blltjallinks.nl';
    private $username = 'kbs';
    private $password = 'b$ZR^13v^s5I';
    private $dbname = 'wideworldimporters';
    private $connection;

    /**
     * Construcs mysql connection
     * @return mixed
     */
    public function __construct()
    {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_error($this->connection)) {
            die("Connection failed: " . mysqli_connect_error($this->connection));
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
