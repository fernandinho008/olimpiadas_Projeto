<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback com Estrelas</title>
    <link rel="stylesheet" href="./assets/feedback.css">
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
        
        <!-- Conteúdo Principal -->
        <div class="main-content">
            <h1>Deixe seu Feedback</h1>

            <!-- Formulário de Feedback -->
            <div class="feedback-form">
                <form action="index.php" method="post">
                    <label for="nome">Seu Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="comentario">Seu Comentário:</label>
                    <textarea id="comentario" name="comentario" rows="5" required></textarea>

                    <label for="estrelas">Avaliação:</label>
                    <div class="stars">
                        <input type="radio" id="star5" name="estrelas" value="5"><label for="star5">★</label>
                        <input type="radio" id="star4" name="estrelas" value="4"><label for="star4">★</label>
                        <input type="radio" id="star3" name="estrelas" value="3"><label for="star3">★</label>
                        <input type="radio" id="star2" name="estrelas" value="2"><label for="star2">★</label>
                        <input type="radio" id="star1" name="estrelas" value="1" required><label for="star1">★</label>
                    </div>

                    <button type="submit">Enviar Feedback</button>
                </form>
            </div>

            <div class="feedbacks">
                <?php
                    session_start();
                    if (!isset($_SESSION['feedbacks'])) {
                        $_SESSION['feedbacks'] = [
                            ['nome' => 'Ana', 'comentario' => 'Ótima página, muito informativa!', 'estrelas' => 5],
                            ['nome' => 'Bruno', 'comentario' => 'Gostei muito da organização do site.', 'estrelas' => 4],
                            ['nome' => 'Carlos', 'comentario' => 'Amo esgrima e recomendo!', 'estrelas' => 5]
                        ];
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $nome = htmlspecialchars($_POST['nome']);
                        $comentario = htmlspecialchars($_POST['comentario']);
                        $estrelas = intval($_POST['estrelas']);

                        // Armazena o feedback em uma sessão
                        $_SESSION['feedbacks'][] = [
                            'nome' => $nome,
                            'comentario' => $comentario,
                            'estrelas' => $estrelas
                        ];
                    }

                    // Exibe todos os feedbacks armazenados
                    foreach ($_SESSION['feedbacks'] as $feedback) {
                        echo "<div class='feedback'>";
                        echo "<h3>{$feedback['nome']}</h3>";
                        echo "<div class='stars'>";
                        for ($i = 0; $i < $feedback['estrelas']; $i++) {
                            echo "<label>★</label>";
                        }
                        echo "</div>";
                        echo "<p>{$feedback['comentario']}</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>  
    <script type="module" src="./script.js"></script>
</body>
</html>
