<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/cssajouter.css') }}" rel="stylesheet">

    <link rel="icon" type="logo.png" href="logo.png">
</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="{{ route('admin.home') }}" class="logo">EBK</a>

      <form action="{{ route('chercher') }}" method="post" class="search-form">
         @csrf
         <input type="text" name="search_box" required placeholder="chercher etudiant ou prof..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
      <img src="{{ asset('images/avataradmin.jpg') }}" class="image" alt="">
         <h3 class="name"></h3>
         <p class="role">ADMIN</p>
         <a href="{{ route('admin.profile') }}" class="btn">view profile</a>
         <li class="nav-item dropdown" style="list-style: none;">
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
   <img src="{{ asset('images/logo.png') }}" class="image" alt="">
      <h3 class="name"></h3>
      <p class="role"></p>
      <a href="{{ route('admin.profile') }}" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="{{ route('admin.home') }}"><i class="fas fa-home"></i><span>HOME</span></a>
      <a href="{{ route('admin.gestionetudiant') }}"><i class="fas fa-chalkboard-user"></i><span>Etudiants</span></a>
      <a href="{{ route('admin.gestionprofesseur') }}"><i class="fas fa-chalkboard-user"></i><span>Professeurs</span></a>
      <a href="{{ route('admin.DemandeInscription') }}"><i class="fas fa-chalkboard-user"></i><span>Demande d'Inscription</span></a>

   </nav>

</div>


<div class="container">


        <h2>Ajouter un Professeur</h2>

        @if (session('status'))
            <div class="alert success">
           Professeur ajouter avec success
            </div>
        @endif

        <ul>
        @foreach ($errors->all() as $errors)
        <li class="alert alert-danger"></li> {{$errors}}</li>
        @endforeach


        </ul>

        <form action="/ajouterprofesseur/traitement" method="POST">

            @csrf

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <button type="submit">Ajouter un Professeur</button>
                <a href="{{ route('admin.gestionprofesseur') }}" class="btn-back">Revenir à la liste des Professeur</a>
            </div>
        </form>
    </div>

<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>

   
</body>
</html>