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

/*

firstname=${this.first_name}
lastname=${this.last_name}
email=${this.email}
phone=${this.phone}
company=${this.company}
data=${JSON.stringify(this.quiz)}
lead_source=${this.lead_source}
utm_source=${this.utm_source}
utm_medium=${this.utm_medium}
utm_campaign=${this.utm_campaign}
c1=${this.c1}
c2=${this.c2}
c3=${this.c3}
ssid=${this.$refs.leadid_token.value}


  const data = JSON.parse(req.query.data)
  const quizQuestions = {}
  data.forEach((q, i) => {
    quizQuestions[`data${i + 2}`] = q.answer
  })

  request({
    url: 'https://smb.leadbyte.com/restapi/v1.3/leads',
    method: 'POST',
    headers: {
      X_KEY: '859eda508946525b6b0822ee93037a91',
      Accept: 'application/json',
    },
    body: JSON.stringify({
      campid: 'ERCHELPERSCOPY',
      sid: '3',
      firstname: req.query.firstname,
      lastname: req.query.lastname,
      email: req.query.email,
      phone1: req.query.phone,
      company: req.query.company,
      data1: req.query.data,
      data6: req.query.lead_source,
      data7: req.query.company,
      data8: req.query.utm_source,
      data9: req.query.utm_medium,
      data10: req.query.utm_campaign,
      c1: req.query.c1,
      c2: req.query.c2,
      c3: req.query.c3,
      ssid: req.query.ssid,
      ...quizQuestions,
    })
  })

*/