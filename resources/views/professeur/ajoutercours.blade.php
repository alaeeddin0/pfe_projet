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
    <style>
      .form-check-inline {
    display: inline-block;
    margin-right: 10px; /* Pour ajouter un espace entre les boutons radio */
}

    </style>
</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="{{ route('professeur.home') }}" class="logo">EBK</a>

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


        <h2>Ajouter un Document</h2>

        @if (session('status'))
            <div class="alert success">
           Cours ajouté avec succès
            </div>
        @endif

        <ul>
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        </ul>

        <form action="/ajoutercours/traitement" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom_cours">Nom du Document:</label>
                <input type="text" id="nom_cours" name="nom_cours">
            </div>
            <div class="form-group">
    <label>Type de document:</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" id="cours" value="cours" checked>
        <label class="form-check-label" for="cours">Cours</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" id="tp" value="tp">
        <label class="form-check-label" for="tp">TP</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" id="td" value="td">
        <label class="form-check-label" for="td">TD</label>
    </div>
</div>
            <div class="form-group">
                <label for="matiere">Matiere:</label>
                <input type="text" id="matiere" name="matiere">
            </div>
            

            <div class="form-group">
                <label for="professeur">professeur:</label>
                <input type="text" id="professeur" name="professeur" value="{{ auth()->user()->nom_complet}}" readonly>
            </div>
          
          
            <div class="form-group">
                <label for="file_path">lien du Document :</label>
                <input type="text" id="file_path" name="file_path">
            </div>
            <div class="form-group">
                <button type="submit">Ajouter un Document</button>
                <a href="{{ route('professeur.gestioncours') }}" class="btn-back">Revenir à la liste des Documents</a>
            </div>
        </form>
    </div>

<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>

   
</body>
</html>
