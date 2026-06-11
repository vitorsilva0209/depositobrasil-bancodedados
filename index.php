
<?php

// Array de produtos 
$produtos = [
    ["nome" => "Cimento CSN", "preco" => 100.90],
    ["nome" => "Areia Lavada Média", "preco" => 169.90],
    ["nome" => "Pedra Brita 1/2 Concreto", "preco" => 169.90],
    ["nome" => "Tijolo 6 furos Milheiro", "preco" => 850.00],
    ["nome" => "Cal Hidratada", "preco" => 128.00],
    ["nome" => "Vergalhão 8mm", "preco" => 145.00],
];

// Função criada para verificar se o cliente possui saldo suficiente
// para realizar a compra.
function validarCompra($preco, $saldo) {
    return $saldo >= $preco;
}

// Função criada para aplicar desconto em um produto.
// Ela recebe o preço e a porcentagem de desconto.
function aplicarDesconto($preco, $porcentagem) {
    return $preco - ($preco * ($porcentagem / 100));
}

// Função que filtra apenas os produtos acima de R$100.
// Foi criada para atender o requisito de filtro/pesquisa.
function filtrarProdutosCaros($lista) {
    return array_filter($lista, fn($p) => $p["preco"] > 100);
}

// Variável que armazena a mensagem de compra.
$mensagemCompra = "";

// Saldo fictício utilizado para simular compras.
$saldoUsuario = 300;

// Verifico se o usuário clicou no botão comprar.
if (isset($_GET["comprar"])) {

    $preco = floatval($_GET["comprar"]);

    // Validação de regra de negócio.
    // A compra só é aprovada se houver saldo suficiente.
    if (validarCompra($preco, $saldoUsuario)) {

        $mensagemCompra =
        "<p style='color:green; text-align:center;
        font-size:18px; font-weight:bold;'>
        ✔ Compra Aprovada!
        </p>";

    } else {

        $mensagemCompra =
        "<p style='color:red; text-align:center;
        font-size:18px; font-weight:bold;'>
        ❌ Compra Negada — Saldo Insuficiente
        </p>";

    }
}

// Controle de páginas do sistema.
// Caso nenhuma página seja informada, abre a página inicial.
$pagina = $_GET["pagina"] ?? "inicio";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Depósito Brasil</title>
    <link rel="icon" type="image/png" 
    href="imagem/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet">
<style>

    
        body {
            margin: 0;
            padding: 0;
            background: #2b2b2b;
            color: white;
            font-family: Arial;
        }

        header {
            background: #3a3a3a;
            padding: 25px;
            text-align: center;
            font-size: 30px;
            border-bottom: 4px solid #d40000;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 15px;
            border-bottom: 3px solid #d40000;
            background: #323232;
        }

        nav a {
            color: white;
            padding: 12px 25px;
            background: #444;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        nav a:hover {
            background: #d40000;
            box-shadow: 0px 0px 10px red;
        }

        #conteudo {
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #ff3b3b;
            border-bottom: 2px solid #ff3b3b;
            width: 60%;
            margin: 20px auto;
            padding-bottom: 8px;
        }

   
        .produto {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;

            background: #3b3b3b;
            padding: 20px;
            margin-bottom: 25px;

            border-radius: 10px;
            border-left: 6px solid #d40000;
        }

        .produto img {
            width: 180px;
            border-radius: 5px;
        }

        .btn-comprar {
            background: #d40000;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.4s;
            display: inline-block;
        }

        .btn-comprar:hover {
            background: #ff1e1e;
            transform: scale(1.05);
            box-shadow: 0 0 10px red;
        }

        
        .pagamento {
            margin-top: 10px;
            font-size: 15px;
            color: #afafb1;
        }

        footer {
            background: #202020;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            border-top: 3px solid #d40000;
        }
        .alert-secondary{
    background: #3a3a3a;
    color: white;
    border: 1px solid #555;
}
    </style>
     
</head>

<body>

<header>
    Depósito Brasil
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="index.php?pagina=inicio">
            Depósito Brasil
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuBootstrap"
                aria-controls="menuBootstrap"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menuBootstrap">

            <ul class="navbar-nav ms-auto">

            

                <li class="nav-item">
                    <a class="nav-link" href="index.php?pagina=produtos">
                        Produtos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?pagina=historia">
                        História
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?pagina=sobre">
                        Sobre
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<div style="padding: 20px;">

<?= $mensagemCompra ?>

<?php if ($pagina == "inicio"): ?>

<div class="alert alert-secondary text-center mt-3" role="alert">
    Bem-vindo ao Depósito Brasil! Aproveite nossas promoções.
</div>

<p style="text-align:center; font-size:20px;">
    A maior loja de materiais de construção de Araruna PR.<br>
    preços imbatíveis, entrega rápida e qualidade garantida.
</p>

<div class="card mx-auto mt-4 text-center bg-dark text-white" style="width: 18rem;">
    <img src="imagem/cimento.webp" class="card-img-top" alt="Produto">

    <div class="card-body">
        <h5 class="card-title">Produto em Promoção</h5>

        <p class="card-text">
            Cimento CSN com excelente qualidade para sua obra.
        </p>

        <a href="index.php?pagina=produtos" class="btn btn-danger">
            Ver Produtos
        </a>
    </div>
</div>

<?php elseif ($pagina == "produtos"): ?>

<h2>Produtos Disponíveis</h2>
<div class="text-center mb-4">
    <span class="badge bg-danger fs-6">
        Promoções da Semana
    </span>
</div>



<div class="produto">
    <div>
        <h3>Cimento CSN</h3>
        <p>R$ 100,90</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=39.90">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/cimento.webp" style="width:80px;">
    </div>
</div>

<div class="produto">
    <div>
        <h3>Areia Lavada Média</h3>
        <p>R$ 159,90</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=169.90">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/54fd88d83d.webp" style="width:80px;">
    </div>
</div>

<div class="produto">
    <div>
        <h3>Pedra Brita 1/2 Concreto</h3>
        <p>R$ 169,90</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=169.90">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/pedra-brita-britada-preta-curitiba1-50d5f8157d421aebac15421213758687-640-0.webp" style="width:80px;">
    </div>
</div>

<div class="produto">
    <div>
        <h3>Tijolo 6 furos Milheiro</h3>
        <p>R$ 620,00</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=850">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/tijolo.webp" style="width: 90px;">
    </div>
</div>

<div class="produto">
    <div>
        <h3>Cal Hidratada</h3>
        <p>R$ 128,00</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=28">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/cal hidratada.webp" style="width: 80px;">
    </div>
</div>

<div class="produto">
    <div>
        <h3>Vergalhão 8mm</h3>
        <p>R$ 145,00</p>
        <a class="btn-comprar" href="index.php?pagina=produtos&comprar=45">Comprar</a>
        <p class="pagamento">Pagamentos: PIX | Crédito | Débito | Boleto</p>
    </div>
    <div>
        <img src="imagem/vergalhao.webp" style="width: 80px;">
    </div>
</div>

<?php elseif ($pagina == "historia"): ?>

<h2>História da Loja</h2>
<p> O Depósito Brasil iniciou suas atividades há mais de 20 anos,
crescendo junto com a cidade de Araruna e tornando-se referência em materiais de construção. </p>

<h3 style="color:#ff3b3b;">Endereço Atual</h3>
<p><b>Rua Duque de Caxias, 691 Araruna, PR</b></p>

<h3 style="color:#ff3b3b;">Evolução</h3>
<ul>
    <li>2000 — Abertura da primeira unidade</li>
    <li>2010 — Ampliação do estoque</li>
    <li>2018 — Frota própria de entrega</li>
    <li>2023 — Modernização completa</li>
</ul>

<?php elseif ($pagina == "sobre"): ?>

<h2>Sobre a Loja</h2>

<p>
O Depósito Brasil é uma empresa especializada em materiais de construção,
ferramentas, elétrica, hidráulica e utilidades para o lar.
Atuamos em Araruna - PR desde 2000 oferecendo qualidade,
confiança e os melhores preços da região.
</p>

<h3 style="color:#ff3b3b;">Nossa Missão</h3>

<p>
Fornecer materiais de qualidade para construção e reforma,
garantindo atendimento rápido e satisfação dos clientes.
</p>

<h3 style="color:#ff3b3b;">Nossos Valores</h3>

<ul>
    <li>Honestidade</li>
    <li>Compromisso</li>
    <li>Qualidade</li>
    <li>Respeito ao Cliente</li>
    <li>Preço Justo</li>
</ul>

<h3 style="color:#ff3b3b;">O que oferecemos</h3>

<ul>
    <li>Materiais para construção</li>
    <li>Ferramentas profissionais</li>
    <li>Produtos hidráulicos</li>
    <li>Produtos elétricos</li>
    <li>Casa e lazer</li>
    <li>Entrega rápida</li>
</ul>

<h3 style="color:#ff3b3b;">Contato</h3>

<p>WhatsApp: (44) 98801-4236</p>
<p>Rua Duque de Caxias, 691 - Centro - Araruna/PR</p>

<?php endif; ?>

</div>

<footer>
    Depósito Brasil © Todos os direitos reservados
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>