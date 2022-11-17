<?php require_once 'DataBase/config.php';
require_once 'Includes/GoogleAPI/vendor/autoload.php';
require_once("Includes/GoogleController.php");

if (isset($_SESSION['userid'])) {
  if ($_SESSION['userTY'] == "GP") {
    header("Location: MainGame.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-signin-client_id" content="559435595836-q4780alvfibks9gkit11p81anjndak5k.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer> </script>
    <title>MATHQUIZEE</title>
    <link rel="stylesheet" href="newindexstyle.css" />

    <!--FontAwsome CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

  <!--Jquery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <!--Google translate-->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <!--SweetAlert CDN-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!--Axios CDN-->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <Script>//Login 
    function validateLogin() {
      if ((document.getElementById("Uname").value != "") && (document.getElementById("pwd").value != "")) {
        return true;
      } else {
        swal("Please insert the Login credentials!");
        return false;
      }
    }

    
    
    </Script>
  </head>
  <body>
    <script>

      var duplicate_google_translate_counter = 0;//this stops google adding button multiple times

        function googleTranslateElementInit(){
          if (duplicate_google_translate_counter == 0) {
              new google.translate.TranslateElement(
              {pageLanguage: 'en'},
              'google_translate_element'
            );
         }
          duplicate_google_translate_counter++;
        }

    </script>
  
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="Includes/login.inc.php" onsubmit="return validateLogin()" autocomplete="off" class="sign-in-form" method="POST"  >
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h1>MATHQUIZEE</h1>
              </div>

              <div class="heading">
                <h2>Hello There!</h2>
                <h6>Not registered yet?</h6> <br>
                <a href="#" class="toggle">Sign up with MATHQUIZEE!</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    id="Uname"
                    name="Uname"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>YOUR USERNAME</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    id="pwd"
                    name="pwd"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>YOUR PASSWORD</label>
                </div>

                <input type="submit" name="submit" value="Login" class="sign-btn" />

                <h5>OR</h5> <br>

                <div class="g-signin2" data-onsuccess="onSignIn"><b>Sign in with google</b></div> <br>
                  
                <p class="text">
                  A Project by Sheshan Abeysekara
                  <a href="https://github.com/SheshanAbeysekara/Mathquizee">View Source Code!</a> 
                </p>
                <div id="google_translate_element"></div>
              </div>
            </form>

            <form action="https://mathquizee.herokuapp.com/MainGame.php" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h1>MATHQUIZEE</h1>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />
                  <!--
                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p> -->
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
              <img src="./img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>A fun game of Arithmatic Operations!</h2>
                  <h2>Play it like a Boss!</h2>
                  <h2>Not easy as 1+1</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Google Authentication Script to get user info-->
    <script>
      function onSignIn(googleUser) {
        // get user profile information
        console.log(googleUser.getBasicProfile())
        alert("Hello There"+ googleUser.getName(),"welcome to MathQuizee");
      }
    </script>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
