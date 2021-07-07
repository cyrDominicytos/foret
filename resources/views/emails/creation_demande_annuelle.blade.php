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
        <div> <b style='color: red'> Nature </b> : <b>Nouvelle demande annuelle créée </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>Une nouvelle demande a été créée pour le compte de l'année {{ $data->demande_pour_annee }}.

              <h4 style="color: blue;text-align: center;">DETAILS DE LA PROCEDURE D'EXPORTATION</h4>
        <table style="width: 70%; margin: auto;border-collapse: collapse;">
           
            <thead>
                <tr>
                    <th style="border:1px solid black;padding: 10px;">Libellé</th>
                    <th style="border:1px solid black;padding: 10px;">Valeur</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Numéro</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->numero}}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Année</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->demande_pour_annee }}</td>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding: 10px;">Créée le</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $date_creation }}</td>
                </tr>
                <tr>
                    <td style="border:1px solid black;padding: 10px;">Informations</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->autre_information }}</td>
                </tr>
            </tbody>
        </table>
        <br>

        <center><a href="{{ Route('demande_show',$data->id) }}"  style="text-align: center;" class="btn btn-secondary btn-circle">Consulter</a></center>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>