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
        <div> <b style='color: red'> Nature </b> : <b>Règlement d'état de versement </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>La quittance de règlement de l'etat de versement {{ $data->numero }} vient d'être jointe à la demande.

              <h4 style="color: blue;text-align: center;border-collapse: collapse;">DETAILS DE LA PROCEDURE D'EXPORTATION</h4>
        <table style="width: 70%; margin: auto;">
           
            <thead>
                <tr>
                    <th style="border:1px solid black;padding: 10px;">Libellé</th>
                    <th style="border:1px solid black;padding: 10px;">Valeur</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Numéro Etat versement</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->numero}}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Délivré le</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->date_versement }}</td>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding: 10px;">Volume Total</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->volume_total }}</td>
                </tr>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Montant Total</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->montant_total }}</td>
                </tr>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Nom et Prénom Usager</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->nom_user.' '.$data->prenom_user }}</td>
                </tr>
            </tbody>
        </table>
        <br>

        <center><a href="{{ Route('etat_show_details',$data->id) }}"  style="text-align: center;" class="btn btn-secondary btn-circle">Consulter</a></center>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>