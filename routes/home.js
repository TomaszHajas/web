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
    app.get('/randomizer/index.html', function(req, res){
        res.redirect(url.format({
                pathname:path.join(__dirname, '../')\+'\randomizer\index.html',
                query:req.query,
            });
        });
        //res.sendFile(path.join(__dirname, '../')\+'\randomizer\index.html?seed=12')
    });
}
