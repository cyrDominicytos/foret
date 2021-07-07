<h3 style="text-align: center;padding-top: 2%;">LISTE DES VISAS DELIVRES</h3>



<!----------------Data Table------------------------------------>
      <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
               <div id="app">
                  @include('flash_message')


                  @yield('content')
              </div>
                <table id="example1" class="table table-bordered table-striped"  data-order='[[ 1, "desc" ]]'>
                  <thead>
                  <tr>
                    
                    <th>Numero Procédure</th>
                    <th>Visé le</th>
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
                  @foreach ($procedures as $procedure)
                  <tr>
                    <td>{{$procedure->numero_procedure}}</td>
                    <td>
                   {{$procedure->date_visa}}</td>
                     <td>{{$procedure->libelle_statut}}</td>
                      
                    <td>{{$procedure->nom_departement_provenance.'/'.$procedure->nom_communes_provenance}}</td>
                    <td>{{$procedure->titre_pays}}</td>
                    <td>{{$procedure->nom_poste}}</td>

                    <td>{{nom_departement_id($procedure->departement_empotage).'/'.nom_commune_id($procedure->commune_empotage).'/'.$procedure->localite_empotage}}</td>

                    

                    <td>{{$procedure->volume_total}}</td>
                    <td>

                      <a type="button" href="{{ Route('show.delivre_visa',$procedure->id_procedure_exportation) }}" class="btn btn-block btn-secondary">Voir</a>


                     
                    </td>
                                      
                  </tr>
                  @endforeach

                  </tbody>
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
    