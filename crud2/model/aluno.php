<?php

class Aluno
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function listar()
    {
        $sql = "
            SELECT
                aluno.id AS aluno_id,
                aluno.nome AS aluno_nome,
                aluno.email AS aluno_email,
                curso.id AS curso_id,
                curso.nome AS curso_nome,
                curso.carga_horaria AS carga_horaria
            FROM aluno
            LEFT JOIN curso
                ON curso.id = aluno.id_curso
            ORDER BY aluno.id ASC
        ";

        $resultado = $this->con->query($sql);

        $alunos = [];

        if (!$resultado) {
            return $alunos;
        }

        while ($linha = $resultado->fetch_assoc()) {
            $alunos[] = $linha;
        }

        return $alunos;
    }
}
?>
