<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-muted"> Bienvenue Admin </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">      
                <div class="d-flex flex-column">
                    <div class="row ">                
                        <div class="col-md-12 mb-6 stretch-card transparent" style="margin-bottom: 10%">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-6"> Nombre des utilisateurs </p>
                                    <p class="fs-30 mb-2"> <?php echo $users ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row ">
                        <div class="col-md-12 mb-6 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-6"> Total Chiffre d'Affaire </p>
                                    <p class="fs-30 mb-2"> Ar <?php echo $ca ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
                
            </div>
            
        

        <div class="row col-md-8  transparent" style="size:50%">            
           <?php $array=array();
           $array['objectif']=$objectif;
           $this->load->view('back_office/dashboard/objectif_repartition',$array);
                ?>
        </div>
        
        </div>
        <div class="row col-md-12  transparent" style="size:50%">            
           <?php 
                $array['chiffre_affaire']=$chiffre_affaire['chiffre_affaire'];
                $array['somme_entrer']=$chiffre_affaire['somme_entrer'];
                $array['somme_sortie']=$chiffre_affaire['somme_sortie'];
                $array['montant']=$chiffre_affaire['montant'];
                 $this->load->view('back_office/dashboard/chiffreaffaire_view',$array); ?>
        </div>
        <div class="row col-md-12  transparent" style="size:30%;padding-top:10%" >            
           <?php 
                    $array['classement']=$classement;
                    $this->load->view('back_office/dashboard/regime_classement_view',$array);  ?>
        </div>
        <style>
            .graph_container{
                background:white;
                padding:50px;
                border-radius:10%;
            }
        </style>
    
