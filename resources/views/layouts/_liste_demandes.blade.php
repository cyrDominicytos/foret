



<!----------------Data Table------------------------------------>
      <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  <tr>
                    <td>20-01-2021</td>
                    <td>POSTE1-2021-00001-00000001</td>                  
                    <td>Bante</td>
                    <td> Kokoro</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                      <td>20-02-2021</td>
                    <td>POSTE1-2021-00002-00000002</td>
                    <td>Bante</td>
                    <td>Agoua</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                      <td>20-03-2021</td>
                    <td>POSTE2-2021-00001-00000003</td>
                    <td>Save</td>
                    <td> Gogoro</td>
                    <td>France</td>
                  </tr>
                  <tr>
                    <td>20-04-2021</td>
                    <td>POSTE3-2021-00001-00000004</td>
                    <td>Klouekanme</td>
                    <td> Klouekanme</td>
                    <td>Belgique</td>
                  </tr>
                  <tr>
                    <td>20-05-2021</td>
                    <td>POSTE2-2021-00002-00000005</td>
                    <td>Save</td>
                    <td> Gogoro</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                    <td>20-06-2021</td>
                    <td>POSTE2-2021-00003-00000006</td>
                    <td>Save</td>
                    <td> Gogoro</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                    <td>20-07-2021</td>
                    <td>POSTE2-2021-00004-00000007</td>
                    <td>Save</td>
                    <td> Gogoro</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                     <td>20-08-2021</td>
                    <td>POSTE3-2021-00002-00000008</td>
                    <td>Klouekanme</td>
                    <td> Lanta</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                    <td>20-09-2021</td>
                    <td>POSTE2-2021-00005-00000009</td>
                    <td>Save</td>
                    <td> Okounfo</td>
                    <td>Suisse</td>
                  </tr>
                  <tr>
                    <td>20-10-2021</td>
                    <td>POSTE3-2021-00003-00000010</td>
                    <td>Klouekanme</td>
                    <td> Ayogbeya</td>
                    <td>Allemangne</td>
                  </tr>
 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date demande</th>
                    <th>Numero demande</th>
                    <th>Poste forestier</th>
                    <th>Lieu Empotage</th>
                    <th>Destination</th>
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
    