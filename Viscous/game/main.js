var game = new Phaser.Game(800, 600, Phaser.AUTO, "game_content", { preload: preload, create: create, update: update, render: render});

var cursors;

function preload(){
	/* Load sprites */
	game.load.tilemap('map_test', 'game/res/test.json', null, Phaser.Tilemap.TILED_JSON);
	game.load.image('RPGTown', 'game/res/PathAndObjects.png');
	
}

function create(){
	game.physics.startSystem(Phaser.Physics.ARCADE);
	map = game.add.tilemap('map_test');
	map.addTilesetImage('RPGTown');
	
	terrain = map.createLayer('Terrain');
    terrain.resizeWorld();
    
    object = map.createLayer('Object');
    object.resizeWorld();
    
    cursors = game.input.keyboard.createCursorKeys();
}

function update(){
	if (cursors.left.isDown)
    {
        game.camera.x -= 4;
    }
    else if (cursors.right.isDown)
    {
        game.camera.x += 4;
    }

    if (cursors.up.isDown)
    {
        game.camera.y -= 4;
    }
    else if (cursors.down.isDown)
    {
        game.camera.y += 4;
    }
}

function render(){
	
}
