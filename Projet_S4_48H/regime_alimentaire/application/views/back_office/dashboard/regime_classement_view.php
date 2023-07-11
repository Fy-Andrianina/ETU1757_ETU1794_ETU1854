
    <script>
        var labels=[];
        var val=[];
    </script>
   
<div class="container graph_container">
    <h1> Classement des régimes</h1>
    <div class="row" style="padding-top:5%">
        <div class="col-6">
        <div class="grapheVente"><canvas id="myChart"></canvas></div>

       
        </div>
        <div class="col-6">
            <table class="table table-hover" border="1">
                <thead>
                <th>Nom Regime</th>
                <th>Quantite</th>
                <th>Prix Unitaire</th>
                <th>Montant</th>
                </thead>
                <tbody>
                    <?php for($i=0;$i<count($classement);$i++){ ?>
                    <tr>
                    <td><?php echo $classement[$i]['nom_regime']; ?>
                    <script>labels.push('<?php echo $classement[$i]['nom_regime']; ?>');</script></td>
                    <td class="nb"><?php echo $classement[$i]['quantite']; ?></td>
                    <td class="nb"><?php echo number_format($classement[$i]['Prix_unitaire'], 0, ',', ' '); ?></td>
                    <td class="nb"><?php echo  number_format($classement[$i]['Total_price'], 0, ',', ' '); ?></td>
                    <script>val.push(<?php echo $classement[$i]['Total_price']; ?>);</script></td>
                    <td>Ariary</td>
                    </tr>
                    <?php } ?>
                </tbody>
            
            </table>
    </div>
    </div>

    <style>
        .nb{
            text-align: end;
        }
    </style>
</div>
<script src="<?php echo site_url('assets/js/chart.js') ?>"></script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
        
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
            label: '<?php echo 'Classement des regimes' ?>',
            data:val,
            backgroundColor: 'rgba(0, 128, 255, 0.2)', // couleur de fond
            borderColor: 'rgba(0, 128, 255, 1)', // couleur de la bordure
            borderWidth: 1 // largeur de la bordure
            }]
        }
        });
</script>
