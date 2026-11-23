<?php
require_once __DIR__.'/../includes/bootstrap.php';
$data=(string)($_GET['data']??'');if(!is_valid_date($data)){http_response_code(400);exit('Data inválida.');}
$q=db()->prepare("SELECT f.codigo,f.data_frete,t.nome AS transportador,ao.rua AS rua_origem,ao.numero AS numero_origem,ao.cidade AS cidade_origem,ao.estado AS estado_origem,ad.rua AS rua_destino,ad.numero AS numero_destino,ad.cidade AS cidade_destino,ad.estado AS estado_destino,p.codigo AS produto_codigo,p.nome AS produto,fp.quantidade FROM fretes f JOIN transportadores t ON t.id=f.transportador_id JOIN enderecos ao ON ao.id=f.origem_id JOIN enderecos ad ON ad.id=f.destino_id JOIN frete_produtos fp ON fp.frete_id=f.id JOIN produtos p ON p.id=fp.produto_id WHERE f.data_frete=? ORDER BY f.codigo,p.nome");$q->execute([$data]);
header('Content-Type: text/csv; charset=UTF-8');header('Content-Disposition: attachment; filename="relatorio-fretes-'.$data.'.csv"');header('Pragma: no-cache');
$out=fopen('php://output','w');fwrite($out,"\xEF\xBB\xBF");fputcsv($out,['Frete','Data','Transportador','Origem','Destino','Código do produto','Produto','Quantidade'],';');
while($r=$q->fetch()){$origem=$r['rua_origem'].', '.$r['numero_origem'].' - '.$r['cidade_origem'].'/'.$r['estado_origem'];$destino=$r['rua_destino'].', '.$r['numero_destino'].' - '.$r['cidade_destino'].'/'.$r['estado_destino'];fputcsv($out,[$r['codigo'],date_br($r['data_frete']),$r['transportador'],$origem,$destino,$r['produto_codigo'],$r['produto'],$r['quantidade']],';');}
fclose($out);exit;
