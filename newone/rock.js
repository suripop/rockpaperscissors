let score = JSON.parse(localStorage.getItem
('score')) || {
    wins: 0,
    losses: 0,
   ties: 0
};                                                                                                                   

updateScoreElement();
    
function playGame(playerMove) {
    const computerMove = pickComputerMove();

    let result = '';
    let result2='';
    let result3='';
    let result4='';
    let result5='';

    if(playerMove === 'scissors') {
        if(computerMove === 'rock'){
            result=`You Lose. <img src="../8-objects.html/HTML/sad-emoji.png" class="move-icon">`;
        }else if(computerMove==='paper'){
            result=`You Win. <img src="../8-objects.html/HTML/smile-emoji.png" class="move-icon">`;
        }else if(computerMove==='scissors'){
            result=`Tie. <img src="../8-objects.html/HTML/tie-emoji.png" class="move-icon">`;
        }

    }else if(playerMove === 'paper') {
        if(computerMove === 'rock'){
            result=`You Win. <img src="../8-objects.html/HTML/smile-emoji.png" class="move-icon">`;
        }else if(computerMove==='paper'){
            result=`Tie. <img src="../8-objects.html/HTML/tie-emoji.png" class="move-icon">`;
        }else if(computerMove==='scissors'){
            result=`You Lose. <img src="../8-objects.html/HTML/sad-emoji.png" class="move-icon">`;
        }
    }else if(playerMove === 'rock') {
        if(computerMove === 'rock'){
            result=`Tie. <img src="../8-objects.html/HTML/tie-emoji.png" class="move-icon">`;
        }else if(computerMove==='paper'){
            result=`You Lose. <img src="../8-objects.html/HTML/sad-emoji.png" class="move-icon">`;
        }else if(computerMove==='scissors'){
            result=`You Win. <img src="../8-objects.html/HTML/smile-emoji.png" class="move-icon">`;
        }
    }
    
    if(result===`You Win. <img src="../8-objects.html/HTML/smile-emoji.png" class="move-icon">`){
        score.wins +=1;
    }else if(result===`You Lose. <img src="../8-objects.html/HTML/sad-emoji.png" class="move-icon">`){
        score.losses +=1;
    }else if(result===`Tie. <img src="../8-objects.html/HTML/tie-emoji.png" class="move-icon">`){
        score.ties +=1;
    }
        
    if(score.wins>=5){
        result2=`you Win the game. <img src="../8-objects.html/HTML/kiss-smiley.png" class="move-icon">`;
        result3=`Robo lose the game. <img src="../8-objects.html/HTML/computer-icon.png" class="move-icon">`;
        result4=`<img src="../8-objects.html/HTML/congratulations-images.gif" class="gif-images">`;
    }else if(score.losses>=5){
        result2=`you lose the game. <img src="../8-objects.html/HTML/losses-icon.png" class="move-icon">`;
        result3=`Robo win the game. <img src="../8-objects.html/HTML/computer-icon.png" class="move-icon">`;
        result4=`<img src="../8-objects.html/HTML/fail-images.gif" class="gif-images">`;
    }else if(score.ties>=5){
        result2=`the game will be tie. <img src="../8-objects.html/HTML/tie-game.png" class="move-icon">`;
        result5=`PLAY AGAIN :`;
        result4=`<img src="../8-objects.html/HTML/gameover-images.gif" class="gameover-gif-images">`;
    }
    
    document.querySelector('.shown1').innerHTML = result2;
    
    document.querySelector('.shown2').innerHTML = result3; 

    document.querySelector('.shown3').innerHTML = result4;

    document.querySelector('.shown4').innerHTML = result5;

    localStorage.setItem('score',JSON.stringify(score));

    updateScoreElement();

    document.querySelector('.js-result').innerHTML = result;

    document.querySelector('.js-moves').innerHTML
    =`You
    <img src="http://localhost/static/8-objects.html/HTML/${playerMove}.png"                                                  
    class="move-icon">
    <img src="http://localhost/static/8-objects.html/HTML/${computerMove}.png"
    class="move-icon">
    Robo`;
}

function updateScoreElement(){
    document.querySelector('.js-score').innerHTML=`Wins: ${score.wins},Losses: ${score.losses},Ties: ${score.ties}`;
}

function pickComputerMove(){
    const randomNumber = Math.random();

    let computerMove='';

    if (randomNumber>=0 && randomNumber<1/3){
        computerMove='rock';
    }else if(randomNumber>=1/3 && randomNumber<2/3){
        computerMove='paper';
    }else if(randomNumber>=2/3 && randomNumber<1){
        computerMove='scissors';
    }

    return computerMove;
}

window.onload = function(){
    document.getElementById("my_audio").play();
}

const wrapper=document.querySelector('.wrapper');
const loginLink=document.querySelector('.login-link');
const registerLink=document.querySelector('.register-link');
const btnPopup=document.querySelector('.btnLogin-popup');
const iconClose=document.querySelector('.icon-close');


registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
});

loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click',()=>{
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
});
    