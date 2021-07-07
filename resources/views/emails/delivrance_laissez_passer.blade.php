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
        <div> <b style='color: red'> Nature </b> : <b>Laissez-passer délivré </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>Le laissez-passer de votre procédure d'exportation vient d'être délivré.

              <h4 style="color: blue;text-align: center;border-collapse: collapse;">DETAILS DU LAISSEZ-PASSER</h4>
        <table style="width: 70%; margin: auto;">
           
            <thead>
                <tr>
                    <th style="border:1px solid black;padding: 10px;">Libellé</th>
                    <th style="border:1px solid black;padding: 10px;">Valeur</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Numéro procédure</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->numero }}</td>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding: 10px;">Numéro laissez-passer</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $num_pass }}</td>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding: 10px;">Année</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->annee_demande }}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Poste forestier</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->nom_poste }}</td>
                </tr>


                <tr>
                    <td style="border:1px solid black;padding: 10px;">Emis par</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $agent_emetteur }}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Délivré le</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $date_laissez_passer }}</td>
                </tr>
                
            </tbody>
        </table>
        <br>

        <center>
            <a style="text-align: center;" href="{{ Route('process_show',$data->id) }}" class="btn btn-secondary btn-circle">Consulter</a>
        </center>
        

        </div>

       
        <div><b>Date et heure : </b> {{formater_datetime(Carbon\Carbon::now())}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>