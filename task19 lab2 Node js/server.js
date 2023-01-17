let express = require('express');
const fs = require('fs');
const app = express();

const bodyParser = require('body-parser');
const { query } = require('express');
const bodyParserForm = bodyParser.urlencoded();

app.set('view engine', 'ejs');

// app.get('/home', function(req,res){ 
//     let user = 'omnia';
//     res.render('home.ejs', {Name:user})
// });

let ids = {
    // idCounter:3
    idCounter:1
}

let books = []

//display data
app.get('/home', function(req,res){

    //to search
    let fbooks = books;
    if(req.query.search){
        fbooks = books.filter(book=> book.bookName.indexOf(req.query.search) > -1 || book.auther.indexOf(req.query.search) > -1)
    }

    res.render('home.ejs', {search:req.query.search,fbooks})
});


// add new books
app.get('/addbooks',function(req,res){
    // res.sendFile(__dirname+'/views/addbooks.html');
    res.render("addBooks.ejs");
});

app.post('/addbooks',bodyParserForm,function(req,res){
    req.body.id = ids.idCounter ++;
    //console.log(req.body); // { id: '__', bookName: '__', auther: '__' }
    books.push(req.body);
    // after push => save data to file
    savingData();

    res.render("redirect.ejs");

});


// update
app.get('/update',function(req,res){
    // req.query.id ==> url of the page after /update will add(?id=anyNumber) => that i give it in (<a href="/update?id=${item.id}">Edit</a>) in html
    // console.log(req.query.id);
    let bookInfo = books.find(book=> book.id == req.query.id); //ex: { id: 2, bookName: 'ali', auther: '122' }
    // console.log(bookInfo)

    res.render("update.ejs",{bookInfo});
});

app.post('/update',bodyParserForm,function(req,res){
    // console.log(req.body);
    // find item that matsh the id in the array
    let bookInfo = books.find(book=> book.id == req.body.id);
    // console.log(bookInfo)

    // update item with new value
    bookInfo.bookName = req.body.bookName;
    bookInfo.auther = req.body.auther;

    savingData();

    res.render("redirect.ejs");

});



// delete
app.get('/delete',function(req,res){

    let bookIndex = books.findIndex(book=> book.id == req.query.id);
    // console.log(bookIndex);
    books.splice(bookIndex,1); // 1 means remove 1 item

    savingData();

    res.render("redirect.ejs");

});


// saving data
function savingData(){
 
    // made json file to save data and take the array of books
    fs.writeFile('books.db',JSON.stringify(books),function(err){
        if (err) console.log(err);
    })
    fs.writeFile('ids.db',JSON.stringify(ids),function(err){
        if (err) console.log(err);
    });

}


function loadDataFromFile(){
    fs.readFile('books.db',function(err,data){
        if(err) console.log('error');
        else{
            //sent to array books to show it
            books = JSON.parse(data);
        }
    });

    fs.readFile('ids.db',function(err,data){
        if(err) console.log('error');
        else{
            ids = JSON.parse(data);
        }
    });
}

loadDataFromFile();


app.listen(8080);

