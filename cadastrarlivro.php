<?php
// Verificar se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("conexao.php");

    $titulo = $_POST['title'];
    $autor = $_POST['author'];
    $paginas = $_POST['pages'];

    // Validar se o formulário está completo
    if (empty($titulo) || empty($autor) || empty($paginas)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios";
        $_SESSION['message_type'] = "error";
    }
    // Validar se páginas é um número positivo
    elseif (!is_numeric($paginas) || $paginas <= 0) {
        $_SESSION['message'] = "O número de páginas deve ser um valor numérico positivo";
        $_SESSION['message_type'] = "error";
    } else {
        // Inserir livro no banco de dados
        $sql = "INSERT INTO livro (titulo, autor, paginas) VALUES (?, ?, ?)";

        // Usar prepared statements para prevenir SQL injection
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $titulo, $autor, $paginas);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Livro cadastrado com sucesso!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erro ao cadastrar: " . mysqli_error($conn);
            $_SESSION['message_type'] = "error";
        }

        mysqli_stmt_close($stmt);
    }

    // Redirecionar para a mesma página para evitar reenvio do formulário
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Verifica se existe mensagem na sessão
$message = "";
$message_type = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];

    // Limpa as mensagens após exibi-las
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}

$title = "Bibliotech - Cadastro de Livro";
$description = "Formulário de cadastro de livro";
require_once("./head.php");
?>

<body class="bg-gradient-to-br from-emerald-50 to-teal-100 min-h-screen">
    <?php include_once("./navbar.php"); ?>
    <div class="pt-8 px-4 flex items-center justify-center">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-200">
                <h1 class="text-2xl font-bold text-emerald-800 p-6 border-b border-emerald-100 bg-emerald-50">Cadastro de Livro</h1>

                <?php if (!empty($message)): ?>
                    <div class="<?php echo $message_type === 'success' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-red-100 border-red-500 text-red-700'; ?> px-4 py-3 rounded relative border-l-4 mx-6 mt-4" role="alert">
                        <span class="block sm:inline"><?php echo $message; ?></span>
                    </div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título:</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="title" name="title" maxlength="200" required />
                        </div>

                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Autor:</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="author" name="author" maxlength="200" required />
                        </div>

                        <div>
                            <label for="pages" class="block text-sm font-medium text-gray-700 mb-1">Páginas:</label>
                            <input type="number" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="pages" name="pages" required />
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 cursor-pointer shadow-md hover:shadow-lg">Cadastrar Livro</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>