
function CargarDatosGraficoBar(){
    $.ajax({
        url: "./backend/controlador_grafico.php",
        type: "POST"
    }).done(function(resp){
        var id = [];
        var status = [];
        var data = JSON.parse(resp);
        for(var i=0; i< data.length; i++){
           
            id.push(data [i][1]);
            status.push(data [i][2]);
            


        }
  
   var ctx = document.getElementById('myChart').getContext('2d');
   var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
       labels: status,
       datasets: [{
           label: 'Valores de Nuestro Range',
           data: id,
           backgroundColor: [
               'rgba(255, 99, 132, 0.2)',
               'rgba(54, 162, 235, 0.2)',
               'rgba(255, 206, 86, 0.2)',
               'rgba(75, 192, 192, 0.2)',
               'rgba(153, 102, 255, 0.2)',
               'rgba(255, 159, 64, 0.2)'
           ],
           borderColor: [
               'rgba(255, 99, 132, 1)',
               'rgba(54, 162, 235, 1)',
               'rgba(255, 206, 86, 1)',
               'rgba(75, 192, 192, 1)',
               'rgba(153, 102, 255, 1)',
               'rgba(255, 159, 64, 1)'
           ],
           borderWidth: 3
       }]
   },
   options: {
       scales: {
           yAxes: [{
               ticks: {
                   beginAtZero: true
               }
           }]
       }
   }
});

    })
       }