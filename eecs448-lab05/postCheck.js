window.onload=function() {

    document.getElementById('postForm').onsubmit=function(e) {

        // Find elements to check
        var user = document.getElementById('username');
        var text = document.getElementById('post');

        // Check that a username is present
        if(user.value == 'undefined' || user.value.length < 1){
            errorReport("You must specify a user name!");
            return false;
        }

        else if(text.value == 'undefined' || text.value.length < 1){
            errorReport("You need to enter some text...");
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
