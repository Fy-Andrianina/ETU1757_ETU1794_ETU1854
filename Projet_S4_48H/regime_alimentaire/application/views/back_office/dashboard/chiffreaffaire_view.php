<script>
    var lab=['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
    var valeurs=[0,0,0,0,0,0,0,0,0,0,0,0];
    
</script>
<div class="container graph_container" style="margin-top:5%">
    <h1>Chiffre d'affaire par mois selon une année</h1>
    <form action="<?php echo site_url('admin/admin_ctrl') ;?>" method="post">
    <label for="">Annee</label>
    <select name="annee" id="" class="form-control">
        <?php for ($i=2019; $i <=2024 ; $i++) {  ?>
        <option><?php echo $i ?></option> <?php } ?>
    </select>
    <br> <input type="submit" value="Rechercher" class="btn btn-primary">
    </form>
    <div class="row" style="padding-top:5%">
        <div class="col-md-6">
        <div class="grapheVente"><canvas id="myChart2"></canvas></div>
        </div>
    
        <div class="col-md-6">
    <table class="table table-hover" border="1">
        <thead>
        <th>Mois</th>
        <th>Montant entrée</th>
        <th>Montant sortie</th>
        <th>Montant</th>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($chiffre_affaire);$i++){ ?>
            <tr>
            <td class="nb"><?php echo $chiffre_affaire[$i]['month']; ?><script></script></td>
            <td class="nb"><?php echo  number_format($chiffre_affaire[$i]['montant_entrer'], 0, ',', ' '); ?></td>
            <td class="nb"><?php echo  number_format($chiffre_affaire[$i]['montant_sortie'], 0, ',', ' '); ?></td>
            <td class="nb"><?php echo  number_format($chiffre_affaire[$i]['difference'], 0, ',', ' '); ?></td>
            <script>valeurs[<?php echo $chiffre_affaire[$i]['month']-1 ?>]=<?php echo $chiffre_affaire[$i]['difference']; ?>;</script>
            <td>Ariary</td>
            </tr>
            <?php } ?>
            <tr>
                <td><b>Total</b></td>
                <td class="nb"><?php echo $somme_entrer ?></td>
                <td class="nb"><?php echo $somme_sortie ?></td>
                <td class="nb"><?php echo $montant ?></td>
                <td>Ariary</td>
            </tr>
        </tbody>
        
    </table>
            </div>
    <style>
        .nb{
            text-align: end;
        }
    </style>
    <script src="<?php echo site_url('assets/js/chart.js') ?>"></script>
<script>
  var ctx2 = document.getElementById('myChart2').getContext('2d');
        
        var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: lab,
            datasets: [{
            label: 'Chiffre d\'affaire par mois',
            data:valeurs,
            backgroundColor: 'rgba(0, 128, 255, 0.2)', // couleur de fond
            borderColor: 'rgba(0, 128, 255, 1)', // couleur de la bordure
            borderWidth: 1 // largeur de la bordure
            }]
        }
        });
        </script>
    </div>
</div>

