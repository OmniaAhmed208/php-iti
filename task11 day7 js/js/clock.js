// digital clock and Alarm
let clock = document.querySelector('.clock');
let days = document.querySelectorAll('.days div');
let alarm = document.querySelector('.alarm');
let cancel = document.querySelector('.cancel');
let popup = document.querySelector('.top');
let select = document.querySelectorAll('select');
let setBtn = document.querySelector('.set');
let clearBtn = document.querySelector('.clear');
let song = document.querySelector('audio')
let timeAlert ; 


// alarm click to set time
alarm.addEventListener('click',function(){
    popup.style.display = 'inline';
});

cancel.addEventListener('click',function(){
    popup.style.display = 'none';
});


// day
for(let i=0; i<days.length;i++){
    let date = new Date();
    let day = date.getDay();
    if(day == i){
        days[i].classList.add('active');
    }
}

// digital Clock
setInterval (function(){
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    
    let ampm = "AM";

    if(h > 12){
        h = h - 12;
        ampm = "PM";
    }

    h= h == 0 ? 12 - h : h;
    h= h < 10 ? "0" + h : h;
    m= m < 10 ? "0" + m : m;
    s= s < 10 ? "0" + s : s;

    clock.innerHTML = `${h} : ${m} : ${s} <sub style='font-size:15px;color:#6d6464'>${ampm}</sub>`;

    //alert 
    if(timeAlert == `${h} : ${m} ${ampm}`){
        alarm.classList.add('animate');
        song.play();
    }

},1000);


//popup
for(let i=1 ; i<=12; i++){
    i = i < 10 ? '0' + i : i;
    let option = `<option value="${i}">${i}</option>`;
    select[0].firstElementChild.insertAdjacentHTML('afterend', option);
}
for(let i=0 ; i <= 59; i++){
    i = i < 10 ? '0' + i : i;
    let option = `<option value="${i}">${i}</option>`;
    select[1].firstElementChild.insertAdjacentHTML('afterend', option);
}
for(let i=0 ; i < 2; i++){
    let ampm = i == 0 ? 'AM' : 'PM';
    let option = `<option value="${ampm}">${ampm}</option>`;
    select[2].firstElementChild.insertAdjacentHTML('afterend', option);
}

// set button
setBtn.addEventListener('click', function(){
    let time = `${select[0].value} : ${select[1].value} ${select[2].value}`;
    
    if(time.includes('Hour') || time.includes('Minute') || time.includes('AM/PM')){
        return alert('pleae, select a valid time');
    }

    timeAlert = time;
    popup.style.display = 'none';
});

// clear buttun
clearBtn.addEventListener('click', function(){
    timeAlert = "";
    popup.style.display = 'none';
    alarm.classList.remove('animate');
    song.pause();
});