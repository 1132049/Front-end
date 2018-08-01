let controller = new ScrollMagic.Controller();
let scene = new ScrollMagic.Scene({
	triggerElement: '.panels-container'
})

.setClassToggle('.panels-container','show')
.addTo(controller);