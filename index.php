<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>D.J. Trinity</title>
    <!-- Behavioral Meta Data -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Core Meta Data -->
    <meta name="author" content="Abhishek Balam">
    <meta name="description" content="Trinity is the perfect blend of all the areas of an engineering student's life- sports, cultural activities and a technical thinking. With a dazzling past in its wake, Trinity is back. And this time, its not just going to be better, its going to be the best!p">
    <meta name="keywords" content="">
    <!-- Humans -->
    <link rel="author" href="humans.txt" />
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/index/css/style.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/main/fav.ico">
</head>

<body>
    <div id="container" class="wrapper">
        <ul id="scene" class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15">
            <li class="layer" data-depth="0.00"></li>
            <li class="layer" data-depth="0.10">
               <div id="particles" class="background"> </div>
            </li>
            <li class="layer" data-depth="0.3" style="display: flex;height: 100vh">
                <img src="assets/main/images/logo.png" class="logo" data-depth="0.3">
            </li>
           
        </ul>
        <section id="about" class="wrapper about hide accelerate">
            <div class="cell accelerate">
                <div class="cables center accelerate">
                    <div class="panel ">
                        <header>
                            <h1><em style="color: #FFF;text-shadow: 0 3px 6px rgba(0, 0, 0, 0.6);font-size:4rem">DJ Trinity</em></h1>
                        </header>
                        <p style="color: #fff">
                            <strong>Trinity</strong> is back with a bang! <strong>Trinity</strong> is a perfect combination of all the cultural , sports and technical events which will be celebrated with élan. Gear up because this time it's going to be much bigger and better!
                        </p>
                        <ul class="links">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="schedule.php">Schedule</a></li>
                            <!--<li><a href="sponsors.php">Sponsors</a></li>-->
                            <li><a href="idpt.php">IDPT Table</a></li>
                            <!--<li><a href="gallery.php">Gallery</a></li>-->
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <button id="toggle" class="toggle i">
            <div class="cross">
                <div class="x"></div>
                <div class="y"></div>
            </div>
        </button>
        <!-- <div id="prompt" class="wrapper prompt hide accelerate">
            <div class="cell accelerate">
                <div class="panel center unselectable accelerate">
                    <button id="dismiss" class="dismiss">
                        <div class="cross">
                            <div class="x"></div>
                            <div class="y"></div>
                        </div>
                    </button>
                    <div class="tilt-scene">
                        <img class="tilt" src="assets/index/images/tilt.png">
                    </div>
                    <h2>Tilting is fun!</h2>
                    <p>For the best experience, check out this site on a mobile or tablet equipped with a gyroscope</p>
                    
                </div>
            </div>
        </div> -->
        <footer>
            <h1>
        <a href="https://www.facebook.com/djscetrinity/"><i class="ion ion-social-facebook"></i></a>
        <a href="https://www.instagram.com/trinity.djsce/"><i class="ion-social-instagram-outline"></i></a>
        <a href="https://twitter.com/djscetrinity"><i class="ion-social-twitter-outline"></i></a>
        <a href="https://www.youtube.com/user/djscetrinity"><i class="ion-social-youtube"></i></a>
        
      </h1>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="assets/index/js/jquery.parallax.js"></script>
    <script src="assets/index/js/libraries.js"></script>
    <script src="assets/index/js/jquery.particleground.js"></script>
    <script>
    // jQuery Selections
    var $html = $('html'),
        $container = $('#container'),
        $prompt = $('#prompt'),
        $toggle = $('#toggle'),
        $about = $('#about'),
        $scene = $('#scene');

    // Hide browser menu.
    (function() {
        setTimeout(function() {
            window.scrollTo(0, 0);
        }, 0);
    })();

    // Setup FastClick.
    FastClick.attach(document.body);

    // Add touch functionality.
    if (Hammer.HAS_TOUCHEVENTS) {
        $container.hammer({
            drag_lock_to_axis: true
        });
        _.tap($html, 'a,button,[data-tap]');
    }

    // Add touch or mouse class to html element.
    $html.addClass(Hammer.HAS_TOUCHEVENTS ? 'touch' : 'mouse');

    // Resize handler.
    (resize = function() {
        $scene[0].style.width = window.innerWidth + 'px';
        $scene[0].style.height = window.innerHeight + 'px';
        if (!$prompt.hasClass('hide')) {
            if (window.innerWidth < 600) {
               // $toggle.addClass('hide');
            } else {
                $toggle.removeClass('hide');
            }
        }
    })();

    // Attach window listeners.
    window.onresize = _.debounce(resize, 200);
    window.onscroll = _.debounce(resize, 200);

    function showDetails() {
        $about.removeClass('hide');
        $toggle.removeClass('i');
    }

    function hideDetails() {
        $about.addClass('hide');
        $toggle.addClass('i');
    }

    // Listen for toggle click event.
    $toggle.on('click', function(event) {
        $toggle.hasClass('i') ? showDetails() : hideDetails();
    });

    // Pretty simple huh?
    $scene.parallax();

    // Check for orientation support.
    setTimeout(function() {
        if ($scene.data('mode') === 'cursor') {
            $prompt.removeClass('hide');
            if (window.innerWidth < 600) $toggle.addClass('hide');
            $prompt.on('click', function(event) {
                $prompt.addClass('hide');
                if (window.innerWidth < 600) {
                    setTimeout(function() {
                        $toggle.removeClass('hide');
                    }, 1200);
                }
            });
        }
    }, 1000);
    </script>
    <script type="text/javascript">
    // jQuery plugin example:
    $(document).ready(function() {
        $('#particles').particleground({
            dotColor: '#fff',
            lineColor: '#5cbdaa'
        });
        $('.intro').css({
            'margin-top': -($('.intro').height() / 2)
        });
    });
    </script>
    
</body>

</html>
