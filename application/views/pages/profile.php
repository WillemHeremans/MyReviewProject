<link rel="stylesheet" href="./css/<?php echo $title; ?>.css">


 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <!--POLICE GOOGLE FONT-->
  <title>PROFIL</title>
</head>
<body>

  <div class="main-container">

<!--***************************************************************************************************************************************************
                                                                    AVATAR
   ************************************************************************************************************************************************* -->

      <section id="avatar">

        <img src="img/avatar.png" alt="">

      </section>


<!--***************************************************************************************************************************************************
                                                                     PSEUDO
****************************************************************************************************************************************************-->

      <section id="pseudo">
        <h1>hello</h1>
        <p> 30 ans masculin</p>
      </section>





<!--***************************************************************************************************************************************************
                                                                 BAR DE RECHERCHE
   ************************************************************************************************************************************************** -->



<div class="search-wrapper">
    <div class="input-holder">
        <input type="text" class="search-input" placeholder="Type to search" />
        <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
    </div>
    <span class="close" onclick="searchToggle(this, event);"></span>
</div>


      

  <!--***************************************************************************************************************************************************
                                                                      FAVORIT
*****************************************************************************************************************************************************-->


      <div id="favorit">
<div class="miniFavorit">
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
</div>

<div class="miniFavorit">
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
</div>


</div>

<div id="noFavorit">


<div class="miniNoFavorit">
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
</div>

<div class="miniNoFavorit">
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
        <div class="movie"><img src="img/tomb.jpg" alt=""></div>
</div>

      </div>


  </div>

<form action="http://localhost/MyReviewProject/">
    <input type="submit" value="Go Home" />
</form>

<script src="./js/<?php echo $title; ?>.js"></script>