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
        <div> <b style='color: red'> Nature </b> : <b>Etat de versement délivré </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
             <br>Un nouvel état de versement vient d'être délivré

              <h4 style="color: blue;text-align: center;">DETAILS DE L'ETAT DE VERSEMENT</h4>
       <table  class="second_tab" id="second_tab" style="width: 100%;margin-bottom: 3%;margin-left: 5%;">
            <thead>
                <tr>
                    <th style="border:1px solid black;padding: 10px;">Société / Nom et Prénoms</th>
                    <th style="border:1px solid black;padding: 10px;">Type de Produit</th>
                    <th style="border:1px solid black;padding: 10px;">Type d'exploitation / Origine</th>
                    <th style="border:1px solid black;padding: 10px;">Nature de la recette</th>
                    <th style="border:1px solid black;padding: 10px;">Prix unitaire (FCFA)/m3</th>
                    <th style="border:1px solid black;padding: 10px;">Volume (m3)</th>
                    <th style="border:1px solid black;padding: 10px;">Montant (FCFA)</th>
                </tr>
            </thead>

             <tbody>
                            <?php $total = 0; ?>
                            
                                @foreach($data as $caracteristique)
                                    <?php $total += $caracteristique->volume * $caracteristique->prix_unitaire;?>
                                  <tr>
                                   <td style="border:1px solid black;padding: 10px;">{{$nom .' '.$prenom}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{$caracteristique->espece_produits}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{$caracteristique->type_exploitation}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{$caracteristique->nature_recette}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{$caracteristique->prix_unitaire}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{ $caracteristique->volume}}</td>
                                   <td style="border:1px solid black;padding: 10px;">{{$caracteristique->volume * $caracteristique->prix_unitaire}}</td>
                                  </tr>               
                                @endforeach
                                <tr>
                                    <td colspan="6" style="text-align: center; font-weight: bold;">TOTAL</td>
                                    <td style="border:1px solid black;padding: 10px;">{{ $total }}</td>
                            
                                </tr>
                      </tbody>
        </table>
           
           
        <br>
        </div>

        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>