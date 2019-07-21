<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * Git: https://github.com/Feliphegomez/crm-crud-api-php
 * *******************************
 */
// Activar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Detectar folder principal
# define('folder_principal', dirname(dirname(__FILE__) . '..' . DIRECTORY_SEPARATOR));
# echo 'folder_principal: ' . folder_principal;
# echo '<hr> ';
// Detectar folder `crm-admin`
# define('folder_admin', (dirname(__FILE__)));
# echo 'folder_admin: ' . folder_admin;
# echo '<hr> ';
// Detectar folder path actual
# echo ": ".current_path();
# echo '<hr> ';
