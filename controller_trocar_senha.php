<?php
require_once('../../config/dbConnect.php'); // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Recebendo os dados do formulário
    $SENHA = filter_input(INPUT_POST, "current-password");
    $MUDAR_SENHA = filter_input(INPUT_POST, "new-password");
    $CONFIMAR = filter_input(INPUT_POST, "confirm-password");
    $usuario_id = 5; // ID do usuário (isso deve ser pego de sessão ou similar)


    // Verificando se as senhas nova e de confirmação são iguais
    if ($MUDAR_SENHA !== $CONFIMAR) {
        echo "As senhas novas não coincidem!";
        header("Location: ../../views/trocar-senha.php?sucesso=0");
        exit();
    }

    // Verificar se a senha atual está correta
    // Primeiro, vamos obter a senha armazenada no banco de dados
    $sql = "SELECT senha FROM usuario WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Se a senha atual não for válida, retornamos erro
    //var_dump($SENHA, $result['senha']);
    if (password_verify($SENHA, $result['senha'])) {
        // Se a senha atual for válida, vamos atualizar a senha do usuário
    // Criando o hash da nova senha
    $MUDAR_SENHA_HASH = password_hash($MUDAR_SENHA, PASSWORD_ARGON2ID);

    // Atualizando a senha no banco de dados
    $update_sql = "UPDATE usuario SET senha = :senha WHERE id = :id";
    $update_stmt = $dbh->prepare($update_sql);
    $update_stmt->bindValue(':senha', $MUDAR_SENHA_HASH, PDO::PARAM_STR);
    $update_stmt->bindValue(':id', 5);

    // Executando o update
    if ($update_stmt->execute()) {
        echo "Senha atualizada com sucesso!";
        header("Location: ../../views/trocar-senha.php?sucesso=1");
    } else {
        echo "Erro ao atualizar a senha!";
        header("Location: ../../views/trocar-senha.php?sucesso=0");
    }
        
    }else{
        echo "Senha atual incorreta!";
        exit();
        header("Location: ../../views/trocar-senha.php?sucesso=0");
       
        exit();
    }

    
}
?>