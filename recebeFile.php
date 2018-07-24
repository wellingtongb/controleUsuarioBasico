<?php
//comando para fazer upload de varios arquivos
if(isset($_FILES['arquivos']) && !empty($_FILES['arquivos'])){  //verifico se o envio na está vazio
    if(count($_FILES['arquivos']['tmp_name']) > 0){ //verifico se a quantidade de arquivos é maior que zero
        for ($i=0; $i < count($_FILES['arquivos']['tmp_name']); $i++) {     //percorro todo o aray de arquivos
            $nomeArquivo = md5($_FILES['arquivos']['name'][$i].time().rand(0,999)).'.jpg';  //gero o nome do arquivo novo e salvo na variavel
            move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], 'arquivos/'.$nomeArquivo);  //movo os arquivos
        }
    }
}
//comando para fazer upload de arquivo unico
/* $arquivo = $_FILES["arquivo"];
//print_r($arquivo);
if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
    //atribuindo um nome random para o arquivo carregado
    $nomeArquivo = md5(time().rand(0,99)).'.jpg';
    //movendo o arquivo carregado para a pasta destino
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$nomeArquivo);
} */

?>