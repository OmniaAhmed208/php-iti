let http = require('http');

let server = http.createServer(handlerFun);
server.listen(8080);

function handlerFun(req,res){
    console.log('request is done');

    if(req.url == '/home'){
        requestFun('home.html',res);
    }
    else if(req.url == '/about'){
        requestFun('about.html',res);
    }
    else if(req.url == '/contact'){
        requestFun('contact.html',res);
    }
    else{
        res.writeHead(404,{'Content-Type': 'text/html'});
        res.write(`<h1>Page Not Found</h1>`);
    }
}

function requestFun(fileName,res){
    let fs = require('fs');

    res.writeHead(200, {'Content-Type': 'text/html'});

    fs.readFile(__dirname+'/pages/'+fileName, function(err,data){
        res.write(data);
        res.end();
    })

}