let controller = new ScrollMagic.Controller();
let scene = new ScrollMagic.Scene({
	triggerElement: '.panels-container'
})

.setClassToggle('.panels-container','show')
.addTo(controller);

let controller2 = new ScrollMagic.Controller();
let scene2 = new ScrollMagic.Scene({
	triggerElement: '.carousel-wrapper'
})

.setClassToggle('.carousel-wrapper','show')
.addTo(controller2);
