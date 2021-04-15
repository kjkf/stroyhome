function initSchemasDescr() {
    const schemasDescrElems = document.querySelectorAll('.schema-collapse-wrapper');
    const schema = document.querySelector('.schema');
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

        const wrapperHeight = schema.getBoundingClientRect().height;

        const topInpx = wrapperHeight * wrapper.dataset.top / 100;


        plus.addEventListener('click', e => {
                descr.classList.toggle('hide');
                const descrHeight = descr.getBoundingClientRect().height;
                const bottomInpx = topInpx + descrHeight;

    //console.log(wrapperHeight, descrHeight, topInpx, bottomInpx);
                if (bottomInpx > wrapperHeight) {
                    descr.classList.add('up');
                    descr.style.top = `${-descrHeight}px`;
                }
        });
    });

};