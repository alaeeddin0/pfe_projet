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
   <link href="{{ asset('css/etudiantadmin.css') }}" rel="stylesheet">
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="images/logo.png" href="images/logo.png">
</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">EBK</a>

      <form action="{{ route('chercheretudiantexams') }}" method="post" class="search-form">
         @csrf
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
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
         <p class="role"></p>
         <a href="{{ route('Etudiant.profileetudiant') }}" class="btn">view profile</a>
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
      <a href="{{ route('Etudiant.profileetudiant') }}" class="btn">view profile</a>
   </div>

   <nav class="navbar">
   <a href="{{ route('Etudiant.home') }}"><i class="fas fa-home"></i><span>home</span></a>
   <a href="{{ route('Etudiant.cours') }}" ><i class="fas fa-question"></i><span>Document</span></a>
      <a href="{{ route('Etudiant.notes') }}"><i class="fas fa-graduation-cap"></i>  <span>Notes</span></a>
      <a href="{{ route('Etudiant.planing') }}"><i class="fas fa-chalkboard-user"></i><span>Planning</span></a>
   </nav>

</div>
<table>
  <tr>
    <th><span>Matiere</span></th>
    <th>Date</th>
    <th>Heure</th>
  </tr>
  <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->matiere }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->heure }}</td>
                </tr>
            @endforeach
        </tbody>
 
 
  
</table>

<!-- custom js file link  -->
<script src="{{ asset('js/scriptadmin.js') }}"></script>

   
</body>
</html>