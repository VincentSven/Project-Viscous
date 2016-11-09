var map = {
	cols : 12,
	rows: 12,
	tsize: 32,
	layers: [[
		3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3,
        3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 3,
        3, 1, 2, 2, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 2, 2, 1, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 3,
        3, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 3,
        3, 3, 3, 1, 1, 2, 3, 3, 3, 3, 3, 3
    ], [
        4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4,
        4, 4, 4, 0, 5, 4, 4, 4, 4, 4, 4, 4,
		4, 4, 4, 0, 0, 3, 3, 3, 3, 3, 3, 3
	]],
	
	getTile: function (layer, col, row) {
        return this.layers[layer][row * map.cols + col];
	}
};

setupRenderer = function(){
	layerCanvas = map.layers.map(function () {
        var c = document.createElement('canvas');
        c.width = 720;
        c.height = 600;
        return c;
	});
	
	tileAtlas = new Image();
	tileAtlas.src = "res/spritesheet.png";
	
	drawMap();
};

drawMap = function(){
	map.layers.forEach(function (layer, index) {
        drawLayer(index);
	}.bind(this));
};

drawLayer = function(layer){
	var context = this.layerCanvas[layer].getContext('2d');
	context.clearRect(0, 0, 720, 600);
	
	var offsetX = 0;
	var offsetY = 0;
	
	for(var c = 0; c < map.cols; c++){
		for(var r = 0; r < map.rows; r++){
			var tile = map.getTile(layer, c, r);
			var x = (c - 0) * map.tsize + offsetX;
			var y = (r - 0) * map.tsize + offsetY;
			if(tile != 0){
				context.drawImage(this.tileAtlas, (tile - 1) * map.tsize, 0, map.tsize, map.tsize, Math.round(x),  Math.round(y), map.tsize, map.tsize);
			}
		}	
	}
};

render_world = function(){
	//drawMap(); only if map changed...
	
	Context.context.drawImage(this.layerCanvas[0], 0, 0);
	Context.context.drawImage(this.layerCanvas[1], 0, 0);
};


