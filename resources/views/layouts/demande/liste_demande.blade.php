



<!----------------Data Table------------------------------------>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                       if(user_web()->usager)
                       { 
                        ?>  
                          <div class="row">
                              <div class=" col-md-3 offset-md-9">
                                <a class="btn btn-block btn-primary"style="margin-bottom: 20px;" href="{{ Route('nouvelle_demande') }}">Nouvelle Demande</a> 
                              </div>
                          </div>                        
                      <?php
                          
                       } 
                      ?> 
                 
                <table id="example1" class="table table-bordered table-striped"  data-order='[[ 0, "desc" ]]'>
                  <thead>
                  <tr>
                    <th>Numero demande</th>
                    <th>Année</th>
                    <th>Créée le</th>
                    <th>Dernière Mofication</th>  
                    <th>Autre Informations</th>                  
                    <th>Actions</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($demandes as $demande)
                  <tr>
                   
                    <td>{{$demande->numero}}</td>
                     <td>{{$demande->demande_pour_annee}}</td>
                      <td>{{$demande->date_creation}}</td>
                      <td>{{$demande->updated_at}}</td>
                    <td>{{$demande->autre_information}}</td>
                   
                                       
                    <td>
                    <?php
                       if(user_web()->usager)
                       { 
                        ?>                          
                          <a type="button" href="{{ Route('nouvelle_demandes',$demande->id) }}" class="btn btn-block btn-primary">Modifier</a>
                      <?php
                          
                       } 
                      ?> 

                      <a type="button" href="{{ Route('demande_show',$demande->id) }}" class="btn btn-block btn-secondary">Voir</a>
                    </td>                   
                  </tr>
                  @endforeach
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
    