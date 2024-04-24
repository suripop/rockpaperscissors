<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link rel="stylesheet" href="./rock.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Rock Paper Scissors</title>
</head>
<body>
    <audio src="../8-objects.html/HTML/Powerful-Trap-(chosic.com).mp3" autoplay="autoplay" loop=""></audio>
    <div id="sectionhome">
        <div class="section1-container d-flex flex-row justify-content-center">
            <header>
                <h2 class="logo">Logo</h2>
                <?php 
                session_start();
                if (isset($_SESSION['loggedin']) && $_SESSION ['loggedin'] === true): 
                ?>
                <!-- User is logged in, show the Start button -->
                <button class="reset-score-button" onclick="display('sectioninner')">START</button>
                <?php else: ?>
                    <!-- User is not logged in, don't show the Start button -->
                    <!-- Optionally, show login form or a message indicating the user needs to log in -->
                <?php endif; ?>
                <nav class="navigation">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Services</a>
                    <a href="#">Contact</a>
                    <button class="btnLogin-popup">Login</button>
                </nav>
            </header>
            <div class="wrapper d-flex flex-row justify-content-center">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="form-boxlogin">
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <div class="input-box">
                            <span class="icon"></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"></span>
                            <input type="password" name="password" required>    
                            <label>Password</label>
                        </div>
                        <div class="remember-forget">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="login-register">
                            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                        </div>
                    </form>
                </div>

                <div class="form-box register">
                    <h2>Registration</h2>
                    <form action="register.php" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>    
                            <label>Password</label>
                        </div>
                        <div class="remember-forget">
                            <label><input type="checkbox">I agree to the terms & conditions</label>
                        </div>
                        <button type="submit" class="btn">Register</button>
                        <div class="login-register">
                            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <div id="sectioninner">
        <div class="page2">
            <div class="flex-box">
            <button class="reset-score-button" onclick="display('sectionhome')">Go Home</button>
            <p class="title pad">Rock Paper Scissors</p>  
            </div> 
        <div class="btn-container">
            <button onclick="playGame('rock');" class="move-button">
                <img src="../8-objects.html/HTML/rock.png"
                class="move-icon">
            </button>
            <button onclick="playGame('paper');" class="move-button">
                <img src="../8-objects.html/HTML/paper.png"
                class="move-icon">
            </button>
            <button onclick="playGame('scissors');" class="move-button">
                <img src="../8-objects.html/HTML/scissors.png"
                class="move-icon">
            </button>
        </div>
        <div class="card d-flex flex-row">
            <div class="card-container1">
                <p class="js-result result"></p>
                <p class="js-moves moves"></p>
                <p class="js-score score"></p>
                <button onclick="
                score.wins = 0;
                score.losses = 0;
                score.ties = 0;
                localStorage.removeItem('score');
                updateScoreElement();
                playGame();
                document.querySelector('.js-moves').innerHTML='';
                " class="reset-score-button">Restart</button>
            </div>
            <div class="arrow-space">
                <img src="../8-objects.html/HTML/arrow.png">
                <h1 class="arrow-text">Your Result</h1>
            </div>
            <div class="card-container arrow-space">
                <h1 class="result">heyy welcome!!</h1>
                <p class="shown1 final-result1 card2"></p>
                <p class="shown2 final-result2 card2"></p>
                <p class="shown4 insidetext"></p>
                <p class="shown3"></p>
            </div>
            </div>
        </div>
    </div>   
<script>
$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                // Assuming 'response' contains the message from your PHP script
                showAlert(response); // Call a function to show the popup
            }
        });
    });
});

function showAlert(message) {
    // This is a simple example, you can customize it as per your needs
    alert(message);
}
</script> 

<script src="./rock.js"></script>
<script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>