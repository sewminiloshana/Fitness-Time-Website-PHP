<?php

declare(strict_types=1);

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function storage_path(string $filename): string
{
    return __DIR__ . '/../storage/' . ltrim($filename, '/');
}

function append_submission(string $filename, array $payload): void
{
    $path = storage_path($filename);
    $directory = dirname($path);

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    if (!file_exists($path)) {
        file_put_contents($path, json_encode([]));
    }

    $existing = json_decode(file_get_contents($path), true);
    if (!is_array($existing)) {
        $existing = [];
    }

    $payload['received_at'] = date('c');
    $existing[] = $payload;

    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));
}
