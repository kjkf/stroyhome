const allRanges = document.querySelectorAll(".rangecontainer");
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
    bubble.style.left = `calc(${newVal}% + (${18 - newVal * 0.15}px))`;
}