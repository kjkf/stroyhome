function initQuiz() {
    const quiz = document.querySelector('.quiz');

    if (!quiz) return false;
    console.log('initQuiz');
    const quizForm = document.forms.quizForm;
    const nextBtn = quiz.querySelector('#nextBtn');
    const prevBtn = quiz.querySelector('#prevBtn');

    const formIterator = formIterate(quizForm);
    console.log(nextBtn);

    nextBtn.addEventListener('click', (e, quizForm) => formIterator.next());
    prevBtn.addEventListener('click', (e, quizForm) => formIterator.prev());
}

function formIterate(form) {
    let currentStep = 0;
    const stepDivs = form.querySelectorAll('.quiz-item');
    const quizResult = form.querySelector('.quiz-result');
    const steps = document.querySelectorAll('.quiz-step');
    const current = document.querySelector('.quiz-current');
    console.log(current);

    return {
        next() {
            hideForm(stepDivs[currentStep++]);
            console.log("currentStep = " + currentStep);
            if (currentStep > stepDivs.length) {
                showResult(quizResult);
                return;
            }
            showForm(stepDivs[currentStep]);
            current.textContent = currentStep;
            console.log(current);
            steps[currentStep].classList.add('completed');
            if (currentStep > 0) prevBtn.classList.remove('hide');

        },
        prev() {
            steps[currentStep].classList.remove('completed');
            hideForm(stepDivs[currentStep--]);
            showForm(stepDivs[currentStep]);
            current.innerHTML = currentStep;
            if (currentStep === 0) prevBtn.classList.add('hide');
        }
    }
}

function hideForm(form) {
    form.classList.add('hide');
}

function showForm(form) {
    form.classList.remove('hide');
}

function showResult(result) {
    result.classList.remove('hide');
}