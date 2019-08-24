module.exports = function (app) {
    path = require('path')
    // home page
    app.get('/', function (req, res) {
        res.render('index', { title: 'Home Page.  ' })
    });

    // chat area
    app.get('/chat', function (req, res) {
        res.render('chat', { title: 'Chat with Me!  ' })
    });

    // about page
    app.get('/about', function (req, res) {
        res.render('about', { title: 'About Me.  ' })
    });
    
    // randomizer page
    app.get('/randomizer', function(req, res){
        res.sendFile('/randomizer/index.html')
    });
    
    // wordpress
    app.use('/wordpress', proxy('tomaszhajas.azurewebsites.net/wordpress/', {
        forwardPath: function(req, res) {
            return require('url').parse(req.url).path;
     }
    }));
}
