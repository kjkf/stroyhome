function initQuiz() {
    const quiz = document.querySelector('.quiz');
    if (!quiz) return false;

    const quizForm = document.forms.quizForm;


}

function formIterate(form) {
    let currentStep = 1;
    let prevStep = 0;
    const stepDivs = form.querySelectorAll('.quiz-item');

    return {
        next() {
            currentStep++;
            changeForm(currentStep);
        }
    }
}

function changeForm(step) {
    const currentForm =
}