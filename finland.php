<?php include("header.php"); ?>


    <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container" style=" display: flex; justify-content: center; align-items: center; gap: 50px;">
         <a href="index.html"><img src="images/TRIP-removebg-preview.png" width="200px" height="50px"> </a> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="booknow.html">Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="booknow.html">Packages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Gallary</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">About</a>
              </li>
             
            </ul>
            <form class="d-flex">
              <button class="btn btn-primary" type="button"><a href="login.html">Sign in</a></button>
            </form>
          </div>
        </div>
      </nav>
    <!-- Navbar End -->

    <!-- about the city will satrt here for all pages-->

    
    <h1 style="padding-top: 80px; text-align: center; color: rgb(255, 176, 6);"> <b>FINLAND </b> </h1>
    <br>
    <div style="display: flex; flex-direction: row; justify-content: space-evenly;">
      <div style="margin-right: 10px; margin-left: 20px;"> <p>From the vibrant art-filled cities of Helsinki and Turku to the depths of the boreal forests and the thinly inhabited outer archipelago, Finland offers a wealth of attractions and beautiful places to visit.It's also a relatively unknown corner of Europe, likely because it is so far from the mainstream tourist routes, but the country's many cultural and historical sites add to the unspoiled natural surroundings to make it an ideal destination.<br>
        Finland's lakes, fells, rivers, and vast wild areas, along with the certainty of snow in the winter make it a Nordic playground for both winter and summer activities.Helsinki is the main point of entry for most visitors to Finland. The busy Baltic port is where you'll find the most important museums, as well as architecture by some of the greatest Finnish architects, and numerous things to do.<br>
        Within easy reach of Helsinki are the charming smaller cities of Turku and Porvoo. But it would be a shame to confine a trip only to the Baltic coast, when so much beautiful open countryside beckons. To the west lie the Finnish lakes, and in the north is the vast area beyond the Arctic Circle, home of the midnight sun, northern lights, and some of Europe's best winter sports.Winter or summer, Finland offers plenty of things to do. Plan your trip with our list of the top attractions and places to visit in Finland.
      </p>
      </div>
    <div style="margin-right: 20px; margin-left: 10px;" >
         <div style="display: flex; flex-direction: column; justify-content: space-between; gap: 20px;" ><img  style=" width: 300px; height: 200px;" src="imgpage/fn_bag1.jpg"> <img  style=" width: 300px; height: 200px;" src="imgpage/fn_bag2.jpg"> 
        </div>
        
    </div>
    
  </div>
  <br style="padding: 50px;">
  <div  style="display: flex; justify-content: center; align-items: center;">
    <form action="booknow.html">
      <button type="submit" class="bt">BOOK TOURS</button>
    </form>
</div>


<br>

<!-- galary for the pages  -->
<section class="gallary" id="gallary">
  <div class="container">

    <div class="main-txt">
      <h1 style="color: rgb(245, 194, 9);" >Tours in Finland</h1>
    </div>

    <div class="row" style="margin-top: 30px;">
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn1.jpg" alt="" height="230px">
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn2.jpg" alt="" height="230px">
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn3.jpg" alt="" height="230px">
        </div>
      </div>
    </div>


    <div class="row" style="margin-top: 30px;">
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn4.jpg" alt="" height="230px">
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn5.jpg" alt="" height="230px">
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="imgpage/fn6.jpg" alt="" height="230px">
        </div>
      </div>
    </div>

    
  </div>
</section>









    <!-- about the city will satrt here for all pages-->
    
    
    <?php include("footer.php"); ?>