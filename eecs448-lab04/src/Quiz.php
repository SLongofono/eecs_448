<?php

	echo '<!doctype html>';
	echo "<head><link href='../css/Quiz.css' type='text/css' rel='stylesheet'></link></head>";
	echo "<body>";

	// Load up an array because posts are too restrictive with access
	$quiz = Array();
	$quiz[0] = $_POST['a'];
	$quiz[1] = $_POST['b'];
	$quiz[2] = $_POST['c'];
	$quiz[3] = $_POST['d'];
	$quiz[4] = $_POST['e'];

	$questions = array("What's the best and worst part about web technologies?","What does 'the cloud' mean?",'What is Node.js?',"Why isn't there an open-source, comprehensive, drag and drop application for creating simple website front-ends?","Why don't all professors plan around the career fair?");
	$answerKeyText = array("All of the above", "A and B", "It provides a more sane way to handle duplex communication and state for web applications","Webflow.  Check it out","That's a good question also");

	$score = 0;
	for($i = 0; $i < 5; $i++){
		echo "<p class='feedback'>";
		echo '<br><br>Question '.($i+1).' : '.$questions[$i].'<br>';

		echo 'You answered: '.$quiz[$i].'<br>';

		echo 'Correct answer: '.$answerKeyText[$i].'<br>';
		if($quiz[$i] == $answerKeyText[$i]){
			echo '<br><span style="color:green; font-weight:bold;">&nbsp&nbsp&nbsp&nbspCorrect! Plus 20 points!</span><br>';
			$score += 20;
		}
		else{
			echo '<br><span style="color:red; font-weight:bold;">&nbsp&nbsp&nbsp&nbspIncorrect! No points!</span><br>';
		}
		echo '<br><br></p>';
	}

	echo "<p class='feedback'><br><br>Final Score: ".$score.'%<br><br></p>';
	echo "<p class='feedback'><br><br><a href='../index.htm'>Home</a><br><br></p>";
	echo "</body></html>";
	// EDEDD

?>
