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
        <div> <b style='color: red'> Nature </b> : <b>Mise à jour d'une procédure d'exportation</b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>La procédure <?= $data->numero?> vient d'être modifiée.

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
                    <td><?= $data->numero?></td>
                </tr>

                 <tr>
                    <td>Date création</td>
                    <td><?= $data->created_at ?></td>
                </tr>  
                <tr>
                    <td>Date Mise à jour</td>
                    <td><?= $data->updated_at ?></td>
                </tr> 
                <tr>
                    <td>Date Départ</td>
                    <td><?= $data->date_depart ?></td>
                </tr>


                 <tr>
                    <td>Provenance</td>
                    <td><?= nom_departement_id($data->departement_empotage).'/'.nom_commune_id($data->commune_empotage).'/'.$data->localite_empotage?></td>
                </tr>

                 <tr>
                    <td>Destination</td>
                    <td><?= $data->titre_pays?></td>
                </tr>

                 <tr>
                    <td>Poste forestier</td>
                    <td><?= $data->nom_poste?></td>
                </tr>

                 <tr>
                    <td>Lieu d'empotage</td>
                    <td><?=nom_departement_id($data->departement_empotage).'/'.nom_commune_id($data->commune_empotage).'/'.$data->localite_empotage?></td>
                </tr>

                 <tr>
                    <td>Référence conteneur</td>
                    <td><?= $data->reference_conteneur?></td>
                </tr>

                 <tr>
                    <td>Référence plomb</td>
                    <td><?= $data->reference_plomb?></td>
                </tr>

                 <tr>
                    <td>Volume total</td>
                    <td><?= $data->volume_total?></td>
                </tr>
            </tbody>
        </table>
        <br>

         <center><a href="{{ Route('process_show',$data->id) }}"  style="text-align: center;" class="btn btn-secondary btn-circle">Consulter</a></center>

        </div>

       
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>