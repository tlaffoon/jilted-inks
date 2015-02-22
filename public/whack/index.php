<html>
<head>
    <title>Whack A Coder</title>
<link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">
<style type="text/css">

    body {
        color: white;
        background-image: url('includes/img/bg.png');
    }

    .main-box {
        border: solid black 1px;
        height: 596px;
        width: 596px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .lil-box {
        border: solid black 1px;
        height: 198px;
        width: 198px;
        float: left;
    }

    .mole {
        display: none;
        height: 100%;
        width: 100%;
        cursor: pointer;
    }

    .no-pad {
        padding: 0px;
        margin: 0px;
    }

    .box-header {
        margin: 0px auto;
        width: 596px;
    }

    .buttons {
        margin: 0px auto;
        height: 80px;
        width: 600px;
    }

    #timer {
        font-size: 50px;
        color: red;

        position: absolute;
        top: 85px;
        right: 50px;

        display:none;
    }

    #scorebox {
       font-size: 50px;
       color: purple;

       position: absolute;
       top: 85px;
       left: 50px;

       display:none;

    }

</style>

</head>
<body>

<div class="container">
    
    <div id="scorebox"></div>
    <div id="timer"></div>

    <div id="main-box" class="main-box">

        <div class="row no-pad">
            <div id="1" class="lil-box">
                <img class="mole img-rounded" src="includes/img/chris.jpg">
            </div>
            <div id="2" class="lil-box">
                <img class="mole img-rounded" src="includes/img/mike.jpg">
            </div>
            <div id="3" class="lil-box">
                <img class="mole img-rounded" src="includes/img/jason.jpg">
            </div>
        </div> <!-- End Row -->

        <div class="row no-pad">
            <div id="4" class="lil-box">
                <img class="mole img-rounded" src="includes/img/thomas.jpg">
            </div>
            <div id="5" class="lil-box">
                <img class="mole img-rounded" src="includes/img/jenni.jpg">
            </div>
            <div id="6" class="lil-box">
                <img class="mole img-rounded" src="includes/img/gc_face.png">
            </div>
        </div> <!-- End Row -->

        <div class="row no-pad">
            <div id="7" class="lil-box">
                <img class="mole img-rounded" src="includes/img/greg.jpg">
            </div>
            <div id="8" class="lil-box">
                <img class="mole img-rounded" src="includes/img/isaac.jpg">
            </div>
            <div id="9" class="lil-box">
                <img class="mole img-rounded" src="includes/img/ryan.jpg">
            </div>
        </div> <!-- End Row -->

    </div> <!-- End Main Box -->

    <div class="buttons">
        <button id="start-btn" class="btn btn-lg btn-success pull-right"> START </button>
        <button id="stop-btn" class="btn btn-lg btn-danger pull-left"> STOP </button>
    </div>
</div> <!-- End Container -->

</body>
<script src="includes/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

    var game;
    var time = 60;
    var timer = $('#timer');

    var score = 0;
    var scorebox = $('#scorebox');

    var moles = $('.mole');
    var main = $('#main-box');
    var lils = $('.lil-box');


    // Define functions
    function genRand() {
        // Generate Random Number b/w 1-9
        return Math.floor(Math.random() * 9) + 1;
    }

    function runGame() {
        
        var increment = 1000;

        clearInterval(game);

        score = 0;
        scorebox.html(score);
        scorebox.fadeIn();

        // Run timer
        runTimer();

        game = setInterval(function () {
            // Fade out all moles
            moles.fadeOut();
            
            // Remove all event listeners
            moles.off();

            // Get random integer
            var randNum = genRand();

            // Get random box from moles array
            var randBox = moles[randNum - 1];

            // Fade in random box
            $(randBox).fadeIn(200);

            // Run function on click; add points/fadeOut
            $(randBox).click(function() {
                // remove event listener
                $(this).off();
                // Increment score
                score += 10;
                // Update scorebox
                scorebox.html(score);
                // Fade image out
                $(this).fadeOut();
            });

            // Stop Game on timer zero
            if (time <= 0) {
                stopGame();
            };

        }, increment);
    }

    function stopGame() {
        clearInterval(game);        
        moles.fadeOut(1000);
        clearInterval();
        timer.fadeOut(1000);
    }

    function runTimer() {
        time = 60;
        timer.html(time);
        timer.fadeIn();

        var timerloop = setInterval(function () {
            time--;
            timer.html(time);

        }, 1000);
    }

    // Adds event listener to start button
    var start = document.getElementById('start-btn');
    start.addEventListener('click', runGame, false);

    // Honestly; not even necessary.
    var stop = document.getElementById('stop-btn');
    stop.addEventListener('click', stopGame, false);

    // Features to add:
        // Increase timer on image click
        // Sound on image click
        // Background music
        // Additional CSS
</script>
</html>