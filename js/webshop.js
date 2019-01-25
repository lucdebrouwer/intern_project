// Problem: generate a webshop based on the categories, for each category generate a unique set of configurations containing its respective items.
// Solution: Show a pre defined configuration, when a category is selected modify the configuration, show the items in that category above the existing configuration
// Allow the user to remove or add items

const producten = document.querySelector('#producten');
const systemen = document.querySelector('#systemen');
const schermen = document.querySelector('#schermen');
const toetsenborden = document.querySelector('#toetsenborden');
const muizen = document.querySelector('#muizen');
const ethkabels = document.querySelector('#ethkabels');
const switches = document.querySelector('#switches');
const h6 = document.querySelectorAll('h4');
const p = document.querySelectorAll('p');
const form = document.querySelector('form');
// form.addEventListener('submit', (event) => {
//  producten.style.display = 'block';
// });

console.log(h6.length);
for(let i = 0; i < h6.length; i+=1) {
    h6[i].className = 'card-title';
}

for(let j = 0; j < p.length; j+=1) {
    p[j].className = 'card-text';
}

const div = document.querySelector('.container-fluid');
div.addEventListener('click', function(e){
    if(e.target.tagName == 'H2' || e.target.tagName == 'SPAN') {
        const val = e.target.parentNode.innerText;
        switch(val){

            case "Producten ☰":
            if(producten.style.display == 'block') {
                producten.style.display = 'none';
            } else {
                producten.style.display = 'block';
            }
            break;

            case "Systemen ☰": 
            if(systemen.style.display == 'none') {
                systemen.style.display = 'block';
            }
            else
            {
                systemen.style.display = 'none';
            }
            break;
            case "Schermen ☰": 
            if(schermen.style.display == 'none') {
                schermen.style.display = 'block';
            }
            else
            {
                schermen.style.display = 'none';
            }
            break;
            case "Toetsenborden ☰": 
            if(toetsenborden.style.display == 'none') {
                toetsenborden.style.display = 'block';
            }
            else
            {
                toetsenborden.style.display = 'none';
            }
            break;
            case "Muizen ☰": 
            if(muizen.style.display == 'none') {
                muizen.style.display = 'block';
            }
            else
            {
                muizen.style.display = 'none';
            }
            break;
            case "Ethernet kabels ☰": 
            if(ethkabels.style.display == 'none') {
                ethkabels.style.display = 'block';
            }
            else
            {
                ethkabels.style.display = 'none';
            }
            break;
            case "Switches ☰": 
            if(switches.style.display == 'none') {
                switches.style.display = 'block';
            }
            else
            {
                systemen.style.display = 'none';
            }
            break;                                                            
        }
    }
});

//const systemen = document.querySelector('#systemen');
producten.style.display = 'block';
systemen.style.display = 'none';
schermen.style.display = 'none';
toetsenborden.style.display = 'none';
muizen.style.display = 'none';
ethkabels.style.display = 'none';
switches.style.display = 'none';
