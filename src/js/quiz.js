function initQuiz() {
    const quiz = document.querySelector('.quiz');

    if (!quiz) return false;
    console.log('initQuiz');

    const nextBtn = quiz.querySelector('#nextBtn');
    const prevBtn = quiz.querySelector('#prevBtn');

    const formIterator = formIterate(quiz);
    console.log(nextBtn);

    nextBtn.addEventListener('click', e => formIterator.next());
    prevBtn.addEventListener('click', e => formIterator.prev());
}

function formIterate(quiz) {
    const quizForm = document.forms.quizForm;
    let currentStep = 0;
    const stepDivs = quiz.querySelectorAll('.quiz-item');
    const quizResult = document.querySelector('.quiz-result');
    const steps = document.querySelectorAll('.quiz-step');
    const current = document.querySelector('.quiz-current');
    let step = 1;
    console.log(quizResult);

    return {
        next() {
            hideForm(stepDivs[currentStep++]);
            console.log(currentStep, stepDivs.length);
            if (currentStep >= stepDivs.length) {
                showResult(quiz, quizResult);
                return;
            }
            showForm(stepDivs[currentStep]);
            console.log("currentStep = " + currentStep);
            current.textContent = ++step;
            console.log(step);
            steps[currentStep].classList.add('completed');
            if (currentStep > 0) prevBtn.classList.remove('hide');

        },
        prev() {
            steps[currentStep].classList.remove('completed');
            hideForm(stepDivs[currentStep--]);
            showForm(stepDivs[currentStep]);
            current.textContent = --step;
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

function showResult(quiz, result) {
    result.classList.remove('hide');
    quiz.classList.add('hide');
}