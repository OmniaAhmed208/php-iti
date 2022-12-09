let next = document.querySelector('.next');
let prev = document.querySelector('.prev');
let slides= document.querySelectorAll('.container>div');
let counter = slides.length;
let currentSlide = 1;

next.onclick = nextFun;
prev.onclick = prevFun;

let ul = document.createElement('ul');
ul.className = 'ul';
let ulElement = document.querySelector('.ul');

for(let i=1 ; i<= counter; i++){

    let li = document.createElement('li');
    li.setAttribute('data-index', i);

    ul.appendChild(li);
}

document.querySelector('.indicator').appendChild(ul);

let arrLi = Array.from(document.querySelectorAll('.ul li'));

for(let i=0; i<arrLi.length; i++){

    arrLi[i].onclick = function(){

        currentSlide = arrLi[i].getAttribute('data-index');

        check();
    }
}

check();

function check(){

    removeActive();

    slides[currentSlide-1].classList.add('active');

    arrLi[currentSlide-1].classList.add('active');

    if(currentSlide == 1){
        prev.classList.add('disabled');
    } else{
        prev.classList.remove('disabled')
    }

    if(currentSlide == counter){
        next.classList.add('disabled');
    } else{
        next.classList.remove('disabled')
    }

}

function removeActive(){
    slides.forEach((ele)=>{
        ele.classList.remove('active');
    });

    arrLi.forEach((ele)=>{
        ele.classList.remove('active');
    })
}

function nextFun(){
    if(next.classList.contains('disabled')){
        return false
    } else{
        currentSlide++;

        check();
    }
}

function prevFun(){
    if(prev.classList.contains('disabled')){
        return false
    } else{
        currentSlide--;

        check();
    }
}
