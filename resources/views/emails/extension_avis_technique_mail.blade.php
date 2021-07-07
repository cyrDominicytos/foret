<style type="text/css">
    table{
            border-collapse: collapse;
        }

        td, th{
            border:1px solid black;
            padding: 10px;
        }
</style>
<body>
    <div>Bonjour <b>{{ $prenom }} {{ $nom }} </b></div>
    <br>
    <div style='background: #f1f1f1; padding:25px; max-width: 900px; font-size: 16px; font-family:Arial;  line-height:1.5'>
        <div> <b style='color: red'> Nature </b> : <b>{{ $nature }}</b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>{{ $titre }}

              <h4 style="color: blue;text-align: center;">DETAILS DE LA PROCEDURE D'EXPORTATION</h4>
        <table style="width: 70%; margin: auto;">
           
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Valeur</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Numéro</td>
                    <td>{{ $data->numero }}</td>
                </tr>

                 <tr>
                    <td>Usager</td>
                    <td>{{ $prenom}} {{ $nom }}</td>
                </tr>

                <tr>
                    <td>Début de validité</td>
                    <td>{{ $debut_validite }}</td>
                </tr>

                 <tr>
                    <td>Fin de validité</td>
                    <td>{{ $fin_validite }}</td>
                </tr>
                
                 <tr>
                    <td>Fin de validité étendue</td>
                    <td>{{ $fin_validite_etendue }}</td>
                </tr>

                 
                <tr>
                    <td>Délivré par</td>
                    <td>{{ $agent_traitant }}</td>
                </tr>

                 <tr>
                    <td>Délivré le</td>
                    <td>{{ $date }}</td>
                </tr>
                
            </tbody>
        </table>
        <br>

         <center> <a style="text-align: center;" href="{{ route('show.avis_delivre', $id) }}" class="btn btn-secondary btn-circle">Consulter</a>
         </center>
        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>