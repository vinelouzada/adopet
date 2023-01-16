<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
<header></header>
<main>
    <section class="banner">
        <img src="img/dog-and-cat.png">
    </section>
    <section class="container-formulario">
        <img class="logo" src="img/adopet-principal-logo.PNG" alt="">
        <h1 class="titulo">Formulário de demonstração de interesse para adotar um Gato</h1>
        <div class="botoes-tipo-pessoa">
            <button class="botao ativo" id="pessoa-fisica">Pessoa Física</button>
            <button class="botao" id="pessoa-juridica">Pessoa Jurídica</button>
        </div>
        <?php if (isset($_GET['erro'])):?>
            <div class="error">
                <p>O campo de <?= $_GET['erro'] ?> está incorreto</p>
            </div>
        <?php endif; ?>
        <form class="formulario" method="post" action="cadastro-form.php" autocomplete="off">
            <div class="formulario__nome_data-nascimento">
                <div class="formulario__nome">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="name" required>
                </div>
                <div class="formulario__data-nascimento">
                    <label for="data">Data de nascimento</label>
                    <input type="date" name="data" id="data" required>
                </div>
            </div>
            <div class="formulario__email">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="formulario__cpf_telefone">
                <div class="formulario__cnpj" id="cnpj-div">
                    <label for="cpf">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" required disabled>
                </div>
                <div class="formulario__cpf ativo-form" id="cpf-div">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" required>
                </div>
                <div class="formulario__telefone">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" required>
                </div>
            </div>

            <div class="formulario__endereco">

                <div class="formulario__endereco_cep">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" required>
                </div>

                <div class="formulario__endereco_cidade">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" required>
                </div>

                <div class="formulario__endereco_logradouro">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" name="logradouro" required>
                </div>

                <div class="formulario__endereco_bairro_estado_numero">
                    <div class="formulario__endereco_bairro"">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" required>
                    </div>
                    <div class="formulario__endereco_estado"">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" required maxlength="10">
                        </div>
                    <div class="formulario__endereco_numero">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" required>
                    </div>
                </div>
            </div>
            <button class="botao-formulario">Cadastrar</button>
        </form>
    </section>
</main>
<script src="https://unpkg.com/imask"></script>
<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/cpf-cnpj.js"></script>
</body>
</html>
