<?php

require_once('../config/dbConnect.php');

session_start();

$select_turma_prof = "SELECT t.id_turma, t.nome_turma 
            FROM turma t
            INNER JOIN turma_prof tp ON t.id_turma = tp.id_turma
            INNER JOIN prof p ON tp.id_prof = p.mat_prof
            WHERE p.mat_prof = :userId";

$req = $dbh->prepare($select_turma_prof);
$req->bindParam(':userId', $_SESSION['id_user']);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas - Sistema de Menções</title>
    <link rel="stylesheet" href="../public/css/turmas.css">
</head>
<body>
    <div class="turmas-container">
        <div class="div-img">
            <img src="../public/imgs/baner.png" alt="logoboneco">
        </div>
        
        <div class="turmas-box">  
            <h1>Turmas</h1>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['Nome_user']); ?></p>
            <div class="div_botoes">
                <?php foreach ($result as $turma): ?>
                    <a href="detalhes_turma.php?id=<?php echo $turma['id_turma']; ?>">
                        <?php echo htmlspecialchars($turma['nome_turma']); ?>
                    </a>
                <?php endforeach; ?>
            </div>       
        </div>
    </div>
</body>
</html>


