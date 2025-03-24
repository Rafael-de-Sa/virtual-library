<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <meta name="description" content="Formulário de cadastro" />
    <meta
      name="keywords"
      content="contorle, financeiro,sistema, sistema de gestão"
    />
    <meta name="author" content="Rafael de Sá" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="bg-primary-subtle">
    <div class="container al-center">
      <div class="col-9 mt-5 border rounded border-primary">
        <h1 class="p-3">Formulário de Cadastro</h1>

        <form action="cadastrar.php" method="POST">
          <div class="row p-3">
            <div class="mb-3">
              <label for="name" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="name" name="name" />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail:</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Senha:</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
              />
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Senha:</label>
              <input
                type="password"
                class="form-control"
                id="password2"
                name="password2"
              />
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-primary" value="Cadastrar" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
