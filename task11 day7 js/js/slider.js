let next = document.querySelector('.next');
let prev = document.querySelector('.prev');
let slides= document.querySelectorAll('.container>div');
let active= document.querySelector('.active');

let counter = slides.length;
let currentSlide = active.getAttribute('data-set');

next.onclick = nextFun;
prev.onclick = prevFun;

function nextFun(){
    if(next.classList.contains('disabled')){
        return false;
    } else{
        currentSlide--;

        right();
        check();
    }
}

function prevFun(){
    if(prev.classList.contains('disabled')){
        return false;
    } else{
        currentSlide++;
        
        left();
        check();
    }
}

function right(){
    slides.forEach(slide=>{
        if(slide.classList.contains('active')){
            slide.classList.remove('left','right');
            slide.classList.add('right');
        }
    });
}

function left(){
    slides.forEach(slide=>{
        if(slide.classList.contains('active')){
            slide.classList.remove('left','right');
            slide.classList.add('left');
        }
    });
}

function check(){
    slides.forEach(slide=>{
        slide.classList.remove('active');
    });

    slides.forEach(slide=>{
        if(slide.getAttribute('data-set') == currentSlide){
            slide.classList.add('active');
        }
        
        if(currentSlide == 1){
            next.classList.add('disabled');
        }   
        else{
            next.classList.remove('disabled');
        }

        if(currentSlide == slides.length){
            prev.classList.add('disabled');
        }   
        else{
            prev.classList.remove('disabled');
        }
    });
}

// indicators

let ul = document.createElement('ul');
ul.className = 'ul';
let ulElement = document.querySelector('.ul');

for(let i=1 ; i<= slides.length; i++){

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