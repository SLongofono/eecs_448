function changeBorder(){
	var colorBox = document.getElementById('borderBox');
	var newColor = colorBox.value;
	document.getElementById('testBox').style.color = newColor;
	colorBox.value = '';
}

function changeBkgd(){
	var colorBox = document.getElementById('bkgdBox');
	var newColor=colorBox.value;
	document.getElementById('testBox').style.background = newColor;
	colorBox.value='';
}
