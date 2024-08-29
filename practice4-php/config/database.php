<?php

return [
  'default' => $_ENV['DB_CONNECTION'] ?? 'mysql',

  'connections' => [

    'mysql' => [
      'driver' => 'mysql',
      'url' => $_ENV['DATABASE_URL'] ?? '',
      'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
      'port' => $_ENV['DB_PORT'] ?? '3306',
      'database' => $_ENV['DB_DATABASE'] ?? 'forge',
      'username' => $_ENV['DB_USERNAME'] ?? 'forge',
      'password' => $_ENV['DB_PASSWORD'] ?? '',
      'charset' => 'utf8mb4',
      'collation' => 'utf8mb4_unicode_ci',
    ]
  ]
];
