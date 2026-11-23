<?php
require_once __DIR__.'/../includes/bootstrap.php';$pageTitle='Gerar frete';$current='fretes';
$transportadores=db()->query('SELECT id,nome FROM transportadores ORDER BY nome')->fetchAll();
$produtos=db()->query('SELECT id,codigo,nome,peso FROM produtos ORDER BY nome')->fetchAll();
$origens=db()->query("SELECT * FROM enderecos WHERE tipo IN ('origem','ambos') ORDER BY cidade,rua")->fetchAll();
$destinos=db()->query("SELECT * FROM enderecos WHERE tipo IN ('destino','ambos') ORDER BY cidade,rua")->fetchAll();
$errors=[];$data=['transportador_id'=>'','origem_id'=>'','destino_id'=>'','data_frete'=>date('Y-m-d'),'observacoes'=>''];$selecionados=[['produto_id'=>'','quantidade'=>1]];
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf();foreach($data as $k=>$v)$data[$k]=trim((string)($_POST[$k]??$v));
 $ids=$_POST['produto_id']??[];$qtys=$_POST['quantidade_produto']??[];$selecionados=[];
 if(is_array($ids)&&is_array($qtys)){foreach($ids as $i=>$pid){$selecionados[]=['produto_id'=>(string)$pid,'quantidade'=>(string)($qtys[$i]??1)];}}
 if(!$transportadores)$errors[]='Cadastre ao menos um transportador antes de gerar um frete.';
 if(!$produtos)$errors[]='Cadastre ao menos um produto antes de gerar um frete.';
 if(!$origens)$errors[]='Cadastre um endereço de origem ou do tipo ambos.';
 if(!$destinos)$errors[]='Cadastre um endereço de destino ou do tipo ambos.';
 if(!filter_var($data['transportador_id'],FILTER_VALIDATE_INT))$errors[]='Selecione um transportador.';
 if(!filter_var($data['origem_id'],FILTER_VALIDATE_INT))$errors[]='Selecione o endereço de origem.';
 if(!filter_var($data['destino_id'],FILTER_VALIDATE_INT))$errors[]='Selecione o endereço de destino.';
 if($data['origem_id']===$data['destino_id'])$errors[]='A origem e o destino devem ser diferentes.';
 if(!is_valid_date($data['data_frete']))$errors[]='Informe uma data válida.';
 $itens=[];foreach($selecionados as $item){$pid=filter_var($item['produto_id'],FILTER_VALIDATE_INT);$qty=filter_var($item['quantidade'],FILTER_VALIDATE_INT);if(!$pid||!$qty||$qty<1){$errors[]='Selecione um produto e informe uma quantidade inteira maior que zero.';continue;}$itens[$pid]=($itens[$pid]??0)+$qty;}
 if(!$itens)$errors[]='Adicione pelo menos um produto ao frete.';
 if(!$errors){
  $check=db()->prepare('SELECT COUNT(*) FROM transportadores WHERE id=?');$check->execute([$data['transportador_id']]);if(!(int)$check->fetchColumn())$errors[]='Transportador selecionado não existe.';
  $check=db()->prepare("SELECT tipo FROM enderecos WHERE id=?");$check->execute([$data['origem_id']]);$tipoOrigem=$check->fetchColumn();if(!$tipoOrigem||!in_array($tipoOrigem,['origem','ambos'],true))$errors[]='O endereço selecionado não pode ser utilizado como origem.';
  $check->execute([$data['destino_id']]);$tipoDestino=$check->fetchColumn();if(!$tipoDestino||!in_array($tipoDestino,['destino','ambos'],true))$errors[]='O endereço selecionado não pode ser utilizado como destino.';
  $validIds=array_keys($itens);$marks=implode(',',array_fill(0,count($validIds),'?'));$check=db()->prepare("SELECT id FROM produtos WHERE id IN ($marks)");$check->execute($validIds);if(count($check->fetchAll())!==count($validIds))$errors[]='Um ou mais produtos selecionados não existem.';
 }
 if(!$errors){try{$pdo=db();$pdo->beginTransaction();$q=$pdo->prepare('INSERT INTO fretes(codigo,data_frete,transportador_id,origem_id,destino_id,observacoes) VALUES(NULL,?,?,?,?,?)');$q->execute([$data['data_frete'],$data['transportador_id'],$data['origem_id'],$data['destino_id'],$data['observacoes']?:null]);$freteId=(int)$pdo->lastInsertId();$codigo='FR-'.date('Y',strtotime($data['data_frete'])).'-'.str_pad((string)$freteId,6,'0',STR_PAD_LEFT);$pdo->prepare('UPDATE fretes SET codigo=? WHERE id=?')->execute([$codigo,$freteId]);$line=$pdo->prepare('INSERT INTO frete_produtos(frete_id,produto_id,quantidade) VALUES(?,?,?)');foreach($itens as $pid=>$qty)$line->execute([$freteId,$pid,$qty]);$pdo->commit();flash('success','Frete '.$codigo.' gerado com sucesso.');redirect('fretes/visualizar.php?id='.$freteId);}catch(Throwable $ex){if(db()->inTransaction())db()->rollBack();$errors[]='Não foi possível gerar o frete. Confira os dados e tente novamente.';}}
}
$addressLabel=static fn($a)=>$a['rua'].', '.$a['numero'].' — '.$a['cidade'].'/'.$a['estado'];
require __DIR__.'/../includes/header.php';?>
<div class="mb-3"><a href="<?=e(url('fretes/index.php'))?>">← Voltar para fretes</a></div><h1 class="h3">Gerar frete</h1><p class="text-secondary">Relacione um transportador, os endereços e um ou mais produtos.</p>
<?php if($errors):?><div class="alert alert-danger"><ul class="mb-0"><?php foreach(array_unique($errors) as $er):?><li><?=e($er)?></li><?php endforeach;?></ul></div><?php endif;?>
<?php if(!$transportadores||!$produtos||!$origens||!$destinos):?><div class="alert alert-warning">Antes de gerar o frete, cadastre os itens que estão faltando: produto, transportador, endereço de origem e endereço de destino.</div><?php endif;?>
<form method="post" class="card card-body shadow-sm form-card" id="form-frete"><?=csrf_field()?>
<div class="row g-3 mb-4"><div class="col-md-6"><label class="form-label">Transportador *</label><select name="transportador_id" class="form-select" required><option value="">Selecione...</option><?php foreach($transportadores as $t):?><option value="<?=$t['id']?>" <?=$data['transportador_id']==$t['id']?'selected':''?>><?=e($t['nome'])?></option><?php endforeach;?></select></div><div class="col-md-6"><label class="form-label">Data do frete *</label><input type="date" name="data_frete" class="form-control" required value="<?=e($data['data_frete'])?>"></div><div class="col-md-6"><label class="form-label">Endereço de origem *</label><select name="origem_id" class="form-select" required><option value="">Selecione...</option><?php foreach($origens as $a):?><option value="<?=$a['id']?>" <?=$data['origem_id']==$a['id']?'selected':''?>><?=e($addressLabel($a))?></option><?php endforeach;?></select></div><div class="col-md-6"><label class="form-label">Endereço de destino *</label><select name="destino_id" class="form-select" required><option value="">Selecione...</option><?php foreach($destinos as $a):?><option value="<?=$a['id']?>" <?=$data['destino_id']==$a['id']?'selected':''?>><?=e($addressLabel($a))?></option><?php endforeach;?></select></div></div>
<div class="d-flex justify-content-between align-items-center mb-2"><h2 class="h5 mb-0">Produtos transportados</h2><button type="button" class="btn btn-sm btn-outline-primary" id="adicionar-produto">+ Adicionar produto</button></div>
<div id="lista-produtos" class="vstack gap-2">
<?php foreach($selecionados as $item):?><div class="row g-2 align-items-end produto-row"><div class="col-md-8"><label class="form-label">Produto *</label><select name="produto_id[]" class="form-select" required><option value="">Selecione...</option><?php foreach($produtos as $p):?><option value="<?=$p['id']?>" <?=$item['produto_id']==$p['id']?'selected':''?>><?=e($p['codigo'].' — '.$p['nome'].' ('.$p['peso'].' kg)')?></option><?php endforeach;?></select></div><div class="col-md-2"><label class="form-label">Quantidade *</label><input type="number" min="1" step="1" name="quantidade_produto[]" class="form-control" required value="<?=e($item['quantidade'])?>"></div><div class="col-md-2"><button type="button" class="btn btn-outline-danger w-100 remover-produto">Remover</button></div></div><?php endforeach;?>
</div>
<template id="modelo-produto"><div class="row g-2 align-items-end produto-row"><div class="col-md-8"><label class="form-label">Produto *</label><select name="produto_id[]" class="form-select" required><option value="">Selecione...</option><?php foreach($produtos as $p):?><option value="<?=$p['id']?>"><?=e($p['codigo'].' — '.$p['nome'].' ('.$p['peso'].' kg)')?></option><?php endforeach;?></select></div><div class="col-md-2"><label class="form-label">Quantidade *</label><input type="number" min="1" step="1" name="quantidade_produto[]" class="form-control" required value="1"></div><div class="col-md-2"><button type="button" class="btn btn-outline-danger w-100 remover-produto">Remover</button></div></div></template>
<div class="mt-3"><label class="form-label">Observações</label><textarea name="observacoes" class="form-control" rows="2"><?=e($data['observacoes'])?></textarea></div><div class="mt-4 d-flex gap-2"><button class="btn btn-primary" <?=(!$transportadores||!$produtos||!$origens||!$destinos)?'disabled':''?>>Gerar frete</button><a class="btn btn-outline-secondary" href="<?=e(url('fretes/index.php'))?>">Cancelar</a></div></form>
<?php require __DIR__.'/../includes/footer.php';?>
