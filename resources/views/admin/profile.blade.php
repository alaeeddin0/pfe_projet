<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  
   <!-- custom css file link  -->
   <link href="{{ asset('css/cssadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/cssajouter.css') }}" rel="stylesheet">
   <link href="{{ asset('css/profil.css') }}" rel="stylesheet"> 

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
              <p class="role"></p>
              <a href="{{ route('admin.profile') }}" class="btn">view profile</a>
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
        </div>
     
        <nav class="navbar">
        <a href="{{ route('admin.home') }}"><i class="fas fa-home"></i><span>HOME</span></a>
      <a href="{{ route('admin.gestionetudiant') }}"><i class="fas fa-chalkboard-user"></i><span>Etudiants</span></a>
      <a href="{{ route('admin.gestionprofesseur') }}"><i class="fas fa-chalkboard-user"></i><span>Professeurs</span></a>
        </nav>
     
     </div>


     <section class="user-profile">

     <h1 class="heading" style="margin-left: 22%;">Your Profile</h1>

<div class="propro">
    <div class="info" style="margin-left: 22%; margin-right:0%; height:350px;">
        <div class="profile">
            <div class="circle">
                <img id="profile-image" src="{{ asset('images/avataradmin.jpg') }}" alt="Profile Image">
                <input type="file" name="image" id="profile-image-upload">

            </div>
            <div class="profile-info">
                <p><strong style="color:#120e5b">Nom:</strong> {{ Auth::user()->nom }}</p>
                <p><strong style="color:#120e5b">Prénom:</strong> {{ Auth::user()->prenom }}</p>
                <p><strong style="color:#120e5b">Nom d'utilisateur:</strong> {{ Auth::user()->username }}</p>
                <p><strong style="color:#120e5b">Email:</strong> {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</div>
</form>
<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>


   
</body>
</html>