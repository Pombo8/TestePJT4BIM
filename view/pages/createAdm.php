<?php
 session_start();
 if ( $_SESSION["admLogged"]==false ) {
     header("Location: ./loginAdmPagina.php");
 }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/createAdm.css">
    </head>
    <body>
    <header>
        <nav>
            <a href="./admMenu.php">Menu</a>
        </nav>
    </header>
        <div class='container'>
            <div class='card'>
                <h1>Cadastro de Peça</h1>
                <form method="POST" class='card-form' >
                <div class="input">
                    <select class='input-field' name="eventos" id="eventos">

                    <?php
                        
                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome FROM Evento";
                        $result = mysqli_query($mysqli, $query);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                $selectedProduct = $row['nome'];
                                echo "<option name='$selectedProduct' value='$selectedProduct'>$selectedProduct</option>";
                            }
                        }

                    ?>
                    </select>
                </div>    
                <div class="input">
                    <input type="text" name="nome" class="input-field" required/>
                    <label class="input-label">Nome</label>
                </div>

                <div class="input">
                    <input type="text" class="input-field" name='artista' required/>
                    <label class="input-label">Artista</label>
                </div>
                <div class="input">
                    <input type="text" class="input-field" name='ano' required/>
                    <label class="input-label">Ano</label>
                </div>
                <div class="input">
                    <input type="text" class="input-field" name='desc' required/>
                    <label class="input-label">Descricao</label>
                </div>
                <div class="input">
                    <input class='action-button' type="submit" name="submit" value="Submit"> 
                </div>    
                </form>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['desc']) && isset($_POST['ano'])){
        if(isset($_POST['artista']) && isset($_POST['nome'])){
            require "../../classes/Conexao.php";
            require "../../classes/Create.php";
            $class = new Create();
            
            $evento = $_POST['eventos'];
            $desc = $_POST['desc'];
            $ano = $_POST['ano'];
            $artista = $_POST['artista'];
            $nome = $_POST['nome'];
            
            $class->createFunction($evento, $desc, $ano, $artista, $nome);
            unset($_POST['desc']);
            unset($_POST['ano']);
            unset($_POST['artista']);
            unset($_POST['nome']);
        }
    }
?>
