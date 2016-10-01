window.onload=function() {

    document.getElementById('myform').onsubmit=function(e) {

        // Find elements to check
        var user = document.getElementsByName('user')[0];
        var pass = document.getElementsByName('pass')[0];

        var products = Array();
        products.push(document.getElementsByName('quantity1')[0]);
        products.push(document.getElementsByName('quantity2')[0]);
        products.push(document.getElementsByName('quantity3')[0]);
        products.push(document.getElementsByName('quantity4')[0]);
        products.push(document.getElementsByName('quantity5')[0]);
        products.push(document.getElementsByName('quantity6')[0]);

        var ship0 = document.getElementsByName('shipping')[0];
        var ship1 = document.getElementsByName('shipping')[1];
        var ship2 = document.getElementsByName('shipping')[2];

        // Check that a username and password are present
        if(user.value == 'undefined' ||
           pass.value == 'undefined' ||
           user.value.length < 1     ||
           pass.value.length < 1       ){
            console.log('\n\nError: bad username or password\n');
            errorReport("You must specify a user name and password!");
            return false;
        }
        else{
            console.log("good username: " + user.value);
        }

        // Check shipping is selected, redundant but in the problem specs
        if(!(ship0.checked || ship1.checked || ship3.checked)){
            console.log('\n\nError: no shipping\n');
            errorReport("You must specify a shipping option!");
            return false;
        }
        else{
            console.log('Shipping ok');
        }

        // Check that values are defined for every product per specs
        for(var i = 0; i<products.length; i++){
            if(isNaN(products[i].value) || products[i].value < 0 || products[i].value.length<1){
                console.log('\n\nError: undefined product quantities\n');
                errorReport("You must specify a valid quantity for each product!");
                return false;
            }
            else{
                console.log('product ' + i + ' ok');
            }
        }
        console.log('products ok');
        // returning true will submit the form
        return true;
    }
}

// Give the user feedback in a special paragraph at the bottom
function errorReport(s){
    console.log('Error reported');
    document.getElementById('feedback').innerHTML = s;
}
