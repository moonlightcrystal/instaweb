<?php
//require_once dirname(__FILE__)."/../../config/database.php";
require_once "../config/database.php";

class pdo_TT
{

    public static $dbh = null;

    public function __construct()
    {

        if (self::$dbh)
            return;
        else {
            try {
                $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
            } catch (PDOException $e) {
                echo "Error with creating db: " . $e->getMessage() . ":(<br/>";
            }
        }
    }

    private function _execute($query, $data)
    {
        try {
            $statement = self::$pdo->prepare($query);
            if ($statement->execute($data))
                return $statement;
        } catch (PDOException $e) {
            error_log("Request\n".$query."\nfailed because: ".$e->getMessage());
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

