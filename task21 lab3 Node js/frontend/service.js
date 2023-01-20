async function customFetch(url,options){
    let res = await fetch(url,options);
    let resJson = await res.json();

    if(!resJson.Success){
        console.log(resJson.Error);
    }

    return resJson;
}

async function getAllPhones(){
            
    //let res = await fetch("/phones"); // fetch read the header of the promise
    //let resJson = await res.json(); // .json() read body of the promise so we put await also
    //console.log(resJson)
    
    let res = await customFetch('/phones')
    
    // return resJson.Data;
    return res.Data;

}

async function addNewPhone(phone){
    //let res = await fetch('/phones',{
    let res = await customFetch('/phones',{    
        method:'POST',
        headers:{
            'content-type':'application/json'
        },
        body:JSON.stringify(phone)
    })

    // let resJson = await res.json();
    // return resJson;
    return res;
}

async function updatePhone(phone){

    let res = await customFetch('/phones',{    
        method:'Put',
        headers:{
            'content-type':'application/json'
        },
        body:JSON.stringify(phone)
    })

    return res;
}

async function deletePhone(id){
    
    let res = await customFetch('/phones/'+id,{
        method:'Delete'
    });

    return res;
}

