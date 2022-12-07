/**
 * A Project by Sheshan Abeysekara for Computer Integrated Module of UOB. Registration ID: 2211344
 * The GetUserData() function makes an asynchronous request to the AjaxGetdata.php file and wait for the output to get 
 * recived and then return the user data as a JSON string
 * @returns the user data coming from the SQL Server 
 */
async function GetUserData() {
    let Fucname = "GetUserDetails";
    let result = await $.post("Includes/AjaxGetdata.php", {
        FuntionName: Fucname
    }, function (data) {
        return (data);
    });
    return result;
}
