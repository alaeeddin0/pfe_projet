<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   
   <link rel="icon" type="logo.png" href="logo.png">
   
   <style>
      .container {
         flex-wrap: wrap;
         justify-content: center; /* Centrer les cartes */
         gap: 20px;
      }

      .box-container {
         width: 100%; /* Réduire la largeur du conteneur */
         margin: 0 auto;
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between; /* Espacement égal entre les cartes */
         gap: 20px; /* Espacement entre les cartes */
      }

      .box {
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 10px;
         padding: 20px;
       
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         transition: transform 0.3s ease;
      }

      .box:hover {
         transform: translateY(-5px);
      }

      .box i {
         font-size: 36px;
         color: #333;
      }

      .box h2 {
         font-size: 24px;
         margin-bottom: 10px;
      }

      .box p {
         font-size: 16px;
         color: #666;
      }

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
</head>
<body>
   <header class="header">
      <section class="flex">
         <a href="{{ route('professeur.home') }}" class="logo">EBK</a>
         <form action="{{ route('chercherProf') }}" method="post" class="search-form">
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
   <section class="home-grid">
      <div class="box-container">
      </div>
   </section>
   <section class="courses" >
      <div class="box-container" style="margin-top:50px;">
         <div class="box document">
            <i class="fas fa-file-alt"></i>
            <h2>Documents</h2>
            <p>Ajouter vos documents (Cours, TD, TP)</p>
            <a href="{{ route('professeur.gestioncours') }}" class="btn "style="background-color:#512da8;">Gestion des Documents</a>
         </div>
         <div class="box note">
            <i class="fas fa-sticky-note"></i>
            <h2>Notes</h2>
            <p>Ajouter des notes</p>
            <a href="{{ route('professeur.gestionnotes') }}"class="btn "style="background-color:#512da8;">Gestion des Notes</a>
         </div>
         <div class="box planning">
            <i class="far fa-calendar-alt"></i>
            <h2>Planning</h2>
            <p>Ajouter l'horaire d'examen</p>
            <a href="{{ route('professeur.gestionexam') }}" class="btn "style="background-color:#512da8;">Gestion du Planning</a>
         </div>
         </div>
   </section>
         <div class="box rapport" style="margin-left:35%;margin-right:35%;">
            <i class="fas fa-chart-bar"></i>
            <h2>Rapports</h2>
            <p>Générer vos rapports</p>
            <a href="{{ route('professeur.gestionrapport') }}" class="btn "style="background-color:#512da8;" >Gestion des Rapports</a>
         </div>

   <!-- custom js file link  -->
   <script src="{{ asset('js/scriptadmin.js') }}"></script>
</body>
</html>
