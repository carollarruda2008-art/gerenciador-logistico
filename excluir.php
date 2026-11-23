<?php
require_once __DIR__ . '/../includes/bootstrap.php'; verify_csrf();
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if(!$id){flash('danger','Produto inválido.');redirect('produtos/index.php');}
try{$stmt=db()->prepare('DELETE FROM produtos WHERE id=?');$stmt->execute([$id]);flash('success','Produto excluído.');}
catch(PDOException $ex){flash('danger','Não foi possível excluir. O produto pode estar vinculado a um frete.');}
redirect('produtos/index.php');
