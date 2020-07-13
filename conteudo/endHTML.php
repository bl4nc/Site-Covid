    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- DATATABLE -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="js/modal_covid.js"></script>
  </body>
</html>

<?php
//grafico plotado

  include "_scripts/config.php";
  $a=array();
  $b=array();
  $c=array();

  $sql = "SELECT 
          DAY(data_boletim) as d,
          MONTH(data_boletim) as m,
          data_boletim,
          casos_confirmados,
          curados
          FROM base_corona order by data_boletim";
  $query = $mysqli->query($sql);

  $i=0;

  while($dados=$query->fetch_array()){

    $a[$i] = $dados['d']."-".$dados['m'];
    $b[$i] = $dados['casos_confirmados'];
    $c[$i] = $dados['curados'];


  $i++;}

  $a = json_encode($a,true);
  $b = json_encode($b,true);
  $c = json_encode($c,true);


?>

<script type="text/javascript">

$(document).ready(function() {
    $('#modalgrafico').modal('show');
})
</script>

<!--GAFICO -->
<script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: <?php echo $a; ?>,
          datasets: [

            {
                label: 'Contaminados',
                backgroundColor: 'transparent',
                borderColor: '#9b0d02',
                borderWidth:2,
                data: <?php echo $b; ?>
            },
            {

                type:'line',
                label: 'Curados',
                backgroundColor: 'transparent',
                borderColor: '#007c34',
                borderWidth:2,
                data: <?php echo $c; ?>

            }

          ]
      },

      // Configuration options go here
      options: {
        scales:{
            

            xAxes: [{
            display: false, //this will remove all the x-axis grid lines
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
          }],
          yAxes: [{
              gridLines: {
                  color: "rgba(0, 0, 0, 0)",
              }   
          }]

        }
      }
  });
</script>

<script type="text/javascript">
    $(function () {

        $('#example').DataTable( {

          "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Todos"]],

         "language": {
              "sEmptyTable": "Nenhum registro encontrado",
              "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
              "sInfoFiltered": "(Filtrados de _MAX_ registros)",
              "sInfoPostFix": "",
              "sInfoThousands": ".",
              "sLengthMenu": "_MENU_ resultados por página",
              "sLoadingRecords": "Carregando...",
              "sProcessing": "Processando...",
              "sZeroRecords": "Nenhum registro encontrado",
              "sSearch": "Pesquisar",
              "oPaginate": {
                  "sNext": "Próximo",
                  "sPrevious": "Anterior",
                  "sFirst": "Primeiro",
                  "sLast": "Último"
              },
              "oAria": {
                  "sSortAscending": ": Ordenar colunas de forma ascendente",
                  "sSortDescending": ": Ordenar colunas de forma descendente"
              }
      }

      }); 

        
    });
</script>

<?php

if(isset($_POST['submit'])) {//enviar nova senha
include "_scripts/config.php";
  $cp1 = $_POST['cp1'];
  $cp2= $_POST['cp2'];
  
  //VERIFICA SE O E-MAIL EXISTE EM NOSSA BASE DE DADOS.
  $sql = "INSERT INTO mensagem (email,mensagem) VALUES ('$cp1','$cp2')";
  $query = $mysqli->query($sql);

    if ($query) {
    ?>

     <script type="text/javascript">
              swal({
              title: "Mensagem Enviada",
              text: "Obrigado pelo contato!.",
              icon: "success",
            })
            .then((willDelete) => {
              if (willDelete) {
                location.href="index.php";
              } else {
                location.href="index.php";
              }
            });   
            </script>


    <?php }else{ ?>

      <script type="text/javascript">
              swal({
              title: "Ops! Houve um erro.",
              text: "Tente novamente em instantes",
              icon: "error",
            })
            .then((willDelete) => {
              if (willDelete) {
                location.href="index.php";
              } else {
                location.href="index.php";
              }
            });   
        </script>
    
    <?php }//FECHAMENTO DO ELSE DO ENVIO E-MAIL

}// fechamento do submit   ?>




