<?php

class createPdo
{

    public static $dbh = null;
    static $DB_DSN = 'mysql:host=127.0.0.1;dbname=camagru;charset=utf8';
    static $DB_USER = "camagru";
    static $DB_PASSWORD = "adventure";
    static $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,];

    public function __construct()
    {
        if (self::$dbh)
            return;
        else {
            try {
                self::$dbh = new PDO(self::$DB_DSN, self::$DB_USER, self::$DB_PASSWORD, self::$opt);
            } catch (PDOException $e) {
                echo "Error with creating db: " . $e->getMessage() . ":(";
            }
        }
    }

    private function _execute($query, $data)
    {
        try {
            $statement = self::$dbh->prepare($query);
            if ($statement->execute($data))
                return $statement;
        } catch (PDOException $e) {
            echo "Request\n" . $query . "\nfailed because: " . $e->getMessage();
        }
        return null;
    }

    public function upsert($query, $data = [])
    {
        return $this->_execute($query, $data) ? true : false;
    }

    public function select($query, $data = [])
    {
        $statement = $this->_execute($query, $data);
        return $statement ? $statement->fetchAll() : [];
    }
}