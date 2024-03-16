<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="{{ asset('css/log.css') }}" rel="stylesheet">
    <title>EBK SCHOOL</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            
        <form  method="post" action="{{ route('inscription') }}">
    @csrf
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <input type="text" id="nom" name="nom" placeholder="Nom" ><br>
    <input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
    <input type="email" id="email" name="email" placeholder="Email"><br>
    <input type="text" id="username" name="username" placeholder="Nom d'utilisateur"><br>
    <input type="password" id="password" name="password" placeholder="Mot de passe"><br><br>
    
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

        </div>
        <div class="form-container sign-in">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <h1>Connexion</h1>
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <button type="submit" class="btn btn-primary">Connexion</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Mot de passe oublié?') }}</a>
                                @endif
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenue de retour</h1>
                    <p>Connectez-vous pour accéder à votre compte</p>
                    <button class="hidden" id="login">Connexion</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bonjour cher étudiant</h1>
                    <p>Merci de remplir le formulaire à côté pour vous inscrire</p>
                    <button class="hidden" id="register">Inscription</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="{{ asset('js/log.js') }}"></script>
  
</body>

</html>