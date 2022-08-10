EF.click({
	offer_id: oid,
	affiliate_id: EF.urlParameter('affid'),
	sub1: EF.urlParameter('sub1'),
	sub2: EF.urlParameter('sub2'),
	sub3: EF.urlParameter('sub3'),
	sub4: EF.urlParameter('sub4'),
	sub5: EF.urlParameter('sub5'),
	uid: EF.urlParameter('uid')
});
EF.conversion({
	offer_id: oid,
	event_id: view_id
});