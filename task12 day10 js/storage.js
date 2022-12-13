let divTasks = document.getElementById('divTasks');
let input = document.querySelector('#task');
let btn = document.querySelector('#btn');
let arr = [];

// لما بنعمل ريفريش وندخل عنصر جديد الاراي بتتملا من الاول فهنخليها تساوي الاراي الي جوا الستورج وتكمل فيها
if (localStorage.getItem("taskOfTodoList")) {
    arr = JSON.parse(localStorage.getItem("taskOfTodoList"));
}

getStorage();

btn.addEventListener('click',()=>{
    if(input.value != ""){
        addToArray();
        input.value="";
    }
});

function addToArray(){

    let task = {
        id: Date.now(),
        title: input.value,
        completed : false
    }

    arr.push(task);
    // console.log(arr);

    show(arr);
    setStorage(arr);
}

function show(arr){

    //بفضي الديف الاساسي عشان ف كل مرة يفضيه ويعرض من اول الاراي تاني عشان ميكررش عنصر لما ييجي يعرض
    divTasks.innerHTML = "";
    
    arr.forEach(task => {
        let div = document.createElement('div');
        div.className = 'parent';
        div.setAttribute('data-id', task.id);
        let p = document.createElement('p');
        let t = document.createTextNode(task.title);
        let div2 = document.createElement('div');
        div2.className = 'icons';
        let icon1 = document.createElement('img');
        icon1.className = 'right';
        icon1.setAttribute('src','correct.png');
        let icon2 = document.createElement('img');
        icon2.className = 'false';
        icon2.setAttribute('src','false.png');

        p.appendChild(t);
        div.appendChild(p);
        div.appendChild(div2)
        div2.appendChild(icon1);
        div2.appendChild(icon2);
        divTasks.appendChild(div);

        if(task.completed){ //if complete = true
            div.className = "parent color";
        }
    });
};

function setStorage(arr){
    window.localStorage.setItem('taskOfTodoList', JSON.stringify(arr));
}

function getStorage(){
    
    let data = localStorage.getItem('taskOfTodoList');

    if(data){
        let task = JSON.parse(data);
        show(task);
    }
}

// completed or delete
divTasks.addEventListener('click',function(e){

    // if clicked on right
    if(e.target.classList.contains('right')){
        toggleColor(e.target.parentElement.parentElement.getAttribute('data-id'));
        e.target.parentElement.parentElement.classList.toggle("color");
    }

    // delete
    if(e.target.classList.contains('false')){
        deleteTask(e.target.parentElement.parentElement.getAttribute('data-id'));
        e.target.parentElement.parentElement.remove();
    }
    
});

// completed => add color
function toggleColor(taskId){
    for (let i = 0; i < arr.length; i++) {
        if (arr[i].id == taskId) {
          arr[i].completed == false ? (arr[i].completed = true) : (arr[i].completed = false);
        }
    }
    setStorage(arr);
};

// deleted
function deleteTask(taskId){
    
    arr = arr.filter((task) => task.id != taskId);
    setStorage(arr);
}