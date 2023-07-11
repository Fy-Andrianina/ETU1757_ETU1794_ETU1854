<div class="container graph_container" style="margin-top:5%">
    <h1>Les Objectifs</h1>
<div class="grapheVente"><canvas id="doughnutChart"></canvas></div>
<script>
    var obj=[]
    var values=[]
</script>
<?php for ($i=0; $i <count($objectif) ; $i++) {   ?>
    <script>obj.push("<?php echo $objectif[$i]['nom_objectif']; ?>");
            values.push(<?php echo $objectif[$i]['nombre'] ?> ); </script>
<?php } ?>
<script src="<?php echo site_url('assets/js/chart.js'); ?>"></script>
<script>
    // Création du graphique Doughnut
var doughnutChart = new Chart(document.getElementById('doughnutChart'), {
  type: 'doughnut',
  data: {
    labels: obj,
    datasets: [{
      data: values,
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    title: {
      display: true,
      text: 'Choix des utilisateurs'
    }
  }
});

</script>
</div>