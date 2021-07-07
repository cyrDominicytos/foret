
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
                <h3>150</h3>
                <p>Scanning effectué</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ Route('demandes', ['details' => 'toute']) }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>53</h3>

                <p>Scanning en attente</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ Route('demandes', ['details' => 'traitement']) }}" class="small-box-footer">En savoir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
             <!-- small box  -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Scanning conforme</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ Route('demandes', ['details' => 'fermees']) }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Scanning non conforme</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ Route('demandes', ['details' => 'rejetees']) }}" class="small-box-footer">En savoir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
<!----------------Data Table------------------------------------>
      <div class="card">
          
          <div class="row mb-2">
            <div class="col-sm-4"></div>
          
              <div class="card-header">
                <h3 class="card-title">Vos 10 derniers Scanning effectués</h3>
              </div>
            <div class="col-sm-4"></div>
            </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date de procédure</th>
                    <th>Numéro de procédure</th>
                    <th>Nom et prénom du réquérant</th>
                    <th>Lieu Empotage</th>
                    <th>Date Scanning</th>
                    <th>Statut</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  <tr>
                    <td>20-01-2021</td>
                    <td>448876/DGEFC/YYYY</td>                  
                    <td>Valentin AKANDO</td>
                    <td>Kokoro</td>
                    <td>28-02-2021</td>
                    <td>Non conforme</td>
                  </tr>
                  <tr>
                    <td>20-02-2021</td>
                    <td>448877/DGEFC/YYYY</td>
                    <td>Levy GANIERO</td>
                    <td>Agoua</td>
                    <td>28-03-2021</td>
                    <td>Conforme</td>
                  </tr>
                  <tr>
                    <td>20-03-2021</td>
                    <td>448878/DGEFC/YYYY</td>
                    <td>Faissale ALLEY</td>
                    <td> Gogoro</td>
                    <td>28-04-2021</td>
                    <td>Non conforme</td>
                  </tr>
                  <tr>
                    <td>20-04-2021</td>
                    <td>448879/DGEFC/YYYY</td>
                    <td>Cyriaque TOSSOU</td>
                    <td> Klouekanme</td>
                    <td>28-05-2021</td>
                    <td>Non conforme</td>
                  </tr>
                  <tr>
                    <td>20-05-2021</td>
                    <td>448880/DGEFC/YYYY</td>
                    <td>Veronique HOUDEGLA</td>
                    <td> Gogoro</td>
                    <td>28-06-2021</td>
                    <td>Conforme</td>
                  </tr>
                  <tr>
                    <td>20-06-2021</td>
                    <td>448881/DGEFC/YYYY</td>
                    <td>Angele AKANNI</td>
                    <td> Gogoro</td>
                    <td>28-07-2021</td>
                    <td>Conforme</td>
                  </tr>
                  <tr>
                    <td>20-07-2021</td>
                    <td>448882/DGEFC/YYYY</td>
                    <td>Eustache ODJO</td>
                    <td> Gogoro</td>
                    <td>28-08-2021</td>
                    <td>Non conforme</td>
                  </tr>
                  <tr>
                     <td>20-08-2021</td>
                    <td>448883/DGEFC/YYYY</td>
                    <td>Natacha ADINAVO</td>
                    <td> Lanta</td>
                    <td>28-09-2021</td>
                    <td>Non conforme</td>
                  </tr>
                  <tr>
                    <td>20-09-2021</td>
                    <td>448884/DGEFC/YYYY</td>
                    <td>Franck DJOSSOU</td>
                    <td> Okounfo</td>
                    <td>28-10-2021</td>
                    <td>Conforme</td>
                  </tr>
                  <tr>
                    <td>20-10-2021</td>
                    <td>448885/DGEFC/YYYY</td>
                    <td>Brice OKORO</td>
                    <td> Ayogbeya</td>
                    <td>28-11-2021</td>
                    <td>Conforme</td>
                  </tr>
 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date de procédure</th>
                    <th>Numéro de procédure</th>
                    <th>Nom et prénom du réquérant</th>
                    <th>Lieu Empotage</th>
                    <th>Date Scanning</th>
                    <th>Statut</th>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 });
</script>
@endpush
    