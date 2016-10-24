<?php

$sql_handl = new mysqli("mysql.eecs.ku.edu", "slongofono", "password", "slongofono");

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
            <a class="navbar-brand" href="#">Deleting Posts</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.htm">Home</a></li>
		<li><a href="AdminHome.html">Back To Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

        <div class="bs-docs-section">
        <div class="row">
        <div class="col-lg-6">
        <div class="well bs-component">';

//Verify connectivity
if($sql_handl->connect_errno){
	echo printf("<span style='color:red;'>Failed to connect: %s<br><br>", $sql_handl->connect_error);
}
else{
	foreach($_POST as $key => $value){
		$query = "DELETE FROM Posts WHERE post_id='".$value."';";
		if($sql_handl->query($query)){
			echo "Post ".$value." was deleted.<br>";
		}
		else{
			echo "Failed to delete post ".$value.".<br>";
		}
	}
}


echo '  </div>
        </div>
	<div class="col-sm-3">
	<div class="well bs-component">
	<img src="../img/hammer.png" alt="Regulator">
	</div>
	</div>
        </div>
        </div>
</body>
</html>
';
$sql_handl->close();
?>
