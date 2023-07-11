<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="text-muted" style="margin-left:5%"> Transactions des ventes de code </h3>
        <?php if(isset($fail) == true){ ?>
            <div class="row col-lg-6 border border-2" style="margin-left:2%; background-color: #ea4263; padding: 0.5% 0.5% 0.5% 0.5%; color: white">  
                <i class="mdi mdi-alert-circle-outline" style="margin-right:1%"></i> <?php echo $fail; ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card" style="padding: 3% 3% 3% 3%">
                <div class="card">
                    <div class="card-body"> 
                        <h3 class="text-muted text-center" style="margin-bottom:3%; margin-top:3%;"> Demande d'achats </h3>
                        <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th> Utilisateur </th>
                                    <th> Code </th>
                                    <th> Montant </th>
                                    <th style="width: 1%" ></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php if($demandes){
                                    foreach($demandes as $demande){ ?>
                                        <tr>
                                            <td> <?php echo $demande['nom']; ?> </td>
                                            <td> <?php echo $demande['code_details']; ?>  </td>
                                            <td> <?php echo number_format($demande['montant_code'], 2, ',', ' ') ?> Ar </td>
                                   
                                            <td style="width: 1%"> 
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $demande['id_achat']  ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="mdi mdi-lead-pencil" style="color: blue"></i> 
                                                    </button> 
                                                </a>
                                            </td>

                                        </tr>
                                        <!-- DELETE regime  -->
                                        <div class="modal fade" id="staticBackdropEdit<?php echo $demande['id_achat']  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="staticBackdropLabel">
                                                            Choisir reponse ?
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                                                    </div>
                                                        <div class="modal-body d-flex flex-row justify-content-center">
                                                            <div style="margin-right:5%">
                                                                <form action = "<?php echo base_url() ?>admin/Code_ctrl/accepting_achat" method="POST" >
                                                                    <!-- idregime -->
                                                                    <input type="hidden" name="code_id" value="<?php echo $demande['id_code']; ?>">
                                                                    <input type="hidden" name="achat_id" value="<?php echo $demande['id_achat']; ?>">
                                                                    <input type="submit" value = "Accepter" class="btn btn-primary">                
                                                                </form>
                                                            </div>
                                                            <div>
                                                                <form action = "<?php echo base_url() ?>admin/Code_ctrl/refusing_achat" method="POST">
                                                                    <!-- idregime -->
                                                                    <input type="hidden" name="achat_id" value="<?php echo $demande['id_achat']; ?>">
                                                                    <input type="submit" value = "Refuser" class="btn btn-danger">                
                                                                </form>
                                                            </div>
                                                        </div>
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

            <div class="col-lg-6 grid-margin stretch-card" style="padding: 3% 3% 3% 3%">
                <div class="card">
                    <div class="card-body"> 
                        <h3 class="text-muted text-center" style="margin-bottom:3%; margin-top:3%;"> Achat acceptes </h3>
                        <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th> Utilisateur </th>
                                    <th> Code </th>
                                    <th> Montant </th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php if($acceptes){
                                    foreach($acceptes as $accepte){ ?>
                                        <tr>
                                            <td> <?php echo $accepte['nom']; ?> </td>
                                            <td> <?php echo $accepte['code_details']; ?>  </td>
                                            <td> <?php echo number_format($accepte['montant_code'], 2, ',', ' ') ?> Ar </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: -5%">
            <div class="col-lg-6 grid-margin stretch-card" style="padding: 3% 3% 3% 3%">
                <div class="card">
                    <div class="card-body"> 
                        <h3 class="text-muted text-center" style="margin-bottom:3%; margin-top:3%;"> Achat refuses </h3>
                        <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th> Utilisateur </th>
                                    <th> Code </th>
                                    <th> Montant </th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php if($refuses){
                                    foreach($refuses as $refus){ ?>
                                        <tr>
                                            <td> <?php echo $refus['nom']; ?> </td>
                                            <td> <?php echo $refus['code_details']; ?>  </td>
                                            <td> <?php echo number_format($refus['montant_code'], 2, ',', ' ') ?> Ar </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>