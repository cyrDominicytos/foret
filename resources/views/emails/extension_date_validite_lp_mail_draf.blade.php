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
    <div>Bonjour <b>{{ $prenom }} {{ $nom }}, </b></div>
    <br>
    <div style='background: #f1f1f1; padding:25px; max-width: 900px; font-size: 16px; font-family:Arial;  line-height:1.5'>
        <div> <b style='color: red'> Nature </b> : <b>Date de fin de validité étendue </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>La date de fin de validité du laissez-passer de la procédure d'exportation {{ $data->numero }} vient d'être étendue.

              <h4 style="color: blue;text-align: center;">DETAILS DU LAISSEZ-PASSER ETENDU</h4>
        <table style="width: 70%; margin: auto;">
           
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Valeur</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Numéro procédure</td>
                    <td>{{ $data->numero }}</td>
                </tr>

                <tr>
                    <td>Numéro laissez-passer</td>
                    <td>{{ $num_pass }}</td>
                </tr>

                <tr>
                    <td>Année</td>
                    <td>{{ $data->annee_demande }}</td>
                </tr>

                <tr>
                    <td>Emis par</td>
                    <td>{{ $agent_emetteur }}</td>
                </tr>

                 <tr>
                    <td>Délivré le</td>
                    <td>{{ $date_laissez_passer }}</td>
                </tr>

                <tr>
                    <td>Etendu par</td>
                    <td>{{ $agent_extension }}</td>
                </tr>

                 <tr>
                    <td>Extension délivrée le</td>
                    <td>{{ $date_laissez_passer }}</td>
                </tr>

                 <tr>
                    <td>Fin de validité après extension</td>
                    <td>{{ $date_fin_etendue }}</td>
                </tr>
                
            </tbody>
        </table>
        <br>

        <a style="text-align: center;" href="{{Route('show.delivre',$id)}}" class="btn btn-secondary btn-circle">Consulter</a>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>