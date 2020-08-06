<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="windows-1252">
    <title>Geração de imagem para posts de redes sociais!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="media/css/estilo.css?1591551033" type="text/css" />
    <link rel="stylesheet" href="assets/css/principal.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/1.12.1-jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/principal.js"></script>
</head>

<body>
    <div class="left">
        <h1>Crie a imagem do seu post</h1>
        <form id="form" action="javascript:;" method="post" enctype="multipart/form-data">
            <label class="label"><i class="fa fa-image"></i> Imagem do post</label>
            <label class="upload" for="upload">
                <div></div>
            </label>
            <small>* recomenda-se utilizar imagens maiores que 200x200</small>
            <input type="file" id="upload" name="imagem"><br>
            <label class="label"><i class="fa fa-tags"></i> Título do post</label>
            <input type="text" name="texto" id="texto" placeholder="Digite o título do post" /><br>
            <label class="label"><i class="fa fa-align-left"></i> Descrição do post</label>
            <textarea name="descricao" id="descricao" placeholder="Digite sua descrição do post"></textarea><br>
            <button>Criar imagem</button>
        </form>
    </div>
    <div class="center clear">

    </div>
    <div class="right">
        <h1>Escolha o fundo</h1>
        <div class="container_bgs">
            <div data-img="bg_roxo.png" class="bg1 active"></div>
            <div data-img="bg_rosa.png" class="bg2"></div>
            <div data-img="bg_amarelo.png" class="bg3"></div>
            <div data-img="bg_pattern.png" class="bg4"></div>
        </div>
    </div>
</body>

</html>