let sections = document.querySelectorAll('.hidden');

window.onscroll=()=>{

    sections.forEach( sec=> {

        let top=window.scrollY;
        let offset= sec.offsetTop;
        let height = sec.offsetHeight;

        if (top >= offset -700 && top < offset + height ){
            sec.classList.add('show');
        }
        else{
            sec.classList.remove('show');
        }
    })
}


