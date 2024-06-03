<?php
    define('CORRECT', 1);
    define('ERROR_USER', 2);
    define('ERROR_DATA', 3);
    define('NO_TEST', 4);
	define('BLOCKED_USER', 5);

    //Establece la partida, para posible separación juegos. Actualmente solo registra logs independientes.
    define('GAME', 'prueba');
    
    //Establece el modo pruebas, admitiendo o no al usuario -=Pruebas=-
    define('TEST', false);
    //Establece el modo de muestra de todas las imágenes de los tesoros.
    define('FULL_IMAGES', true);
    //Modo de seguridad. False blacklist, true whitelist.
    define('SECURITY_MODE', false);