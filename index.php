<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS del grafico-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <title>GRAFICOS</title>
    <style>
        body{
            background-color: #e4ebf6;
        }
    </style>
  </head> 
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col p-3 mb-2 bg-primary text-white text-center alig-items-center justify-content-center rounded-2">
                <section  class="align-middle top-50">
                    <h1>Examen Unidad 2</h1>
                    <p id="compatible"></p>
                    <div class="container">
                        <h1 class="texts">Potencia: 0</h1>
                        <h3 id="mensaje"></h3>
                    </div>
                    <input type="range" name="" id="potencia" min="0" max="100" value="0">
                </section>
            </div>
        </div>
            <div class="col">
            <?php
                    // conexion
                    $link = new PDO('mysql:
                    host=localhost;
                    dbname=id18482623_iot_curso_itp', 
                    'root', '');
                    ?>   
                    <table id="example" class="  p-3 mb-2 bg-ligh text-black display table table-sm" style="width:100%">
                            <thead>
                            <tr class="table-active text-white">
                                <th>ID</th>
                                <th>STATUS</th>
                                <th>REG_DATE</th>
                            </tr>
                            </thead>
                            <?php foreach ($link->query('SELECT * from statusht') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
                    <tr>
                        <td><?php echo $row['id'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['reg_date'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Inicia range -->
    
    
<!-- Inicia tabla -->

    

<!-- Inicia grafica -->
 
    <div class="col-lg-12 " style="padding-top: 20px;">
        <div class="card text-center">
            <div class="card-header"> GRAFICO DE NUESTROS RESULTADOS </div>
                <div class="card-body">
                <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary" onclick= "CargarDatosGraficoBar()">  Mostrar Grafica</button>
                </div>  
                    <canvas id="myChart" width="420" height="300"></canvas>
                
            </div>
            </div>
        </div>
    </div>
<!-- Termina grafica -->



    </body>
</html>
    <!--Los scripts van antes del body,¿no?-->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

   
    <script src="js/graf.js"> </script>
    <script src="js/main.js"></script>
    
    <script src =https://code.jquery.com/jquery-3.5.1.js></script>
 <script src=https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js></script>
    <script>$(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
