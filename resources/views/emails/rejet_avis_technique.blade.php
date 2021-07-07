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
        <div> <b style='color: red'> Nature </b> : <b>Demande d'avis technique rejeté </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>La demande d'avis technique' de votre procédure d'exportation vient d'être rejetée.

             <h5 style="text-align: center;color: blue;">DETAILS DE LA PROCEDURE D'EXPORTATION</h5>
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
                    <td>Année</td>
                    <td>{{ $data->annee_demande }}</td>
                </tr>

                 <tr>
                    <td>Agent traitant</td>
                    <td>{{ $agent_traitant }}</td>
                </tr>    

                <tr>
                    <td>Date de rejet</td>
                    <td>{{ $date_rejet }}</td>
                </tr>          
                
            </tbody>
        </table>
        <h5 style="color: red;">Raisons</h5>
        <p>{{ $raison }}</p>

        
        <center>
            <a style="text-align: center;" href="{{ Route('show.detail_avis_en_attente', $id) }}" class="btn btn-secondary btn-circle">Consulter</a>
        </center>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>