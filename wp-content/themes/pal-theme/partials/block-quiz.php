<div class="top__quiz">
  <form id="quizForm" class="form">
    <div class="form-progress" :style="`width: ${((step + 1) * 100) / (quiz.length + 1)}%`"></div>

    <?php if( have_rows('questions') ): ?>
      <?php $i = 0; while( have_rows('questions') ): the_row(); $i++; $question = get_sub_field('question'); ?>
      <div class="step step-<?php echo $i; ?><?php if($i === 1): ?> step-active<?php endif; ?>">
        <h2><?php echo $question; ?></h2>

        <?php if($i === 1): ?>
        <h3>
          <svg width="17" height="23" viewBox="0 0 17 23" fill="none"  xmlns="http://www.w3.org/2000/svg"><path d="M16.5306 1.22407C6.19336 0.0793971 -9.40939 2.75616 10.8777 22.6206M9.29278 14.5903C9.328 16.6859 9.68373 21.2153 10.8249 22.5678C9.59215 21.8458 5.38329 20.5602 2.68891 20.296" stroke="#75A7EF" /></svg>
          Please Select One
          <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999659 1.22407C11.3369 0.0793971 26.9397 2.75616 6.65257 22.6206M8.2375 14.5903C8.20227 16.6859 7.84655 21.2153 6.7054 22.5678C7.93812 21.8458 12.147 20.5602 14.8414 20.296" stroke="#75A7EF" /></svg>
        </h3>
        <?php endif; ?>

        <?php if(get_sub_field('type') === 'number'): ?>
        <div class="form-options">
          <input type="number" value="1" min="1" max="<?php the_sub_field('max_number'); ?>" placeholder="Enter number" data-id="Employ QTA" id="maxNumber" name="data<?php echo $i; ?>" />
          <div class="buttons">
            <button class="yellow chooseAnswer" data-number="true" data-q="<?php echo $question; ?>" data-a="#maxNumber" data-i="<?php echo $i; ?>" >
              <?php the_sub_field('button'); ?>
            </button>
            <button class="back" @click.prevent="stepBack">
              <img src="<?php echo IMG; ?>/arrow-back.svg" />
            </button>
          </div>
        </div>
        <?php else: ?>
        <div class="form-options">
          <?php if( have_rows('answers') ): ?>
            <?php while( have_rows('answers') ): the_row(); ?>
              <button class="chooseAnswer" data-q="<?php echo $question; ?>" data-a="<?php the_sub_field('text'); ?>" data-i="<?php echo $i; ?>">
                <?php the_sub_field('text'); ?>
              </button>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php // the_sub_field('rules'); ?>
      </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('form_fields') ): ?>
    <div class="step step-form">
      <h2>Enter info below to get your results.</h2>
      <?php while( have_rows('form_fields') ): the_row(); ?>
        <?php if(get_sub_field('type') === 'textarea'): ?>
          <textarea
            name="<?php the_sub_field('name'); ?>"
            id="<?php the_sub_field('name'); ?>"
            placeholder="<?php the_sub_field('placeholder'); ?>"
            required >
          </textarea>
        <?php elseif(get_sub_field('type') === 'select'): ?>
          we don't have select type
        <?php elseif(get_sub_field('type') === 'checkbox'): ?>
          we don't have checkbox type
        <?php elseif(get_sub_field('type') === 'radio'): ?>
          we don't have radio type
        <?php else: ?>
          <input
            type="<?php the_sub_field('type'); ?>"
            name="<?php the_sub_field('name'); ?>"
            id="<?php the_sub_field('name'); ?>"
            placeholder="<?php the_sub_field('placeholder'); ?>"
            <?php if(get_sub_field('type') === 'tel'): ?>
              minlength="8"
              maxlength="14"
            <?php else: ?>
              minlength="2"
              maxlength="155"
            <?php endif; ?>
            required />
        <?php endif; ?>
      <?php endwhile; ?>
      <input type="submit" value="<?php the_field('form_button'); ?>" />
    </div>
    <?php endif; ?>

    <div class="step step-not">
      <h2>You Do Not Qualify for ERC</h2>
      <p>
        Unfortunately based on your answers, it appears that you do not qualify
        for the Employee Retention Tax Credit program.
      </p>
    </div>

    <input id="leadid_token" name="universal_leadid" type="hidden" />
    <div class="loader"></div>
  </form>
</div>

<script src="<?php echo ROOT; ?>/js/leadId.js" id="LeadiDscript"></script>

<script>
setTimeout(()=>{
  console.log('Start EF click');
  EF.click({
    offer_id: 1,
    affiliate_id: EF.urlParameter('affid'),
    uid: EF.urlParameter('uid'),
    source_id: EF.urlParameter('source_id')
  })
    .then(res => {
      console.dir(res);
      console.log('Started EF conversion event');
      return EF.conversion({
        offer_id: 1,
        event_id: 2
      })
    })
    .then(res => {
      console.dir(res)
    })
    .catch(err => {
      console.log('Error')
      console.dir(err)
    })
}, 1000);

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
  const el = document.querySelector(`.step-active`)
  el.classList.remove('step-active')
  el.nextElementSibling.classList.add('step-active')

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
  formData.append("data100", requestData.data)
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
          EF.conversion({
            offer_id: 1,
            value: 1,
            email: requestData.email
          })
            .then(() => {
              console.log('step 1')
              // if 10 or more
              if (quiz[1].answer >= 10) {
                return EF.conversion({
                  offer_id: 1,
                  event_id: 3,
                })
              }
              // if 2-9
              if (quiz[1].answer < 10 && quiz[1].answer > 1) {
                return EF.conversion({
                  offer_id: 1,
                  event_id: 4,
                })
              }
            })
            .then(() => {
              console.log('step 2')
              window.location.href = '<?php the_permalink(132); ?>'
            })
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

</script>