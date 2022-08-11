const questions = document.querySelectorAll('.faq-q')
questions.forEach(question => {
  question.addEventListener('click', e => {
    e.preventDefault();
    questions.forEach(question => question.classList.remove('opened'))
    e.target.classList.add('opened')
  })
})

let step = 1
const quizSteps = document.querySelectorAll('.step'),
      formProgress = document.querySelector('.form-progress'),
      quiz = [],
      chooseAnswers = document.querySelectorAll('.chooseAnswer'),
      setProgress = () => {
        formProgress.style.width = `${ step * 100 / (quizSteps.length + 1)}%`
      },
      stepBack = () => {
        step = step - 1
      },
      chooseAnswer = (a, i, q) => {
        quiz.push({
          question: q,
          answer: a
        })
        step = step + 1
        setProgress()
        document.querySelector(`.step-${i}`).classList.remove('step-active')
        document.querySelector(`.step-${Number(i) + 1}`).classList.add('step-active')
      }
chooseAnswers.forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    let answer = e.target.dataset.a,
        index = e.target.dataset.i,
        question = e.target.dataset.q
    if(e.target.dataset.number){
      answer = document.querySelector(e.target.dataset.a).value
    }
    chooseAnswer(answer, index, question)
  })
})
setProgress()