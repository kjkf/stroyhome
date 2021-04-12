const allRanges = document.querySelectorAll(".rangecontainer");
const windowInnerWidth = window.innerWidth;
console.log(windowInnerWidth);
allRanges.forEach(wrap => {
    const range = wrap.querySelector(".range");
    const bubble = wrap.querySelector(".bubble");
    const rangeValue = wrap.querySelector('#rangeValue');

    range.addEventListener("input", () => {
        setBubble(range, bubble, rangeValue);
    });
    setBubble(range, bubble, rangeValue);
});

function setBubble(range, bubble, rangeValue) {
    const val = range.value;
    const min = range.min ? range.min : 0;
    const max = range.max ? range.max : 1000;
    const newVal = Number(((val - min) * 100) / (max - min));
    //bubble.innerHTML = val;
    rangeValue.innerHTML = val;

    // Sorta magic numbers based on size of the native UI thumb
    if (windowInnerWidth > 576) {
        bubble.style.left = `calc(${newVal}% + (${10 - newVal * 0.15}px))`;
    } else {
        bubble.style.top = `calc(${newVal}% + (${5 - newVal * 0.5}px))`;
    }

}