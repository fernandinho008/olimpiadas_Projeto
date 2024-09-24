
<?php
session_start();

if (!isset($_SESSION['comentarios'])) {
    $_SESSION['comentarios'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $estrelas = htmlspecialchars($_POST['estrelas']);
    
    if (!empty($nome) && !empty($comentario) && !empty($estrelas)) {
        $_SESSION['comentarios'][] = [
            'nome' => $nome,
            'comentario' => $comentario,
            'estrelas' => $estrelas
        ];
    }
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback com Estrelas</title>
    <link rel="stylesheet" href="./assets/feedback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Menu Lateral -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <button class="toggle-btn" onclick="toggleSidebar()">&#9776;</button>
            </div>  
            <div class="sidebar-content">
                <button class="nav-btn"><a href="./index.html">Página Principal</a></button>
                <button class="nav-btn"><a href="./historia.html">História</a></button>
                <button class="nav-btn"><a href="./categorias.html">Categorias</a></button>
                <button class="nav-btn"><a href="./podio.html">Pódios</a></button>
                <button class="nav-btn"><a href="./feedback.php">Feedback</a></button>
                <div class="last">
                    <a href="https://olympics.com/pt/olympic-games">Olimpíadas</a>
                </div>
            </div>
        </div>
        

        <div class="container">
        <h1>Deixe seu Comentário</h1>
        <form method="POST" class="formulario">
            <div class="estrelas">
                <label>
                    <input type="radio" name="estrelas" value="1" required> ★
                </label>
                <label>
                    <input type="radio" name="estrelas" value="2" required> ★★
                </label>
                <label>
                    <input type="radio" name="estrelas" value="3" required> ★★★
                </label>
                <label>
                    <input type="radio" name="estrelas" value="4" required> ★★★★
                </label>
                <label>
                    <input type="radio" name="estrelas" value="5" required> ★★★★★
                </label>
            </div>
            <input type="text" name="nome" placeholder="Seu nome" required>
            <textarea name="comentario" placeholder="Seu comentário" required></textarea>
            <button type="submit">Fazer Comentário</button>
        </form>

        <div class="comentarios">
            <h2>Comentários:</h2>
            <?php foreach ($_SESSION['comentarios'] as $c): ?>
                <div class="comentario">
                    <strong><?php echo $c['nome']; ?> (<?php echo str_repeat('★', $c['estrelas']); ?>)</strong>
                    <p><?php echo $c['comentario']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
