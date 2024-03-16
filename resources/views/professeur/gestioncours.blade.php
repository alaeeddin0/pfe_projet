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

      <form action="{{ route('chercherprofcours') }}" method="post" class="search-form">
   @csrf
   <input type="text" name="search_box" required placeholder="chercher cours " maxlength="100">
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
         <p class="role">Professeur</p>
         <a href="{{ route('professeur.profile') }}"  class="btn">view profile</a>
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
      <a href="{{ route('professeur.profile') }}" class="btn">voir profile</a>
   </div>

   <nav class="navbar">
   <a href="{{ route('professeur.home') }}"><i class="fas fa-home"></i><span>Accueil</span></a>
   <a href="{{ route('professeur.gestioncours') }}"><i class="fas fa-chalkboard-user"></i><span>Document</span></a>
      <a href="{{ route('professeur.gestionnotes') }}"><i class="fas fa-chalkboard-user"></i><span>Notes</span></a>
      <a href="{{ route('professeur.gestionexam') }}"><i class="fas fa-chalkboard-user"></i><span>Planning</span></a>
      <a href="{{ route('professeur.gestionrapport') }}"><i class="fas fa-chalkboard-user"></i><span>Rapport</span></a>
   </nav>

</div>
<button class="btn5" onclick="window.location='{{ route('professeur.ajoutercours') }}'">Ajouter un Document</button>
 
@if (session('status'))
            <div class="alert1 success">
           mise a jour avec success
            </div>
 @elseif  (session('status1'))
<div class="alert1 success">
           Cours supprimer avec success
            </div>
@endif

<table>
    <thead>
        <tr>
            <th>Nom du Document</th>
            <th>type du document</th>
            <th>Matiere</th>
            <th>Nom du Professeur</th>
            <th>lien du document</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($cours as $cour)
        <tr>
            <td>{{ $cour->nom_cours}}</td>
            <td>{{ $cour->type}}</td>
            <td>{{ $cour->matiere}}</td>
            <td>{{ $cour->professeur}}</td>
            <td><a href="{{ asset($cour->file_path) }}">{{ $cour->file_path }}</a></td>
                      
        </tr>
        @endforeach
        <!-- Autres lignes de tableau -->
    </tbody>
</table>

<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>


   
</body>
</html>