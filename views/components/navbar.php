<?php 
session_start(); 
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
} 
$username = $_SESSION['username'];
$perfil = $_SESSION['perfil']; 
?>
<div class="dashboard-nav rounded">
    <header>
    <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
    <!--<a href="#" class="brand-logo"><i class="fas fa-anchor"></i> </a>-->
    <a href="dashboard.php"><img  href="glorias.php" src="./lib/img/logovertical.png" width="130" height="120"></a>
    </header>
    <nav class="dashboard-nav-list">
        <?php if($perfil['modgl'] != ''){ ?>
        <a href="glorias.php" class="dashboard-nav-item <?php echo $activePage == 'glorias' ? 'active' : ''; ?>">
        <i class="fa-solid fa-medal"></i>
        Glorias
        </a>
        <?php } ?>

        <?php if($perfil['modss'] != ''){ ?>
        <a href="subsedes.php" class="dashboard-nav-item <?php echo $activePage == 'subsedes' ? 'active' : ''; ?>">
        <i class="fas fa-sitemap"></i>
        Subsedes
        </a>
        <?php } ?>

        <?php if($perfil['modin'] != ''){ ?>
        <a href="instituciones.php" class="dashboard-nav-item <?php echo $activePage == 'instituciones' ? 'active' : ''; ?>">
        <i class="fas fa-hotel"></i>
        Instituciones 
        </a>
        <?php } ?>

        <?php if($perfil['modpr'] != ''){ ?>
        <a href="proyectos.php" class="dashboard-nav-item <?php echo $activePage == 'proyectos' ? 'active' : ''; ?>"">
        <i class="fas fa-chart-bar"></i>
        Proyectos
        </a>
        <?php } ?>

        <?php if($perfil['modnm'] != ''){ ?>
        <a href="nominas.php" class="dashboard-nav-item <?php echo $activePage == 'nominas' ? 'active' : ''; ?>""><i class="fas fa-file-invoice "></i>
        Nominas 
        </a>
        <?php } ?>

        <?php if($perfil['modrp'] != ''){ ?>
        <a href="reportes.php" class="dashboard-nav-item <?php echo $activePage == 'reportes' ? 'active' : ''; ?>"">
        <i class="fas fa-chart-pie"></i>
        Reportes
        </a>
        <?php } ?>

        <?php if($perfil['modpf'] != ''){ ?>
        <a href="perfiles.php" class="dashboard-nav-item <?php echo $activePage == 'perfiles' ? 'active' : ''; ?>""><i class="fas fa-address-card"></i>
        Perfiles 
        </a>
        <?php } ?>

        <?php if($perfil['modus'] != ''){ ?>
        <a href="usuarios.php" class="dashboard-nav-item <?php echo $activePage == 'usuarios' ? 'active' : ''; ?>""><i class="fas fa-user-tie"></i>
        Usuarios 
        </a>
        <?php } ?>

    <div class="nav-item-divider"></div>
    </nav>
</div>