var TILE_SIZE = 32;
//TODO dynamically load from map

var game = new Phaser.Game(1000, 800, Phaser.AUTO, "game_content", {
	preload : preload,
	create : create,
	update : update,
	render : render
});

var keys;

function preload() {
	/* Load sprites */
	game.load.tilemap('map_test', 'game/res/test.json', null, Phaser.Tilemap.TILED_JSON);
	game.load.image('RPGTown', 'game/res/PathAndObjects.png');
	game.load.image('player', 'game/res/player.png');
}

function create() {
	keys = { //TODO let user pick key layout? - sick, but very far future thinking
		up : game.input.keyboard.addKey(Phaser.Keyboard.W),
		down : game.input.keyboard.addKey(Phaser.Keyboard.S),
		left : game.input.keyboard.addKey(Phaser.Keyboard.A),
		right : game.input.keyboard.addKey(Phaser.Keyboard.D),
	};
	
	game.physics.startSystem(Phaser.Physics.ARCADE);
	//TODO dynamically load map
	map = game.add.tilemap('map_test');
	map.addTilesetImage('RPGTown');

	terrain = map.createLayer('Terrain');
	terrain.resizeWorld();

	object = map.createLayer('Object');
	object.resizeWorld();
	
	player = spawn_object(10, 10, 'player');
	game.camera.follow(player);
}

function update() {
	player.body.velocity.x = 0;
	player.body.velocity.y = 0;
	if(keys.up.isDown){
		player.body.velocity.y = -TILE_SIZE * 3;
	}if(keys.down.isDown){
		player.body.velocity.y = TILE_SIZE * 3;
	}if(keys.left.isDown){
		player.body.velocity.x = -TILE_SIZE * 3;
	}if(keys.right.isDown){
		player.body.velocity.x = TILE_SIZE * 3;
	}
}

function render() {

}

function spawn_object(x, y, sprite) {
	var obj = game.add.sprite(x * TILE_SIZE, y * TILE_SIZE, sprite);
	game.physics.arcade.enable(obj);
	obj.body.collideWorldBounds = true;

	return obj;
}
