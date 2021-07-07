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
                    <td style="border:1px solid black;padding: 10px;">Numéro</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $data->numero }}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Usager</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $prenom_usager}} {{ $nom_usager }}</td>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding: 10px;">Début de validité AT</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $debut_validite }}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Fin de validité AT</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $fin_validite }}</td>
                </tr>
                
            
                <tr>
                    <td style="border:1px solid black;padding: 10px;">{{isset($viser) ? ('Visé par') : ('Délivré par')}}</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $agent_traitant }}</td>
                </tr>

                 <tr>
                    <td style="border:1px solid black;padding: 10px;">Délivré le</td>
                    <td style="border:1px solid black;padding: 10px;">{{ $date }}</td>
                </tr>
                
            </tbody>
        </table>
        <br>

        
    <center> <a style="text-align: center;" href="{{ Route('process_show', $data->id) }}"   class="btn btn-secondary btn-circle">Consulter</a>
                      </center>


       

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>