console.log('Script loaded');
current = 0;
sources = ['../img/Red.png', '../img/Yellow.png', '../img/Green.png', '../img/Blue.png', '../img/White.png'];

function getNext(){
	if(current < 4){
		current += 1;
		return sources[current];
	}
	current = 0;
	return sources[current];
}

function getPrev(num){
	if(current > 0){
		current-=1;
		return sources[current];
	}
	current = 5;
	return sources[current];
}

function advance_slide_fwd(){
	var $active = $('#' + current);
	var $next = $('#' + getNext(current));
	current =getNext(current);
	$active.toggle();
	$next.toggle(600);
}

function advance_slide_bwd(){
	var $active = $('#' + current);
	var $next = $('#' + getPrev(current));
	current = getPrev(current);
	$active.toggle();
	$next.toggle(600);
}



$('.btn-jump').click(function(){
	console.log('Clicked: ' + $(this).attr('name'));
	if( 'back' == $(this).attr('id')){
		$('#imageBox').find('img').attr('src', getPrev());
	}
	else{
		$('#imageBox').find('img').attr('src', getNext());
	}
});
