<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>chercher</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">


    <link rel="icon" type="logo.png" href="logo.png">
</head>
<body>
<header class="header">
   <section class="flex">
      <a href="{{ route('professeur.home') }}" class="logo">EBK</a>
      <form action="{{ route('chercherprofexams') }}" method="post" class="search-form">
         @csrf
         <input type="text" name="search_box" required placeholder="chercher exams" maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
      <div class="profile">
      <img src="{{ asset('images/avatarprof.jpg') }}" class="image" alt="">
         <h3 class="name"></h3>
         <p class="role">ADMIN</p>
         <a href="{{ route('professeur.profile') }}" class="btn">view profile</a>
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
      <a href="{{ route('professeur.profile') }}" class="btn">view profile</a>
   </div>
   <nav class="navbar">
      <a href="{{ route('professeur.home') }}"><i class="fas fa-home"></i><span>Accueil</span></a>
      <a href="{{ route('professeur.gestioncours') }}"><i class="fas fa-chalkboard-user"></i><span>Document</span></a>
      <a href="{{ route('professeur.gestionnotes') }}"><i class="fas fa-chalkboard-user"></i><span>Notes</span></a>
      <a href="{{ route('Etudiant.planing') }}"><i class="fas fa-chalkboard-user"></i><span>Planning</span></a>
      <a href="{{ route('professeur.gestionrapport') }}"><i class="fas fa-chalkboard-user"></i><span>Rapport</span></a>
   </nav>
</div>
<table class="tablesearch">
    <thead>
        <tr>
            <th>nom du matiere</th>
            <th>date</th>
            <th>heure</th>
         </tr>
      </thead>
    <tbody>
        @foreach($exams as $ex)
        <tr>
        <td>{{ $ex->matiere}}</td>
            <td>{{ $ex->date}}</td>
            <td>{{ $ex->heure}}</td>
           
           
        </tr>
        @endforeach
</tbody>
</table>
<script src="{{ asset('js/scriptadmin.js') }}"></script>
</body>
</html>