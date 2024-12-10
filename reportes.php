<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Nóminas</title>
    <link rel="stylesheet" href="./lib/css/Styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
  <div class='dashboard'>
    <?php
    $activePage = 'reportes';
    require_once('./views/components/navbar.php');
    ?>
    <div class='dashboard-app'>
       <?php
        require_once('./views/components/header.php');    
        ?>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-body'>

                    <canvas id="myChart" width="400" height="100"></canvas> 

                    </div>
                </div>

                <div class='card'>
                    <div class='card-body'>

                    <div class="row">
                        <div class="col">
                            col 1
                        </div>
                        <div class="col">
                        <button type="button" class="btn btn-success position-relative m-4">
                        Total General
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            203
                        </span>
                        </button>

                        <button type="button" class="btn btn-primary position-relative m-4">
                        Becados
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            303
                        </span>
                        </button>

                        <button type="button" class="btn btn-danger position-relative m-4">
                        No Becados
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            303
                        </span>
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
            
            </div>

            
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./lib/js/Reportes.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

</body>
</html>
