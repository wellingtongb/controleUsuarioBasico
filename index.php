<?php
    require 'config.php';
    session_start();

    if(isset($_SESSION["id"]) && !empty($_SESSION['id'])){

    }else {
       header("Location: login.php");
    }

?>    
<a href="adicionar.php">Adicionar novo usuario</a>
<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th >Acoes</th>
    </tr>
    <?php
        $sql = "SELECT * FROM contatos";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
           foreach ($sql->fetchAll() as $usuario) {
               echo '<tr>';
               echo '<td>'.$usuario['nome'].'</td>';
               echo '<td>'.$usuario['email'].'</td>';
               echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> - <a href="excluir.php?id='.$usuario['id'].'">Excluir</a</td>';
               echo '</tr>';
           }
        }else{

        }
    ?>
</table>
<hr>
<br>
<form method="POST"  enctype="multipart/form-data" action="recebeFile.php">
    <input type="file" name="arquivo"/> </br></br>
    <input type="submit" value="enviar"/></br></br>
</form>
<hr>


