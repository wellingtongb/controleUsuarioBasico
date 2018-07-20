<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina de Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

</head>
<?php

    session_start();//inciando uma sessão 
    //verificando se o post nao está vazio
    if(isset($_POST['email']) && empty($_POST['email']) == false){
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        $dsn = "mysql:dbname=bancodadosteste;host=localhost";
        $dbUser = "root";
        $dbPassword = "qwert1234";

        try{
            $db = new PDO($dsn, $dbUser, $dbPassword);   //instacionando a classe de conexao PDO
            //fazendo uma requisção no banco  de dados
            $sql = $db->query( "SELECT * FROM usuarioslogados WHERE email = '$email' and senha = '$senha'")   ;
            if($sql->rowCount() > 0){
                $dados = $sql->fetch(); //salvando os dados da busca sql na variavel dados
               
                $_SESSION['id'] = $dados['id']; //atribuindo o valor da variavel dados para a o id da sessao
                
                header("Location: index.php");
            }
        } catch(PDOException $e){
            echo "Falhou a conexão: ".$e->getMessage();
            
        }
    }else{
    }
?>

<body>
<form method="POST" class="login">
    E-mail: <br/>
    <input class="inputs" type="text" name="email" placeholder="Digite seu email!"/><br/><br/>
    Senha: <br/>
    <input class="inputs" type="password" name="senha" placeholder="Digite sua super senha!"/><br/><br/>
    <input class="btn" type="submit" value="Entrar" />
</form>
    
</body>
</html>

