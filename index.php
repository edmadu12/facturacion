<!DOCTYPE html>
<html>
    <head>
        <title>Facturación</title>
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/photon.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/facturacion.css">
        <!-- Javascript -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/menu.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="window">
        <!-- .toolbar-header sits at the top of your app -->
        <header class="toolbar toolbar-header">
        <?php
            $usuario      = "root";
            $pass         = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
            $servidor     = "127.0.0.1";
            $basededatos  = "telefonia";
            if ($conexion = mysqli_connect( $servidor, $usuario, $pass )) {
                echo "<h1 class='title'>Conección servidor pruebas</h1>";
            } else {
                echo "<h1 class='title'>Conección fallida</h1>";
            }
            if ($db = mysqli_select_db( $conexion, $basededatos )) {
                echo "<h1 class='title'>Conección a BD de pruebas</h1>";
            } else {
                echo "<h1 class='title'>Conección a BD fallida</h1>";
            }
        ?>
        </header>
        <!-- Your app's content goes inside .window-content -->
        <div class="window-content">
            <div class="pane-group">
                <div class="pane pane-sm sidebar">
                    <nav class="nav-group">
                        <h5 class="nav-group-title">Facturación</h5>

                        <script>
                            $(document).on('ready',function(){

                              $('#btn-obtener').click(function(){
                                var url = "obtener_datos.php";
                                var carrier= $('#carrier').val();
                                var f_inicio = $('#fecha_inicio').val();
                                var f_termino = $('#fecha_termino').val();
                                console.log(f_inicio+f_termino);
                                if(f_inicio ==''){
                                   alert('hola mundo');

                                }

                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data:{carrier:carrier, fecha_inicio:f_inicio, fecha_termino:f_termino},
                                    //beforeSend:function (){},
                                    success:function(data){
                                        console.log(data);
                                        $('#resp').html(data);
                                    }
                                });
                                 });
                              });

                        </script>



                            <div class="form-group">
                                <div class="form-check">

                                    <label class="nav-group-title" for="carrier">Prefijo</label>
                                    <select class="form-control form-control-sm" id="carrier" name="carrier">
                                        <option>Directo</option>
                                        <option>Ipcom</option>
                                        <option>Marcatel</option>
                                        <option>MCM</option>
                                    </select>

                                </div>

                                <div class="form-check">

                                    <label for="fecha_inicio" class="nav-group-title">Fechas Inicio</label>
                                    <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control form-control-sm">

                                    <label class="nav-group-title" for="fecha_termino">Fechas Termino</label>
                                    <input class="form-control form-control-sm" id="fecha_termino" name="fecha_termino" type="date">

                                </div>
                                <br>
                                <div >
                                    <input class="btn btn-secondary btn-lg btn-block" id='btn-obtener' name="btn-obtener" type="submit" value="Obtener" >
                                </div>
                            </div>


                    </nav>
              </div>
              <div class="pane">



                    <div id='resp'></div>


              </div>
              <div>
              </div>
            </div>
          </div>
    </div>
  </body>
</html>
