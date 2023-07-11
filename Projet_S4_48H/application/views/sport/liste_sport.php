<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="text-muted" style="margin-left:5%"> Nos regimes </h3>
        <?php if(isset($fail) == true){ ?>
            <div class="row col-lg-6 border border-2" style="margin-left:2%; background-color: #ea4263; padding: 0.5% 0.5% 0.5% 0.5%; color: white">  
                <i class="mdi mdi-alert-circle-outline" style="margin-right:1%"></i> <?php echo $fail; ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card" style="padding: 3% 3% 3% 3%">
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th> Regime </th>
                                    <th> Objectif </th>
                                    <th> Poids </th>
                                    <th> Duree </th>
                                    <th> Prix </th>
                                    <th style="width: 1%" ></th>
                                    <th style="width: 1%" ></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php if($regimes){
                                    foreach($regimes as $regime){ ?>
                                        <tr>
                                            <td> <?php echo $regime['nom_regime']; ?> </td>
                                            <td> <?php echo $regime['nom_objectif']; ?> ans </td>
                                            <td> <?php echo $regime['min_poids']; ?> a <?php echo $regime['max_poids']; ?> kg </td>
                                            <td> <?php echo $regime['durree_regime']; ?> semaines </td>
                                            <td> <?php echo number_format($regime['prix_regime'], 2, ',', ' ') ?> Ar </td>
                                   
                                            <td style="width: 1%"> 
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $regime['id_regime']  ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="mdi mdi-lead-pencil" style="color: blue"></i> 
                                                    </button> 
                                                </a>
                                            </td>
                                            <td style="width: 1%"> 
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdropDelete<?php echo $regime['id_regime']  ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="mdi mdi-archive" style="color: #C94536"></i> 
                                                    </button> 
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- DELETE regime  -->
                                        <div class="modal fade" id="staticBackdropDelete<?php echo $regime['id_regime']  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="staticBackdropLabel">
                                                            Voulez vous vraiment supprimer <span class="font-weight-bold"> <?php echo $regime['nom_regime']; ?> </span> ?
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                                                    </div>
                                                        <div class="modal-body d-flex flex-row justify-content-center">
                                                            <form action = "<?php echo base_url() ?>admin/regime_ctrl/deleting_regime" method="POST">
                                                                <!-- idregime -->
                                                                <input type="hidden" name="regime_id" value="<?php echo $regime['id_regime']; ?>">
                                                                <input type="submit" value = "Oui" class="btn btn-danger">                
                                                            </form>
                                                            <button type="button" class="btn btn-outline-primary" style="margin-left: 5%" data-bs-dismiss="modal" aria-label="Close"> Non </button>
                                                        </div>
                                                    <div class="modal-footer justify-content-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--  MODIFIER regime // MODAL -->
                                        <div class="modal fade" id="staticBackdropEdit<?php echo $regime['id_regime']  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="staticBackdropLabel">
                                                            Modifier ce regime : <span class="font-weight-bold"> <?php echo $regime['id_regime']; ?> </span>
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                                                    </div>
                                                        <div class="modal-body">
                                                            <form action = "<?php echo base_url() ?>admin/regime_ctrl/modifing_regime" method="POST">
                                                                <!-- idregime -->
                                                                <input type="hidden" name="regime_id" value="<?php echo $regime['id_regime']; ?>">
                                                                <!-- NOM regime -->
                                                                <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="inputText1" style="width: 50%" class="col-sm-4 col-form-label">Nom :  </label>
                                                                    <input id="intitule_compte"  type="text" name="name_regime" value="<?php echo $regime['nom_regime'] ?>" class="form-control col-sm-8" required>
                                                                </div>

                                                                <!-- Objectif -->
                                                               <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label"> Objectif: </label>
                                                                    <div class="col-sm-8">
                                                                        <select name="objectif_id" class="form-control" id="">
                                                                            <?php if($objectifs){
                                                                                foreach($objectifs as $objectif){ ?>
                                                                                    <option value="<?php echo $objectif['id_objectif']; ?>"> <?php echo $objectif['nom_objectif']; ?> </option>
                                                                                <?php } } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!-- Intervalle DE POIDS-->
                                                               <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label"> Intervalle poids: </label>
                                                                    <div class="col-sm-8">
                                                                    <select name="intervalle_id" class="form-control" id="">
                                                                        <option value="<?php echo $regime['id_intervalle']; ?>"> <?php echo $regime['min_poids']; ?> a <?php echo $regime['max_poids']; ?></option>
                                                                            <?php if($intervalles){
                                                                                foreach($intervalles as $intervalle){ ?>
                                                                                    <option value="<?php echo $intervalle['id_intervalle']; ?>"> <?php echo $intervalle['min_poids']; ?> a  <?php echo $intervalle['max_poids']; ?> </option>
                                                                                <?php } } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!-- DUREE -->
                                                                <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="inputText1" style="width: 50%" class="col-sm-4 col-form-label"> Duree (semaines):  </label>
                                                                    <input id="intitule_compte" type="number" name="regime_duration" value="<?php echo $regime['durree_regime']; ?>" class="form-control col-sm-8" required>
                                                                </div>

                                                                <!-- Prix -->
                                                                <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="inputText1" style="width: 50%" class="col-sm-4 col-form-label"> Prix:  </label>
                                                                    <input id="intitule_compte" type="number" name="regime_price" value="<?php echo $regime['prix_regime']; ?>" class="form-control col-sm-8" required>
                                                                </div>

                                                                <input type="submit" value = "Modifier" class="btn btn-primary">                
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="modal-footer justify-content-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>