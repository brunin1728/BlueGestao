<?php

date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');


define('BLUE_CMS_DIR', __DIR__ );
include(BLUE_CMS_DIR . '/database/conn.php');
include(BLUE_CMS_DIR . '/database/database_api.php');
include(BLUE_CMS_DIR . '/pages/login/valida_session.php');

