<nav class="bg-blue-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="./index.php" class="text-white font-bold text-xl">Bibliotech</a>
                </div>

                <!-- Links de navegação para desktop -->
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="./index.php" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Início</a>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                        <a href="./adm.php" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Painel Admin</a>
                        <a href="./cadastrarusuario.php" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Cadastrar Usuário</a>
                        <a href="./cadastrarlivro.php" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Cadastrar Livro</a>
                    <?php else: ?>
                        <a href="./livros.php" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Livros</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Botões do lado direito -->
            <div class="flex items-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="text-white mx-4"><?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Usuário' ?></span>
                    <a href="./logout.php" class="bg-red-500 hover:bg-red-700 text-white px-3 py-2 rounded-md text-sm font-medium">Sair</a>
                <?php else: ?>
                    <a href="./login.php" class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <?php endif; ?>
            </div>

            <!-- Botão Mobile -->
            <div class="flex items-center md:hidden">
                <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Abrir menu principal</span>
                    <!-- Ícone de menu (três barras) -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Ícone de fechamento (X) -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="./index.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Início</a>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                <a href="./adm.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Painel Admin</a>
                <a href="./cadastrarusuario.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Cadastrar Usuário</a>
                <a href="./cadastrarlivro.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Cadastrar Livro</a>
            <?php else: ?>
                <a href="./livros.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Livros</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="./logout.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Sair</a>
            <?php else: ?>
                <a href="./login.php" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('#mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            // Alternar os ícones
            const icons = btn.querySelectorAll('svg');
            icons.forEach(icon => {
                icon.classList.toggle('hidden');
            });
        });
    });
</script>