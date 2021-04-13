function initSchemasDescr() {
    const schemasDescrElems = document.querySelectorAll('.schema-collapse-wrapper');
   /* const innerWidth = width.innerWidth;
    const innerHeight = width.innerHeight;
    const vw = innerWidth / 100;
    const vh = innerHeight / 100;*/

    schemasDescrElems.forEach(wrapper => {
        //let left = +wrapper.dataset.left / vw;
        //let top = +wrapper.dataset.top / vh;
        wrapper.style.left = `${wrapper.dataset.left}%`;
        wrapper.style.top = `${wrapper.dataset.top}%`;
        const plus = wrapper.querySelector('.schema-collapse__btn');
        const descr = wrapper.querySelector('.schema-collapse__descr');

        plus.addEventListener('click', e => descr.classList.toggle('hide'));
});

};