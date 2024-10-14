<div class="dashboard-nav rounded">
    <header>
    <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
    <!--<a href="#" class="brand-logo"><i class="fas fa-anchor"></i> </a>-->
    <img src="./lib/img/logovertical.png" width="130" height="120">
    </header>
    <nav class="dashboard-nav-list">
        
        <a href="glorias.php" class="dashboard-nav-item <?php echo $activePage == 'glorias' ? 'active' : ''; ?>">
        <i class="fa-solid fa-medal"></i>
        Glorias
        </a>
        <a href="subsedes.php" class="dashboard-nav-item <?php echo $activePage == 'subsedes' ? 'active' : ''; ?>">
        <i class="fas fa-sitemap"></i>
        Subsedes
        </a>
        <a href="instituciones.php" class="dashboard-nav-item <?php echo $activePage == 'instituciones' ? 'active' : ''; ?>">
        <i class="fas fa-hotel"></i>
        Instituciones 
        </a>
        <a href="proyectos.php" class="dashboard-nav-item <?php echo $activePage == 'proyectos' ? 'active' : ''; ?>"">
        <i class="fas fa-chart-bar"></i>
        Proyectos
        </a>
        <a href="reportes.php" class="dashboard-nav-item <?php echo $activePage == 'reportes' ? 'active' : ''; ?>"">
        <i class="fas fa-chart-pie"></i>
        Reportes
        </a>
        <a href="nominas.php" class="dashboard-nav-item <?php echo $activePage == 'nominas' ? 'active' : ''; ?>""><i class="fas fa-file-invoice "></i>
        Nominas 
        </a>
        <a href="usuarios.php" class="dashboard-nav-item <?php echo $activePage == 'usuarios' ? 'active' : ''; ?>""><i class="fas fa-user-tie"></i>
        Usuarios 
        </a>
    <div class="nav-item-divider"></div>
    </nav>
</div>