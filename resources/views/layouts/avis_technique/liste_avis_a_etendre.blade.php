<h3 style="text-align: center;padding-top: 2%;">LISTE DES AVIS TECHNIQUES A ETENDRE</h3>
      <div class="card">
               <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="app">
                      @include('flash_message')
                   </div>
                
                <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
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
                   @foreach($extends as $extend)
                  <tbody>    
                    <tr>
                      <td>{{ $extend->date_depart }}</td>
                      <td>{{ $extend->numero }}</td>
                      <td>{{ $extend->nom_poste }}</td>
                      <td>{{ $extend->localite_empotage }}</td>
                      <td>{{ $extend->titre_pays }}</td>
                      <td>
                         <a type="button" class="btn btn-block btn-primary" href="{{ route('show.avis_en_attente', $extend->id) }}">Traiter</a>
                               
                        <a type="button" class="btn btn-block btn-secondary" href="{{ route('show.avis_delivre', $extend->id) }}">Voir</a>

                      </td>
                    </tr>
                  
                  </tbody>
                  @endforeach
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
    