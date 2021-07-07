<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <h1 class="m-0">MON PROFILE</h1>
            </div><!-- /.col -->
            <div class="col-sm-3">
                <!--<ol class="breadcrumb float-sm-right">-->
                <!--<li class="breadcrumb-item"><a href="#">Espce de travail</a></li>-->
                <!--<li class="breadcrumb-item active">Tableau de bord</li>-->
                <!--</ol>-->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>





<form action="{{ route('profile.update') }}" method="post" accept-charset="utf-8" class="form-horizontal", enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-md-4">
            <label for="firstname" class="col-sm-2 col-form-label">Prénom</label>

            <input type="text"
                   name="firstname"
                   class="form-control @error('firstname') is-invalid @enderror"
                   value="{{ $prenom }}"
                   placeholder="Prénom" maxlength="150">                    
            @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="col-md-4">
            <label for="name" class="col-sm-2 col-form-label">Nom</label>
            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ $nom }}"
                   placeholder="Nom de famille" maxlength="100">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        <div class="col-md-4">
            <label for="name" class="col-sm-2 col-form-label">Email</label>
            <input type="email"
                   name="email"
                   value="{{ $email }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Email" maxlength="255">      
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
            <input type="text"
                   name="adresse"
                   class="form-control @error('adresse') is-invalid @enderror"
                   value="{{ $adresse }}"
                   placeholder="Adresse" maxlength="100">
            @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>


        <!------------------Partie Forestier--------------------------------------------->
        @if(user_web() and user_web()->forestier)
        <div class="col-md-4">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <input type="text"
                   name="titre"
                   class="form-control @error('titre') is-invalid @enderror"
                   value="{{ $titre }}"
                   placeholder="Votre titre" maxlength="100">
            @error('titre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        <div class="col-md-4">
            <label for="grade" class="col-sm-2 col-form-label">Grade</label>
            <input type="text"
                   name="grade"
                   class="form-control @error('grade') is-invalid @enderror"
                   value="{{ $grade}}"
                   placeholder="Votre grade" maxlength="100">
            @error('grade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        <div class="col-md-4">
            <label for="poste" class="col-sm-2 col-form-label">Poste</label>
            <input readonly="" type="text"
                   name="poste"
                   class="form-control @error('poste') is-invalid @enderror"
                   value="{{ $poste}}"
                   placeholder="Votre grade" maxlength="100">
            @error('poste')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        @endif

        <!------------------Fin Partie Forestier--------------------------------------------->

        <!------------------Partie Usager--------------------------------------------->
        @if(user_web() and user_web()->Usager)
        <div class="col-md-4">
            <label for="reference_carte_professionnelle" class="col-sm-12 col-form-label">Référence carte professionnelle</label>
            <input type="text"
                   name="reference_carte_professionnelle"
                   class="form-control @error('reference_carte_professionnelle') is-invalid @enderror"
                   value="{{ $reference_carte_professionnelle }}"
                   placeholder="Référence carte professionnelle" maxlength="100">
            @error('reference_carte_professionnelle')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        <div class="col-md-4">
            <label for="reference_permis_coupe" class="col-sm-8 col-form-label">Référence permis de coupe</label>
            <input type="text"
                   name="reference_permis_coupe"
                   class="form-control @error('reference_permis_coupe') is-invalid @enderror"
                   value="{{ $reference_permis_coupe}}"
                   placeholder="Référence permis de coupe" maxlength="100">
            @error('reference_permis_coupe')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>        
        <div class="col-md-4">
                <?php
                echo Form::label('carte_professionnelle', 'Carte professionnelle');
                echo Form::input('file', 'carte_professionnelle', null, array('class' => 'form-control', 'title' => 'Seuls les documents pdf, image ou word sont autorisés'));
                ?>
        </div>
        <div class="col-md-4">
                <?php
                echo Form::label('permis_coupe', 'Permis de coupe');
                echo Form::input('file', 'permis_coupe', null, array('class' => 'form-control', 'title' => 'Seuls les documents pdf, image ou word sont autorisés'));
                ?>
        </div>
        @endif
        <!------------------Fin Partie Usager--------------------------------------------->


        <!------------------Partie autre Intervenant--------------------------------------------->
        @if(user_web() and user_web()->Intervenant)
        <div class="col-md-4">
            <label for="titre_intervenant" class="col-sm-2 col-form-label">Titre</label>
            <input type="text"
                   name="titre_intervenant"
                   class="form-control @error('titre_intervenant') is-invalid @enderror"
                   value="{{ $titre_intervenant }}"
                   placeholder="Votre titre" maxlength="100">
            @error('titre_intervenant')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>

        <div class="col-md-4">
            <label for="poste_intervenant" class="col-sm-6 col-form-label">Poste Intervenant</label>
            <input readonly type="text"
                   name="poste_intervanent"
                   class="form-control @error('poste_intervenant') is-invalid @enderror"
                   value="{{ $poste_intervenant}}"
                   placeholder="Votre poste" maxlength="100">
            @error('poste_intervenant')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror      
        </div>
        @endif
        <!------------------Fin autre Intervenant--------------------------------------------->


        <div class="col-md-4">
            <label for="password" class="col-sm-6 col-form-label">Mot de passe</label>
            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Mot de passe">                          
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="name" class="col-sm-12 col-form-label">Confirmation mot de passe</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   placeholder="Entrez de nouveau votre mot de passe">
        </div>
    </div>
    <div>
        <br>
        <br>
    </div>
    <!------------------Boutons--------------------------------------------->

    <div class="form-group row">
        <div class="col-md-4">
        </div>
        <div>       
            <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>        
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <a class="btn btn-danger" href='{{ route('home') }}'>Annuler/Retour</a>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</form>



