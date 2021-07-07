<h3 style="text-align: center;padding-top: 2%;">LISTE DES ETATS DE VERSEMENT DELIVRES</h3>
      <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="app">
                      @include('flash_message')
                   </div>
                
                <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                  <thead>
                  <tr>
                    <th>Numero</th>
                    <th>Montant total</th>
                    <th>Date versement</th>
                    <th>Agent traitant</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @foreach($etat_delivres as $etat_delivre)
                  <tbody>
                      <td>{{ $etat_delivre->numero }}</td>
                      <td>{{ $etat_delivre->montant_total }}</td>                    
                      <td>{{ $etat_delivre->date_versement }}</td>                    
                      <td>{{ user_forestier_id2($etat_delivre->id_agent_traitant)->name.' '.user_forestier_id2($etat_delivre->id_agent_traitant)->firstname }}</td>                    
                      <td><!-- 
                        <a type="button" class="btn btn-block btn-primary" href="{{ route('show.en_attente', $etat_delivre->id) }}">Traiter</a> -->
                              
                               <a type="button" class="btn btn-block btn-secondary" href="{{ route('show.etat_delivre', $etat_delivre->id) }}">Voir</a>
                      </td>
                        
                  </tbody>
                  @endforeach
                  <tfoot>
                  <tr>
                    <th>Numero</th>
                    <th>Montant total</th>    
                    <th>Date versement</th>
                    <th>Agent traitant</th>
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
    