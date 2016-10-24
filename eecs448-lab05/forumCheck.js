window.onload=function() {

    document.getElementById('unameForm').onsubmit=function(e) {

        // Find elements to check
        var user = document.getElementById('username');

        // Check that a username is present
        if(user.value == 'undefined' || user.value.length < 1){
            errorReport("You must specify a user name!");
            return false;
        }
        return true;
    }
}

// Give the user feedback in a special paragraph at the bottom
function errorReport(s){
    console.log('Error reported');
    var field = document.getElementById('feedback');
    field.innerHTML = s;
    field.style.color = "red";
}
