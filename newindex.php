<!-- This PHP page defines and displays both the Sign-In and Sign-Up window details on the client browser.
All user inputs are validated with functions, upon which the data are transferred to the Database.
A Project by Sheshan Abeysekara for Computer Integrated Module of UOB. Registration ID: 2211344 -->

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
     <!--<meta name="google-signin-client_id" content="559435595836-q4780alvfibks9gkit11p81anjndak5k.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer> </script> 
    <script src="https://accounts.google.com/gsi/client" async defer></script> -->
    <title>MATHQUIZEE</title> 


    <!--StyleSheet-->
  
  
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
  

  <Script>
  //LoginWindow Validate FunctionS
    function validateLogin() {
      if ((document.getElementById("Uname").value != "") && (document.getElementById("pwd").value != "")) {
        return true;
      } else {
        swal("Please insert the Login credentials!");
        return false;
      }
    }


    //RegistrationWindow Validate FunctionS

    //Validate Password/s
    function ValidatePassword() {
      var pwd1 = document.getElementById("pwd").value;
      var pwdc = document.getElementById("pwdc").value;

      if ((pwd1.length >= 8) && (pwd1.length <= 10)) {
        if(pwd1 == pwdc){
          return true;
        }else{
          swal("Your passowrds don't match!, Please try again later!");
          return false;
        }
      } else {
        swal("Please enter the correct password with Minimum of 8 charcters and Maximum of 10 Characters");
        return false;
      }
    }

    //validate Email via APILAYER API.
    const validateEmail = async () => {
      var email = document.getElementById("email").value;
      try {
        var url = "http://apilayer.net/api/check?access_key=e4bfccb27a838acc91c7bf0e8957713f&email=" + email
        const resp = await axios.get(url);
        return resp;
      } catch (err) {
        console.log(err);
        return (err);
      }
    }

    //Validate Phone numer via numlookupAPI.
    const validatePhone = async () => {
      var CPno = document.getElementById("contact").value;
      try {
        let url = "https://numlookupapi.com/api/validate/" + CPno+"?apikey=pLWWIdzxTymJ9PSs7WQfg3KDOqMFv4EMgI7MLv8O";
        const resp = await axios.get(url);
        return resp.data;
      } catch (err) {
        console.log(err);
        return (err);
      }
    }

    //SignUp Validation
    async function validateAll(e) {
      //Email validation 
      validateEmail().then(response => {
        console.log("Email validation: "+response.format_valid, " : ", response.mx_found);
        if ((response.format_valid) && (response.smtp_check)&& (response.mx_found)) {
          if (ValidatePassword()) {
            //Phone number validation 
            validatePhone().then(response => {
              console.log("Number validation: "+response.valid, " : ", response.international_format);
              if ((response.valid)) {
                e.submit();
              } else {
                swal("The Phone number you entered is not a valid number! \n Make sure your have added your country code at the begining: +94 XX XXXXXX");
              }
            })
          } else {
            e.preventDefault();
          }
        } else {
          swal("The email you entered is not a valid email! \n You need to have a Valid Email Address!");
        }
      })
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
                  <label>YOUR EMAIL</label>
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

                <!-- <div class="g-signin2" data-onsuccess="onSignIn"><b>Sign in with google</b></div> <br> -->

                 <script src="https://accounts.google.com/gsi/client" async defer></script>
                <div id="g_id_onload"
                  data-client_id="559435595836-q4780alvfibks9gkit11p81anjndak5k.apps.googleusercontent.com"
                  
                  data-auto_prompt="false"
                  
                  data-callback="onSignIn">
                  
                  
                </div>
                <div class="g_id_signin"
                  data-type="standard"
                  data-size="large"
                  data-theme="outline"
                  data-text="sign_in_with"
                  data-shape="rectangular"
                  data-logo_alignment="left">
                </div> 

                <!--

                <div style="display: flex;">
                    <div class="google-btn" style="margin-top: 1.8rem;">
                      <div class="google-icon-wrapper">
                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                      </div>
                  <p onclick="window.location='<?php echo $login_url; ?>'" class="btn-text" type="button"><b>Sign in with google</b></p>
                </div> --> 
                  
                <p class="text">
                  A Project by Sheshan Abeysekara
                  <a href="https://github.com/SheshanAbeysekara/Mathquizee">View Source Code!</a> 
                </p>
                <div id="google_translate_element"></div>
              </div>
            </form>


            <!-- Sign UP FORM -->


            <form action="Includes/signup.inc.php" autocomplete="off" onsubmit="return validateAll(this); return false;" method="POST" class="sign-up-form">
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
                    id="name" name="name"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    id="email" name="email"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="tel"
                    class="input-field"
                    autocomplete="off"
                    id="contact" name="contact"
                    required
                  />
                  <label>Phone Number</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required id="pwd1" name="pwd"
                    required
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required id="pwdc" name="pwdc"
                    required
                  />
                  <label>Confirm Password</label>
                </div>

                <input type="submit" name="submit" value="Sign Up" class="sign-btn" />
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

    <!-- Google Authentication Script to get user info -->
    <script>
      function onSignIn(googleUser) {
        // get user profile information
        console.log(googleUser.getBasicProfile())
        alert("Hello There"+ googleUser.getName(),"welcome to MathQuizee");
      }
    </script> 

    <!-- Javascript file -->

    <script src="newindex.js"></script>

    <?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "empty") {
      echo '<script>swal("Error!", "Please Fill the inputs!", "error");</script>';
    } elseif ($_GET['error'] == "wronglogin") {
      echo '<script>swal("Error!", "Your username or Password is invalid!", "error");</script>';
    } elseif ($_GET['error'] == "Invaild") {
      echo '<script>swal("Error!", Invalid User Type!", "error");</script>';
    } elseif ($_GET['error'] == "none") {
      echo '<script>swal("Welcome to MATHQUIZEE!", "Please sign-in to enjoy our game!", "success");</script>';
    } elseif ($_GET['error'] == "uidexists") {
      echo '<script>swal("Error!", "This email already has an Account! <br> Try Sign In!", "error");</script>';
    } elseif ($_GET['error'] == "sqlerror") {
      echo '<script>swal("Error!", "SQL error: ' . $_GET['E'] . '", "error");</script>';
    } elseif ($_GET['error'] == "exception") {
      echo '<script>swal("Error!", "Error has occurerd!, error: ' . $_GET['E'] . '", "error");</script>';
    } else {
      echo '<script>swal("Error!", "Unknown Error!, Please try again later!", "error");</script>';
    } 
  }
  ?>
  <!--JavaScript-->
  <script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener("click", () => {
      container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
      container.classList.remove("sign-up-mode");
    });
  </script>
  
  
  </body>
</html>
