<?php

include dirname(__FILE__)."/../config/database.php";

class createPdo
{

    public static $dbh = null;
    private $db_dsn;
    private $db_user;
    private $db_pass;
    private $opt;

    public function __construct($DB_DSN, $DB_USER, $DB_PASSWORD, $opt)
    {
        $this->db_dsn = $DB_DSN;
        $this->db_user = $DB_USER;
        $this->db_pass = $DB_PASSWORD;
        $this->opt = $opt;

        if (self::$dbh)
            return;
        else {
            try {
                self::$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
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
            echo "Request\n".$query."\nfailed because: ".$e->getMessage();
        }
        return null;
    }

    public function upsert($query, $data = [])	{
        return $this->_execute($query, $data) ? true : false;
    }

    public function select($query, $data = [])
    {
        $statement = $this->_execute($query, $data);
        return $statement ? $statement->fetchAll() : [];
    }
}