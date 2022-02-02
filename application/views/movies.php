<?php
  if (isset($msg)) {
    $msg=$msg;
  } else {
    $msg = null;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/css-reset.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <title>Gaffer: Movie</title>
  </head>
  <style>
    .h-100 {
      height:50px;
    }
    .input-f { 
      min-height: 35px;
    }
    input[type='file'] {
      display: none;
    }
    .red{background-color: #f44336;}
    .green{background-color: rgb(62, 194, 62);}
    .none{display:none;}
    .alert {
      padding: 3%;
      color: white;
      margin-bottom: 15px;
    }
    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 2rem;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }
  </style>
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
        <a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>asset/img/logo 1.png"></a>
        <div class="nav-menu">
          <a href="<?php echo base_url() ?>home/review">create review</a>
          <a class="c-button-direct" href="#">add movies</a>
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
          <h1 class="xl">WELCOME TO MOVIE SUBMISSION</h1>
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
          <h1 class="l mb">ADD A MOVIE</h1>
          <div class="alert red <?php echo ($msg==1)?'':'none';?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Error Uploading Poster
          </div>
          <div class="alert red <?php echo ($msg==2)?'':'none';?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Error Uploading Screenshot
          </div>
          <div class="alert red <?php echo ($msg==3)?'':'none';?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            gatau, lu bego kali
          </div>
          <form enctype="multipart/form-data" class="flex-col flex-start" method="post" action="<?php echo base_url(); ?>home/addmovies">
            <label>Movie name</label>
              <input name="judul-film" class="input-f w-50" type="text" required>
            <label>Director</label>
              <input name="direktor" class="input-f w-50" type="text" required>
            <label>Year Release</label>
              <input name="tahun" class="input-f w-25 mb" type="text" maxlength="4" required>
            <div class="flex-row mb">
              <label class="c-button-direct mr" for="post-1">Poster</label>
              <span id="poster-selected"></span>
              <input name="poster" id="post-1" class="" type="file" required>
            </div>
            <div class="flex-row mb">
              <label class="c-button-direct mr" for="ss-1">Screenshot</label>
              <span id="ss-selected"></span>
              <input name="screenshot" id="ss-1" class="" type="file" required>
            </div>
            <label>Synopsis</label>
              <textarea class="w-75 mb" name="sinopsis" cols="20" rows="7" placeholder="Write here..."></textarea>
            <div class="flex-row">
              <input class="c-button-action mr" type="submit">
              <a class="c-button-danger white no-decor t-center" href="<?php echo base_url(); ?>">BACK</a>
            </div>
          </form>
        </div>
        <div class="flex-col side-view w-lg-33 grow">
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
    <div class="h-100"></div>

    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-3.5.1.min.js"></script>
    <!-- <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script> -->

    <script>
      $('#post-1').bind('change', function() { var fileName = ''; fileName = $(this).val(); $('#poster-selected').html(fileName); });
      $('#ss-1').bind('change', function() { var fileName = ''; fileName = $(this).val(); $('#ss-selected').html(fileName); });     
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
