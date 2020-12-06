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
    public static function __constructStatic()
    {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
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
     * @param array $partial_queries
     * @return object $result
     */
    public static function execute($query, $values = null, $partial_queries = null)
    {
        if ($partial_queries) $query = static::preparePartialQueries($query, $partial_queries);

        $handle = self::$conn->prepare($query);

        if ($values) $handle = static::prepareValues($handle, $values);

        $handle->execute();
        $result = $handle->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * replace $ in the query whith partial querys
     * these cant be binded to a value
     * @param string $query
     * @param array $partial_queries
     * @return string $query
     */
    private static function preparePartialQueries($query, $partial_queries)
    {
        foreach ($partial_queries as $i => $value) {
            $query = str_replace('$' . ($i + 1), $value, $query);
        }

        return $query;
    }


    /**
     * bind values to the handle
     * @param object $handle
     * @param array $values
     * @return object $handle
     */
    private static function prepareValues($handle, $values)
    {
        foreach ($values as $i => $value) {
            $value = filter_var($value, FILTER_SANITIZE_STRING);

            $handle->bindValue($i + 1, $value);
        }

        return $handle;
    }
}

DB::__constructStatic();
