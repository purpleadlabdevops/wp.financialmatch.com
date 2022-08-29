//= partials/faq.js

const phoneNumberInput = e => {
  let arr = e.target.value.replace(/[^\dA-Z]/g, '').replace(/[\s]/g, '').split('')
  e.target.value = arr.toString().replace(/[,]/g, '')
}
document.querySelector('[type="tel"]').addEventListener('input', e => phoneNumberInput(e));