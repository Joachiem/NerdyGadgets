<?php
class DB
{
    private static $host = 'localhost';
    private static $db = 'nerdygadgets';
    private static $user = 'root';
    private static $pass = '';
    private static $charset = 'utf8mb4';
    private static $conn;

    /**
     * Construcs pdo connection
     * @return mixed
     */
    public static function make_conn()
    {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            self::$conn = new PDO($dsn, self::$user, self::$pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * execute the database
     * @param string $query
     * @param array $values
     * @return mixed $result
     */
    public static function execute($query)
    {
        self::make_conn();

        $handle = self::$conn->prepare($query);

        $values = [];
        $args = func_get_args();
        
        if (isset($args[1])) $values = $args[1];

        $i = 1;
        foreach ($values as $value) {
            $handle->bindValue($i, $value);
            $i++;
        }

        $handle->execute();

        $result = $handle->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
