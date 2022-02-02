<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/css-reset.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;500;600&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <title>Gaffer: Home</title>
  </head>
  <body>
    <div id="sidenav1" class="side-nav">
      <button id="close-side" onclick="closeSide()" class="button-unset right" style="font-size: 2.5rem; margin-bottom: 2rem;">
        <span class="fa fa-close white"></span>
      </button>
      <div class="side-menu">
        <a class="no-decor upcase">now playing</a>
        <a class="no-decor upcase">my catalogue</a>
        <a class="no-decor upcase">log out</a>
      </div>
    </div>
    <nav class="c-nav">
      <div class="c-container">
        <button id="toggle-side" onclick="openSide()" class="side-button"><span class="fa fa-bars fa-fw"></span></button>
        <a href="<?php base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>asset/img/logo 1.png"></a>
        <div class="nav-menu">
          <a href="<?php base_url(); ?>home/review">create review</a>
          <a href="<?php base_url(); ?>home/movies">add movies</a>
          <a class="c-button-danger" href="<?php echo base_url() ?>home/logout">logout</a>
        </div>
        <button class="user-p">
          <div class="user-img">
            <img src="<?php echo base_url(); ?>asset/<?php echo $userdata[0]->profilep ?>">
          </div>
          <span><?php echo $userdata[0]->username; ?></span>
        </button>
      </div>
    </nav>
    <div class="hero-container mb">
      <div class="c-hero">
        <img src="<?php echo base_url(); ?>asset/img/pexels-cottonbro-3692639 2 - Copy.png">
        <div class="hero-cap">
          <h2 class="q-light">Hello There!</h2>
          <h1 class="xl">WELCOME ABOARD</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            A neque cumque hic non ad itaque odit aut delectus, 
            voluptates quisquam enim ex est fugit illo accusamus sit exercitationem 
            magni sunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. A neque 
            cumque hic non ad itaque odit aut delectus.
          </p>
        </div>
      </div>
    </div>
    <div class="c-container mb">
      <div class="flex-row">
        <div class="flex-col main-row w-sm-100 w-md-100 w-lg-66">
          <div class="main-filter mb">
            <span class="left mr">Filter by : </span>
            <div class="group-sort">
              <span class="sort-item filter review capital">review</span>
            </div>
            <button id="toggle1" onclick="dropD()" class="sort-button my-auto">
              <span class="fa fa-sort-amount-desc"></span>
            </button>
            <div id="sort1" class="sort-button-list">
              <a class="no-decor capital" data-value="review">review</a>
            </div>
          </div>
          <?php foreach($review as $rev) { ?>
          <div class="filter review box-review mb">
            <div class="thumbnail-review no-shrink">
              <img class="thumb-img" src="<?php base_url(); ?>asset/img/<?php echo $rev->screenshot; ?>">
              <div class="thumb-title">
                <h6 class="q-light upcase"><?php echo $rev->direktor; ?>, <?php echo $rev->tahun; ?></h6>
                <h1><?php echo $rev->judul_film; ?></h1>
              </div>
            </div>
            <div class="desc-review">
              <a href="#"><div class="user-detail">
                <img class="ud-img" src="<?php base_url(); ?>asset/<?php echo $rev->profilep; ?>">
                <div class="user-dname">
                  <span class="d-regular capital"><?php echo $rev->username; ?></span><br>
                  <span class="caption capital"><?php echo $rev->role; ?></span>
                </div>
              </div></a>
              <div class="user-review">
                <p><?php echo $rev->review; ?></p>
              </div>
              <div class="button-row grow mb">
                <?php if($rev->edited) {?>
                <div class="mr-auto caption capital w-66" style="font-size: 1rem;">
                  <span>edited</span>
                </div>
                <?php } ?>
                <button class="ml-auto c-button-action mr">
                  <span class="fa fa-heart"></span> <?php echo $rev->likes ?>
                </button>
                <?php if($userdata[0]->id_user === $rev->id_user) {?>
                <a class="c-button-direct white no-decor t-center" href="<?php echo base_url(); ?>/home/review_edit/<?php echo $rev->id_review ?>">
                  <span class="fa fa-gear"></span>
                </a>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="flex-col side-view w-lg-33 grow">
          <div class="side-friend mb">
            <h3 class="mx-auto mb">Users Recommendation</h3>
            <div class="friend-list mt">
              <?php $i = 0; ?>
              <?php foreach($users as $us) {?>
              <?php if($i>=5)break; ?>
              <div class="f-item">
                <div class="user-detail">
                  <img class="ud-img" src="<?php base_url(); ?>asset/<?php echo $us->profilep ?>">
                  <div class="user-dname">
                    <span class="d-regular capital"><?php echo $us->username ?></span><br>
                    <span class="caption capital"><?php echo $us->role ?></span>
                  </div>
                </div>
              </div>
              <?php $i++; ?>
              <?php } ?>
            </div>
            <div class="side-button-row">
              <div class="button-row mb">
                <button class="c-button-direct">see more</button>
              </div>
            </div>
          </div>
          <div class="side-movie mb">
            <h3 class="mx-auto mb">Trending Movies</h3>
            <div class="movie-list mb">
              <?php $in =0; ?>
              <?php foreach($movies as $mov) { ?>
              <?php if($in>=4)break; ?>
              <div class="m-item">
                <div class="thumb no-shrink">
                  <img src="<?php echo base_url(); ?>asset/img/<?php echo $mov->poster ?>">
                </div>
                <div class="m-item-desc">
                  <h5 class="ellipsis capital mb-0"><?php echo $mov->judul_film ?></h5>
                  <span style="font-weight:600" class="caption mb capital"><?php echo $mov->direktor ?></span>
                  <p><?php echo $mov->sinopsis ?></p>
                </div>
              </div>
              <?php $in++; ?>
              <?php } ?>
            </div>
            <div class="side-button-row">
              <div class="button-row mb">
                <button class="c-button-direct">see more</button>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="mb">
              <div class="left w-50 block">
                <a class="caption upcase">about us<br></a>
                <a class="caption upcase">help<br></a>
                <a class="caption upcase">privacy policy<br></a>
                <a class="caption upcase">content policy<br></a>
              </div>
              <div class="right w-50 block">
                <a class="caption upcase">website ambassador<br></a>
                <a class="caption upcase">career<br></a>
                <a class="caption upcase">content creator<br></a>
                <a class="caption upcase">sponsorship<br></a>
                <a class="caption upcase">patent rights<br></a>
              </div>
            </div>
            <div class="mt caption capital w-100" style="display: flex; justify-content: center; font-size: 0.8rem;">
              <span>© 2020 gaffer.id, all rights reserved.</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-3.5.1.min.js"></script>
    <!-- <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script> -->

    <script>
        $(function() {
          $("#toggle1").click(function(){
            $("#sort1").slideToggle(10); 
          });
        });
      //  $("body").click(function(e){
      //      if ($(e.target).closest("#sort1").length===0) {
      //        $("#sort1").hide();
      //      }
      //  });

       (function($) {
         $.fn.cFilter=function(selector){
           this.click(function() {
             var nilai = $(this).attr('data-value');
             if (nilai=="all") {
               $('.filter').fadeIn();
             } else {
               $('.filter').not('.'+nilai).fadeOut();
               $('.filter').filter('.'+nilai).fadeIn();
             }
           });
         }
       }(jQuery));

       $('.sort-button-list a').cFilter();
    </script>
    <script type="text/javascript">
      function openSide() {
        document.getElementById('sidenav1').classList.toggle('open-side');
      }
      function closeSide() {
        document.getElementById('sidenav1').classList.remove('open-side');
      }
        // function dropD(){
        //   document.getElementById('sort1').classList.toggle('show');
        // }

      //  window.onclick = function(event) {
      //     if (!event.target.matches('.sort-button')) {
      //       var dd = document.getElementsByClassName('sort-button-list');
      //       var index;
      //       for (index = 0; index < dd.length; index++) {
      //         var dd2 = dd[index];
      //         if (dd2.classList.contains('show')) {
      //           dd2.classList.remove('show');
      //         }
      //       }
      //     }
      //   }
    </script>
  </body>
</html>
