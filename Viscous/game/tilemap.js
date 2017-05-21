function load_map(map) {
	jQuery.ajax({
		url : 'backend/resources.php',
		type : "POST",
		dataType : 'json',
		data : { func: 'map', map: map },
		success : function(obj, status) {
			if (!('error' in obj)) {
				map = obj.map;
				
				attrib = map['@attributes'];
				width = attrib.width;
				height = attrib.height;
				tilewidth = attrib.tilewidth;
				tileheight = attrib.tileheight;
			
				console.log(map);			
			} else {
				console.log(obj.error);
			}
		}
	});
}
