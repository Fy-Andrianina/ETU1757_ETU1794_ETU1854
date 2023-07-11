<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="text-muted" style="margin-left:5%"> Nos sports </h3>
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
                                    <th> Sport </th>
                                    <th> Objectif </th>
                                    <th> Poids </th>
                                    <th> Duree </th>
                                    <th style="width: 1%" ></th>
                                    <th style="width: 1%" ></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php if($sports){
                                    foreach($sports as $sport){ ?>
                                        <tr>
                                            <td> <?php echo $sport['nom_sport']; ?> </td>
                                            <td> <?php echo $sport['nom_objectif']; ?> ans </td>
                                            <td> <?php echo $sport['min_poids']; ?> a <?php echo $sport['max_poids']; ?> kg </td>
                                            <td> <?php echo $sport['durree_intervalle']; ?> semaines </td>
                                   
                                            <td style="width: 1%"> 
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $sport['id_sport']  ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="mdi mdi-lead-pencil" style="color: blue"></i> 
                                                    </button> 
                                                </a>
                                            </td>
                                            <td style="width: 1%"> 
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdropDelete<?php echo $sport['id_sport']  ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="mdi mdi-archive" style="color: #C94536"></i> 
                                                    </button> 
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- DELETE sport  -->
                                        <div class="modal fade" id="staticBackdropDelete<?php echo $sport['id_sport']  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="staticBackdropLabel">
                                                            Voulez vous vraiment supprimer <span class="font-weight-bold"> <?php echo $sport['nom_sport']; ?> </span> ?
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                                                    </div>
                                                        <div class="modal-body d-flex flex-row justify-content-center">
                                                            <form action = "<?php echo base_url() ?>admin/Sport_ctrl/deleting_sport" method="POST">
                                                                <!-- idsport -->
                                                                <input type="hidden" name="sport_id" value="<?php echo $sport['id_sport']; ?>">
                                                                <input type="submit" value = "Oui" class="btn btn-danger">                
                                                            </form>
                                                            <button type="button" class="btn btn-outline-primary" style="margin-left: 5%" data-bs-dismiss="modal" aria-label="Close"> Non </button>
                                                        </div>
                                                    <div class="modal-footer justify-content-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--  MODIFIER sport // MODAL -->
                                        <div class="modal fade" id="staticBackdropEdit<?php echo $sport['id_sport']  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="staticBackdropLabel">
                                                            Modifier ce sport : <span class="font-weight-bold"> <?php echo $sport['nom_sport']; ?> </span>
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                                                    </div>
                                                        <div class="modal-body">
                                                            <form action = "<?php echo base_url() ?>admin/Sport_ctrl/modifing_sport" method="POST">
                                                                <!-- idsport -->
                                                                <input type="hidden" name="sport_id" value="<?php echo $sport['id_sport']; ?>">
                                                                <!-- NOM sport -->
                                                                <div class="form-group border border-2 d-flex flex-row align-items-center" style="padding: 1% 1% 1% 1%">
                                                                    <label for="inputText1" style="width: 50%" class="col-sm-4 col-form-label">Nom :  </label>
                                                                    <input id="intitule_compte"  type="text" name="name_sport" value="<?php echo $sport['nom_sport'] ?>" class="form-control col-sm-8" required>
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
                                                                        <option value="<?php echo $sport['id_intervalle']; ?>"> <?php echo $sport['min_poids']; ?> a <?php echo $sport['max_poids']; ?></option>
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
                                                                    <input id="intitule_compte" type="number" name="sport_duration" value="<?php echo $sport['durree_intervalle']; ?>" class="form-control col-sm-8" required>
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