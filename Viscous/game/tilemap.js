function tileset(name, firstgid, imageWidth, imageHeight, tileWidth, tileHeight, source) {
	this.name = name;
	this.firstgid = firstgid;
	this.imageWidth = imageWidth;
	this.imageHeight = imageHeight;
	this.tileWidth = tileWidth;
	this.tileHeight = tileHeight;
	this.source = source;

	this.columns = Math.floor(imageWidth / tileWidth);
	this.rows = Math.floor(imageHeight / tileHeight);
	this.lastgid = (firstgid - 1) + (this.columns * this.rows);
}

function load_resource(data, success) {
	jQuery.ajax({
		url : 'backend/resources.php',
		type : "POST",
		dataType : 'json',
		data : data,
		success : success
	});
}

function load_map(map) {
	load_resource({
		func : 'map',
		map : map
	}, map_complete);
}

function map_complete(obj, status) {
	if (!('error' in obj)) {
		map = obj.map;

		console.log(map);

		attrib = map['@attributes'];
		width = attrib.width;
		height = attrib.height;
		tilewidth = attrib.tilewidth;
		tileheight = attrib.tileheight;

		tilesets = [];
		setCount = 0;
		if (map.tileset.length > 1) {
			for (s in map.tileset) {
				sattrib = s['@attributes'];
				sname = sattrib.name;
				sfirstgid = sattrib.firstgid;
				stwidth = sattrib.tilewidth;
				stheight = sattrib.tileheight;

				image = s.image;
				iattrib = image['@attributes'];
				iwidth = iattrib.width;
				iheight = iattrib.height;
				isource = iattrib.source;

				tilesets[setCount++] = new tileset(sname, sfirstgid, iwidth, iheight, stwidth, stheight, isource);
				console.log(tilesets[setCount - 1]);
			}
		} else {
			s = map.tileset;
			sattrib = s['@attributes'];
			sname = sattrib.name;
			sfirstgid = sattrib.firstgid;
			stwidth = sattrib.tilewidth;
			stheight = sattrib.tileheight;

			image = s.image;
			iattrib = image['@attributes'];
			iwidth = iattrib.width;
			iheight = iattrib.height;
			isource = iattrib.source;

			tilesets[setCount++] = new tileset(sname, sfirstgid, iwidth, iheight, stwidth, stheight, isource);
			console.log(tilesets[setCount - 1]);
		}

		// TODO cache? probably there will be reusable tile sets
		for (var i = 0; i < setCount; i++) {
			load_resource({func: 'image', path: tilesets[i].source}, function(obj, status){
				if (!('error' in obj)) {
					// Store
				}else{
					console.log(obj.error);
				}
			});
		}
	} else {
		console.log(obj.error);
	}
}