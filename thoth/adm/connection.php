<?php

$conexao = new mysqli("localhost", "root", "usbw", "biblioteca");

if (!$conexao)
{
    echo "Ocorreu um problema com a conexão.";
}

// --------------------------------------------- //
// ------------------ Editora ------------------ //
// --------------------------------------------- //

function CadastrarEditora($nome)
{
    $sql = 'INSERT INTO tb_editora VALUES (null,"'.$nome.'")';
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Editora cadastrada com sucesso!");   
    }
    else
    {
        alert("Editora já cadastrada no sistema.");
    }
}

function ListarEditoras($cd)
{
    $sql = 'SELECT * FROM tb_editora ';

    if ($cd > 0)
    {
        $sql .= ' WHERE cd_editora='.$cd;
    }

    $res = $GLOBALS['conexao'] -> query($sql);
    return $res;
}

function ExcluirEditora($cd)
{
    $sql = 'DELETE FROM tb_editora WHERE cd_editora='.$cd;
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Editora excluída com sucesso!");
    }
    else
    {
        alert("Erro ao excluir Editora.");
    }
}

function AtualizarEditora($cd, $nome)
{
    $sql = 'UPDATE tb_editora SET nm_editora="'.$nome.'" WHERE cd_editora='.$cd;
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Editora atualizada com sucesso!");
    }
    else
    {
        alert("Erro ao atualizar editora!");
    }
}

// --------------------------------------------- //
// ------------------- Autor ------------------- //
// --------------------------------------------- //

function CadastrarAutor($nome)
{
    $sql = 'INSERT INTO tb_autor VALUES (null,"'.$nome.'")';
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Autor cadastrado com sucesso!");   
    }
    else
    {
        alert("Erro ao cadastrar Autor.");
    }
}


function ListarAutores($cd)
{
    $sql = 'SELECT * FROM tb_autor ';

    if ($cd > 0)
    {
        $sql .= ' WHERE cd_autor='.$cd;
    }

    $res = $GLOBALS['conexao'] -> query($sql);
    return $res;
}

function ExcluirAutor($cd)
{
    $sql = 'DELETE FROM tb_autor WHERE cd_autor='.$cd;
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Autor excluído com sucesso!");
    }
    else
    {
        alert("Erro ao excluir Autor.");
    }
}

function AtualizarAutor($cd, $nome)
{
    $sql = 'UPDATE tb_autor SET nm_autor="'.$nome.'" WHERE cd_autor='.$cd;
    $res = $GLOBALS['conexao'] -> query($sql);

    if ($res)
    {
        alert("Autor atualizado com sucesso!");
    }
    else
    {
        alert("Erro ao atualizar autor!");
    }
}

// --------------------------------------------- //
// ------------------ Funções ------------------ //
// --------------------------------------------- //

function alert($texto)
{
    echo '<script>
            alert("'.$texto.'");
         </script>';
}