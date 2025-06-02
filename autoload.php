<?php

spl_autoload_register(function (string $class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Classe não encontrada: $class em $file<br>";
    }
});
?>
