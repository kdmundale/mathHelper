function nums(){
  var start_1 = document.getElementById("start_1").value;
  var start_2 = document.getElementById('start_2').value;
  var end_1 = document.getElementById('end_1').value;
  var end_2 = document.getElementById('end_2').value;

  end_1++;
  end_2++;

  function findTwoNumbers(a,b,x,y){
    function pickRandom(min, max){
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min) + min);
    }
    if(a<b){
      num1=pickRandom(a,b);
    } else {
      num1=pickRandom(b,a);
    }
    if(x<y){
      num2=pickRandom(x,y);
    } else {
      num2=pickRandom(y,x);
    }
    document.getElementById('firstNo').value = num1;
    document.getElementById('secNo').value = num2;
  }
  findTwoNumbers(start_1,end_1,start_2,end_2);
}

function test(){
  console.log("BANG BANG!")
}

const button = document.getElementById('getNums');
button.addEventListener("click",nums);
