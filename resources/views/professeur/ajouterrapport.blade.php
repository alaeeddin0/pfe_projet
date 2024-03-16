<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ajouter Rapport</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/cssajouter.css') }}" rel="stylesheet">
    <link rel="icon" type="logo.png" href="logo.png">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>



</head>
<body>

<header class="header">
   
<section class="flex">

<a href="{{ route('professeur.home') }}" class="logo">EBK</a>

<form action="{{ route('chercherprofrapports') }}" method="post" class="search-form">
   @csrf
   <input type="text" name="search_box" required placeholder="chercher prof " maxlength="100">
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
   <p class="role">PROFESSEUR</p>
   <a href="{{ route('professeur.profile') }}" class="btn">voir profile</a>
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


        <h2>Ajouter un rapport </h2>

        @if (session('status'))
            <div class="alert success">
            Rapport ajouté avec succès
            </div>
        @endif

        <ul>
        @foreach ($errors->all() as $errors)
        <li class="alert alert-danger"></li> {{$errors}}</li>
        @endforeach


        </ul>

        <form action="{{ route('ajouterrapport.traitement') }}" method="POST">

            @csrf

            <div class="form-group">
    <label for="id_professeur">Professeur</label>
    <input type="text" id="id_professeur" name="id_professeur" value="{{ Auth::user()->nom_complet }}" readonly>
      </div>

            <div class="form-group">
                <label for="note">Rapport</label>
                <textarea id="rapport" name="rapport"></textarea>
               </div>
            <div class="form-group">
                <button type="submit">Ajouter une Rapport</button>
                <a href="{{ route('professeur.gestionrapport') }}" class="btn-back">Revenir à la liste des rapport</a>
            </div>
        </form>
    


<script src="{{ asset('js/scriptadmin.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#rapport'))
        .then(editor => {
            console.log(editor);
            console.log(editor.getData()); // Cela récupère les données du rapport lorsque le CKEditor est prêt
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>

</html>