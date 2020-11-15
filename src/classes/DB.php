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
     * Construcs a pdo connection
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
     * make executions to the database
     * @param string $query
     * @param array $values
     * @return mixed $result
     */
    public static function execute($query)
    {
        self::make_conn();

        $handle = self::$conn->prepare($query);

        $args = func_get_args();

        if (isset($args[1])) {
            foreach ($args[1] as $i => $value) {
                $handle->bindValue($i + 1, $value);
            }
        }

        $handle->execute();

        $result = $handle->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * inject variables in a query
     * @param string $query
     * @return mixed $result
     */
    public static function prepare($query)
    {
        $args = func_get_args();

        if (!isset($args[1])) return $query;

        foreach ($args[1] as $i => $value) {
            $query = str_replace('$' . ($i + 1), $value, $query);
        }

        return $query;
    }
}
