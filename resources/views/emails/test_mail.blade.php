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
    <div>Bonjour <b>, </b></div>
    <br>
    <div style='background: #f1f1f1; padding:25px; max-width: 900px; font-size: 16px; font-family:Arial;  line-height:1.5'>
        <div> <b style='color: red'> Nature </b> : <b>Nouvelle demandée annuelle créée </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>Une nouvelle demande a été créée pour le compte de l'année 
              <h4 style="color: blue;text-align: center;">DETAILS DE LA PROCEDURE D'EXPORTATION</h4>
        <table style="width: 70%; margin: auto;">
           
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Valeur</th>
                </tr>
            </thead>

            <tbody>
                
            </tbody>
        </table>
        <br>

        <center><a href="{{ Route('demande_show',1) }}"  style="text-align: center;" class="btn btn-secondary btn-circle">Consulter</a></center>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>