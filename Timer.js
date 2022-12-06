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