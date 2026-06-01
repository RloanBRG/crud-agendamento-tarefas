<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nomeUsuario = $_SESSION['nome'];
$emailUsuario = $_SESSION['usuario']; //email

?>
<!DOCTYPE html>

<html class="light" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TechSolutions - Crud</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;900&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
            vertical-align: middle;
        }

        .active-pill::before {
            content: '';
            position: absolute;
            left: 0;
            width: 4px;
            height: 32px;
            background-color: #5949c0;
            border-radius: 0 4px 4px 0;
        }

        body {
            background-color: #f8f9ff;
        }

        .modal-backdrop {
            background-color: rgba(18, 28, 42, 0.6);
            backdrop-filter: blur(4px);
            transition: all 0.3s ease-in-out;
        }

        /* Global Smooth Transitions */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }

        main {
            transition: margin-left 0.3s ease-in-out;
        }

        /* Sidebar Mini Classes */
        .sidebar-mini {
            width: 80px !important;
        }

        .sidebar-mini .hide-on-mini {
            display: none !important;
        }

        .sidebar-mini .nav-label {
            display: none !important;
        }

        .sidebar-mini .logo-text {
            display: none !important;
        }

        .sidebar-mini .px-6 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sidebar-mini .px-4 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .sidebar-mini #collapse-sidebar span {
            transform: rotate(180deg);
            transition: transform 0.3s ease-in-out;
        }

        main.sidebar-mini-active {
            margin-left: 80px !important;
        }

        /* Entrance Animations */
        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-slide-up {
            animation: fadeSlideUp 0.6s ease-in-out forwards;
        }

        /* Modal Animations */
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.3s ease-in-out;
        }

        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
        }

        /* Utility for smooth hover */
        .smooth-hover {
            transition: all 0.3s ease-in-out;
        }

        .smooth-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="font-body-md text-on-surface overflow-x-hidden overflow-hidden">
    <!-- Sidebar Navigation -->
    <aside class="fixed left-0 top-0 h-screen w-[260px] bg-inverse-surface border-r border-outline-variant flex flex-col py-margin_page z-50 sidebar-transition -translate-x-full md:translate-x-0" id="sidebar">
        <div class="flex px-4 mb-12 flex-col">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-container rounded flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-white text-2xl" data-icon="rocket_launch">rocket_launch</span>
                    </div>
                    <div class="logo-text">
                        <h1 class="font-headline-md text-headline-md font-bold text-on-primary">TechSolutions</h1>
                        <p class="font-label-sm text-label-sm text-outline-variant">Enterprise Portal</p>
                    </div>
                </div>
                <button class="flex items-center gap-3 p-2 text-slate-300 hover:text-on-primary hover:bg-white/10 rounded-lg transition-all duration-300 ease-in-out w-fit" id="collapse-sidebar" onclick="document.getElementById('sidebar').classList.toggle('sidebar-mini'); document.getElementById('main-content').classList.toggle('sidebar-mini-active');">
                    <span class="material-symbols-outlined">chevron_left</span>
                    <span class="font-label-sm hide-on-mini">Recolher Menu</span>
                </button>
            </div>
        </div>
        <nav class="flex-1 space-y-2 px-2">
            <button class="w-full relative flex items-center px-4 py-3 text-on-primary bg-white/5 active-pill font-label-sm transition-all duration-300 ease-in-out" id="nav-employees" onclick="switchTab('employees')">
                <span class="material-symbols-outlined mr-3 shrink-0" data-icon="group">group</span>
                <span class="nav-label">Funcionários</span>
            </button>
            <button class="w-full flex items-center px-4 py-3 text-slate-400 hover:text-on-primary hover:bg-white/10 font-label-sm transition-all duration-300 ease-in-out" id="nav-tasks" onclick="switchTab('tasks')">
                <span class="material-symbols-outlined mr-3 shrink-0" data-icon="assignment">assignment</span>
                <span class="nav-label">Tarefas</span>
            </button>
        </nav>
        <div class="mt-auto px-2">
            <div class="px-4 py-4 mb-2 border-t border-outline-variant/30 flex items-center gap-3 hide-on-mini">
                <div class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed font-bold text-xs shrink-0">
                    <?php
                    $partes = explode(' ', trim($nomeUsuario));

                    echo strtoupper(substr($partes[0], 0, 1));

                    if (count($partes) > 1) {
                        echo strtoupper(substr(end($partes), 0, 1));
                    }
                    ?>
                </div>
                <div class="truncate">
                    <p class="text-on-primary font-label-sm truncate">
                        <?php echo htmlspecialchars($nomeUsuario); ?>
                    </p>
                    <p class="text-outline-variant text-[10px] uppercase tracking-tighter"><?php echo htmlspecialchars($emailUsuario); ?></p>
                </div>
            </div>
            <a href="logout.php">
                <button class="w-full flex items-center px-4 py-3 font-label-sm text-label-sm transition-all duration-300 ease-in-out text-error bg-red-500/10 hover:bg-red-500/20 rounded-lg">
                    <span class="material-symbols-outlined mr-3 shrink-0" data-icon="logout">logout</span>
                    <span class="nav-label">Sair</span>
                </button>
            </a>
        </div>
    </aside>
    <!-- Content Canvas -->
    <main class="ml-0 md:ml-[260px] min-h-screen p-margin_page" id="main-content">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-stack_md mb-stack_lg animate-fade-slide-up">
            <div id="section-title-container">
                <h2 class="font-display-lg text-display-lg text-on-surface" id="current-tab-title">Funcionários</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mt-1" id="current-tab-subtitle">Gerencie a equipe e permissões corporativas.</p>
            </div>
            <div id="action-button-container">
                <button class="bg-primary hover:bg-primary-container text-on-primary px-stack_md py-stack_sm flex items-center gap-2 rounded-xl transition-all duration-300 ease-in-out active:scale-95 shadow-sm" id="add-btn" onclick="openModal('employee-modal', 'Novo')"><span class="material-symbols-outlined" data-icon="add">add</span><span class="font-label-sm">Novo Funcionário</span></button>
            </div>
        </header>
        <!-- Dynamic Grid Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-gutter mb-stack_lg animate-fade-slide-up" style="animation-delay: 0.05s">
            <div class="bg-primary-container text-on-primary-container p-stack_lg rounded-xl flex items-center justify-between shadow-md">
                <div>
                    <p class="font-label-caps text-label-caps opacity-80 mb-1">Total de Funcionários</p>
                    <h3 class="font-display-lg text-3xl font-bold">6</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <span class="material-symbols-outlined text-3xl text-white" data-icon="groups">groups</span>
                </div>
            </div>
            <div class="bg-surface-container-highest border border-outline-variant p-stack_lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Total de Tarefas</p>
                    <h3 class="font-display-lg text-3xl font-bold text-on-surface">4</h3>
                </div>
                <div class="bg-primary/10 p-3 rounded-full">
                    <span class="material-symbols-outlined text-3xl text-primary" data-icon="assignment_turned_in">assignment_turned_in</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter animate-fade-slide-up" id="content-grid" style="animation-delay: 0.1s; opacity: 1;">
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        A
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 1)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 1)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Ana Beatriz Rocha</h4>
                <p class="font-body-md text-on-surface-variant truncate">ana.rocha@techsolutions.com</p>
            </div>
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0.05s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        C
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 2)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 2)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Carlos Eduardo Mendes</h4>
                <p class="font-body-md text-on-surface-variant truncate">carlos.m@techsolutions.com</p>
            </div>
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0.1s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        F
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 3)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 3)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Fernanda Lima</h4>
                <p class="font-body-md text-on-surface-variant truncate">f.lima@techsolutions.com</p>
            </div>
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0.15000000000000002s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        G
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 4)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 4)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Gabriel Souza</h4>
                <p class="font-body-md text-on-surface-variant truncate">gabriel.souza@techsolutions.com</p>
            </div>
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0.2s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        M
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 5)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 5)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Mariana Costa</h4>
                <p class="font-body-md text-on-surface-variant truncate">m.costa@techsolutions.com</p>
            </div>
            <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: 0.25s">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                        R
                    </div>
                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300" onclick="openModal('employee-modal', 'Editar', 6)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="p-2 text-on-surface-variant hover:text-error transition-all duration-300" onclick="confirmDelete('employee', 6)">
                            <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                        </button>
                    </div>
                </div>
                <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">Ricardo Oliveira</h4>
                <p class="font-body-md text-on-surface-variant truncate">r.oliveira@techsolutions.com</p>
            </div>
        </div>
    </main>
    <!-- Employee Modal -->
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="employee-modal">
        <div class="modal-backdrop absolute inset-0" onclick="closeModal('employee-modal')"></div>
        <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
            <div class="flex justify-between items-center mb-stack_lg">
                <h3 class="font-headline-sm text-headline-sm" id="employee-modal-title">Editar Funcionário</h3>
                <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300 ease-in-out" onclick="closeModal('employee-modal')">
                    <span class="material-symbols-outlined" data-icon="close">close</span>
                </button>
            </div>
            <form class="space-y-stack_md" id="employee-form">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nome</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all duration-300 ease-in-out outline-none" id="emp-input-name" placeholder="Ex: Rodrigo Silva" type="text" />
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Email</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all duration-300 ease-in-out outline-none" id="emp-input-email" placeholder="rodrigo@techsolutions.com" type="email" />
                </div>
                <div id="emp-password-field">
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Senha</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all duration-300 ease-in-out outline-none" placeholder="••••••••" type="password" />
                    <p class="mt-1.5 font-label-sm text-on-surface-variant italic opacity-80" id="emp-password-hint">Se o campo senha permanecer vazio, a senha atual será mantida.</p>
                </div>
                <div class="flex gap-stack_md pt-stack_md">
                    <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm text-label-sm transition-all duration-300 ease-in-out" onclick="closeModal('employee-modal')" type="button">Cancelar</button>
                    <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm text-label-sm shadow-md transition-all duration-300 ease-in-out" id="emp-submit-btn" type="submit">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Task Modal -->
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="task-modal">
        <div class="modal-backdrop absolute inset-0" onclick="closeModal('task-modal')"></div>
        <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
            <div class="flex justify-between items-center mb-stack_lg">
                <h3 class="font-headline-sm text-headline-sm" id="task-modal-title">Novo Tarefa</h3>
                <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300 ease-in-out" onclick="closeModal('task-modal')">
                    <span class="material-symbols-outlined" data-icon="close">close</span>
                </button>
            </div>
            <form class="space-y-stack_md" id="task-form">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Título da Tarefa</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all duration-300 ease-in-out outline-none" id="task-input-title" placeholder="Ex: Refatoração do Dashboard" type="text" />
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Descrição</label>
                    <textarea class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all duration-300 ease-in-out outline-none" id="task-input-desc" placeholder="Detalhes técnicos..." rows="3"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-stack_md">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Prazo</label>
                        <input class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary outline-none transition-all duration-300 ease-in-out" id="task-input-date" type="date" />
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status</label>
                        <select class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary outline-none transition-all duration-300 ease-in-out" id="task-input-status">
                            <option>Pendente</option>
                            <option>Em Andamento</option>
                            <option>Concluída</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-stack_md pt-stack_md">
                    <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm transition-all duration-300 ease-in-out" onclick="closeModal('task-modal')" type="button">Cancelar</button>
                    <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm shadow-md transition-all duration-300 ease-in-out" id="task-submit-btn" type="submit">Criar Tarefa</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="hidden fixed inset-0 z-[110] flex items-center justify-center p-4" id="delete-modal">
        <div class="modal-backdrop absolute inset-0" onclick="closeModal('delete-modal')"></div>
        <div class="bg-surface relative w-full max-w-sm p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
            <div class="text-center">
                <div class="w-16 h-16 bg-error-container text-error rounded-full flex items-center justify-center mx-auto mb-stack_md">
                    <span class="material-symbols-outlined text-4xl" data-icon="delete_forever">delete_forever</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm mb-2" id="delete-modal-title">Excluir Registro?</h3>
                <p class="font-body-md text-on-surface-variant mb-stack_lg" id="delete-modal-message">Tem certeza que deseja excluir '[Nome]'? Esta ação é irreversível.</p>
                <div class="flex gap-stack_md">
                    <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm transition-all duration-300 ease-in-out" onclick="closeModal('delete-modal')">Cancelar</button>
                    <button class="flex-1 py-2.5 bg-error text-on-error hover:bg-red-700 rounded-lg font-label-sm shadow-md transition-all duration-300 ease-in-out" id="delete-confirm-btn" onclick="closeModal('delete-modal')">Deletar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Navigation Toggle -->
    <button class="md:hidden fixed bottom-6 right-6 w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg z-50 flex items-center justify-center transition-all duration-300 ease-in-out active:scale-90" id="mobile-toggle" onclick="toggleSidebar()">
        <span class="material-symbols-outlined transition-transform duration-300" data-icon="menu" id="toggle-icon">menu</span>
    </button>
    <script>
        const employees = [{
                id: 1,
                name: "Ana Beatriz Rocha",
                email: "ana.rocha@techsolutions.com",
                initial: "A"
            },
            {
                id: 2,
                name: "Carlos Eduardo Mendes",
                email: "carlos.m@techsolutions.com",
                initial: "C"
            },
            {
                id: 3,
                name: "Fernanda Lima",
                email: "f.lima@techsolutions.com",
                initial: "F"
            },
            {
                id: 4,
                name: "Gabriel Souza",
                email: "gabriel.souza@techsolutions.com",
                initial: "G"
            },
            {
                id: 5,
                name: "Mariana Costa",
                email: "m.costa@techsolutions.com",
                initial: "M"
            },
            {
                id: 6,
                name: "Ricardo Oliveira",
                email: "r.oliveira@techsolutions.com",
                initial: "R"
            }
        ];

        const tasks = [{
                id: 1,
                title: "Migração de Banco de Dados",
                desc: "Atualizar instâncias PostgreSQL para versão 15.",
                date: "2024-05-24",
                status: "Em Andamento",
                color: "bg-secondary-container text-on-secondary-container"
            },
            {
                id: 2,
                title: "Revisão de Segurança",
                desc: "Auditoria completa nos endpoints de autenticação.",
                date: "2024-05-26",
                status: "Pendente",
                color: "bg-surface-variant text-on-surface-variant"
            },
            {
                id: 3,
                title: "Frontend Refactoring",
                desc: "Implementar componentes baseados em Tailwind v3.4.",
                date: "2024-05-22",
                status: "Concluída",
                color: "bg-tertiary-fixed text-on-tertiary-fixed"
            },
            {
                id: 4,
                title: "Deploy Ambiente Staging",
                desc: "Configurar pipeline CI/CD para o novo cluster K8s.",
                date: "2024-05-28",
                status: "Pendente",
                color: "bg-surface-variant text-on-surface-variant"
            }
        ];

        let currentTab = 'employees';
        let sidebarOpen = false;

        function renderEmployees() {
            const grid = document.getElementById('content-grid');
            grid.innerHTML = employees.map((emp, index) => `
                <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group opacity-0 animate-fade-slide-up" style="animation-delay: ${index * 0.05}s">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                            ${emp.initial}
                        </div>
                        <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button onclick="openModal('employee-modal', 'Editar', ${emp.id})" class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                            </button>
                            <button onclick="confirmDelete('employee', ${emp.id})" class="p-2 text-on-surface-variant hover:text-error transition-all duration-300">
                                <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary">${emp.name}</h4>
                    <p class="font-body-md text-on-surface-variant truncate">${emp.email}</p>
                </div>
            `).join('');
        }

        function renderTasks() {
            const grid = document.getElementById('content-grid');
            grid.innerHTML = tasks.map((task, index) => {
                const formattedDate = task.date.split('-').reverse().join('/');
                return `
                <div class="bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out flex flex-col h-full opacity-0 animate-fade-slide-up" style="animation-delay: ${index * 0.05}s">
                    <div class="flex justify-between items-start mb-2">
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider ${task.color} transition-colors duration-300">${task.status}</span>
                        <div class="flex gap-1">
                            <button onclick="openModal('task-modal', 'Editar', ${task.id})" class="p-1.5 text-on-surface-variant hover:text-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button onclick="confirmDelete('task', ${task.id})" class="p-1.5 text-on-surface-variant hover:text-error transition-all duration-300">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-2 transition-colors duration-300">${task.title}</h4>
                    <p class="font-body-md text-on-surface-variant mb-4 flex-1 line-clamp-3">${task.desc}</p>
                    <div class="pt-4 border-t border-outline-variant flex items-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-[18px] mr-2" data-icon="calendar_today">calendar_today</span>
                        <span class="font-label-sm">${formattedDate}</span>
                    </div>
                </div>
            `
            }).join('');
        }

        function switchTab(tab) {
            if (currentTab === tab && window.innerWidth >= 768) return;

            const grid = document.getElementById('content-grid');
            grid.style.opacity = '0';

            setTimeout(() => {
                currentTab = tab;
                const titleEl = document.getElementById('current-tab-title');
                const subEl = document.getElementById('current-tab-subtitle');
                const addBtnEl = document.getElementById('add-btn');
                const navEmp = document.getElementById('nav-employees');
                const navTask = document.getElementById('nav-tasks');

                if (tab === 'employees') {
                    titleEl.textContent = 'Funcionários';
                    subEl.textContent = 'Gerencie a equipe e permissões corporativas.';
                    addBtnEl.innerHTML = '<span class="material-symbols-outlined" data-icon="add">add</span><span class="font-label-sm">Novo Funcionário</span>';
                    addBtnEl.setAttribute('onclick', "openModal('employee-modal', 'Novo')");

                    navEmp.className = "w-full relative flex items-center px-4 py-3 text-on-primary bg-white/5 active-pill font-label-sm transition-all duration-300 ease-in-out";
                    navTask.className = "w-full flex items-center px-4 py-3 text-slate-400 hover:text-on-primary hover:bg-white/10 font-label-sm transition-all duration-300 ease-in-out";

                    renderEmployees();
                } else {
                    titleEl.textContent = 'Tarefas';
                    subEl.textContent = 'Acompanhe o progresso dos projetos ativos.';
                    addBtnEl.innerHTML = '<span class="material-symbols-outlined" data-icon="add_task">add_task</span><span class="font-label-sm">Nova Tarefa</span>';
                    addBtnEl.setAttribute('onclick', "openModal('task-modal', 'Novo')");

                    navTask.className = "w-full relative flex items-center px-4 py-3 text-on-primary bg-white/5 active-pill font-label-sm transition-all duration-300 ease-in-out";
                    navEmp.className = "w-full flex items-center px-4 py-3 text-slate-400 hover:text-on-primary hover:bg-white/10 font-label-sm transition-all duration-300 ease-in-out";

                    renderTasks();
                }
                grid.style.opacity = '1';
                if (window.innerWidth < 768) toggleSidebar();
            }, 150);
        }

        function openModal(id, mode = 'Novo', itemId = null) {
            const modal = document.getElementById(id);
            const modalContent = modal.querySelector('.bg-surface');
            const submitBtn = modal.querySelector('button[type="submit"]');

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');

            setTimeout(() => {
                modalContent.classList.add('modal-enter-active');
            }, 10);

            const title = modal.querySelector('h3');
            if (id === 'employee-modal') {
                title.textContent = `${mode} Funcionário`;
                const passwordHint = document.getElementById('emp-password-hint');
                if (mode === 'Novo') {
                    submitBtn.textContent = 'Cadastrar';
                    passwordHint.classList.add('hidden');
                    document.getElementById('emp-input-name').value = '';
                    document.getElementById('emp-input-email').value = '';
                } else {
                    submitBtn.textContent = 'Salvar Alterações';
                    passwordHint.classList.remove('hidden');
                    const emp = employees.find(e => e.id === itemId);
                    if (emp) {
                        document.getElementById('emp-input-name').value = emp.name;
                        document.getElementById('emp-input-email').value = emp.email;
                    }
                }
            } else if (id === 'task-modal') {
                title.textContent = `${mode} Tarefa`;
                if (mode === 'Novo') {
                    submitBtn.textContent = 'Criar Tarefa';
                    document.getElementById('task-input-title').value = '';
                    document.getElementById('task-input-desc').value = '';
                    document.getElementById('task-input-date').value = '';
                    document.getElementById('task-input-status').selectedIndex = 0;
                } else {
                    submitBtn.textContent = 'Salvar Alterações';
                    const task = tasks.find(t => t.id === itemId);
                    if (task) {
                        document.getElementById('task-input-title').value = task.title;
                        document.getElementById('task-input-desc').value = task.desc;
                        document.getElementById('task-input-date').value = task.date;
                        document.getElementById('task-input-status').value = task.status;
                    }
                }
            }
        }

        function confirmDelete(type, id) {
            const modal = document.getElementById('delete-modal');
            const messageEl = document.getElementById('delete-modal-message');
            const confirmBtn = document.getElementById('delete-confirm-btn');

            let itemName = "";
            if (type === 'employee') {
                const item = employees.find(e => e.id === id);
                itemName = item ? item.name : "Funcionário";
            } else {
                const item = tasks.find(t => t.id === id);
                itemName = item ? item.title : "Tarefa";
            }

            messageEl.innerHTML = `Tem certeza que deseja excluir <strong>'${itemName}'</strong>? Esta ação é irreversível.`;
            confirmBtn.onclick = () => {
                closeModal('delete-modal');
                if (type === 'employee') {
                    const idx = employees.findIndex(e => e.id === id);
                    if (idx > -1) employees.splice(idx, 1);
                    renderEmployees();
                } else {
                    const idx = tasks.findIndex(t => t.id === id);
                    if (idx > -1) tasks.splice(idx, 1);
                    renderTasks();
                }
            };

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            setTimeout(() => {
                modal.querySelector('.bg-surface').classList.add('modal-enter-active');
            }, 10);
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            const modalContent = modal.querySelector('.bg-surface');

            modalContent.classList.remove('modal-enter-active');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const icon = document.getElementById('toggle-icon');
            sidebarOpen = !sidebarOpen;
            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                icon.textContent = 'close';
                icon.style.transform = 'rotate(90deg)';
            } else {
                sidebar.classList.add('-translate-x-full');
                icon.textContent = 'menu';
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Initialize
        renderEmployees();

        // Prevent form refreshes for demo
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const modalId = form.closest('div[id]').id;
                closeModal(modalId);
            });
        });
    </script>
</body>

</html>