[
	{
		"id":0,
		"imageLink":"https://s3.amazonaws.com/freecodecamp/funny-cat.jpg",
		"altText":"A white cat wearing a green helmet shaped melon on it's head. ",
		"codeNames":["Juggernaut","Mrs. Wallace","Buttercup"]
	},
	{
		"id":1,"imageLink":"https://s3.amazonaws.com/freecodecamp/grumpy-cat.jpg",
		"altText":"A white cat with blue eys, looking very grumpy. ",
		"codeNames":["Oscar","Scrooge","Tyrion"]
	},
	{
		"id":2,"imageLink":"https://s3.amazonaws.com/freecodecamp/mischievous-cat.jpg",
		"altText":"A ginger cat with one eye closed and mouth in a grin-like expression. Looking very mischievous. ",
		"codeNames":["The Doctor","Loki","Joker"]
	}
]

		json.forEach(function (val){
			var keys = Object.keys(val);
			html += '<div class="cat">';
			keys.forEach(function (key) {
				html += '<b>' + key keys[key+'</b>'
			});
			html += '</div>';
		});