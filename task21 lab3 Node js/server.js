const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");

const bodyParserJson = bodyParser.json();

const app = express();
app.use(bodyParserJson);
app.use(express.static('frontend'));

let phones = [];
let settings = { phoneId:1 };

app.get('/',function(req,res){
    res.sendFile(__dirname+'/frontend/index.html');
})

// get phones
app.get('/phones',function(req,res){
    let responseBody = {
        Success:true,
        Error: "",
        Data:phones
    }
    //res.send(phones); //return the array
    res.send(responseBody);
});

app.get('/phones/:id',function(req,res){ // /phones/:id that id will written in url
    // localhost:8080/phones/1 ==> 1 will save in params calles id
    // console.log(req.params.id)
    let phone = phones.find(phone=> phone.id == req.params.id);
    
    let responseBody = {
        Success:true,
        Error: "",
        Data:phone
    }

    if(!phone){
        responseBody.Success = false;
        responseBody.Error = "Phone not found";
    }

    //res.send(phone); // return special phone
    res.send(responseBody);
});

//add phones
app.post('/phones',function(req,res){
    // code for any verification

    let responseBody = {
        Success:true,
        Error: "",
        Data:req.body
    }

    let validationResult = validatePhone(req.body)
    responseBody.Success = validationResult.Success;
    responseBody.Error = validationResult.Error;

    if(responseBody.Success){
        req.body.id = settings.phoneId++;
        phones.push(req.body);
        saveToDB();
    }

    res.send(responseBody);
})

//update phones
app.put('/phones',function(req,res){
    let phone = phones.find(phone=> phone.id == req.body.id);
    
    let responseBody = {
        Success:true,
        Error: "",
        Data:phone
    }

    if(!phone){
        responseBody.Success = false;
        responseBody.Error = "Phone not found";
    }
    
    if(responseBody.Success){
        let validationResult = validatePhone(req.body)
        responseBody.Success = validationResult.Success;
        responseBody.Error = validationResult.Error;
    }

    if(responseBody.Success){
        phone.name = req.body.name;
        phone.phone = req.body.phone;
        saveToDB();
    }    
    res.send(responseBody);
})

//delete phones
app.delete('/phones/:id',function(req,res){
    let phoneIndex = phones.findIndex(phone=> phone.id == req.params.id);
    
    let responseBody = {
        Success:true,
        Error: "",
        Data:req.params.id
    }

    if(!phoneIndex == -1){
        responseBody.Success = false;
        responseBody.Error = "Phone not found";
    }
    
    if(responseBody.Success){
        phones.splice(phoneIndex,1);
        saveToDB();
    }

    res.send(responseBody);
})

// Validation
function validatePhone(phoneObj){

    let validationResult = {
        Success:true,
        Error:""
    }

    if(!phoneObj.phone || phoneObj.phone.length < 3 ){
        validationResult.Success = false;
        validationResult.Error = "Phone Number should be 11 Number";
    }

    let exists = phones.find(x => x.phone == phoneObj.phone && x.id != phoneObj.id);

    if(exists){
        validationResult.Success = false;
        validationResult.Error = "Phone Number already Exist";
    }

    return validationResult;
}

// save db
function saveToDB(){
    fs.writeFile('phones.db',JSON.stringify(phones),function(err){
        if (err) console.log('error');
    })

    fs.writeFile('settings.db',JSON.stringify(settings),function(err){
        if (err) console.log('error');
    })
}

function loadFromDB(){
    fs.readFile('phones.db',function(err,data){
        if (err) console.log(err)
        else phones = JSON.parse(data);
    })

    fs.readFile('settings.db',function(err,data){
        if (err) console.log(err)
        else settings = JSON.parse(data);
    })
}

loadFromDB();

app.listen(8080);
