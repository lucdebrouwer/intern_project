<<<<<<< HEAD
const div = document.querySelector('.container-fluid');
const dataTables = document.querySelectorAll('.dataTable');

// modal.style.display = 'none';
console.log(dataTables);
div.addEventListener('click', function(event) {
    //event.preventDefault();
if(event.target.tagName === 'A') {
    //event.preventDefault();
    const aTags = document.querySelectorAll('a');
    for (let i = 0; i < aTags.length; i += 1) {
        aTags[i].classList.remove("active");
        event.target.classList.add("active");
  }
}

if (event.target.tagName === 'BUTTON') {
       if(event.target.innerText === 'Hide Data') {
            for(let i=0; i < dataTables.length; i+= 1) {
                dataTables[i].style.display = 'none';
            }
        } else {
            for(let i=0; i < dataTables.length; i+= 1) {
                dataTables[i].style.display = 'block';
            }           
        }

    }
})
=======
const table = document.querySelector('#myTable');
console.log(table);
>>>>>>> 3f93522af01a9e56a4416221748d6b099f7a925b
