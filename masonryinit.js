jQuery(document).ready(function($) {
    $('.posts').imagesLoaded(
		function(){
	    	$('.posts').masonry({
	    		itemSelector : '.item',
	    		columnWidth : '.item'
	    	});
		}
	);
});

const canvas = document.querySelector("canvas")

canvas.width = window.innerWidth
canvas.height = window.innerHeight

const context = canvas.getContext("2d")

context.strokeStyle = "blue"
context,lineWidth = 10
context.lineCap = "round"

let shouldPaint = false

document.addEventListener("mousedown", function(event){
	shouldPaint = true
	context.moveTo(event.pageX,event.pageY)
	context.beginPath()
})

document.addEventListener("mouseup", function(event){
	shouldPaint = false
})

document.addEventListener("mousemove",function(event){
	if (shouldPaint) {
 	context.lineTo(event.pageX,event.pageY)
 	context.stroke()


}
})
