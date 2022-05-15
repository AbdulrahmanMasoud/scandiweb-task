<?php

//Register autoload
require __DIR__ . '/vendor/autoload.php';

// Register Bootatrap
require __DIR__ . '/bootstrap/app.php';

/*
|-----------------------------------------
| Run the application
|----------------------------------------
|Bootstrap application and do actions
*/
Application::run();
