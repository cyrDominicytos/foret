<h3 style="text-align: center;padding-top: 2%;">LISTE DES CONTRE CONSTATS  DELIVRÉS</h3>
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
                    <th>Date contre constat</th>
                    <th>Numéro demande</th>
                    <th>Conformité au constat</th>
                    <th>Observation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                      
                      @foreach($contreConstatDelivres as $contreConstatDelivre)
                        <tr>
                            <td>{{$contreConstatDelivre->date_contre_constat}}</td>
                            <td>{{$contreConstatDelivre->numero}}</td>
                            <td>{{($contreConstatDelivre->conformite_au_constat_conformite==1) ? ('Oui') : ('Non')}}</td>
                            <td>{{(trim($contreConstatDelivre->observation)!="") ? ($contreConstatDelivre->observation) : ("")}}</td>
                            <td>
                               <a type="button" href="{{Route('show.delivre_contre_constat',$contreConstatDelivre->id)}}" class="btn btn-block btn-secondary">Voir</a>
                            </td>
                        </tr>
                      @endforeach
 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date contre constat</th>
                    <th>Numéro demande</th>
                    <th>Conformité au constat</th>
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
    