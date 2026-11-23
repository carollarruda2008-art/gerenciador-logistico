<?php
require_once __DIR__.'/../includes/bootstrap.php';$pageTitle='Fretes';$current='fretes';
$rows=db()->query("SELECT f.id,f.codigo,f.data_frete,t.nome AS transportador,ao.cidade AS origem,ad.cidade AS destino,
 (SELECT COUNT(*) FROM frete_produtos fp WHERE fp.frete_id=f.id) AS total_produtos FROM fretes f JOIN transportadores t ON t.id=f.transportador_id
 JOIN enderecos ao ON ao.id=f.origem_id JOIN enderecos ad ON ad.id=f.destino_id
 ORDER BY f.data_frete DESC,f.id DESC")->fetchAll();
require __DIR__.'/../includes/header.php';?>
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3"><div><h1 class="h3 mb-1">Fretes</h1><p class="text-secondary mb-0">Consulte os fretes já registrados ou gere um novo.</p></div><a class="btn btn-primary" href="<?=e(url('fretes/cadastrar.php'))?>">+ Gerar frete</a></div>
<div class="card shadow-sm"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Código</th><th>Data</th><th>Transportador</th><th>Origem</th><th>Destino</th><th>Produtos</th><th class="text-end">Ação</th></tr></thead><tbody>
<?php if(!$rows):?><tr><td colspan="7" class="text-center text-secondary py-4">Nenhum frete cadastrado.</td></tr><?php else:foreach($rows as $r):?><tr><td><strong><?=e($r['codigo'])?></strong></td><td><?=e(date_br($r['data_frete']))?></td><td><?=e($r['transportador'])?></td><td><?=e($r['origem'])?></td><td><?=e($r['destino'])?></td><td><?=(int)$r['total_produtos']?></td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="<?=e(url('fretes/visualizar.php?id='.$r['id']))?>">Visualizar</a></td></tr><?php endforeach;endif;?>
</tbody></table></div></div><?php require __DIR__.'/../includes/footer.php';?>
