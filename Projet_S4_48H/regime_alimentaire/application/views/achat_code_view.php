<link rel="stylesheet" href="<?php echo site_url('assets/css/code/nucleo-svg.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/code/nucleo-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/code/soft-ui-dashboard.css?v=1.0.3'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/code/code.css'); ?>">



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-4 left-pic"  > </div>
        <div class="col-8">
          <div class="card mb-4">
          <h1>Porte monnaie: <?php echo $montant ?> Ariary</h1>
            <div class="card-header pb-0 text-center">
              <h6 style="margin-bottom: 5%">Les Codes</h6>
              <?php 
                $fail = $this->input->get('fail');
                if($fail){ ?>
                  <span style="color: red"> <?php echo $fail ?> </span>
              <?php  } ?>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-stripped align-items-center mb-0">
                  <thead>
                    <tr>
                        <th></th>
                      <th class="text-uppercase text-secondary  font-weight-bolder " >Code  </th>
                      <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Valeur</th>
                      <th class="text-secondary opacity-7">Acheter</th>
                    </tr>
                  </thead>
                  <?php foreach($codes as $code){ ?>
                  <tbody>
                    <tr>
                      <td></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $code['code_details'] ?></h6>
                          </div>
                        </div>
                      </td>
                      
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <?php echo $code['montant_code'] ?> </span>
                      </td>
                      
                      <td class="align-middle">
                      <span class="badge badge-sm bg-gradient-primary">
                        <a href="<?php echo base_url() ?>Achat_code_con/acheter_code/<?php echo $code['id_code'] ?>">
                            Acheter
                        </a>
                        </span>
                      </td>
                    </tr>   
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
