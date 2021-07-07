<h3 style="text-align: center;padding-top: 2%;">LISTE DES CONSTATS DE CONFORMITÉS DELIVRÉS</h3>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <div id="app">
                  @include('flash_message')


                  @yield('content')
                </div>
                <table id="example1" data-order='[[ 0, "desc" ]]' class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date constat</th>
                    <th>Numéro demande</th>
                    <th>Conformité contenu procedure exportation</th>
                    <th>Conformité réglementation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                      
                      @foreach($constatDelivres as $constatDelivre)
                        <tr>
                            <td>{{$constatDelivre->date_constat}}</td>
                            <td>{{$constatDelivre->numero}}</td>
                            <td>{{($constatDelivre->conformite_contenu_procedure_exportation==1) ? ('Oui') : ('Non')}}
                            </td>
                            <td>{{($constatDelivre->conformite_reglementation==1) ? ('Oui') : ('Non')}}</td>
                            <td>
                               <a type="button" href="{{Route('show.delivre_constat',$constatDelivre->id)}}" class="btn btn-block btn-secondary">Voir</a>
                            </td>
                        </tr>
                      @endforeach
 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date constat</th>
                    <th>Numéro demande</th>
                    <th>Conformité contenu procedure exportation</th>
                    <th>Conformité réglementation</th>
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
    