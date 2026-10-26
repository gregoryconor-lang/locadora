<?php
    class Filme {
        // Atributos
        private $id;
        private $titulo;
        private $anoLancamento;
        private $sinopse;
        private $exemplaresDisponiveis;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getAnoLancamento() {
            return $this->anoLancamento;
        }

        public function setAnoLancamento($anoLancamento) {
            $this->anoLancamento = $anoLancamento;
        }

        public function getSinopse() {
            return $this->sinopse;
        }

        public function setSinopse($sinopse) {
            $this->sinopse = $sinopse;
        }

        public function getExemplaresDisponiveis() {
            return $this->exemplaresDisponiveis;
        }

        public function setExemplaresDisponiveis($exemplaresDisponiveis) {
            $this->exemplaresDisponiveis = $exemplaresDisponiveis;
        }
    }