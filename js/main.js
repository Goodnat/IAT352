/* WORDS CHANGE learned from: http://www.jq22.com/code1913*/
function change(text, element) {
    var sample = document.querySelector(element);
    if (sample.dataset.animating === 'true') return;
    var sampleH = 50; 
    var sampleT = sample.textContent; // old text
    var sampleNT = text; // new text
    sample.dataset.animating = 'true';
    sample.style.height = sampleH + 'px';
  
    var sameWord = document.createElement('div');
    sameWord.style.transformOrigin = '0 ' + sampleH / 2 + 'px -' + sampleH / 2 + 'px';
    sameWord.classList.add('t3xt');
    sameWord.textContent = sampleT;
  
    var samN = sameWord.cloneNode();
    samN.textContent = sampleNT;
    sample.textContent = '';
    sample.appendChild(sameWord);
    sample.appendChild(samN);
  
    sameWord.classList.add('t3xt-out');
    samN.classList.add('t3xt-in');
  
    samN.addEventListener('animationend', function (event) {
      sample.removeChild(sameWord);
      sample.removeChild(samN);
      sample.textContent = sampleNT;
      sample.dataset.animating = 'false';
    });
  }
  
var phraseIndex = 1;
var wordIndex = 0;
var t3xts = [
["PENGYU-LI (NAT)"],
["A WEB DESIGNER"],
["A VIDEO GRAPHER"],
];

setTimeout(changetext, 200);

function changetext() {
    if (wordIndex > 0) {
      wordIndex = 0;
      phraseIndex++;
    }
    if (phraseIndex >= t3xts.length) {
      phraseIndex = 0;
    }
    var term = t3xts[phraseIndex][wordIndex];
    change(term, '.t3xt-' + ++wordIndex);
  
    if (wordIndex == 1) {
      setTimeout(changetext, 2000);
    } else {
      setTimeout(changetext, 150);
    }
}

  