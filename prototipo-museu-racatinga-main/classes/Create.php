<?php
    class Create extends Conexao{
        private $evento;
        private $desc;
        private $ano;
        private $artista;
        private $nome;
        public function create(String $evento, String $desc, String $ano, String $artista, String $nome){
            $mysqli = $this->conectar();
            $this->evento = $evento;
            echo $evento;
            $query = "SELECT id FROM Evento where nome = '$evento'";
            $resultQuery = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($resultQuery)>0){
                while ($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;  
                }
            }
            $idEvento = $selectedProduct;
            $this->desc = $desc;
            $this->ano = $ano;
            $this->artista = $artista;
            $this->nome = $nome;

            $query = "INSERT INTO `Pecas`(`idEvento`, `descricao`, `ano`, `artista`, `nome`) VALUES ($idEvento, '$desc', '$ano', '$artista', '$nome')";
            $queryCreate = mysqli_query($mysqli, $query);
        }
        
    }
        
?>