<h3 style="text-align: center;padding-top: 2%;">LISTE DES CONTRE CONSTATS REJETÉS</h3>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <div id="app">
                  @include('flash_message')


                  @yield('content')
              </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date rejet</th>
                    <th>Numero demande</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                    <th>Observation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                    
                      @foreach($procedureRejetes as $procedureRejete)
                        <tr>
                            <td>{{formater_datetime($procedureRejete->date_rejet)}}</td>
                            <td>{{$procedureRejete->numero}}</td>
                            <td>{{$procedureRejete->nom_poste}}</td>
                            <td>{{$procedureRejete->localite_empotage}}</td>
                            <td>{{$procedureRejete->titre_pays}}</td>
                            <td>{{$procedureRejete->raison_rejet}}</td>
                            <td>
                              
                                <a type="button" class="btn btn-block btn-primary" href="{{route('show.en_attente_contre_constat_traiter',$procedureRejete->id_procedure_exportation) }}">Traiter</a>

                                 <a type="button" class="btn btn-block btn-secondary" href="{{ route('show.contre_constat_rejete', $procedureRejete->id_procedure_exportation) }}">Voir</a>
                            </td>
                        </tr>
                      @endforeach
                    
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date rejet</th>
                    <th>Numero demande</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                    <th>Observation</th>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 });
</script>
@endpush