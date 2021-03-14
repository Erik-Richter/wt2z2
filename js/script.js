var tabulka = document.getElementById("tabulka");
var vyskaA = screen.availHeight;
var vyskaC = document.getElementById("vkladanie").getBoundingClientRect().height;

console.log(vyskaA);
console.log(vyskaC);

vyska = parseInt(vyskaA) - parseInt(vyskaC) - 200;
tabulka.style.height = vyska + "px";