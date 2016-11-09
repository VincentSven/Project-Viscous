var CreateContext = function(canvasId, width, height) {
	this.width = width;
	this.height = height;
	this.canvas = null;
	this.context = null;
	this.canvas = document.getElementById(canvasId);
	this.context = this.canvas.getContext('2d');
};

var Game = {
	lastTick : -1,
	tickLength : -1,
	lastRender : -1,
};

var Context = null;

$(document).ready(function() {
	Context = new CreateContext("canvas", 720, 600);
	Context.context.rect(0, 0, 720, 600);

	disableScrollbars();

	setupRenderer();

	Game.lastTick = performance.now();
	Game.lastRender = Game.lastTick;
	Game.tickLength = 50;

	;
	(function() {
		main(performance.now());
	})();
});

function main(tFrame) {
	window.requestAnimationFrame(main);
	var nextTick = Game.lastTick + Game.tickLength;
	var numTicks = 0;

	//If tFrame < nextTick then 0 ticks need to be updated (0 is default for numTicks).
	//If tFrame = nextTick then 1 tick needs to be updated (and so forth).
	//Note: As we mention in summary, you should keep track of how large numTicks is.
	//If it is large, then either your game was asleep, or the machine cannot keep up.
	if (tFrame > nextTick) {
		var timeSinceTick = tFrame - Game.lastTick;
		numTicks = Math.floor(timeSinceTick / Game.tickLength);
	}

	queueUpdates(numTicks);
	render(tFrame);
	Game.lastRender = tFrame;
}

function queueUpdates(numTicks) {
	for (var i = 0; i < numTicks; i++) {
		Game.lastTick = Game.lastTick + Game.tickLength;
		//Now lastTick is this tick.
		update(Game.lastTick);
	}
}

function update(time) {

}

function render(tFrame) {
	render_world();
}
