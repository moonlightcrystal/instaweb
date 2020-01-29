<?php
require_once dirname(__FILE__)."/../../config/database.php";

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

}

$TTT = new pdo_TT();

?>