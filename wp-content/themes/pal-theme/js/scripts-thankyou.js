const questions = document.querySelectorAll('.faq-q')
questions.forEach(question => {
  question.addEventListener('click', e => {
    e.preventDefault();
    questions.forEach(question => question.classList.remove('opened'))
    e.target.classList.add('opened')
  })
})
console.log('thank  you');