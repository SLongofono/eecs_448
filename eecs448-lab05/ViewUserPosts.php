<?php

$dirtyuser = $_POST['user'];

$sql_handl = new mysqli("mysql.eecs.ku.edu", "slongofono", "password", "slongofono");

// Sanitize input (remove all non-alphanumeric chars)
// Thanks to Stackexchange user Jürgen Thelen!
// http://stackoverflow.com/questions/7271607/remove-non-alphanumeric-characters-including-%C3%9F-%C3%8A-etc-from-a-string
$user = preg_replace("/[^A-Za-z0-9 ]/", ' ', $dirtyuser);

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
            <a class="navbar-brand" href="#">Post Review</a>
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
        <div class="col-lg-12">
        <div class="well bs-component">';
        //Verify connectivity
if($sql_handl->connect_errno){
	echo printf("<span style='color:red;'>Failed to connect: %s<br><br>", $sql_handl->connect_error);
}
else{
    $query = 'SELECT * FROM Posts where author_id="'.$user.'";';
    if($posts = $sql_handl->query($query)){
	echo 'Posts authored by user '.$user.'<br>';
        echo '<table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>Post Id</th>
                        <th>Post Content</th>
                      </tr>
                    </thead>
                    <tbody>';
        while($row = $posts->fetch_assoc()){
            echo '<tr><td>'.$row['post_id'].'</td><td>'.$row['content'].'</td></tr>';
        }
        echo '    </tbody>
                  </table> ';
    }
    else{
        echo "Failed to fetch posts...";
    }
}


echo '  </div>
        </div>
        </div>
        </div>
</body>
</html>
';
$sql_handl->close();
?>
