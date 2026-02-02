<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto"> <!-- Atributo movido para cá -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiraVôlei</title>
    
    <!-- Script essencial para evitar "piscada" de cor clara antes de carregar o tema escuro -->
    <script>
        (() => {
            const getStoredTheme = () => localStorage.getItem('theme')
            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) return storedTheme
                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto') {
                    document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })
        })()
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}"/>
    
    <style>
        body { display: flex; flex-direction: column; min-height: 100vh; }
        .footer { margin-top: auto; }
        
        /* Ajuste para o rodapé: Use classes utilitárias que respeitam o tema */
        /* Removi 'bg-dark text-white' para o rodapé seguir o tema automático */
    </style>
</head>
<!-- Adicione estas classes ao body -->
<body class="d-flex flex-column min-vh-100">

    <!-- Envolva seu conteúdo em uma div com flex-fill -->
    <main class="flex-fill">
        @yield('content')
    </main>

    <!-- O rodapé agora ficará sempre na base -->
    <footer class="footer py-4 border-top bg-body-tertiary">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-4 text-md-start mb-3 mb-md-0">
                    <span class="text-body-secondary small">&copy; 2026 Sistema de Vôlei</span>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <p class="mb-0 fw-bold">Desenvolvido por <span class="text-primary">Gildo Alves Batista Júnior</span></p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
