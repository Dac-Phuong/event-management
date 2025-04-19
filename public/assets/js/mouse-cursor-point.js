document.addEventListener('DOMContentLoaded', function(){

	var cursor = document.createElement('div');
	var cursorPoint = document.createElement('div');
	var cursorTail = document.createElement('div');

	cursor.classList.add('cursor');
	cursorPoint.classList.add('cursor-point');
	cursorTail.classList.add('cursor-tail');

	cursor.appendChild(cursorPoint);
	cursor.appendChild(cursorTail);
	document.body.appendChild(cursor);

	var cursorPoint = document.querySelector('.cursor-point');
	var cursorTail = document.querySelector('.cursor-tail');

	document.addEventListener('mousemove', function(e){
		cursorPoint.setAttribute("style", "top: " + e.clientY + "px; left: " + e.clientX + "px");
		cursorTail.setAttribute("style", "top: " + e.clientY + "px; left: " + e.clientX + "px");
	});

	document.addEventListener('click', function(e){
		cursorPoint.classList.add("cursor-click");
		setTimeout(function(){
				cursorPoint.classList.remove("cursor-click");
		}, 450);
	});
	
});