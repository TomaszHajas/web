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
    app.get('/wordpress/wp-content/uploads/2019/01/sea_ship-300x75.png', function(req, res){
        res.sendFile('/wordpress/wp-content/uploads/2019/01/sea_ship-300x75.png');
        /*
        if(req.url.endsWith('/')){
            console.log(req.url+'index.php');
            res.sendFile(req.url+'index.php');
        }else{
            console.log(req.url);
            res.sendFile(req.url);
        }
        */
    });
}
