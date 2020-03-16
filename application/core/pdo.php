<?php

class createPdo
{
    public static $dbh = null;
    public function __construct($DB_ARGS=null)
    {
        if (self::$dbh || !$DB_ARGS)
            return;
        else {
            try {
                self::$dbh = new PDO(
                    $DB_ARGS['DB_DSN'], $DB_ARGS['DB_USER'], $DB_ARGS['DB_PASSWORD'], $DB_ARGS['opt']);
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