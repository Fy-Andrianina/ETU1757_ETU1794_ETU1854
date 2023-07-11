<script src="<?php echo site_url('assets/js/bundle_js/bootstrap.bundle.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/css/profile/profile.css')?>" >

<div class="container">
    <div class="row">
      <div class="col-4 left-pic" >

      </div>
      <div class=" col-8 center">
        <div class="container_profile">
          <div class="left">
            <div class="photo">
              <div class="circle">
              </div>   
              <div class="circle2"><center><p style="font-size:60px"> <?php echo substr($user['nom'], 0, 1); ?> </p> </center>
              </div> 
            </div>     
            <div class="title__contain">
              <div class="username">
                <?php echo $user['nom'] . ' ' . $user['prenom']?> 
              </div>
            </div>
            <a data-bs-toggle="modal" data-bs-target="#staticBackdropModify">
              <button class="follow my_button" id="btn-open-modal" >
                Mon evolution 
              </button>
            </a>
          </div>
          <?php if ($informations){ ?>
            <div class="right">
              <div class="rightbox">
                <span class="large"> <?php echo $informations['poids'] ?> </span>
                <span class="small">Kilo</span>
              </div>
              <div class="rightbox">
                <span class="large"><?php echo $informations['taille'] ?></span>
                <span class="small">metres</span>
              </div>
              <div class="rightbox">
                <span class="large"> Objectif : </span>
                <span class="small"><?php echo $informations['nom_objectif'] ?></span>
              </div>
            </div>
          <?php } ?>
          
        </div>
      </div>
      <div class="modal fade" id="staticBackdropModify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center" id="staticBackdropLabel">
                  Parler nous de votre evolution :
              </h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
            </div>
              <div class="modal-body d-flex flex-row justify-content-center">
                <form action = "<?php echo base_url() ?>Profil_con/suivi_utilisateur" method="POST">
                  <input type="hidden" name="id" id="id" value="">    

                  <!-- Date de l'evolution  -->
                  <label for="">Date</label>
                  <div class="form-group">
                      <input type="date" name="date_suivi" class="form-control" value="">
                  </div>

                  <!-- Taille  -->
                  <label for="inputEmail3" class="col-sm-9 control-label">Taille</label>
                  <div class="form-group">
                      <input type="number" name="taille" class="form-control" value="">
                  </div>
                
                  <!-- Poids  -->
                  <label for="">Poids</label>
                  <div class="form-group">
                      <input type="number" name="poids" class="form-control" value="">
                  </div>

                  <!-- Liste des objectifs  -->
                  <label for=""> Objectifs que nous avons </label>
                  <div class="form-group">
                      <select name="objectif_id" class="form-control" id="">
                        <?php if($informations){ ?>
                           <option value="<?php echo $informations['id_objectif'] ?>"><?php echo $informations['nom_objectif'] ?></option> 
                       <?php } 
                        foreach($objectifs as $objectif){ ?>
                            <option value="<?php echo $objectif['id_objectif'] ?>"><?php echo $objectif['nom_objectif'] ?></option>
                       <?php }
                       ?>
                      </select>
                  </div>

                  <br>    
                <center><input type="submit" value="Mettre a jour" class="btn btn-info"></center>                  
                </form>
              </div>
            <div class="modal-footer justify-content-center">

            </div>
          </div>
        </div>
      </div>




<!-- 
  <div class="modal" id="modal" style="width:400px; margin:20px"  >
        <div class="modal-content">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3>Modification</h3>
            <form action="" method="post" class="form-horizontal">
                <input type="hidden" name="id" id="id" value="">
                
                    <label for="inputEmail3" class="col-sm-9 control-label">Taille</label>
                    <div class="form-group">
                        <input type="number" name="taille" class="form-control" value="">
                    </div>
                   
                    <label for="">Poids</label>
                    <div class="form-group">
                        <input type="number" name="poids" class="form-control" value="">
                    </div>

                    <label for="">Date</label>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control" value="">
                    </div>

                    <br>    
                  <center><input type="submit" value="Modifier" class="btn btn-info"></center>  
                
            </form>
        </div>
    </div> -->

</div>
</div>


<div class="row">
    <div class="row" style="width:1000px;margin-left: 20px;">
      <center>  <h1 >Regime en cours</h1></center>
    </div>
    <div class="row" style="margin-left: 20px;">
        <div class="col-md-6">
            <table class="table">
                
                <tr>
                    <td><b>Regime</b></td>
                    <td class="col"><?php echo $current_information['nom_regime'] ?></td>
                </tr>
                <tr>
                    <td><b>Prix</b></td>
                    <td class="col"><?php echo  $current_information['prix_regime']?></td>
                </tr>
                <tr>
                    <td><b>Duree Intervalle</b></td>
                    <td class="col"> <?php echo $current_information['durree_intervalle'] ?></td>
                </tr>
                
            </table>
        </div>
   

    <div class="col-md-6">
        <table class="table">
         
            <tr>
                <td><b>Sport</b></td>
                <td class="col"><?php echo $current_information['nom_sport']; ?></td>
            </tr>
            <tr>
                <td><b>Date</b></td>
                <td class="col"><?php echo $current_information['date_prestation']; ?></td>
            </tr>
            
            
        </table>
    </div>

</div>


</div>
</div>


