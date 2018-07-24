<pre>
<?php

print_r($_FILES);
//melhorias
@$arquivo = $_FILES['arquivos'];
@$contagem = count($_FILES['arquivos']['tmp_name']);
@$arquivoUpload = $_FILES['arquivos']['tmp_name'];
@$nomeArquivo = $_FILES['arquivos']['name'];
@$randomizer = time().rand(0,999);
@$tipo = $_FILES['arquivos']['type'];
@$extensao = pathinfo($arquivoUpload, PATHINFO_EXTENSION);


//comando para fazer upload de varios arquivos
if(isset($arquivo) && !empty($arquivo)){  //verifico se o envio na está vazio
    if($contagem > 0){ //verifico se a quantidade de arquivos é maior que zero

        for ($i=0; $i < $contagem; $i++) {     //percorro todo o aray de arquivos     
           $encripting = md5($nomeArquivo[$i].$randomizer).'.jpg';  //não consegui pergar a extensão via código

           move_uploaded_file($arquivoUpload[$i], 'arquivos/'.$encripting);
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
</pre>