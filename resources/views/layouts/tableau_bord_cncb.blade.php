
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <h1 class="m-0">TABLEAU DE BORD</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <!--<ol class="breadcrumb float-sm-right">-->
              <!--<li class="breadcrumb-item"><a href="#">Espce de travail</a></li>-->
              <!--<li class="breadcrumb-item active">Tableau de bord</li>-->
            <!--</ol>-->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



<!--<div class="container-fluid">-->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ process_user_info()['process_toutes']}} </h3>
                <p>Toutes les procédures</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ Route('process', ['details' => 'toute']) }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box  bg-warning">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>{{ cncb_info()['vgm_attente']}} </h3>

                <p>Procédure en attente de VGM</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ Route('vgm', ['details' => 'attente']) }}" class="small-box-footer">En savoir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ cncb_info()['vgm_recues']}}</h3>

                <p>VGM Délivrées</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ Route('vgm', ['details' => 'delivre']) }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
<!----------------Data Table------------------------------------>
      <div class="card">
          
          <div class="row mb-2">
            <div class="col-sm-4"></div>
          
              <div class="card-header">
                <h3 class="card-title">Les 10 dernières procédures d'exportations en attente de VGM</h3>
              </div>
            <div class="col-sm-4"></div>
            </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>Numero demande</th>
                    <th>Créé le</th>
                    <th>Statut</th>
                    <th>Provenance</th>
                    <th>Destination</th>
                    <th>Poste forestier</th>
                    <th>Lieu d'empotage</th>

                    <th>Volume Total</th>
                    <th>Actions</th>
                                      
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if(isset($v_process))
                  {
                  ?>
                  @foreach ($v_process as $procedure)
                  <tr>
                    <td>{{$procedure->numero}}</td>
                    <td>
                   {{$procedure->created_at}}</td>
                     <td>{{$procedure->libelle_statut}}</td>
                      
                    <td>{{$procedure->nom_departement_provenance.'/'.$procedure->nom_communes_provenance}}</td>
                    <td>{{$procedure->titre_pays}}</td>
                    <td>{{$procedure->nom_poste}}</td>

                    <td>{{nom_departement_id($procedure->departement_empotage).'/'.nom_commune_id($procedure->commune_empotage).'/'.$procedure->localite_empotage}}</td>

                    

                    <td>{{$procedure->volume_total}}</td>
                    <td>
   
                      <a type="button" href="{{ Route('joindre_vgm',$procedure->id) }}" class="btn btn-block btn-primary">Traiter</a>
                     
                      <a type="button" href="{{ Route('process_show',$procedure->id) }}" class="btn btn-block btn-secondary">Voir</a>

                     
                    </td>
                                      
                  </tr>
                  @endforeach

                  <?php
                    }
                  ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
 @push('page_scripts')   
<script>
$(document).ready(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 });
</script>
@endpush
    