<?php
require_once __DIR__ . '/../includes/bootstrap.php';
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT); if(!$id) { flash('warning','Produto não encontrado.'); redirect('produtos/index.php'); }
$stmt=db()->prepare('SELECT * FROM produtos WHERE id=?'); $stmt->execute([$id]); $data=$stmt->fetch(); if(!$data){flash('warning','Produto não encontrado.');redirect('produtos/index.php');}
$pageTitle='Editar produto'; $current='produtos'; $errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf(); foreach(['codigo','nome','descricao','peso','quantidade','valor'] as $key) $data[$key]=trim((string)($_POST[$key]??''));
 if($data['codigo']==='')$errors[]='Informe o código.'; if($data['nome']==='')$errors[]='Informe o nome.';
 if(!is_numeric($data['peso'])||(float)$data['peso']<0)$errors[]='Peso inválido.';
 if(filter_var($data['quantidade'],FILTER_VALIDATE_INT)===false||(int)$data['quantidade']<0)$errors[]='Quantidade inválida.';
 if(!is_numeric($data['valor'])||(float)$data['valor']<0)$errors[]='Valor inválido.';
 if(!$errors){try{$q=db()->prepare('UPDATE produtos SET codigo=?,nome=?,descricao=?,peso=?,quantidade=?,valor=? WHERE id=?');$q->execute([$data['codigo'],$data['nome'],$data['descricao']?:null,$data['peso'],$data['quantidade'],$data['valor'],$id]);flash('success','Produto atualizado.');redirect('produtos/index.php');}catch(PDOException $ex){$errors[]=$ex->getCode()==='23000'?'Código já utilizado por outro produto.':'Não foi possível atualizar.';}}
}
require __DIR__.'/../includes/header.php';
?>
<div class="mb-3"><a href="<?=e(url('produtos/index.php'))?>">← Voltar para produtos</a></div><h1 class="h3">Editar produto</h1>
<?php if($errors):?><div class="alert alert-danger"><ul class="mb-0"><?php foreach($errors as $error):?><li><?=e($error)?></li><?php endforeach;?></ul></div><?php endif;?>
<form method="post" class="card card-body shadow-sm form-card"><?=csrf_field()?>
<div class="row g-3"><div class="col-md-4"><label class="form-label">Código *</label><input name="codigo" class="form-control" required value="<?=e($data['codigo'])?>"></div><div class="col-md-8"><label class="form-label">Nome *</label><input name="nome" class="form-control" required value="<?=e($data['nome'])?>"></div><div class="col-12"><label class="form-label">Descrição</label><textarea name="descricao" class="form-control" rows="2"><?=e($data['descricao'])?></textarea></div><div class="col-md-4"><label class="form-label">Peso (kg) *</label><input type="number" min="0" step="0.001" name="peso" class="form-control" required value="<?=e($data['peso'])?>"></div><div class="col-md-4"><label class="form-label">Quantidade *</label><input type="number" min="0" name="quantidade" class="form-control" required value="<?=e($data['quantidade'])?>"></div><div class="col-md-4"><label class="form-label">Valor (R$) *</label><input type="number" min="0" step="0.01" name="valor" class="form-control" required value="<?=e($data['valor'])?>"></div></div><div class="mt-4 d-flex gap-2"><button class="btn btn-primary">Salvar alterações</button><a class="btn btn-outline-secondary" href="<?=e(url('produtos/index.php'))?>">Cancelar</a></div></form>
<?php require __DIR__.'/../includes/footer.php'; ?>
