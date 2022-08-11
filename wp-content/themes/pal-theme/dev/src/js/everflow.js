
EF.click({
  offer_id: 1,
  affiliate_id: EF.urlParameter('affid'),
  uid: EF.urlParameter('uid'),
  source_id: EF.urlParameter('source_id'),
})
setTimeout(() => {
  EF.conversion({
    offer_id: 1,
    event_id: 2,
  })
}, 1000)
