function initSchemasDescr() {
    const schemasDescrElems = document.querySelectorAll('.schema-collapse-wrapper');

    schemasDescrElems.forEach(wrapper => {
        wrapper.style.left = `${wrapper.dataset.left}px`;
        wrapper.style.top = `${wrapper.dataset.top}px`;
        const plus = wrapper.querySelector('.schema-collapse__btn');
        const descr = wrapper.querySelector('.schema-collapse__descr');

        plus.addEventListener('click', e => descr.classList.toggle('hide'));
});

};