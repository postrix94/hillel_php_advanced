<?php
return [
    'db' => [
        'host' => getenv('DB_HOST') ?? null,
        'name' => getenv('DB_NAME') ?? null,
        'user' => getenv('DB_USER') ?? null,
        'password' => getenv('DB_PASSWORD') ?? null,
        'prefix' => getenv('DB_PREFIX') ?? null,
        'port' => getenv('DB_PORT') ?? null,
    ]
];