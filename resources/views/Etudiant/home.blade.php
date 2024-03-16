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
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="images/logo.png" href="images/logo.png">
</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="{{ route('Etudiant.home') }}" class="logo">EBK</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search cours..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="{{ asset('images/AVATARETUDIANT.jpg') }}" class="image" alt="">
         <h3 class="name"></h3>
         <p class="role">Etudiant</p>
         <a href="{{ route('Etudiant.profileetudiant') }}" class="btn">view profile</a>
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

<


<section class="home-grid">
   <div  class="box_kbir">
      <div class="box"  style="width: 300px; text-align:center;">
         <h3 class="title">Dernier cours ajouté</h3>
         <div class="xxx">
            @if($dernierCours)
               <p>{{ $dernierCours->nom_cours }}</p>
            @else
               <p>Aucun cours ajouté récemment</p>
            @endif
         </div>
      </div>

      <div class="box"  style="width: 300px;text-align:center;">
         <h3 class="title">Dernière note ajoutée</h3>
         <div class="xxx">
            @if($derniereNote)
               <p>{{ $derniereNote->matiere }}: {{ $derniereNote->note }}</p>
            @else
               <p>Aucune note ajoutée récemment</p>
            @endif
         </div>
      </div>
      <div class="box" style="width: 300px;text-align:center;" >
         <h3 class="title">Dernier examen ajouté</h3>
         <div class="xxx">
            @if($dernierExamen)
               <p>{{ $dernierExamen->matiere }} - Date: {{ $dernierExamen->date }}</p>
            @else
               <p>Aucun examen ajouté récemment</p>
            @endif
         </div>
      </div>
      </div>
</section>
   <section class="courses" >
      <div class="box-container" style="margin-top:-10px;">
         <div class="box document" style="width: 400px; margin-left: 10px">
            <i class="fas fa-file-alt"></i>
            <h2>Documents</h2>
            <p>Ajouter vos documents (Cours, TD, TP)</p>
            <a href="{{ route('Etudiant.cours') }}" class="btn btn-primary" style="background-color: #512da8;">Gestion des Documents</a>
         </div>
         <div class="box note" style="width: 400px; height: 200px; margin-left: 10px" >
            <i class="fas fa-sticky-note"></i>
            <h2>Notes</h2>
            <p>Ajouter des notes</p>
            <a href="{{ route('Etudiant.notes') }}" class="btn btn-primary" style="background-color: #512da8;">Gestion des Notes</a>
         </div>
         <div class="box planning" style="width: 400px; margin-left: 250px;">
            <i class="far fa-calendar-alt"></i>
            <h2>Planning</h2>
            <p>Ajouter l'horaire d'examen</p>
            <a href="{{ route('Etudiant.planing') }}" class="btn btn-primary" style="background-color: #512da8;">Gestion du Planning</a>
         </div>
      </div>
   </section>
   <style>
      .container {
         flex-wrap: wrap;
         justify-content: center; /* Centrer les cartes */
         gap: 20px;
      }

      .box-container {
         width: 80%; /* Réduire la largeur du conteneur */
         margin: 0 auto;
         flex-wrap: wrap;
         justify-content: space-between; /* Espacement égal entre les cartes */
      }

      .card {
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 20px; /* Augmenter le rembourrage */
         width: calc(50% - 20px); /* Largeur de 50% moins les marges */
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .card img {
         width: 100%; /* Pour s'assurer que l'image occupe toute la largeur de la carte */
         height: 200px; /* Hauteur de l'image (ajustez selon vos besoins) */
         object-fit: cover; /* Pour conserver les proportions de l'image */
         border-radius: 5px;
      }

      /* Styles pour les cartes */
      .box {
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 10px;
         padding: 20px;
         width: calc(50% - 40px); /* Largeur de 50% avec marge de 20px de chaque côté */
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         transition: transform 0.3s ease;
      }

      .box:hover {
         transform: translateY(-5px);
      }

      /* Styles pour les icônes */
      .box i {
         font-size: 36px;
         color: #333;
      }

      /* Styles pour les titres */
      .box h2 {
         font-size: 24px;
         margin-bottom: 10px;
      }

      /* Styles pour les descriptions */
      .box p {
         font-size: 16px;
         color: #666;
      }

      /* Styles pour les boutons */
      .box .btn {
         display: inline-block;
         padding: 10px 20px;
         margin-top: 15px;
         background-color: #007bff;
         color: #fff;
         text-decoration: none;
         border-radius: 5px;
         transition: background-color 0.3s ease;
      }

      .box .btn:hover {
         background-color: #0056b3;
      }
    
   </style>
<script src="js/script.js"></script>
<script src="{{ asset('js/scriptadmin.js') }}"></script>
   
</body>
</html>