let step = 1
const quiz = [],
      requestData = {
        campid: 'ERCHELPERSCOPY',
        sid: '3'
      }

const urlParams = new URLSearchParams(window.location.search)
urlParams.get('product')
requestData.utm_source = urlParams.get('utm_source') ? urlParams.get('utm_source') : false
requestData.utm_medium = urlParams.get('utm_medium') ? urlParams.get('utm_medium') : false
requestData.utm_campaign = urlParams.get('utm_campaign') ? urlParams.get('utm_campaign') : false
requestData.c1 = urlParams.get('c1') ? urlParams.get('c1') : false
requestData.c2 = urlParams.get('c2') ? urlParams.get('c2') : false
requestData.c3 = urlParams.get('c3') ? urlParams.get('c3') : false
requestData.c4 = urlParams.get('c4') ? urlParams.get('c4') : false
requestData.ef_sub1 = urlParams.get('sub1') ? urlParams.get('sub1') : false
requestData.ef_sub2 = urlParams.get('sub2') ? urlParams.get('sub2') : false
requestData.ef_sub3 = urlParams.get('sub3') ? urlParams.get('sub3') : false
requestData.ef_sub4 = urlParams.get('sub4') ? urlParams.get('sub4') : false

const setProgress = () => {
  document.querySelector('.form-progress').style.width = `${ step * 100 / (document.querySelectorAll('.step').length + 1)}%`
}

setProgress()

const stepBack = () => {
  step = step - 1
}

const chooseAnswer = (a, i, q) => {
  quiz.push({
    question: q,
    answer: a
  })
  step = step + 1
  setProgress()
  document.querySelector(`.step-${i}`).classList.remove('step-active')
  document.querySelector(`.step-${Number(i) + 1}`).classList.add('step-active')
}

document.querySelectorAll('.chooseAnswer').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    let a = e.target.dataset.a,
        i = e.target.dataset.i,
        q = e.target.dataset.q
    if(e.target.dataset.number){
      chooseAnswer(document.querySelector(`${a}`).value, i, q)
    } else {
      chooseAnswer(a, i, q)
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = `data${i}`
      input.value = a
      e.target.appendChild(input)
    }
  })
})

const serialize = form => {
  for (let i = 0; i < form.elements.length; i++) {
    const field = form.elements[i]
    if (field.name && !field.disabled && !['file', 'reset', 'submit', 'button', 'checkbox', 'radio'].includes(field.type)){
      requestData[field.name] = field.value
    }
  }
}

const loaderAction = () => {
  document.querySelector('.loader').classList.toggle('active');
}

document.getElementById('quizForm').addEventListener('submit', e => {
  e.preventDefault()
  loaderAction()
  serialize(e.target)
  requestData.data = JSON.stringify(quiz)
  requestData.ssid = document.getElementById('leadid_token').value

  const formData = new FormData()
  formData.append("action", "quizSubmit")
  formData.append("campid", 'ERCHELPERSCOPY')
  formData.append("sid", 3)
  formData.append("firstname", requestData.firstname)
  formData.append("lastname", requestData.lastname)
  formData.append("email", requestData.email)
  formData.append("phone1", requestData.phone)
  formData.append("company", requestData.company)
  formData.append("data100", requestData.quiz)
  formData.append("data1", requestData.data1)
  formData.append("data2", Number(requestData.data2))
  formData.append("data3", requestData.data3)
  formData.append("data4", requestData.data4)
  formData.append("data5", requestData.data5)
  formData.append("data6", window.location.origin)
  formData.append("data7", requestData.company)
  formData.append("data8", requestData.utm_source)
  formData.append("data9", requestData.utm_medium)
  formData.append("data10", requestData.utm_campaign)
  formData.append("c1", requestData.utm_source)
  formData.append("c2", requestData.utm_medium)
  formData.append("c3", requestData.utm_campaign)
  formData.append("c4", requestData.c4)
  formData.append("ssid", requestData.ssid)
  formData.append("ef_aff", requestData.c3)
  formData.append("source", 'everflow')
  formData.append("ef_sub1", requestData.ef_sub1)
  formData.append("ef_sub2", requestData.ef_sub2)
  formData.append("ef_sub3", requestData.ef_sub3)
  formData.append("ef_sub4", requestData.ef_sub4)
  formData.append("ef_trans", requestData.c1)
  formData.append("optinurl", window.location.href)

  const request = new XMLHttpRequest()
  request.open('POST', data.ajax, true)
  request.onload = function(){
    loaderAction()
    if (this.status >= 200 && this.status < 400) {
      if(this.response === 'Operation timed out after 5000 milliseconds with 0 bytes received'){
        alert(`Connection error: please try againe!`)
      } else {
        const result = JSON.parse(this.response)
        console.dir(result);
        if(result.status === "Error"){
          result.errors.forEach(item => {
            alert(`${result.status}: ${item}`)
          })
        } else if(result.status === "Success") {
          alert('Thank you, we will contact you shortly.')
          console.log('redirect to thank you page');
        }
      }
    } else {
      console.log(this.response)
    }
  }
  request.onerror = function(){
    console.log(this.response)
  }
  request.send(formData)
})