let express = require('express');

let app = express();

app.listen(8080);

let bodyParser = require('body-parser');

let parserForm = bodyParser.urlencoded();

app.get('/home',function(req,res){
    console.log('home request');
    res.sendFile(__dirname+'/pages/home.html')
});
app.get('/about',function(req,res){
    console.log('about request');
    res.sendFile(__dirname+'/pages/about.html')
});
app.get('/contact',function(req,res){
    console.log('contact request');
    res.sendFile(__dirname+'/pages/contact.html')
});

// Login Form
app.post('/login',parserForm,function(req,res){
    if(req.body.password.length >= 8){
        res.send(`<h1>Registration Success</h1>`);
    }
    else{
        res.send('<h1>Error Password is less than 8 characters</h1>');
    }
})