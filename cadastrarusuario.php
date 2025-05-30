<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("conexao.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  if (empty($name) || empty($email) || empty($password) || empty($password2)) {
    $_SESSION['message'] = "Todos os campos são obrigatórios";
    $_SESSION['message_type'] = "error";
  } elseif ($password !== $password2) {
    $_SESSION['message'] = "As senhas não conferem";
    $_SESSION['message_type'] = "error";
  } else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password_hash);

    if (mysqli_stmt_execute($stmt)) {
      $_SESSION['message'] = "Usuário cadastrado com sucesso!";
      $_SESSION['message_type'] = "success";
    } else {
      $_SESSION['message'] = "Erro ao cadastrar: " . mysqli_error($conn);
      $_SESSION['message_type'] = "error";
    }

    mysqli_stmt_close($stmt);
  }

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

$message = "";
$message_type = "";
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  $message_type = $_SESSION['message_type'];

  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}

$title = "Bibliotech - Cadastro de Usuário";
$description = "Formulário de cadastro de usuário";
require_once("./head.php");
?>

<body class="bg-gradient-to-br from-emerald-50 to-teal-100 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-md mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-200">
      <h1 class="text-2xl font-bold text-emerald-800 p-6 border-b border-emerald-100 bg-emerald-50">Cadastro de Usuário</h1>

      <?php if (!empty($message)): ?>
        <div class="<?php echo $message_type === 'success' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-red-100 border-red-500 text-red-700'; ?> px-4 py-3 rounded relative border-l-4 mx-6 mt-4" role="alert">
          <span class="block sm:inline"><?php echo $message; ?></span>
        </div>
      <?php endif; ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="p-6">
        <div class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="name" name="name" placeholder="Nome" required />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="email" name="email" placeholder="E-mail" required />
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha:</label>
            <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="password" name="password" placeholder="Senha" required />
          </div>

          <div>
            <label for="password2" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha:</label>
            <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" id="password2" name="password2" placeholder="Confirmar Senha" required />
          </div>

          <div class="pt-2">
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 cursor-pointer shadow-md hover:shadow-lg">Cadastrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>