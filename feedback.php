<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback com Estrelas</title>
    <link rel="stylesheet" href="./assets/feedback.css">
</head>
<body>
    <h1>Deixe seu Feedback</h1>

    <div class="feedback-form">
        <form action="feedback.php" method="post">
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
                $_SESSION['feedbacks'] = [];
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = htmlspecialchars($_POST['nome']);
                $comentario = htmlspecialchars($_POST['comentario']);
                $estrelas = intval($_POST['estrelas']);
                $_SESSION['feedbacks'][] = [
                    'nome' => $nome,
                    'comentario' => $comentario,
                    'estrelas' => $estrelas
                ];
            }
            
            foreach ($_SESSION['feedbacks'] as $feedback) {
                echo "<div class='feedback'>";
                echo "<h3>{$feedback['nome']} - Avaliação: ";
                for ($i = 0; $i < $feedback['estrelas']; $i++) {
                    echo "★";
                }
                echo "</h3>";
                echo "<p>{$feedback['comentario']}</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>
