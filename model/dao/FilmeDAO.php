<?php
    class FilmeDAO {
        public function create($filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO filme(titulo, ano_lancamento, sinopse, exemplares_disponiveis) 
                    VALUES (:t, :a, :s, :e)"
                );
                $query->bindValue(':t', $filme->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':a', $filme->getAnoLancamento(), PDO::PARAM_INT);
                $query->bindValue(':s', $filme->getSinopse(), PDO::PARAM_STR);
                $query->bindValue(':e', $filme->getExemplaresDisponiveis(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM filme");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFilmes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $filme = new Filme(); // Classe bean
                    $filme->setId($linha['id_filme']);
                    $filme->setTitulo($linha['titulo']);
                    $filme->setAnoLancamento($linha['ano_lancamento']);
                    $filme->setSinopse($linha['sinopse']);
                    $filme->setExemplaresDisponiveis($linha['exemplares_disponiveis']);

                    array_push($listaFilmes, $filme);
                }
                
                return $listaFilmes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM filme WHERE id_filme = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $filme = new Filme(); // Classe bean
                    $filme->setId($linha['id_filme']);
                    $filme->setTitulo($linha['titulo']);
                    $filme->setAnoLancamento($linha['ano_lancamento']);
                    $filme->setSinopse($linha['sinopse']);
                    $filme->setExemplaresDisponiveis($linha['exemplares_disponiveis']);
                }
                
                return $filme;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE filme
                    SET titulo = :t, ano_lancamento = :a, sinopse = :s, exemplares_disponiveis = :e
                    WHERE id_filme = :i"
                );
                $query->bindValue(':t', $filme->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':a', $filme->getAnoLancamento(), PDO::PARAM_INT);
                $query->bindValue(':s', $filme->getSinopse(), PDO::PARAM_STR);
                $query->bindValue(':e', $filme->getExemplaresDisponiveis(), PDO::PARAM_INT);
                $query->bindValue(':i', $filme->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM filme
                    WHERE id_filme = :i"
                );                
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }