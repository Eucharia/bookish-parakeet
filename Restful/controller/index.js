var express = require('express'),
	router  = express.Router(),
	fs 		= require('fs');


	router.get('/listUsers', function(req, res){
		fs.readFile(__dirname + '/' + 'users.json', 'utf8', function(err, data){
			if (err) {
				throw err;
			}else{
				console.log(data);
				res.render('user', {"files": data});
			}
		});
	})

module.exports = router;