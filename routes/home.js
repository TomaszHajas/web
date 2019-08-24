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
    app.get('/wordpress/post', function(req, res){
        var headers, options;

        // Set the headers
        headers = {
            'Content-Type':'application/x-www-form-urlencoded'
        }

        // Configure the request
        options = {
         url: 'http://tomaszhajas.azurewebsites.net/wordpress/wp-json/wp/v2/posts/1',
            method: 'GET',
            headers: headers
        }

        // Start the request
        request(options, function (error, response, body) {
            if (!error && response.statusCode == 200) {
                res.send({
                 success: true,
                message: "Successfully fetched a list of post", 
                posts: JSON.parse(body)
             });
            } else {
                 console.log(error);
            }
        });
    }
}
