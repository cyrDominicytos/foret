<h3 style="text-align: center;padding-top: 2%;">LISTE DES DEMANDES EN ATTENTE DE LAISSEZ-PASSER REJETES</h3>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <div id="app">
                      @include('flash_message')
                   </div>
                <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                  <thead>
                  <tr>
                    <th>Numéro</th>
                    <th>Agent traitant</th>
                    <th>Raison de rejet</th>
                    <th>Date de rejet</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                    
                      @foreach($detailsDemandeRejets as $detailsDemandeRejet)
                        <tr>
                            <td>{{$detailsDemandeRejet->numero}}</td>
                            <td>{{nom_user_id($detailsDemandeRejet->id_agent_traitant).' '.prenom_user_id($detailsDemandeRejet->id_agent_traitant)}}</td>
                            <td>{{$detailsDemandeRejet->raison_rejet}}</td>
                            <td>{{$detailsDemandeRejet->date_rejet}}</td>
                            <td>
                               <!-- <a type="button" class="btn btn-block btn-secondary" href="">Voir</a> -->
                               <a type="button" class="btn btn-block btn-primary" href="{{ route('show.demande_LP_rejet', $detailsDemandeRejet->id) }}">Traiter</a>
                            </td>
                        </tr>
                      @endforeach
                    
                 
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Numéro</th>
                    <th>Agent traitant</th>
                    <th>Raison de rejet</th>
                    <th>Date de rejet</th>
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