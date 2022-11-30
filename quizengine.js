
        var quest = "";
        var solution = -1;

        let newgame = function(x) {
           
            startup();
        }
        let handleInput = function(x) {

            let inp = document.getElementById("input");
            var note = document.getElementById("note");
            if (inp.value == solution) {
                //note.innerHTML = 'Correct! -  <button class="button-54" onClick="newgame()" >New game?</button>';
                swal("Yaaaay!", "You are a MATH genius!", "success", {button: "Next Quiz",}).then(function(confirmed) {
                    if(confirmed) {
                        newgame()
                    }
                });
                
                
            } else {
                //note.innerHTML = 'NOT Correct! -  <button class="button-54" onClick="newgame()" >New game?</button>';
                swal("OOPS!", "Wrong Answer :(", "error", {button: "Next Quiz",}).then(function(confirmed) {
                    if(confirmed) {
                        newgame()
                    }
                });
                
                
            }
        }


        let startQuest = function(data) {
            var parsed = JSON.parse(data);
            quest = parsed.question;
            solution = parsed.solution;
            let img = document.getElementById("quest");
            img.src = quest;
            let note = document.getElementById("note");
            note.innerHTML = "Quiz is ready.";
        }

        let fetchText = async function() {
            let response = await fetch('https://marcconrad.com/uob/smile/api.php');
            let data = await response.text();
            startQuest(data);
        }

        let startup = function() {
            fetchText();
        }
