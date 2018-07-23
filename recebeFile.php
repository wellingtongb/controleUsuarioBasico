<?php
$arquivo = $_FILES["arquivo"];
//print_r($arquivo);
if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
    //atribuindo um nome random para o arquivo carregado
    $nomeArquivo = md5(time().rand(0,99)).'.jpg';
    //movendo o arquivo carregado para a pasta destino
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$nomeArquivo);
}

?>