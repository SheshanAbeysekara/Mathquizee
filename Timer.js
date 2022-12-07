/**
 * A Project by Sheshan Abeysekara for Computer Integrated Module of UOB. Registration ID: 2211344
 * Timer.js handles the Timer Countdown function which connects to MainGame.php.
 */
var timeleft = 60;
var downloadTimer = setInterval(function(){
if(timeleft <= 0){
    clearInterval(downloadTimer);
    var timeup = new Audio('./audio/timeup.wav');
        timeup.play();
        swal("OH NO", "Your time is up!", "error", {button: "New Game",}).then(function(confirmed) {
            if(confirmed) {
                window.location.reload();
                
            }
        });
                
} else {
    document.getElementById("time").innerHTML = timeleft + " seconds";
}
timeleft -= 1;
}, 1000);