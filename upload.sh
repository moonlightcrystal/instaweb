#!/bin/bash
mysql.server start
mysql -u camagru -p ####
CREATE DATABASE camagru
exit;

php application/config/setup.php
PHP -S localhost:9999
open http://localhost:9999
'ENGOY';
