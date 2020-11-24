<?php

include('connection.php');

if (isset($_GET['cd'])) 
{
      $registro = ListarEditora($_GET['cd']);
      $editora = $registro->fetch_array();
      echo json_encode($editora);
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/pages/dashboard.css">

    <link rel="stylesheet" href="../css/components/nav.css">

    <!-- Scripts -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/d03cf73df0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <!-- Icon -->
    <link rel="icon" href="../img/logo.png">

    <!-- Title -->
    <title>Thoth - Dashboard</title>
</head>
<body>
    <div id="dashboard-page">
        <input type="checkbox" name="checkbox" id="check">

        <header>
            <div class="header-content">
                <!-- Navbar Toggle -->
                <label for="check">
                    <i class="fas fa-bars" id="navbar_toggle"></i>
                </label>

                <!-- Navbar Brand -->
                <div class="navbar-brand">
                    <a href="">
                        <img src="../img/logo.png" alt="Thoth">
                    </a>
                </div>

                <!-- Navbar Logout -->
                <div class="navbar-logout">
                    <a href="../index.php" id="btnLogout">
                        Sair
                    </a>
                </div>
            </div>
        </header>

        <!-- Mobile Navbar -->
        <nav class="navMobile">
            <ul class="mobile_navbar_items">
                <li>
                    <i class="fas fa-th"></i>
                    <a href="">Feed</a>
                </li>
                <li>
                    <i class="fas fa-search"></i>
                    <a href="">Pesquisar Livros</a>
                </li>
                <li>
                    <i class="fas fa-cogs"></i>
                    <a href="">Gerenciar Sistema</a>
                </li>
                <li>
                    <i class="fa fa-money"></i>
                    <a href="">Gerenciar Finanças</a>
                </li>
                <li>
                    <i class="fas fa-info-circle"></i>
                    <a href="">Informações</a>
                </li>
                <li>
                    <i class="fas fa-sliders-h"></i>
                    <a href="">Configurações</a>
                </li>
            </ul>
        </nav>

        <!-- Normal Navbar -->
        <aside>
            <div class="navNormal">
                <ul class="navbar_items">
                    <img src="../img/logo.png" alt="Thoth">
                    <li>
                        <i class="fas fa-th"></i>
                        <a href="">Feed</a>
                    </li>
                    <li>
                        <i class="fas fa-search"></i>
                        <a href="">Pesquisar Livros</a>
                    </li>
                    <li>
                        <i class="fas fa-cogs"></i>
                        <a href="">Gerenciar Sistema</a>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <a href="">Gerenciar Finanças</a>
                    </li>
                    <li>
                        <i class="fas fa-info-circle"></i>
                        <a href="">Informações</a>
                    </li>
                    <li>
                        <i class="fas fa-sliders-h"></i>
                        <a href="">Configurações</a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="dashboard-panel">
            <div class="gerenciarEditora">
                <h3>Gerenciar Editoras</h3>
                <form action="" method="POST" id="cadastrarEditora">
                    <input type="hidden" name="cdEditora" value="0">
                    <label for="nomeEditora">Nome da Editora:</label>
                    <input type="text" name="nomeEditora" id="nomeEditora">
                    <button type="submit" name="btnCadastrarEditora" id="btnCadastrarEditora">
                        Cadastrar
                    </button>
                </form>

                <?php

                if (($_POST['nomeEditora'])) 
                {
                    if ($_POST['cdEditora'] == "0")
                    {
                        CadastrarEditora($_POST['nomeEditora']);
                    }
                    else
                    {
                        AtualizarEditora($_POST['cdEditora'], $_POST['nomeEditora']);
                    }
                }

                ?>
            </div>

            <div class="listarEditora">
                <h3>Listar Editoras</h3>
                <table border="1">
                    <thead>
                        <td>Código:</td>
                        <td>Nome:</td>
                        <td>#</td>
                        <td>-</td>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_GET['excluirEditora'])) 
                        {
                            ExcluirEditora($_GET['excluirEditora']); 
                        }
                     
                        $registros = ListarEditoras(0);
                        while ($editora = $registros -> fetch_array())
                        {
                            echo '
                            <tr>
                                <td>'.$editora['cd_editora'].'</td>
                                <td>'.$editora['nm_editora'].'</td>
                                
                                <td> 
                                    <button class ="editar" id="editarEditora" value ="'.$editora['cd_editora'].'">Editar</button>
                                </td>
                
                                <td>
                                    <button class="excluir">
                                        <a href ="?excluirEditora='.$editora['cd_editora'].'">
                                            Excluir
                                        </a>
                                    </button>
                                </td> 
                            </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="gerenciarAutor">
                <h3>Gerenciar Autores</h3>
                <form action="" method="POST" id="cadastrarAutor">
                    <input type="hidden" name="cdAutor" value="0">
                    <label for="nomeAutor">Nome da Editora:</label>
                    <input type="text" name="nomeAutor" id="nomeAutor">
                    <button type="submit" name="btnCadastrarAutor" id="btnCadastrarAutor">
                        Cadastrar
                    </button>
                </form>

                <?php

                if (($_POST['nomeAutor'])) 
                {
                    if ($_POST['cdAutor'] == "0")
                    {
                        CadastrarAutor($_POST['nomeAutor']);
                    }
                    else
                    {
                        AtualizarAutor($_POST['cdAutor'], $_POST['nomeAutor']);
                    }
                }

                ?>
            </div>

            <div class="listarAutor">
                <h3>Listar Autores</h3>
                <table border="1">
                    <thead>
                        <td>Código:</td>
                        <td>Nome:</td>
                        <td>#</td>
                        <td>-</td>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_GET['excluirAutor'])) 
                        {
                            ExcluirAutor($_GET['excluirAutor']); 
                        }
                     
                        $registros = ListarAutores(0);
                        while ($autor = $registros -> fetch_array())
                        {
                            echo '
                            <tr>
                                <td>'.$autor['cd_autor'].'</td>
                                <td>'.$autor['nm_autor'].'</td>
                                
                                <td> 
                                    <button class ="editar" id="editarAutor" value ="'.$autor['cd_autor'].'">Editar</button>
                                </td>
                
                                <td>
                                    <button class="excluir">
                                        <a href ="?excluirAutor='.$autor['cd_autor'].'">
                                            Excluir
                                        </a>
                                    </button>
                                </td> 
                            </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#editarEditora', function() {
            let cd = $(this).val();
            let url = 'http://localhost:8080/thoth/adm/dashboard.php?cdEditora='+cd;
        
            $.getJSON(url, function(retorno) {
                $('#nomeEditora').val(retorno.nm_editora);
                $('#cdEditora').val(retorno.cd_editora);
                $('#btnCadastrarEditora').html("Salvar");
            });
        })

        $(document).on('click', '#editarAutor', function() {
            let cd = $(this).val();
            let url = 'http://localhost:8080/thoth/adm/dashboard.php?cdAutor='+cd;

            $.getJSON(url, function(retorno) {
                $('#nomeAutor').val(retorno.nm_autor);
                $('#cdAutor').val(retorno.cd_autor);
                $('#btnCadastrarAutor').html("Salvar");
            });
        });
    </script>
</body>
</html>

<?php
}
?>