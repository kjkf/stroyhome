function initSchemasDescr() {
    const schemasDescrElems = document.querySelectorAll('.schema-collapse-wrapper');
    const schema = document.querySelector('.schema');

    schemasDescrElems.forEach(wrapper => {
        //let left = +wrapper.dataset.left / vw;
        //let top = +wrapper.dataset.top / vh;
        wrapper.style.left = `${wrapper.dataset.left}%`;
        wrapper.style.top = `${wrapper.dataset.top}%`;
        const plus = wrapper.querySelector('.schema-collapse__btn');
        const descr = wrapper.querySelector('.schema-collapse__descr');

        const wrapperHeight = Math.max(schema.getBoundingClientRect().height, 500);

        const topInpx = wrapperHeight * wrapper.dataset.top / 100;


        plus.addEventListener('click', e => {
                descr.classList.toggle('hide');
                const descrHeight = descr.getBoundingClientRect().height;
                const bottomInpx = topInpx + descrHeight;
    console.log(descrHeight, bottomInpx, wrapperHeight);

    //console.log(wrapperHeight, descrHeight, topInpx, bottomInpx);
                if (bottomInpx > wrapperHeight) {
                    descr.classList.add('up');
                    descr.style.top = `${-descrHeight}px`;
                }
        });
    });

};