<h3 style="text-align: center;padding-top: 2%;">LISTE DES DEMANDES EN ATTENTE DE CONSTAT DE CONFORMITÉ</h3>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <div id="app">
                      @include('flash_message')
                   </div>
                <table id="example1" data-order='[[ 0, "desc" ]]' class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                    
                      @foreach($procedureEnAttentes as $procedureEnAttente)
                        <tr>
                            <td>{{$procedureEnAttente->date_depart}}</td>
                            <td>{{$procedureEnAttente->numero}}</td>
                            <td>{{$procedureEnAttente->nom_poste}}</td>
                            <td>{{$procedureEnAttente->localite_empotage}}</td>
                            <td>{{$procedureEnAttente->titre_pays}}</td>
                            <td>
                               
                              <a type="button" class="btn btn-block btn-primary" href="{{route('show.traiter_constat',$procedureEnAttente->id) }}">Traiter</a>

                              <a type="button" class="btn btn-block btn-secondary" href="{{route('show.en_attente_constat',$procedureEnAttente->id) }}">Voir</a> 
                            </td>
                        </tr>
                      @endforeach
                    
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 });
</script>
@endpush