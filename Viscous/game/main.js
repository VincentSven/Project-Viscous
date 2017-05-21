var game = new Phaser.Game(800, 600, Phaser.AUTO, "game_content", { preload: preload, create: create, update: update });

function preload(){
	load_map('test');
	/* Load sprites */
}

function create(){
	game.physics.startSystem(Phaser.Physics.ARCADE);
	game.add.text(300, 300, 'Hello world', { fontSize: '32px', fill: '#fff' });
}

function update(){
	
}