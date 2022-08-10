<?php
$tax = [
  {
    'title' => 'Can I qualify if I’m a 1099 contractor?',
    'dscr' => 'Unfortunately no. This program is only for companies who paid W2 wages to non-owners.',
  },
  {
    'title' => 'Can I qualify if I don’t have any W2 employees?',
    'dscr' => 'Unfortunately no. This program is only for companies who paid W2 wages to non-owners.',
  },
  {
    'title' => 'Can I qualify for ERC when I got a PPP loan?',
    'dscr' => 'Yes! There are multiple quarters you can qualify for, even if you got a PPP loan. Unfortunately you can’t use the same covered time period that you used for PPP, which might reduce your ERC amount, but you can most definitely qualify for ERC.',
  },
  {
    'title' => 'What if my revenue went up in 2020 or 2021? Can I still qualify?',
    'dscr' => 'Yes! It’s called the “Employee Retention” credit, not the “Revenue Reduction” credit. It’s intended to help out the businesses that kept people employed during the hard times of pandemic, so you can qualify even if your revenue went up. You’ll need to qualify using one of the other qualification checks though – shutdowns / mandates or supply chain disruption.',
  },
  {
    'title' => 'How long is the ERC program open for?',
    'dscr' => 'For most businesses this will be open into 2024 (unless they change the rules again). It’s open as long as you can file amended 941-X returns, which is the later of 3 years from the date you filed your original return, or 2 years from the date you paid the payroll tax.',
  },
  {
    'title' => 'What if I have bad credit? Is there a credit check involved?',
    'dscr' => 'It doesn’t matter, because this is not a loan – it’s a tax credit. There are no credit checks, collateral, or personal guarantees required.',
  },
  {
    'title' => 'Can I qualify for ERC if my business is now closed?',
    'dscr' => 'Yes, there is a possibility. It depends on when the business closed.',
  },
];
$credit = [
  {
    'title' => 'What documents do I need to send you?',
    'dscr' => 'To complete your tax credit, we’ll work with you and your CPA to get the following documents:<ul><li>Payroll Journals outlining all payments, deductions, contributions and taxes for each employee for each paycheck during your ERC eligibility period.</li><li>Filed 941, 943 or 944 payroll reports.</li><li>Profit and Loss Statements (P&amp;Ls) for 2020 and 2021</li><li>Tax returns for 2020 and 2021</li><li>PPP Loan Forgiveness Application (if applicable)</li></ul>',
  },
  {
    'title' => 'Do I need to repay the tax credit?',
    'dscr' => 'Nope! There is nothing to repay with a tax credit. This is not a loan.',
  },
  {
    'title' => 'How long does it take to get my credit?',
    'dscr' => 'We are generally telling clients between 7-9 months. We take a few weeks to do the work, and the IRS is variable in how long it’s taking to process, but we’re seeing in the 7-9 month range.',
  },
  {
    'title' => 'When will the ERC funds run out?',
    'dscr' => 'There is no set amount…',
  },
  {
    'title' => 'What if I have back taxes on my account with the IRS?',
    'dscr' => 'If you owe back taxes on your account, the IRS will deduct the amount you owe in back taxes from the credit amount, and will pay you the difference.',
  },
  {
    'title' => 'Is the ERC credit taxable?',
    'dscr' => 'The ERC credit is not actually considered taxable income for federal tax purposes. But what it might do is reduce your company’s deductible wage expenses by the tax credit amount, which will most likely increase your net profit, and therefore what you pay taxes on. Please provide the credit to your CPA or tax preparer for what to do.',
  },
  {
    'title' => 'Will I get in trouble with the IRS for filing?',
    'dscr' => 'Absolutely not! The IRS created this program and doubled-down on making it easier and more lucrative for businesses, so they really want you to file and use it.',
  }
];
?>
<section class="faq">
  <div class="faq__container">
    <h3 class="faq__title">Frequently Asked Questions</h3>
    <ul class="faq__nav">
      <li><a href="#faq-qualification">Qualification</a></li>
      <li><a href="#faq-tax-credit">Tax Credit</a></li>
      <!--        <li><a href="#faq-our-company">Our Company</a></li>-->
    </ul>
    <!--    TAX    -->
    <div id="faq-qualification" class="faq__group">
      <h3 class="faq__group-title">Qualification</h3>
      <div class="faq__block">
        <blocks-faq v-for="(faq, i) in tax" :key="'tax_' + i">
          <template #title>{{ faq.title }}</template>
          <template #dscr>{{ faq.dscr }} </template>
        </blocks-faq>
      </div>
    </div>
    <!--    Tax Credit   -->
    <div id="faq-tax-credit" class="faq__group">
      <h3 class="faq__group-title">Tax Credit</h3>
      <div class="faq__block">
        <blocks-faq v-for="(faq, i) in credit" :key="'credit_' + i">
          <template #title>{{ faq.title }}</template>
          <template #dscr><div v-html="faq.dscr"></div></template>
        </blocks-faq>
      </div>
    </div>
    <!--    Our Company   -->
    <!--      <div id="faq-our-company" class="faq__group">-->
    <!--        <h3 class="faq__group-title">Our Company</h3>-->
    <!--        <div class="faq__block">-->
    <!--          <blocks-faq v-for="(faq, i) in company" :key="'company_' + i">-->
    <!--            <template #title>{{ faq.title }}</template>-->
    <!--            <template #dscr><div v-html="faq.dscr"></div></template>-->
    <!--          </blocks-faq>-->
    <!--        </div>-->
    <!--      </div>-->
  </div>
</section>