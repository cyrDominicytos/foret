<body>
    <div>Bonjour <b>{{$name}}, </b></div>
    <br>
    <div style='background: #f1f1f1; padding:25px; max-width: 900px; font-size: 16px; font-family:Arial;  line-height:1.5'>
        <div> <b style='color: red'> Objet </b> : <b>Vérification de votre adresse email </b></div>
        <div style='background: #fff; padding: 10px; margin:15px 0'><b>Message </b> : 
            <br>Merci d'avoir créé un compte sur notre plate forme.
            <br>Veuillez cliquer <a href="{{$url}}">ici pour vérifier votre adresse email</a> .
            <br>Veuillez ignorer ce message si vous n'avez pas créé un compte sur notre plate forme.
        </div>
        <div><b>Date et heure : </b> {{Carbon\Carbon::now()}}
        </div>
        <br>
        <div style='color: blue; font-size: 14px;'>===========<br>Equipe EFOREX</div>
    </div>
</body>