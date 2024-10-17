<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./lib/css/StylesDash.css">
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
        $activePage = '';
        require_once('./views/components/navbar.php');
        ?>
        <div class='dashboard-app'>
           <?php
            require_once('./views/components/header.php');    
            ?>
            <div class='dashboard-content'>
                <div class='container'>
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                             <div class="card">
                             <img src="./lib/img/logo1.png" alt="Logo" class="logo">
                             </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                              <div class="card-header">
                               <i class="fa-solid fa-cake-candles"></i>
                                  Cumpleaños del día
                              </div>

                              <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>José Perez</td>
                                    <td>Táchira</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Juan Rodríguez</td>
                                    <td>Sucre</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Ana Conde</td>
                                    <td>Nueva Esparta</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">4</th>
                                    <td>Carlos Esparragoza</td>
                                    <td>Sucre</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                             <div class="card">
                             <canvas id="myChart"></canvas>
                             </div>
                        </div>
                      </div>
                </div> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./lib/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </body>
</html>


