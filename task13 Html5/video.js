let video = document.getElementById('vid');
let moving = document.getElementById('moving');
let play = document.getElementById('play');
let stop = document.getElementById('stop');
let currtime = document.getElementById('currtime');
let endtime = document.getElementById('endtime');
let begin = document.getElementById('begin');
let finish = document.getElementById('finish');
let lt = document.getElementById('lt');
let gt = document.getElementById('gt');
let sound = document.getElementById('sound');
let mute = document.getElementById('mute');
let speed = document.getElementById('speed');
let fullscreen = document.getElementById('fullscreen');

play.addEventListener('click',()=>{video.play()});
stop.addEventListener('click',()=>{video.pause()});

mute.addEventListener('click',()=>{

    if(video.muted){
        video.muted=false;
        sound.style.opacity='1';
    }
    else{
        video.muted=true;
        sound.style.opacity='0.6';
    }
});


video.addEventListener("timeupdate",()=>{

    let move = (video.currentTime * 100) / video.duration; //الفعلي في 100 علي العدد الكلي هيطلع كام ف المية بيمشيها
    moving.value = move;

    let endMin = Math.floor(video.duration / 60);
    let endSec = Math.floor(video.duration - endMin * 60); // delete min then convert to sec

    let currMin = Math.floor(video.currentTime / 60);
    let currSec = Math.floor(video.currentTime - currMin * 60);

    currMin < 10 ? currMin = "0"+currMin : currMin; 
    currSec < 10 ? currSec = "0"+currSec : currSec; 
    endMin < 10 ? endMin = "0"+endMin : endMin; 
    endSec < 10 ? endSec = "0"+endSec : endSec; 

    currtime.innerHTML = currMin+":"+currSec;
    endtime.innerHTML = endMin+":"+endSec;
});


// begin & finish
begin.addEventListener('click',()=>{ video.currentTime = 0;});
finish.addEventListener('click',()=>{ video.currentTime = video.duration;});

gt.addEventListener('click',()=>{
    video.currentTime = video.currentTime + 0.5;
});
lt.addEventListener('click',()=>{
    video.currentTime = video.currentTime - 0.5;
});

// Sound
sound.addEventListener('change', ()=>{
    video.volume = sound.value / 100;
});

// speed
speed.addEventListener('change', ()=>{
    video.playbackRate += 1;
});

// fullscreen
fullscreen.addEventListener('click',()=>{
    video.requestFullscreen();
});
