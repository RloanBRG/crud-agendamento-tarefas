<?php
session_start();
require_once 'conexao.php'; // Certifique-se de que este arquivo exista

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nomeUsuario = $_SESSION['nome'] ?? 'Visitante';
$emailUsuario = $_SESSION['usuario'];

// Consulta para usuários
$sqlTotaluser = "SELECT COUNT(*) as totalUsuarios FROM usuarios";
$resultTotaluser = $conn->query($sqlTotaluser);
// Ajustado para usar 'totalUsuarios'
$totalUsuarios = ($resultTotaluser) ? $resultTotaluser->fetch_assoc()['totalUsuarios'] : 0;

// Consulta para tarefas
$sqlTotaltask = "SELECT COUNT(*) as totalTarefas FROM tarefas";
$resultTotaltask = $conn->query($sqlTotaltask);
// Ajustado para usar 'totalTarefas'
$totalTarefas = ($resultTotaltask) ? $resultTotaltask->fetch_assoc()['totalTarefas'] : 0;
// Exibição de mensagens (exemplo simples)

$mensagens_status = [
    'user_cadastrado' => ['texto' => 'Usuário cadastrado com sucesso!', 'tipo' => 'sucesso'],
    'user_editado'    => ['texto' => 'Usuário atualizado com sucesso!', 'tipo' => 'sucesso'],
    'user_excluido'   => ['texto' => 'Usuário removido com sucesso!', 'tipo' => 'sucesso'],
    'task_cadastrada' => ['texto' => 'Tarefa adicionada com sucesso!', 'tipo' => 'sucesso'],
    'task_editada'    => ['texto' => 'Tarefa atualizada com sucesso!', 'tipo' => 'sucesso'],
    'task_excluida'   => ['texto' => 'Tarefa removida com sucesso!', 'tipo' => 'sucesso'],
    'erro'            => ['texto' => 'Ocorreu um erro na operação.', 'tipo' => 'erro']
];

$mensagem = '';
$tipoMensagem = '';

if (isset($_GET['status']) && array_key_exists($_GET['status'], $mensagens_status)) {
    $mensagem = $mensagens_status[$_GET['status']]['texto'];
    $tipoMensagem = $mensagens_status[$_GET['status']]['tipo'];
}

?>


<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<title>TechSolutions | Enterprise Portal</title>
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

    .sidebar-transition {
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
    }

    main {
        transition: margin-left 0.3s ease-in-out;
    }

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

    .modal-enter {
        opacity: 0;
        transform: scale(0.95);
        transition: all 0.3s ease-in-out;
    }

    .modal-enter-active {
        opacity: 1;
        transform: scale(1);
    }

    .smooth-hover {
        transition: all 0.3s ease-in-out;
    }

    .smooth-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Notification area styles */
    .status-success {
        background-color: #E8F8EE;
        border: 1px solid #65C18C;
        color: #276749;
    }

    .status-error {
        background-color: #FDEBEC;
        border: 1px solid #E57373;
        color: #B42318;
    }
</style>
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
                <p class="text-on-primary font-label-sm truncate"><?php echo $nomeUsuario; ?></p>
                <p class="text-outline-variant text-[10px] tracking-tighter truncate"><?php echo $emailUsuario; ?></p>
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
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-stack_md mb-6 animate-fade-slide-up">
        <div id="section-title-container">
            <h2 class="font-display-lg text-display-lg text-on-surface" id="current-tab-title">Funcionários</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-1" id="current-tab-subtitle">Gerencie a equipe e permissões corporativas.</p>
        </div>
        <div id="action-button-container">
            <button class="bg-primary hover:bg-primary-container text-on-primary px-stack_md py-stack_sm flex items-center gap-2 rounded-xl transition-all duration-300 ease-in-out active:scale-95 shadow-sm" id="add-btn" onclick="openCreateModal()">
                <span class="material-symbols-outlined" data-icon="add">add</span>
                <span class="font-label-sm" id="add-btn-text">Novo Funcionário</span>
            </button>
        </div>
    </header>
    <?php if (!empty($mensagem)): ?>
        <div class="mb-6 animate-fade-slide-up" id="system-notification" style="animation-delay: 0.02s">
            <div class="<?php echo $tipoMensagem === 'sucesso' ? 'status-success' : 'status-error'; ?> px-4 py-3 rounded-lg flex items-center justify-between border shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined">
                        <?php echo $tipoMensagem === 'sucesso' ? 'check_circle' : 'error'; ?>
                    </span>
                    <p class="font-body-md font-medium"><?php echo $mensagem; ?></p>
                </div>
                <button class="p-1 hover:bg-black/5 rounded-full transition-all" onclick="document.getElementById('system-notification').style.display='none'">
                    <span class="material-symbols-outlined text-lg">close</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-gutter mb-stack_lg animate-fade-slide-up" style="animation-delay: 0.05s">
        <div class="bg-primary-container text-on-primary-container p-stack_lg rounded-xl flex items-center justify-between shadow-md">
            <div>
                <p class="font-label-caps text-label-caps opacity-80 mb-1">Total de Funcionários</p>
                <h3 class="font-display-lg text-3xl font-bold"><?php echo $totalUsuarios; ?></h3>
            </div>
            <div class="bg-white/20 p-3 rounded-full">
                <span class="material-symbols-outlined text-3xl text-white" data-icon="groups">groups</span>
            </div>
        </div>
        <div class="bg-surface-container-highest border border-outline-variant p-stack_lg rounded-xl flex items-center justify-between shadow-sm">
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Total de Tarefas</p>
                <h3 class="font-display-lg text-3xl font-bold text-on-surface"><?php echo $totalTarefas; ?></h3>
            </div>
            <div class="bg-primary/10 p-3 rounded-full">
                <span class="material-symbols-outlined text-3xl text-primary" data-icon="assignment_turned_in">assignment_turned_in</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter animate-fade-slide-up" id="content-grid" style="animation-delay: 0.1s; opacity: 1;">

        <!-- CONTAINER DE FUNCIONÁRIOS (Controlado por ID ou Classe no seu JS) -->
        <!-- Nota: Deixamos todos renderizados, o JS decide qual bloco fica visível -->

        <?php
        // 1. LISTAGEM DE USUÁRIOS
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        $index = 0;

        if ($result->num_rows === 0): ?>
            <div class="col-span-full text-center py-10 text-on-surface-variant employee-card-item">Nenhum funcionário encontrado.</div>
            <?php else:
            while ($row = $result->fetch_assoc()):
                $initial = strtoupper(substr($row['nome'], 0, 1));
            ?>
                <!-- Cards de Funcionários -->
                <div class="employee-card-item bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out group animate-fade-slide-up" style="animation-delay: <?php echo $index * 0.05; ?>s; opacity: 1;">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-12 h-12 bg-primary-fixed text-on-primary-fixed-variant rounded-full flex items-center justify-center font-headline-sm transition-transform duration-300 group-hover:scale-110">
                                <?php echo $initial; ?>
                            </div>
                            <span class="text-xs font-mono text-on-surface-variant/40">#<?php echo $row['id']; ?></span>
                        </div>

                        <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- CORREÇÃO: Chamando openEditEmployee(this) -->
                            <button
                                data-id="<?php echo $row['id']; ?>"
                                data-nome="<?php echo htmlspecialchars($row['nome']); ?>"
                                data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                onclick="openEditEmployee(this)"
                                class="p-2 text-on-surface-variant hover:text-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <!-- CORREÇÃO: Chamando openDeleteEmployee(this) -->
                            <button
                                data-id="<?php echo $row['id']; ?>"
                                data-nome="<?php echo htmlspecialchars($row['nome']); ?>"
                                onclick="openDeleteEmployee(this)"
                                class="p-2 text-on-surface-variant hover:text-error transition-all duration-300">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-1 truncate transition-colors duration-300 group-hover:text-primary"><?php echo $row['nome']; ?></h4>
                    <p class="font-body-md text-on-surface-variant truncate"><?php echo $row['email']; ?></p>
                </div>
        <?php
                $index++;
            endwhile;
        endif; ?>


        <?php
        // 2. LISTAGEM DE TAREFAS
        $sqlTasks = "SELECT * FROM tarefas";
        $resultTasks = $conn->query($sqlTasks);
        $indexTask = 0;

        if ($resultTasks->num_rows === 0): ?>
            <div class="col-span-full text-center py-10 text-on-surface-variant task-card-item hidden">Nenhuma tarefa encontrada.</div>
            <?php else:
            while ($rowTask = $resultTasks->fetch_assoc()):

                $dataColuna = !empty($rowTask['data_tarefa']) ? $rowTask['data_tarefa'] : '2026-01-01';
                $formattedDate = date('d/m/Y', strtotime($dataColuna));

                $status = $rowTask['status'];
                $colorClass = "bg-surface-variant text-on-surface-variant";

                if ($status === 'Em Andamento') {
                    $colorClass = "bg-secondary-container text-on-secondary-container";
                } elseif ($status === 'Concluída') {
                    $colorClass = "bg-tertiary-fixed text-on-tertiary-fixed";
                }
            ?>
                <!-- Cards de Tarefas -->
                <div class="task-card-item hidden bg-surface border border-outline-variant p-stack_md rounded-xl smooth-hover transition-all duration-300 ease-in-out flex flex-col h-full animate-fade-slide-up" style="animation-delay: <?php echo $indexTask * 0.05; ?>s; opacity: 1;">
                    <div class="flex justify-between items-start mb-2">
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider <?php echo $colorClass; ?> transition-colors duration-300"><?php echo $status; ?></span>

                        <div class="flex gap-1">
                            <!-- CORREÇÃO: Chamando openEditTask(this) -->
                            <button
                                data-id="<?php echo $rowTask['id']; ?>"
                                data-titulo="<?php echo htmlspecialchars($rowTask['titulo']); ?>"
                                data-descricao="<?php echo htmlspecialchars($rowTask['descricao']); ?>"
                                data-status="<?php echo htmlspecialchars($rowTask['status']); ?>"
                                data-data="<?php echo $dataColuna; ?>"
                                onclick="openEditTask(this)"
                                class="p-1.5 text-on-surface-variant hover:text-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[18px]">edit</span>
                            </button>
                            <!-- CORREÇÃO: Chamando openDeleteTask(this) -->
                            <button
                                data-id="<?php echo $rowTask['id']; ?>"
                                data-titulo="<?php echo htmlspecialchars($rowTask['titulo']); ?>"
                                onclick="openDeleteTask(this)"
                                class="p-1.5 text-on-surface-variant hover:text-error transition-all duration-300">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                        </div>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-2 transition-colors duration-300">
                        <span class="text-xs font-mono text-on-surface-variant/40 mr-1">#<?php echo $rowTask['id']; ?></span>
                        <?php echo $rowTask['titulo']; ?>
                    </h4>
                    <p class="font-body-md text-on-surface-variant mb-4 flex-1 line-clamp-3"><?php echo $rowTask['descricao']; ?></p>
                    <div class="pt-4 border-t border-outline-variant flex items-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-[18px] mr-2">calendar_today</span>
                        <span class="font-label-sm"><?php echo $formattedDate; ?></span>
                    </div>
                </div>
        <?php
                $indexTask++;
            endwhile;
        endif; ?>


    </div>

</main>
<!-- 1. Create Employee Modal -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="employee-create-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('employee-create-modal')"></div>
    <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="flex justify-between items-center mb-stack_lg">
            <h3 class="font-headline-sm text-headline-sm">Cadastrar Funcionário</h3>
            <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300" onclick="closeModal('employee-create-modal')">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        <form action="../usuarios/cadastrar_usuario.php" class="space-y-stack_md" method="POST">
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nome</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="nome" placeholder="Ex: Rodrigo Silva" required="" type="text" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Email</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="email" placeholder="rodrigo@techsolutions.com" required="" type="email" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Senha</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="senha" placeholder="••••••••" required="" type="password" />
            </div>
            <div class="flex gap-stack_md pt-stack_md">
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('employee-create-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm shadow-md transition-all" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
<!-- 2. Edit Employee Modal -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="employee-edit-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('employee-edit-modal')"></div>
    <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="flex justify-between items-center mb-stack_lg">
            <h3 class="font-headline-sm text-headline-sm">Editar Funcionário</h3>
            <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300" onclick="closeModal('employee-edit-modal')">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        <form action="../usuarios/editar_usuario.php" class="space-y-stack_md" id="edit-employee-form" method="POST">
            <input id="edit-emp-id" name="id" type="hidden" />
            <input type="hidden" name="acao" value="editar_user">
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nome</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" id="edit-emp-nome" name="nome" required="" type="text" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Email</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" id="edit-emp-email" name="email" required="" type="email" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Senha</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="senha" placeholder="Deixe em branco para manter" type="password" />
            </div>
            <div class="flex gap-stack_md pt-stack_md">
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('employee-edit-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm shadow-md transition-all" type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>
<!-- 3. Delete Employee Modal -->
<div class="fixed inset-0 z-[110] flex items-center justify-center p-4 hidden" id="employee-delete-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('employee-delete-modal')"></div>
    <div class="bg-surface relative w-full max-w-sm p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="text-center">
            <div class="w-16 h-16 bg-error-container text-error rounded-full flex items-center justify-center mx-auto mb-stack_md">
                <span class="material-symbols-outlined text-4xl" data-icon="delete_forever">delete_forever</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm mb-2">Excluir Funcionário</h3>
            <p class="font-body-md text-on-surface-variant mb-stack_lg" id="delete-emp-text">Tem certeza que deseja excluir [Nome]?</p>
            <form action="../usuarios/excluir_usuario.php" class="flex gap-stack_md" method="POST">
                <input id="delete-emp-id" name="id" type="hidden" />
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('employee-delete-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-error text-on-error hover:bg-red-700 rounded-lg font-label-sm shadow-md transition-all" type="submit">Excluir</button>
            </form>
        </div>
    </div>
</div>
<!-- 4. Create Task Modal -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="task-create-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('task-create-modal')"></div>
    <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="flex justify-between items-center mb-stack_lg">
            <h3 class="font-headline-sm text-headline-sm">Criar Tarefa</h3>
            <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300" onclick="closeModal('task-create-modal')">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        <form action="../tarefas/cadastrar_task.php" class="space-y-stack_md" method="POST">
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Título da Tarefa</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="titulo" placeholder="Ex: Refatoração do Dashboard" required="" type="text" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Descrição</label>
                <textarea class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" name="descricao" placeholder="Detalhes técnicos..." required="" rows="3"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-stack_md">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Prazo</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary transition-all outline-none" name="data" required="" type="date" />
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status</label>
                    <select class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary transition-all outline-none" name="status">
                        <option>Pendente</option>
                        <option>Em Andamento</option>
                        <option>Concluída</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-stack_md pt-stack_md">
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('task-create-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm shadow-md transition-all" type="submit">Criar Tarefa</button>
            </div>
        </form>
    </div>
</div>
<!-- 5. Edit Task Modal -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-4 hidden" id="task-edit-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('task-edit-modal')"></div>
    <div class="bg-surface relative w-full max-w-md p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="flex justify-between items-center mb-stack_lg">
            <h3 class="font-headline-sm text-headline-sm">Editar Tarefa</h3>
            <button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-300" onclick="closeModal('task-edit-modal')">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        <form action="../tarefas/editar_task.php" class="space-y-stack_md" id="edit-task-form" method="POST">
            <input id="edit-task-id" name="id" type="hidden" />
            <input type="hidden" name="acao" value="editar_task">
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Título da Tarefa</label>
                <input class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" id="edit-task-titulo" name="titulo" required="" type="text" />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Descrição</label>
                <textarea class="w-full bg-surface border border-outline-variant px-stack_md py-2.5 rounded-lg focus:border-primary transition-all outline-none" id="edit-task-desc" name="descricao" required="" rows="3"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-stack_md">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Prazo</label>
                    <input class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary transition-all outline-none" id="edit-task-data" name="data" required="" type="date" />
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status</label>
                    <select class="w-full bg-surface border border-outline-variant px-stack_md py-2 rounded-lg focus:border-primary transition-all outline-none" id="edit-task-status" name="status">
                        <option>Pendente</option>
                        <option>Em Andamento</option>
                        <option>Concluída</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-stack_md pt-stack_md">
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('task-edit-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-sm shadow-md transition-all" type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>
<!-- 6. Delete Task Modal -->
<div class="fixed inset-0 z-[110] flex items-center justify-center p-4 hidden" id="task-delete-modal">
    <div class="modal-backdrop absolute inset-0" onclick="closeModal('task-delete-modal')"></div>
    <div class="bg-surface relative w-full max-w-sm p-stack_lg rounded-xl border border-outline-variant shadow-2xl modal-enter">
        <div class="text-center">
            <div class="w-16 h-16 bg-error-container text-error rounded-full flex items-center justify-center mx-auto mb-stack_md">
                <span class="material-symbols-outlined text-4xl" data-icon="delete_forever">delete_forever</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm mb-2">Excluir Tarefa</h3>
            <p class="font-body-md text-on-surface-variant mb-stack_lg" id="delete-task-text">Tem certeza que deseja excluir [Título]?</p>
            <form action="../tarefas/excluir_task.php" class="flex gap-stack_md" method="POST">
                <input id="delete-task-id" name="id" type="hidden" />
                <button class="flex-1 py-2.5 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-sm" onclick="closeModal('task-delete-modal')" type="button">Cancelar</button>
                <button class="flex-1 py-2.5 bg-error text-on-error hover:bg-red-700 rounded-lg font-label-sm shadow-md transition-all" type="submit">Excluir</button>
            </form>
        </div>
    </div>
</div>
<!-- Mobile Navigation Toggle -->
<button class="md:hidden fixed bottom-6 right-6 w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg z-50 flex items-center justify-center transition-all duration-300 ease-in-out active:scale-90" id="mobile-toggle" onclick="toggleSidebar()">
    <span class="material-symbols-outlined transition-transform duration-300" data-icon="menu" id="toggle-icon">menu</span>
</button>
<script>
    let currentTab = 'employees';
    let sidebarOpen = false;

    // Removemos as funções antigas renderEmployees() e renderTasks() que reinjetavam dados fictícios.

    function switchTab(tab) {
        if (currentTab === tab && window.innerWidth >= 768) return;
        const grid = document.getElementById('content-grid');
        grid.style.opacity = '0';

        setTimeout(() => {
            currentTab = tab;
            const titleEl = document.getElementById('current-tab-title');
            const subEl = document.getElementById('current-tab-subtitle');
            const addBtnText = document.getElementById('add-btn-text');
            const addBtnIcon = document.getElementById('add-btn').querySelector('.material-symbols-outlined');
            const navEmp = document.getElementById('nav-employees');
            const navTask = document.getElementById('nav-tasks');

            // Captura todos os cards gerados pelo PHP
            const cardsFuncionarios = document.querySelectorAll('.employee-card-item');
            const cardsTarefas = document.querySelectorAll('.task-card-item');

            if (tab === 'employees') {
                titleEl.textContent = 'Funcionários';
                subEl.textContent = 'Gerencie a equipe e permissões corporativas.';
                addBtnText.textContent = 'Novo Funcionário';
                addBtnIcon.textContent = 'add';
                navEmp.className = "w-full relative flex items-center px-4 py-3 text-on-primary bg-white/5 active-pill font-label-sm transition-all duration-300 ease-in-out";
                navTask.className = "w-full flex items-center px-4 py-3 text-slate-400 hover:text-on-primary hover:bg-white/10 font-label-sm transition-all duration-300 ease-in-out";

                // Mágica visual: Mostra funcionários e esconde tarefas
                cardsFuncionarios.forEach(el => el.classList.remove('hidden'));
                cardsTarefas.forEach(el => el.classList.add('hidden'));
            } else {
                titleEl.textContent = 'Tarefas';
                subEl.textContent = 'Acompanhe o progresso dos projetos ativos.';
                addBtnText.textContent = 'Nova Tarefa';
                addBtnIcon.textContent = 'add_task';
                navTask.className = "w-full relative flex items-center px-4 py-3 text-on-primary bg-white/5 active-pill font-label-sm transition-all duration-300 ease-in-out";
                navEmp.className = "w-full flex items-center px-4 py-3 text-slate-400 hover:text-on-primary hover:bg-white/10 font-label-sm transition-all duration-300 ease-in-out";

                // Mágica visual: Esconde funcionários e mostra tarefas
                cardsFuncionarios.forEach(el => el.classList.add('hidden'));
                cardsTarefas.forEach(el => el.classList.remove('hidden'));
            }

            grid.style.opacity = '1';
            if (window.innerWidth < 768 && sidebarOpen) toggleSidebar();
        }, 150);
    }

    function openCreateModal() {
        if (currentTab === 'employees') {
            openModal('employee-create-modal');
        } else {
            openModal('task-create-modal');
        }
    }

    // ADAPTADO: Agora recebe o botão clicado (this) vindo do card PHP de Usuários
    function openEditEmployee(botao) {
        const id = botao.getAttribute('data-id');
        const nome = botao.getAttribute('data-nome');
        const email = botao.getAttribute('data-email');

        document.getElementById('edit-emp-id').value = id;
        document.getElementById('edit-emp-nome').value = nome;
        document.getElementById('edit-emp-email').value = email;
        openModal('employee-edit-modal');
    }

    // ADAPTADO: Agora recebe o botão clicado (this) vindo do card PHP de Usuários
    function openDeleteEmployee(botao) {
        const id = botao.getAttribute('data-id');
        const nome = botao.getAttribute('data-nome');

        document.getElementById('delete-emp-id').value = id;
        document.getElementById('delete-emp-text').innerHTML = `Tem certeza que deseja excluir <strong>'${nome}'</strong>?`;
        openModal('employee-delete-modal');
    }

    // ADAPTADO: Agora recebe o botão clicado (this) vindo do card PHP de Tarefas
    function openEditTask(botao) {
        const id = botao.getAttribute('data-id');
        const titulo = botao.getAttribute('data-titulo');
        const descricao = botao.getAttribute('data-descricao');
        const status = botao.getAttribute('data-status');
        const data = botao.getAttribute('data-data'); // Formato AAAA-MM-DD

        document.getElementById('edit-task-id').value = id;
        document.getElementById('edit-task-titulo').value = titulo;
        document.getElementById('edit-task-desc').value = descricao;
        document.getElementById('edit-task-data').value = data;
        document.getElementById('edit-task-status').value = status;
        openModal('task-edit-modal');
    }

    // ADAPTADO: Agora recebe o botão clicado (this) vindo do card PHP de Tarefas
    function openDeleteTask(botao) {
        const id = botao.getAttribute('data-id');
        const titulo = botao.getAttribute('data-titulo');

        document.getElementById('delete-task-id').value = id;
        document.getElementById('delete-task-text').innerHTML = `Tem certeza que deseja excluir <strong>'${titulo}'</strong>?`;
        openModal('task-delete-modal');
    }

    function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            modal.querySelector('.bg-surface').classList.add('modal-enter-active');
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const content = modal.querySelector('.bg-surface');
        content.classList.remove('modal-enter-active');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
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

    // Auto-dismiss notification demo
    setTimeout(() => {
        const notification = document.getElementById('system-notification');
        if (notification) {
            notification.classList.add('opacity-0', 'translate-y-[-20px]');
            notification.style.transition = 'all 0.5s ease-in-out';
            setTimeout(() => notification.style.display = 'none', 500);
        }
    }, 5000);

    // Form handlers - REMOVIDO o e.preventDefault() para permitir o envio do formulário ao PHP externo
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', (e) => {
            const modalId = form.closest('[id]').id;
            console.log(`Submitted form in ${modalId}`);
        });
    });


    // 2. Adicione este bloco no FINAL do seu script para ler a URL apenas UMA VEZ ao carregar
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');

        // Se na URL estiver 'tasks', força a abertura da aba de tarefas
        if (tab === 'tasks') {
            switchTab('tasks');
        }
    });
</script>
</body>

</html>