<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/cssajouter.css') }}" rel="stylesheet">
   
    <link rel="icon" type="logo.png" href="logo.png">
</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">EBK</a>

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
         <a href="{{ route('admin.profile') }}"  class="btn">view profile</a>
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


<button class="btn5" onclick="window.location='{{ route('admin.ajouterprofesseur') }}'">Ajouter Un Professeur</button>
   

@if (session('status'))
            <div class="alert1 success">
           mise a jour avec success
            </div>
 @elseif  (session('status1'))
<div class="alert1 success">
           Professeur supprimer avec success
            </div>
@endif
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email</th>
            <th>username</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professeurs as $professeur)
        <tr>
            <td>{{ $professeur->nom}}</td>
            <td>{{ $professeur->prenom}}</td>
            <td>{{ $professeur->email}}</td>
            <td>{{ $professeur->username}}</td>
            <td>
                
           
            <button onclick="window.location='/admin/updateprofesseur/{{ $professeur->id }}'" class="btn2">Mettre à jour</button>
            <button onclick="window.location='/admin/deleteprofesseur/{{ $professeur->id }}'" class="btn3">supprimer</button>
            </td>
        </tr>
        @endforeach
        <!-- Autres lignes de tableau -->
    </tbody>
</table>


<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>

   
</body>
</html>