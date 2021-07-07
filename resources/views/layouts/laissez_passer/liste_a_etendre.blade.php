<h3 style="text-align: center;padding-top: 2%;">LISTE DES LAISSEZ-PASSER A ETENDRE</h3>
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
                    <th>Nom de l'usager</th>                    
                    <th>Début de validité</th>
                    <th>Fin de validité</th>
                    <th>Agent émetteur</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                       @foreach($extends as $extend)
                        <tr>
                            <td>{{$extend->numero}}</td>
                            <td>{{nom_user_id($extend->id_user_usagers).' '.prenom_user_id($extend->id_user_usagers)}}</td>
                            <td>{{$extend->debut_validite}}</td>
                            <td>{{$extend->fin_validite}}</td>
                            <td>{{nom_user_id($extend->id_user_forestiers).' '.prenom_user_id($extend->id_user_forestiers)}}</td>
                            <td>

                               <a type="button" href="{{Route('show.en_attente',$extend->id)}}" class="btn btn-block btn-primary">Traiter</a>
                               <a type="button" href="{{Route('show.delivre',$extend->id)}}" class="btn btn-block btn-secondary">Voir</a>

                            </td>
                        </tr>
                      @endforeach
                      
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Numero</th>
                    <th>Nom de l'usager</th>                    
                    <th>Début de validité</th>
                    <th>Fin de validité</th>
                    <th>Agent émetteur</th>
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
    