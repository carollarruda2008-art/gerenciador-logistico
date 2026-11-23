<?php
$pageTitle = $pageTitle ?? 'Gerenciador Logístico';
$current = $current ?? '';
$notice = get_flash();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | Gerenciador Logístico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= e(url('assets/css/estilo.css')) ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-lg-4">
        <a class="navbar-brand fw-semibold" href="<?= e(url('index.php')) ?>">🚚 Gerenciador Logístico</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?= $current==='inicio'?'active':'' ?>" href="<?= e(url('index.php')) ?>">Início</a></li>
                <li class="nav-item"><a class="nav-link <?= $current==='produtos'?'active':'' ?>" href="<?= e(url('produtos/index.php')) ?>">Produtos</a></li>
                <li class="nav-item"><a class="nav-link <?= $current==='enderecos'?'active':'' ?>" href="<?= e(url('enderecos/index.php')) ?>">Endereços</a></li>
                <li class="nav-item"><a class="nav-link <?= $current==='transportadores'?'active':'' ?>" href="<?= e(url('transportadores/index.php')) ?>">Transportadores</a></li>
                <li class="nav-item"><a class="nav-link <?= $current==='fretes'?'active':'' ?>" href="<?= e(url('fretes/index.php')) ?>">Fretes</a></li>
                <li class="nav-item"><a class="nav-link <?= $current==='relatorios'?'active':'' ?>" href="<?= e(url('relatorios/index.php')) ?>">Relatórios</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container-fluid px-lg-4 py-4">
    <?php if ($notice): ?>
        <div class="alert alert-<?= e($notice['type']) ?> alert-dismissible fade show" role="alert">
            <?= e($notice['message']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php endif; ?>
