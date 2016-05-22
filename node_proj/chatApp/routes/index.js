'use strict'

var express = require('express');
var passport = require('passport');
var Account = require('../models/account');
var socket = require('socket.io-client')('http://localhost');
var router = express.Router();
var io = require('../io');
var LocalStrategy = require('passport-local').Strategy;
var mongoose  = require('mongoose');
var mongo = require('mongodb');

// nodetest is my database name
var db = mongoose.connect('localhost:27017/nodetest');

//var Schema = mongoose.Schema;


// serialize and deserialize user to and from session
passport.serializeUser(function(user, done) {
    done(null, user.id);
});

passport.deserializeUser(function(id, done) {
    var Accounts = mongoose.model('usercollection', Account);
    Accounts.findById(id, function(err, user) {
        done(err, user);
    });
});

// strategies used by passport to authenticate user
passport.use(new LocalStrategy({
        usernameField: 'username',
        passwordField: 'password'
    },
    function(username, password, done) {
        var Accounts = mongoose.model('usercollection', Account);
        Accounts.findOne({ email: username }, function(err, user) {
            console.log(user);
            if(err) { return done(err); }
            if(!user) { return done(null, false, { message: 'Incorrect username.' }); }
            if(!user.authenticate(password)) { return done(null, false, { message: 'Incorrect password.' }); }

            return done(null, user);
        });
    }
));



/* GET home page. */
router.get('/', function(req, res) {
  res.render('index', { user: req.user });
});

router.get('/register', function(req, res) {
    res.render('register', { tittle: 'Register Here' });
});

// register an account and authenticate with passport
router.post('/register', function(req, res) {

    Account.register(new Account({ username : req.body.username }), req.body.password, function(err, account) {
        console.log(req.body.username);
        if (err) {
            // If it failed, return error
            res.send("There was a problem adding the information to the database.");
        }
        else {
            passport.authenticate('local')(req, res, function () {
                res.redirect('/chat');

            });
        }
    });
});

router.get('/login', function(req, res) {
    res.render('login', { user : req.user });
});


router.post('/login', passport.authenticate('local'), function(req, res) {
    // Login success!
     res.redirect('/chat');
});

router.get('/logout', function(req, res) {
    res.render('logout');
    req.logout();
    res.redirect('/');
});


router.get('/chat',  function(req, res){
    if(!req.isAuthenticated()) res.render('index', { title: 'Chat Application', page: 'Index' }); // TODO maybe move this check to isAuthenticated middleware
    else res.render('chat');
});

/* GET Userlist page. */
router.get('/userlist', function(req, res) {
    var db = req.db;
    var collection = db.get('usercollections');
    collection.find({},{},function(e,docs){
        res.render('userlist', {
            "userlist" : docs
        });
    });
});


module.exports = router;
