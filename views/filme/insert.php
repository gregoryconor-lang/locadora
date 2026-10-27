<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe filme (bean)
    $filme = new Filme();

    // Definir os valores dos atributos a partir do form
    $filme->setTitulo($_POST['titulo']);
    $filme->setAnoLancamento($_POST['ano_lancamento']);
    $filme->setExemplaresDisponiveis($_POST['exemplares_disponiveis']);
    $filme->setSinopse($_POST['sinopse']);

    // Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_categoria']);

    // Definir a categoria no filme
    $filme->setCategoria($categoria);

    // Instanciar um objeto da classe filmeDAO
    $dao = new FilmeDAO();

    // Invocar o método create
    $dao->create($filme);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');