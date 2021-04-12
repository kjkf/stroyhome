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

    setQuizAnswersEventHandlers()
}

function formIterate(quiz) {
    const quizForm = document.forms.quizForm;
    let currentStep = 0, currentClass = 'step-';
    const stepDivs = quiz.querySelectorAll('.quiz-item');
    const quizResult = document.querySelector('.quiz-result');
    const steps = document.querySelectorAll('.quiz-step');
    const current = document.querySelector('.quiz-current');
    const footer = quiz.querySelector('.quiz-item-footer');

    const currentAnswer = document.querySelector('#answer');
    const answers = quiz.querySelectorAll('.quiz-step-result');

    let step = 1;

    return {
        next() {
            answers[currentStep].value = currentAnswer.value;
            currentAnswer.value = "";
            if (answers[currentStep].value === "") return false;

            hideForm(stepDivs[currentStep++]);

            if (currentStep >= stepDivs.length) {
                showResult(quiz, quizResult);
                return;
            }
            showForm(stepDivs[currentStep]);
            quiz.classList.remove(`step-${step}`);
            current.textContent = ++step;
            quiz.classList.add(`step-${step}`);
            steps[currentStep].classList.add('completed');
            if (currentStep > 0) {
                prevBtn.classList.remove('hide');
                footer.classList.add('w50p')
            }

            if (currentStep === 1) {
                footer.classList.add('mt64')
            } else {
                footer.classList.remove('mt64')
            }

        },
        prev() {
            steps[currentStep].classList.remove('completed');
            answers[currentStep].value = "";
            hideForm(stepDivs[currentStep--]);
            showForm(stepDivs[currentStep]);
            quiz.classList.remove(`step-${step}`);
            current.textContent = --step;
            quiz.classList.add(`step-${step}`);
            if (currentStep === 0) {
                prevBtn.classList.add('hide');
                footer.classList.remove('w50p')
            }
            if (currentStep === 1) {
                footer.classList.add('mt64')
            } else {
                footer.classList.remove('mt64')
            }
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

function setQuizAnswersEventHandlers() {
    const answer = document.querySelector('#answer');

    const quest1Answ = document.querySelectorAll("input[name=house-projects]");
    setEventHandler(quest1Answ, answer);

    const quest2Answ = document.querySelector("#area");
    quest2Answ.addEventListener('input', function (e) {
        answer.value = this.value;
    });

    const quest3Answ = document.querySelectorAll("input[name=house-land]");
    setEventHandler(quest3Answ, answer);

    const quest4Answ = document.querySelectorAll("input[name=has-project]");
    setEventHandler(quest4Answ, answer);

    const quest5Answ = document.querySelectorAll("input[name=project-money]");
    setEventHandler(quest5Answ, answer);

    const quest6Answ = document.querySelectorAll("input[name=start-project]");
    setEventHandler(quest6Answ, answer);

}

function setEventHandler(elems, answer) {
    elems.forEach(item => {
        item.addEventListener('click', function (e) {
            answer.value = this.value;
        });
});
}
