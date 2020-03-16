#!/bin/bash
mysql.server start
mysql -u camagru -padventure -e "CREATE DATABASE IF NOT EXISTS camagru"
php application/config/setup.php
PHP -S localhost:9999 &
open http://localhost:9999 &
echo 'ENJOY';
