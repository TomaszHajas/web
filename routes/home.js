module.exports = function (app) {

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
    app.get('/randomizer*', function(req, res){
        console.log(res.query);
        console.log(req.query.seed);
        res.render({seed: req.query.seed}, res);
    });
    
    // wordpress page
    app.get('/wordpress', function(req, res){
        res.render(http://tomaszhajas.azurewebsites.net/wordpress);
    });
}
