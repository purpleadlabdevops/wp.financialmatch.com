const questions = document.querySelectorAll('.faq-q')
questions.forEach(question => {
  question.addEventListener('click', e => {
    e.preventDefault();
    questions.forEach(question => question.classList.remove('opened'))
    e.target.classList.add('opened')
  })
})

const phoneNumberInput = e => {
  let arr = e.target.value.replace(/[^\dA-Z]/g, '').replace(/[\s]/g, '').split('')
  e.target.value = arr.toString().replace(/[,]/g, '')
}
document.querySelector('[type="tel"]').addEventListener('input', e => phoneNumberInput(e));