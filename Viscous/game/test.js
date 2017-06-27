//create the first gamestate
var GameState = {
	preload: function(){
		this.load.image('background', 'game/assets/images/Cloudy bg.jpg');
		this.load.image('chicken', 'game/assets/images/chicken.png');
	},
	create: function(){
		this.background = this.game.add.sprite(0, 0, 'background');
		
		this.chicken = this.game.add.sprite(this.game.world.centerX, this.game.world.centerY, 'chicken');
		this.chicken.anchor.setTo(0.5);
	},
	update: function(){
		
	}
};

//initiate phaser framework
var game = new Phaser.Game(800, 400, Phaser.AUTO, "game_content");

game.state.add('state1', GameState);
game.state.start('state1');
