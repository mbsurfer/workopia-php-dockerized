<?php

// src/config/db.php

return [
    'host' => getenv('DB_HOST') ?: 'db', // 'db' is the service name in docker-compose.yaml
    'port' => getenv('DB_PORT') ?: 3306,
    'dbname' => getenv('DB_DATABASE') ?: 'workopia', // Default if env var not set
    'username' => getenv('DB_USERNAME') ?: 'workopia_user', // Default if env var not set
    'password' => getenv('DB_PASSWORD') ?: 'yoursecretpassword' // Default if env var not set
];