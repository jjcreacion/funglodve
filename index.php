<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="lib/css/StylesHome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  </head>
  <body>
  
  <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
                <img src="./lib/img/logovertical.png" alt="Logo" class="logo"> 
                <div class="card login-card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="email">Usuario</label>
                                <input type="text" class="form-control" id="usuario">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <button type="button" class="btn btn-primary btn-block" id="btn-ingresar">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Contenido de la columna derecha -->
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="lib/js/home.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </body>
</html>