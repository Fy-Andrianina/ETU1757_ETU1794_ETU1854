<?php if($regime==null){ ?>
   <div class="div"> <p>Vous etes deja dans votre masse corporelle idéale de IMC <?php echo $IMC ?> ,de difference de poids <?php echo $poids_diff ?> kg et de poids a atteindre <?php echo $poids ?>  kg</p></div>
   <style> p{
        color:black;
    }
   
    </style>
<?php } else{ ?>
        <div class="container">
            <div class="row">
            <div class="box">
                <h1> <?php echo $regime['nom_regime'] ?> </h1>
                <h2> Prix : <?php echo $regime['prix_regime'] ?> Ar Totalite </h2>
                <h4> Intervalle : <?php echo $regime['min_poids'] ?> à <?php echo $regime['max_poids'] ?> kg</h4>
                <p> Durée : <?php echo $regime['durree_regime'] ?> semaines</p>
                <p>
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdropChoose<?php echo $regime['id_regime'] ?>">
                        <button class="btn btn-success">
                            Commander
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                    <button class="btn btn-info">
                        <a href="<?php echo base_url() ?>Pdf_ctrl/exporting_pdf/<?php echo $regime['id_regime'] ?>" style="color:white;font-size:20px">
                            Voir pro-format
                        </a>
                    </button>
                </p>
            </div> 

            <div class="modal fade" id="staticBackdropChoose<?php echo $regime['id_regime'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center" id="staticBackdropLabel">
                  Choisir parmi les sports pour completer :
              </h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
            </div>
              <div class="modal-body d-flex flex-row justify-content-center">
                <form action = "<?php echo base_url() ?>Regime_con/choose_regime_sport" method="POST">
                  <input type="hidden" name="regime_id" value="<?php echo $regime['id_regime'] ?>">    
                  <!-- Liste des objectifs  -->
                  <label for="">  </label>
                  <div class="form-group">
                      <select name="sport_id" class="form-control" id="">
                        <?php if($sports){
                            foreach($sports as $sport){ ?>
                                <option value="<?php echo $sport['id_sport'] ?>"><?php echo $sport['nom_sport'] ?></option>
                        <?php } }
                        ?>
                      </select>
                  </div>
                  <br>    
                <center><input type="submit" value="Choisir" class="btn btn-info"></center>                  
                </form>
              </div>
            <div class="modal-footer justify-content-center">

            </div>
          </div>
        </div>
      </div>
            </div>
        </div>
    
    
    <?php } ?>