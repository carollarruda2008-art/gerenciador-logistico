<?php
declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function url(string $path = ''): string
{
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

function redirect(string $path): never
{
    header('Location: ' . url($path));
    exit;
}

function flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }
    $message = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $message;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): void
{
    $sent = (string)($_POST['csrf_token'] ?? '');
    $saved = (string)($_SESSION['csrf_token'] ?? '');
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $saved === '' || !hash_equals($saved, $sent)) {
        http_response_code(400);
        exit('Solicitação inválida. Volte à página anterior e tente novamente.');
    }
}

function money(mixed $value): string
{
    return 'R$ ' . number_format((float)$value, 2, ',', '.');
}

function date_br(?string $date): string
{
    if (!$date) return '-';
    $timestamp = strtotime($date);
    return $timestamp ? date('d/m/Y', $timestamp) : '-';
}

function is_valid_date(string $date): bool
{
    $parsed = DateTime::createFromFormat('Y-m-d', $date);
    return $parsed !== false && $parsed->format('Y-m-d') === $date;
}
