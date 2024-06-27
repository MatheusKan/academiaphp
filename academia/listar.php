<?php
session_start();
include 'verificar_login.php';
include 'conexao.php';

if ($_SESSION['user_type'] == 'aluno') {
    $email = $_SESSION['email'];
    $res1 = mysqli_query($con, "SELECT * FROM tbAluno WHERE email = '$email'");
    $escrever1 = mysqli_fetch_array($res1);
    $id = $escrever1['idAluno'];

    $sql_c = "SELECT t.idTurma as ID, t.descricao, t.horarioInicio, t.horarioTermino, p.nome AS nomeProfessor, m.dataMatricula
              FROM tbTurma t
              INNER JOIN tbMatricula m ON m.idTurma = t.idTurma
              INNER JOIN tbProfessor p ON p.idProfessor = t.idProfessor
              WHERE m.idAluno = '$id'";
    
    $res = mysqli_query($con, $sql_c);
    $linha = mysqli_num_rows($res);
    
    if ($linha > 0) {
        echo "<table border='3'>";
        echo "<tr>
            <th width='150px'>IdTurma</th>

                <th width='150px'>Descrição</th>
                <th width='200px'>Horário de Início</th>
                <th width='200px'>Horário de Término</th>
                <th width='200px'>Nome Professor</th>
                <th width='200px'>Data de Matrícula</th>
              </tr>";

        while ($escrever = mysqli_fetch_array($res)) {
            $data = implode("/", array_reverse(explode("-", $escrever['dataMatricula'])));
            echo "<tr>
            <td>" . $escrever['ID'] . "</td>
            
                    <td>" . $escrever['descricao'] . "</td>
                    <td>" . $escrever['horarioInicio'] . "</td>
                    <td>" . $escrever['horarioTermino'] . "</td>
                    <td>" . $escrever['nomeProfessor'] . "</td>
                    <td> $data</td>
                    
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhuma turma encontrada.";
    }
}
?>
