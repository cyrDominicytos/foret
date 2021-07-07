<h3 style="text-align: center;padding-top: 2%;">LISTE DES ETATS DE VERSEMENT REGLES</h3>
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
                    <th>Numéro Procédure</th>
                    <th>Délivré le</th>
                    <th>Volume Total</th>
                    <th>Montant Total</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                      @foreach ($etat as $procedure)
                  <tr>
                    <td>{{$procedure->numero}}</td>
                    <td><a type="button" href="{{ Route('process_show',$procedure->id_procedure_exportation) }}">{{$procedure->numero_procedure}}</a></td>
                    <td>{{$procedure->date_versement}}</td>
                    <td>{{$procedure->volume_total}}</td>
                    <td>{{$procedure->montant_total}}</td>
                    <td>
 
                      <a type="button" href="{{ Route('etat_show_details',$procedure->id) }}" class="btn btn-block btn-secondary">Voir</a>


                     
                    </td>
                                      
                  </tr>
                  @endforeach
 
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Numero</th>
                    <th>Numéro Procédure</th>
                    <th>Délivré le</th>
                    <th>Volume Total</th>
                    <th>Montant Total</th>
                    <th>Actions</th>
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
    