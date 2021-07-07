<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="/acceuil/images/logo_eaux_forrets_chasses.png"/>
    
     <!-- Font Awesome Icons -->
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    
<!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- IonIcons -->
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Theme style -->
  <!--<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">-->

<!-- DataTables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 
  <!-- css global généré par nmp install -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>
<style type="text/css">
  
  .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  /*min-width: 160px;*/
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}

</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    @include('layouts.menu_top')

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
          {{-- @include('layouts._alerts') --}}
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    @include('layouts.footer')
</div>
<div id="loader"></div>

<!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

<!-- script global généré par nmp install -->
<script src="{{ asset('js/app.js') }}"></script>

 <!--Bootstrap 4--> 
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 

<!-- jquery-validation -->
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/additional-methods.min.js"></script>

<!--DataTables  & Plugins--> 
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js" defer></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js" defer></script> 

<!--AdminLTE App--> 
<!--<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js" defer></script>-->

<!-- Sweet alerts added -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 -->
@yield('third_party_scripts')

@stack('page_scripts')

</body>


<script>
   
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var spinner = $('#loader');
    
      $("#addBtn").click(function(e){
  
        e.preventDefault();
        

        myCheckFields();
        var validator = $("#idProcedureForm").validate();
        var result = validator.check("#volume");
       if(validator.check("#volume")){
            var categorie_value =  categorie.value;
            var produit_value =  produit.value;
            var essence_value =  essence.value;
            var epaisseur_value =  epaisseur.value;
            var longueur_value =  longueur.value;
            var largeur_value =  largeur.value;
            var volume_value =  volume.value;
            var line_id = categorie_value+''+categorieList[categorie_value-1];
            categorieList[categorie_value-1] += 1;
            document.getElementById("len"+categorie_value).value = categorieList[categorie_value-1];
            $.ajax({
               type:'POST',
               url:"{{ route('ajaxRequest.post') }}",
               data:{categorie:categorie_value, produit:produit_value, essence:essence_value, epaisseur:epaisseur_value, longueur:longueur_value, largeur:largeur_value, line_id:line_id, volume:volume_value,},
                success:function(data){
                  newLineData = data;
                  addProduct();

                 // addSelected('#produit_'+line_id, produit_value)
                  $('#produit_'+line_id).val(produit_value).trigger('change');
                  $('#espece_'+line_id).val(essence_value).trigger('change');
                 // console.log('#produit_'+line_id+' '+produit_value);

               }
            });
       }
       
  
  });


      //Validation form
$(function () {
  $.validator.setDefaults({
    submitHandler: function (e) {
      
        e.preventDefault();
          spinner.show();
       /*  $.ajax({
            url: "{{ route('process.create') }}",
            data: $(this).serialize(),
            method: 'post'
          }).done(function(resp) {
            spinner.hide();
            alert(resp.status);
          });
        });

*/
    //  $( "#idProcedureForm" ).submit();
     
    }
  });


  $('#idProcedureForm').validate({
    rules: {
      volume: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },numero_quittance: {
        required: true
      },
    },
    messages: {
      volume: {
        required: "Veuillez entrer le volume",
        min: "Le volume ne peut être inférieur à 0",
      },
      numero_quittance: {
        required: "Saisir le numéro de la quittance",
        minlength: "Numero trop long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


   $('#idRegleQuittanceForm').validate({
    rules: {
     
      
      numero_quittance: {
        required: true
      },
    },
    messages: {
      
      numero_quittance: {
        required: "Saisir le numéro de la quittance",
        minlength: "Numero trop long"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


});








$(document).ready(function(){


$('#departement_provenance').change(function(){
  
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   
   $.ajax({
    url:"{{ route('dynamicdepdendent.communeDepartementProvenance') }}",
    method:"POST",
    data:{select:select, value:value},
    success:function(result)
    {

     $('#commune_provenance').html(result);

    }

   });
  }
 });

 $('#categorie').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   
   $.ajax({
    url:"{{ route('dynamicdepdendent.typeProduit') }}",
    method:"POST",
    data:{select:select, value:value},
    success:function(result)
    {
     $('#produit').html(result);

    }

   })
  }
 });



  $('#departement_empotage').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   
   $.ajax({
    url:"{{ route('dynamicdepdendent.communeDepartementEmpotage') }}",
    method:"POST",
    data:{select:select, value:value},
    success:function(result)
    {

     $('#commune_empotage').html(result);
     trigge_data_change("commune_empotage", "poste", "{{ route('dynamicdepdendent.posteCommuneEmpotage') }}");


    }

   });
  }
 });

  $('#commune_empotage').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   
   $.ajax({
    url:"{{ route('dynamicdepdendent.posteCommuneEmpotage') }}",
    method:"POST",
    data:{select:select, value:value},
    success:function(result)
    {
     $('#poste').html(result);

    }

   })
  }
 });
 






 $('#categorie').change(function(){
  $('#produit').val('');
 });


function trigge_data_change(id_change, id_to_change, route_to_call) {
  
    
    if($('#'+id_change).val() != '')
    {
     var select = $('#'+id_change).attr("id");
     var value = $('#'+id_change).val();
     
     $.ajax({
      url:route_to_call,
      method:"POST",
      data:{select:select, value:value},
      success:function(result)
      {

       $('#'+id_to_change).html(result);

      }

     });
    }

   
}





//Update data
if (typeof vue !== 'undefined' && vue === 1) {

  
  document.getElementById("len1").value = <?= isset($nbrcat1) ? ($nbrcat1) : (0) ?>;
  document.getElementById("len2").value = <?= isset($nbrcat2) ? ($nbrcat2) : (0) ?>;
  document.getElementById("len3").value = <?= isset($nbrcat3) ? ($nbrcat3) : (0) ?>;
  document.getElementById("len4").value = <?= isset($nbrcat4) ? ($nbrcat4) : (0) ?>;

  document.getElementById("departement_provenance").value = <?= isset($process) ? ($process->departement_provenance) : (0) ?>;
  trigge_data_change("departement_provenance", "commune_provenance", "{{ route('dynamicdepdendent.communeDepartementEmpotage') }}");

  document.getElementById("commune_provenance").value = <?= isset($process) ? ($process->commune_provenance) : (0) ?>;



  document.getElementById("departement_empotage").value = <?= isset($process) ? ($process->departement_empotage) : (0) ?>;
  trigge_data_change("departement_empotage", "commune_empotage", "{{ route('dynamicdepdendent.communeDepartementEmpotage') }}");

  document.getElementById("commune_empotage").value = <?= isset($process) ? ($process->commune_empotage) : (0) ?>;
  document.getElementById("pays_destination").value = <?= isset($process) ? ($process->id_pays_destination) : (0) ?>;
  document.getElementById("poste").value = <?= isset($process) ? ($process->id_poste_forestier) : (0) ?>;
  trigge_data_change("commune_empotage", "poste", "{{ route('dynamicdepdendent.posteCommuneEmpotage') }}");

    categorieList = [nbrcat1,nbrcat2,nbrcat3,nbrcat4];
  addProductUpdate();
}else{
  trigge_data_change("departement_provenance", "commune_provenance", "{{ route('dynamicdepdendent.communeDepartementEmpotage') }}");
  trigge_data_change("departement_empotage", "commune_empotage", "{{ route('dynamicdepdendent.communeDepartementEmpotage') }}");
   trigge_data_change("commune_empotage", "poste", "{{ route('dynamicdepdendent.posteCommuneEmpotage') }}");

}

//End Update data
  });



</script>
</html>
