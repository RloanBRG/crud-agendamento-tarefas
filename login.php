<!DOCTYPE html>

<html class="light" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TechSolutions - Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Hanken+Grotesk:wght@600;700;900&amp;family=JetBrains+Mono:wght@500&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&amp;family=Inter:wght@100..900&amp;family=JetBrains+Mono:wght@100..900&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed-variant": "#43455b",
                        "secondary-fixed": "#a0efff",
                        "on-tertiary-container": "#fffbff",
                        "surface-bright": "#f8f9ff",
                        "on-primary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-container": "#fffbff",
                        "on-error": "#ffffff",
                        "surface-tint": "#5c4bc3",
                        "on-secondary-fixed-variant": "#004e59",
                        "surface-container": "#e6eeff",
                        "outline-variant": "#c9c4d5",
                        "secondary": "#006876",
                        "surface-container-low": "#eff4ff",
                        "primary": "#5949c0",
                        "on-background": "#121c2a",
                        "outline": "#787584",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#595a71",
                        "on-surface": "#121c2a",
                        "on-secondary-fixed": "#001f25",
                        "inverse-primary": "#c7bfff",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-variant": "#d9e3f6",
                        "inverse-surface": "#27313f",
                        "background": "#f8f9ff",
                        "on-secondary": "#ffffff",
                        "primary-container": "#7263db",
                        "error-container": "#ffdad6",
                        "secondary-fixed-dim": "#69d5e9",
                        "tertiary-fixed": "#e0e0fc",
                        "error": "#ba1a1a",
                        "secondary-container": "#7ee9fe",
                        "on-tertiary-fixed": "#181a2e",
                        "surface-container-high": "#dee9fc",
                        "on-primary-fixed": "#180065",
                        "surface-container-highest": "#d9e3f6",
                        "on-surface-variant": "#474553",
                        "surface": "#f8f9ff",
                        "tertiary-container": "#71738b",
                        "surface-dim": "#d0dbed",
                        "tertiary-fixed-dim": "#c4c4df",
                        "on-secondary-container": "#006977",
                        "on-error-container": "#93000a",
                        "primary-fixed": "#e5deff",
                        "primary-fixed-dim": "#c7bfff",
                        "on-primary-fixed-variant": "#4330aa"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "container_max_width": "1440px",
                        "stack_lg": "24px",
                        "margin_page": "32px",
                        "gutter": "24px",
                        "stack_sm": "8px",
                        "stack_md": "16px",
                        "sidebar_width": "260px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "label-caps": ["JetBrains Mono"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-sm": ["Hanken Grotesk"],
                        "display-lg": ["Hanken Grotesk"],
                        "display-lg-mobile": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {
                            "lineHeight": "16px",
                            "fontWeight": "500"
                        }],
                        "label-caps": ["12px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "headline-sm": ["18px", {
                            "lineHeight": "24px",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "display-lg-mobile": ["32px", {
                            "lineHeight": "40px",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .login-card-shadow {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }

        .btn-interact:active {
            transform: scale(0.98);
        }

        [v-cloak] {
            display: none;
        }

        .modal-overlay {
            background-color: rgba(18, 28, 42, 0.4);
            backdrop-filter: blur(4px);
        }
    </style>
</head>

<body class="bg-background min-h-screen flex items-center justify-center p-margin_page selection:bg-primary-fixed-dim selection:text-on-primary-fixed overflow-x-hidden">
    <!-- Login Container -->
    <main class="w-full max-w-[420px] animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Branding Header -->
        <div class="flex flex-col items-center mb-stack_lg">
            <h1 class="font-headline-md text-headline-md text-on-surface tracking-tight">Portal Corporativo</h1>
            <p class="font-body-md text-body-md text-on-surface-variant mt-2">Bem-vindo de volta ao ecossistema TechSolutions.</p>
        </div>
        <!-- Login Card -->
        <section class="bg-surface-container-lowest border border-outline-variant rounded-xl p-8 login-card-shadow">
            <form class="space-y-stack_md" id="loginForm" method="POST" action="validar.php">
                <!-- Email Field -->
                <div class="flex flex-col gap-2">
                    <label class="font-label-sm text-label-sm text-on-surface-variant px-1" for="email">E-mail</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">
                            mail
                        </span>
                        <input name="email" class="w-full h-11 pl-10 pr-4 bg-background border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" id="email" placeholder="seu@email.com.br" required="" type="email" />
                    </div>
                </div>
                <!-- Password Field -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="font-label-sm text-label-sm text-on-surface-variant" for="password">Senha</label>
                        <a class="font-label-sm text-label-sm text-primary hover:underline transition-all" href="#">Esqueceu sua senha?</a>
                    </div>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">
                            lock
                        </span>
                        <input name="senha" class="w-full h-11 pl-10 pr-12 bg-background border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" id="password" placeholder="••••••••" required="" type="password" />
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" onclick="togglePassword('password', 'passIcon')" type="button">
                            <span class="material-symbols-outlined text-[20px]" id="passIcon">visibility</span>
                        </button>
                    </div>
                </div>
                <!-- Remember Me -->
                <div class="flex items-center gap-2 px-1 pt-1">
                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" id="remember" type="checkbox" />
                    <label class="font-body-md text-body-md text-on-surface-variant cursor-pointer select-none" for="remember">Manter conectado</label>
                </div>
                <!-- Actions -->
                <div class="flex flex-col gap-3 pt-4">
                    <button class="w-full h-11 bg-primary text-on-primary rounded-lg font-headline-sm text-headline-sm btn-interact transition-all hover:bg-primary-container active:bg-primary border-none flex items-center justify-center gap-2" type="submit">
                        Entrar
                        <span class="material-symbols-outlined text-[18px]">login</span>
                    </button>
                    <button class="w-full h-11 bg-transparent text-on-surface border border-outline-variant rounded-lg font-headline-sm text-headline-sm btn-interact transition-all hover:bg-surface-container-low active:bg-surface-container flex items-center justify-center gap-2" onclick="openRegisterModal()" type="button">
                        Registrar
                        <span class="material-symbols-outlined text-[18px]">person_add</span>
                    </button>
                </div>
            </form>
        </section>
        <!-- Footer Info -->
        <footer class="mt-stack_lg text-center space-y-2">
            <p class="font-label-sm text-label-sm text-outline-variant">© 2024 TechSolutions Enterprise Portal</p>
            <div class="flex justify-center gap-4">
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Privacidade</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Termos de Uso</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Suporte</a>
            </div>
        </footer>
    </main>
    <!-- Registration Modal -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300" id="registerModal">
        <!-- Overlay -->
        <div class="absolute inset-0 modal-overlay" onclick="closeRegisterModal()"></div>
        <!-- Modal Content -->
        <div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl p-8 w-full max-w-[420px] shadow-2xl animate-in fade-in zoom-in-95 duration-300">
            <div class="mb-6">
                <h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">Criar Conta</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1">Preencha os dados para iniciar sua jornada.</p>
            </div>
            <form class="space-y-stack_md" id="registerForm" onsubmit="event.preventDefault();">
                <!-- Name Field -->
                <div class="flex flex-col gap-2">
                    <label class="font-label-sm text-label-sm text-on-surface-variant px-1" for="reg_name">Nome Completo</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">
                            person
                        </span>
                        <input class="w-full h-11 pl-10 pr-4 bg-background border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" id="reg_name" placeholder="Seu nome completo" required="" type="text" />
                    </div>
                </div>
                <!-- Email Field -->
                <div class="flex flex-col gap-2">
                    <label class="font-label-sm text-label-sm text-on-surface-variant px-1" for="reg_email">E-mail</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">
                            mail
                        </span>
                        <input class="w-full h-11 pl-10 pr-4 bg-background border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" id="reg_email" placeholder="seu@email.com.br" required="" type="email" />
                    </div>
                </div>
                <!-- Password Field -->
                <div class="flex flex-col gap-2">
                    <label class="font-label-sm text-label-sm text-on-surface-variant px-1" for="reg_password">Senha</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">
                            lock
                        </span>
                        <input class="w-full h-11 pl-10 pr-12 bg-background border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" id="reg_password" placeholder="Mínimo 8 caracteres" required="" type="password" />
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" onclick="togglePassword('reg_password', 'regPassIcon')" type="button">
                            <span class="material-symbols-outlined text-[20px]" id="regPassIcon">visibility</span>
                        </button>
                    </div>
                </div>
                <!-- Terms -->
                <p class="font-label-sm text-label-sm text-on-surface-variant px-1 py-1">
                    Ao se registrar, você concorda com nossos <a class="text-primary hover:underline" href="#">Termos</a> e <a class="text-primary hover:underline" href="#">Privacidade</a>.
                </p>
                <!-- Actions -->
                <div class="flex flex-col gap-3 pt-4">
                    <button class="w-full h-11 bg-primary text-on-primary rounded-lg font-headline-sm text-headline-sm btn-interact transition-all hover:bg-primary-container active:bg-primary border-none flex items-center justify-center gap-2" type="submit">
                        Registrar
                        <span class="material-symbols-outlined text-[18px]">person_add</span>
                    </button>
                    <button class="w-full h-11 bg-transparent text-on-surface border border-outline-variant rounded-lg font-headline-sm text-headline-sm btn-interact transition-all hover:bg-surface-container-low active:bg-surface-container flex items-center justify-center" onclick="closeRegisterModal()" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Background Decorative Elements -->
    <div class="fixed top-0 right-0 -z-10 p-24 opacity-20 pointer-events-none">
        <div class="w-96 h-96 bg-primary rounded-full blur-[120px]"></div>
    </div>
    <div class="fixed bottom-0 left-0 -z-10 p-24 opacity-10 pointer-events-none">
        <div class="w-[500px] h-[500px] bg-secondary-container rounded-full blur-[150px]"></div>
    </div>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        const registerModal = document.getElementById('registerModal');

        function openRegisterModal() {
            registerModal.classList.remove('hidden');
            // Force reflow
            void registerModal.offsetWidth;
            registerModal.classList.remove('opacity-0');
            document.body.style.overflow = 'hidden';
        }

        function closeRegisterModal() {
            registerModal.classList.add('opacity-0');
            setTimeout(() => {
                registerModal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !registerModal.classList.contains('hidden')) {
                closeRegisterModal();
            }
        });

        // Simple button interaction feedback
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mousedown', () => {
                btn.classList.add('scale-95');
            });
            btn.addEventListener('mouseup', () => {
                btn.classList.remove('scale-95');
            });
            btn.addEventListener('mouseleave', () => {
                btn.classList.remove('scale-95');
            });
        });
    </script>
</body>

</html>