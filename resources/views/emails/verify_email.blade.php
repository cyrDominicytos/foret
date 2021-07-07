<body>
    <div>Bonjour <b>{{$name}}, </b></div>
    <br>
    <div style='background: #f1f1f1; padding:25px; max-width: 900px; font-size: 16px; font-family:Arial;  line-height:1.5'>
        <div> <b style='color: red'> Objet </b> : <b>Vérification de votre adresse email </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
            <br>La direction des Eaux Forêts et Chasses vous a créé un compte sur la plate forme eforex.
            <br>Veuillez cliquer <a href="{{$url}}">ici pour vérifier votre adresse email</a> .
            <br>Vous allez recevoir par voie officielle votre mot de passe que vous pourrez par la suite modifier.
            <br>Veuillez ignorer ce message si vous extimez l'avoir reçu par erreur.
        </div>
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>