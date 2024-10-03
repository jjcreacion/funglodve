<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../lib/css/Styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  </head>
  <body>
  <div class='dashboard'>
        <div class="dashboard-nav rounded">
            <header>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <!--<a href="#" class="brand-logo"><i class="fas fa-anchor"></i> </a>-->
            <img src="../lib/img/logovertical.png" width="130" height="120">
           </header>
            <nav class="dashboard-nav-list">
              
              <a href="#" class="dashboard-nav-item">
              <i class="fa-solid fa-medal"></i>
               Glorias
              </a>
              <a href="#" class="dashboard-nav-item active">
              <i class="fas fa-sitemap"></i>
                Subsedes
              </a>
              <a href="#" class="dashboard-nav-item">
               <i class="fas fa-hotel"></i>
                Instituciones 
               </a>
               <a href="#" class="dashboard-nav-item">
               <i class="fas fa-chart-bar"></i>
                Proyectos
              </a>
              <a href="#" class="dashboard-nav-item">
              <i class="fas fa-chart-pie"></i>
                Reportes
              </a>
              <a href="#" class="dashboard-nav-item"><i class="fas fa-file-invoice"></i>
                Nominas 
               </a>
               <a href="#" class="dashboard-nav-item"><i class="fas fa-user-tie"></i>
                Usuarios 
               </a>
            <div class="nav-item-divider"></div>
            </nav>
        </div>
        <div class='dashboard-app'>
            <!-- <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header> -->
            <header class='dashboard-toolbar'>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <span><h2 class="tituloDashboar">Fundación Glorias Deportivas de Venezuela</h2></span>
                <a href="#!" class="menu-toggle"><i class="fas fa-sign-out-alt"></i></a>
            </header>

            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h2><i class="fas fa-sitemap"></i> Gestión de Subsedes </h2>
                                <button type="button" slot="end" class="btn btn-success btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></span><i class="fa-solid fa-plus"></i> Crear Nueva</button>
                        </div>
                        <div class='card-body'>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Gestión de Subsedes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your</small>-->
                                </div>
                                 </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Encargado</label>
                                    <input type="text" class="form-control" id="encargado" aria-describedby="emailHelp">
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share.</small>-->
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp">
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share.</small>-->
                                </div>
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" aria-describedby="emailHelp">
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your</small>-->
                                </div>
                                 </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share.</small>-->
                                </div>
                                </div>
                            </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Encargado</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Encargado</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>

                        <!--<div class="container">
                            <div class="row">
                                <h2>CSS3 3D Button Effects</h2> Text

                               <button type="button" class="btn3d btn btn-default btn-lg"><span class="glyphicon glyphicon-download-alt"></span> Default</button>

                                <button type="button" class="btn3d btn btn-white btn-lg"><span class="glyphicon glyphicon-tag"></span> White</button>

                                <button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button>

                                <button type="button" class="btn btn-success btn-lg btn3d"><span class="glyphicon glyphicon-ok"></span> Success</button>

                                <button type="button" class="btn btn-info btn-lg btn3d"><span class="glyphicon glyphicon-question-sign"></span> Info</button>

                                <button type="button" class="btn btn-warning btn-lg btn3d"><span class="glyphicon glyphicon-warning-sign"></span> Warning</button>

                                <button type="button" class="btn btn-danger btn-lg btn3d"><span class="glyphicon glyphicon-remove"></span> Danger</button>

                                <button type="button" class="btn btn-magick btn-lg btn3d"><span class="glyphicon glyphicon-gift"></span> Magick</button>

                                <p>
                                    Text
                                    <button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                                    <button type="button" class="btn btn-danger btn-lg btn3d"><span class="glyphicon glyphicon-off"></span></button>
                                </p>
                                <p>
                                    Text
                                    <button type="button" class="btn btn-primary btn-lg btn3d">Large button</button>
                                    <button type="button" class="btn btn-default btn-lg btn3d">Large button</button>
                                </p>
                                <p>
                                    Text
                                    <button type="button" class="btn btn-primary btn3d">Default button</button>
                                    <button type="button" class="btn btn-default btn3d">Default button</button>
                                </p>
                                <p>
                                    Text
                                    <button type="button" class="btn btn-primary btn-sm btn3d">Small button</button>
                                    <button type="button" class="btn btn-default btn-sm btn3d">Small button</button>
                                </p>
                                <p>
                                    Text
                                    <button type="button" class="btn btn-primary btn-xs btn3d">Extra small button</button>
                                    <button type="button" class="btn btn-default btn-xs btn3d">Extra small button</button>
                                </p>
                            </div>
                        </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../lib/js/principal.js"></script>
    <script src="../lib/js/Subsedes.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </body>
</html>


