var express = require('express'),
    router = express.Router(),
    fs 	   = require('fs'),
    jsonfile   = require('jsonfile'),
    util      = require('util'),
    path  	= require('path');


var user = {
   "user4" : {
      "name" : "mohit",
      "password" : "password4",
      "profession" : "teacher",
      "id": 4
   }
}

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' , message: "yeah are you"});
});

router.get('/listUsers', function(req, res){
		fs.readFile('lib/users.json', 'utf8', function(err, data){
				console.log(data);
				res.render('user', {files: data});
			
		});
	});

router.get('/addUser', function(req, res){
		fs.readFile('lib/users.json', 'utf8', function(err, data){
			//console.dir(jsonfile.readFileSync('lib/users.json'))
				data = JSON.parse(data);
				data['user4'] = user['user4']
				jsonfile.writeFile('lib/users.json', data['user4'], 'utf8', function(err){
					if (err) {console.log('could not write to file')};
				});
				console.log(data);
				res.end( JSON.stringify(data));
			
		});
	});

module.exports = router;
