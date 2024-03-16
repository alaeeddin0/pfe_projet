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

      <a href="{{ route('professeur.home') }}" class="logo">EBK</a>

      <form action="{{ route('chercherprofexams') }}" method="post" class="search-form">
   @csrf
   <input type="text" name="search_box" required placeholder="chercher exam " maxlength="100">
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
         <a href="{{ route('professeur.profile') }}" class="btn">voir profile</a>
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
      <a href="{{ route('Etudiant.planing') }}"><i class="fas fa-chalkboard-user"></i><span>Planning</span></a>
      <a href="{{ route('professeur.gestionrapport') }}"><i class="fas fa-chalkboard-user"></i><span>Rapport</span></a>
   </nav>

</div>


<div class="container">


        <h2>Ajouter un planing</h2>

        @if (session('status'))
            <div class="alert success">
           Cours ajouté avec succès
            </div>
        @endif

        <ul>
        @foreach ($errors->all() as $errors)
        <li class="alert alert-danger"></li> {{$errors}}</li>
        @endforeach


        </ul>

        <form action="{{ route('professeur.ajouterexamform') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="matiere">Matiere:</label>
                <input type="text" id="matiere" name="matiere">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="Date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="heure">Heure:</label>
                <input type="time" id="heure" name="heure">
    </div>
            
            <div class="form-group">
                <button type="submit">Ajouter</button>
                <a href="{{ route('professeur.gestionexam') }}" class="btn-back">Revenir à la liste des exams</a>
            </div>
        </form>
    </div>

<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>

   
</body>
</html>