/**
 * A Project by Sheshan Abeysekara for Computer Integrated Module of UOB. Registration ID: 2211344
 * Selecting different elements from the HTML DOM 
 */
const scoreEl = document.querySelector('#scoreEl');
const modalEl = document.querySelector('#modalEl');
const soundOffEl = document.querySelector('#soundOffEl');
const soundOnEl = document.querySelector('#soundOnEl');
const speakerImg = document.querySelector('#speakerImg');
const power = document.querySelector('body');
const LevelUser = document.querySelector('#LevelUser');
const XpUser = document.querySelector('#XpUser');

/**
 * Global Variable declration
*/
let GameUserData;
let GameData;
let GameEngingObj;
let currentGame;
let timeeIntervel; //The ID of the Intervel 

/**
 * The bellow function get's the User details from the database by making an Ajax call 
 */
GetUserData().then(response => {
    try {
        GameUserData = JSON.parse(response);
        GetGameData(GameUserData.level);
        //make it clik-able only when the user details are loaded
        power.classList.remove('notClickable');
    } catch (e) {
        swal("SQL DB Error!", "Error: GetUserData() function; " + e, "error");
    }
});


/**
 * Functions below are triggered when the Pause Game button is clicked. 
 */

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


async function pauseBtn() {
    power.classList.add('blurOut');
    await sleep(50);   //await for half a MS to blur the screen and popup the JS alert
    alert('\t Game is Paused! \n Click the "OK" Button to resume the game play!');
    power.classList.remove('blurOut');
}


/**
 * Function below is triggered when the Log Out button is clicked. 
 */

function confirmLogout() {
    swal({
        title: "Are you sure you want to log out?",
        text: "Mathquizee is going to miss you!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((e) => {
        if (e) {
            window.location.href = "./Includes/logout.inc.php";
        }
    });
}

