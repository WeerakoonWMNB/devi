<header id="header" class="header d-flex align-items-center fixed-top" style ="background-color: #800000;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.jpeg" alt="school logo">
        <div>
            <h1 class="sitename">DEVI BALIKA VIDYALAYA</h1>
            <small style ="color: #C0C0C0;">Nurturing Excellence, Empowering Young Women</small>
        </div>
        </a>


      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#featured-services">News</a></li>
          
          <li class="dropdown"><a href="index.php#faq"><span>Academic</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="index.php#faq">Academic Structure</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li> -->
              <li><a href="curriculum.php">Curriculum</a></li>
            </ul>
          </li>
          <li><a href="index.php#portfolio">Portfolio</a></li>
          <li><a href="history.php">History</a></li>
          
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#">
        <span class="blurred-text"> භාව </span>
        <div class="date_countdown">
            <div id="timer">
                <div id="days" class="date"></div>
                <div id="hours" class="date"></div>
                <div id="minutes" class="date"></div>
                <div id="seconds" class="date"></div>
            </div>
        </div>
      </a>

    </div>
  </header>
  <script>
    //------- makeTimer js --------//  
  function makeTimer() {

    //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
    var endTime = new Date("27 Aug 2025 13:30:00 GMT+01:00");
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }

    $("#days").html( days+"<span>D</span>");
    $("#hours").html( hours+"<span>H</span>");
    $("#minutes").html( minutes+"<span>M</span>");
    $("#seconds").html( seconds+"<span>S</span>");

  }

    setInterval(function () {
      makeTimer();
    }, 1000);
  </script>
  <style>
    #timer {
    display: flex;
    justify-content: center;
    gap: 8px; /* space between D H M S */
}

.date {
    display: inline-block;
    font-weight: bold;
    font-size: 14px;
}

  </style>