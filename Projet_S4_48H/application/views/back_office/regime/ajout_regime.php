 <!-- partial -->
 <div class="main-panel">        
    <div class="content-wrapper">
        <h3 class="text-muted" style="margin-left:5%;margin-bottom: 3%"> Nouveau regime </h3>
        <div class="row align-items-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>admin/Regime_ctrl/adding_regime" method = "POST" class="forms-sample" enctype="multipart/form-data">
                            <!-- Nom -->
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name_regime">
                                </div>
                            </div>

                            <!-- Objectif -->
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Objectif: </label>
                                <div class="col-sm-9">
                                    <select name="objectif_id" class="form-control" id="">
                                        <?php if($objectifs){
                                            foreach($objectifs as $objectif){ ?>
                                                <option value="<?php echo $objectif['id_objectif']; ?>"> <?php echo $objectif['nom_objectif']; ?> </option>
                                            <?php } } ?>
                                    </select>
                                </div>
                            </div>

                             <!-- Intervalle DE POIDS-->
                             <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Intervalle de poids (kg): </label>
                                <div class="col-sm-9">
                                    <select name="intervalle_id" class="form-control" id="">
                                        <?php if($intervalles){
                                            foreach($intervalles as $intervalle){ ?>
                                                <option value="<?php echo $intervalle['id_intervalle']; ?>"> <?php echo $intervalle['min_poids']; ?> a  <?php echo $intervalle['max_poids']; ?> </option>
                                            <?php } } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- DUREE -->
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Dyration (semaine) : </label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control" name="regime_duration" id="exampleInputConfirmPassword2">
                                </div>
                            </div>

                              <!-- PRIX -->
                              <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Prix : </label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control" name="regime_price" id="exampleInputConfirmPassword2">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="">
                    <div class="card-people">
                        <img src="<?php echo base_url() ?>/assets/image/admin/reg.jpg" alt="people">
                    </div>
                </div>
            </div>
        </div>
