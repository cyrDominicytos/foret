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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $procedureEnAttentes->count() + $passDelivres->count() + $procedureRejetes->count() }}</h3>
                <p>Total demandes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer">&nbsp;</a>
            </div>
          </div>

           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $procedureEnAttentes->count() }}</h3>

                <p>Constats de conformités en attentes </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ Route('liste.en_attente_constat') }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>{{ $passDelivres->count() }}</h3>

                <p>Constats de conformités délivrés</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ Route('liste.delivres_constat') }}" class="small-box-footer">En savoir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
             <!-- small box  -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $procedureRejetes->count() }}</h3>

                <p>Demandes rejetées</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ Route('liste.constat_rejete') }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
<!----------------Data Table------------------------------------>
      <div class="card">
          
          <div class="row mb-2">
            <div class="col-sm-4"></div>
          
              <div class="card-header">
                <h3 class="card-title">Vos 10 derniers dossiers en attente de traitement</h3>
              </div>
            <div class="col-sm-4"></div>
            </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" data-order='[[ 0, "desc" ]]' class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
                    <th>Statut</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                    
                      @foreach($procedure as $procedureEnAttente)
                        <tr>
                            <td>{{formater_datetime($procedureEnAttente->created_at)}}</td>
                            <td>{{$procedureEnAttente->numero}}</td>
                            <td>{{$procedureEnAttente->libelle_statut}}</td>
                            <td>{{$procedureEnAttente->nom_poste}}</td>
                            <td>{{$procedureEnAttente->localite_empotage}}</td>
                            <td>{{$procedureEnAttente->titre_pays}}</td>
                            <td>
                              <a type="button" class="btn btn-block btn-primary" href="{{ section_traiter_link($procedureEnAttente->id_statut,$procedureEnAttente->id)}}">Traiter</a>
                                <a type="button" class="btn btn-block btn-secondary" href="{{section_voir_link($procedureEnAttente->id_statut,$procedureEnAttente->id) }}">Voir</a> 
                               
                            </td>
                        </tr>
                      @endforeach
                    
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
                    <th>Statut</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
 @push('page_scripts')   
<script>
$(document).ready(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 });
</script>
@endpush
    