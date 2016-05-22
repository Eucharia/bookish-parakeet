module.exports = {

    isAuthenticated: function(req, res, next) {
        if(!req.isAuthenticated()) {
            //TODO - log
            return res.redirect('/');
        }

        next();
    }

};
