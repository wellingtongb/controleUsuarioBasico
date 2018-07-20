<?php
    require 'config.php';

    $id = 0;

    //pegando o id do usuário para utilizar no select
    if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);
    }

    //ação de atualizar ao clicar no botao cadastrar
    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        $sqlUpdate = "UPDATE contatos SET nome = '$nome', email = '$email' WHERE id = '$id'";
        $pdo->query($sqlUpdate);
        header("Location: index.php"); 
    }

    $sql = "SELECT * FROM contatos WHERE id = '$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
    }else{
        header("Location: index.php");   
    }
?>
<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" value="<?php echo $dado['nome']; ?>"/><br/><br/>
    E-mail: <br/>
    <input type="text" name="email" value="<?php echo $dado['email']; ?>" /><br/><br/>

    <input type="submit" value="Atualizar" />
</form>