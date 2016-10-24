<?php

echo '<!doctype html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="../bootstrap-clean/bootstrap.min.css" rel="stylesheet"></link>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar">f</span>
                <span class="icon-bar">ff</span>
                <span class="icon-bar">fff</span>
            </button>
            <a class="navbar-brand" href="#">Forum</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.htm">Home</a></li>
				<li><a href="CreateUser.html">Create A User</a></li>
            </ul>
        </div>
    </div>
</nav>
';


$dirtyuser = $_POST['username'];
// Sanitize input (remove all non-alphanumeric chars)
// Thanks to Stackexchange user Jürgen Thelen!
// http://stackoverflow.com/questions/7271607/remove-non-alphanumeric-characters-including-%C3%9F-%C3%8A-etc-from-a-string
$newUser = preg_replace("/[^A-Za-z0-9 ]/", ' ', $dirtyuser);

// Establish connection
$sql_handl = new mysqli("mysql.eecs.ku.edu", "slongofono", "password", "slongofono");


//Verify connectivity
if($sql_handl->connect_errno){
	echo printf("<br><span style='color:red;'>Failed to connect: %s<br><br>", $sql_handl->connect_error);
	return;
}

//echo "Successfully connected<br>";
//echo "Adding new user: ".$newUser."<br>";

// Prepare query
$query = "INSERT INTO Users (user_id) VALUES ('".$newUser."');";
//echo $query."<br>";

//Send query, check results
if($result = $sql_handl->query($query)){
    echo '  <div class="bs-docs-section">
            <div class="row">
            <div class="col-lg-12">
            <div class="well bs-component">';
    echo               "Successfully added new user ".$newUser."!<br><br>";
    echo '             <form action="CreatePosts.html">
                        <button type="submit" class="btn btn-primary">Go Chat!</button>
                      </form>
            </div>
            </div>
            </div>
            </div>
    ';
}
else{
	echo '<div class="bs-docs-section">
          <div class="row">
          <div class="col-lg-12">
          <div class="well bs-component">
          Failed to add the user.  The user may already exist, or the name field may have been blank.<br>
          ';
}


// Done, close connection
$sql_handl->close();

echo '
</body>
</html>
';
?>
