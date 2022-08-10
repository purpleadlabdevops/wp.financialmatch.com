let oid, view_id, add_id, che_id;
let EFID = [
	{ page: 33,  style: 'white', oid: 3,  view: 15, add: 13, che: 14 }, // v3 white
	{ page: 33,  style: 'dark',  oid: 2,  view: 9,  add: 10, che: 11 }, // v3 dark

	{ page: 35,  style: 'white', oid: 4,  view: 19, add: 17, che: 18 }, // v4 white
	{ page: 35,  style: 'dark',  oid: 4,  view: 19, add: 17, che: 18 }, // v4 dark

	{ page: 112, style: 'white', oid: 6,  view: 27, add: 25, che: 26 }, // v5 white
	{ page: 112, style: 'dark',  oid: 5,  view: 23, add: 21, che: 22 }, // v5 dark

	{ page: 557, style: 'white', oid: 11, view: 51, add: 49, che: 50 }, // v5/149 white
	{ page: 557, style: 'dark',  oid: 11, view: 51, add: 49, che: 50 }, // v5/149 dark

	{ page: 558, style: 'white', oid: 12, view: 56, add: 54, che: 55 }, // v5/169 white
	{ page: 558, style: 'dark',  oid: 12, view: 56, add: 54, che: 55 }, // v5/169 dark

	{ page: 205, style: 'dark',  oid: 10, view: 43, add: 41, che: 42 }, // v6/ white
	{ page: 205, style: 'white', oid: 10, view: 43, add: 41, che: 42 }, // v6/ dark

	{ page: 468, style: 'white', oid: 7,  view: 31, add: 29, che: 30 }, // mj/ white
	{ page: 468, style: 'dark',  oid: 7,  view: 31, add: 29, che: 30 }, // mj/ dark

	{ page: 587, style: 'white',  oid: 14,  view: 62, add: 60, che: 61 }, // v7/?style=white white
	{ page: 587, style: 'dark',   oid: 14,  view: 62, add: 60, che: 61 }, // v7/ dark

	{ page: 674, style: 'white',  oid: 14,  view: 62, add: 60, che: 61 }, // v7jcp
	{ page: 674, style: 'dark',   oid: 14,  view: 62, add: 60, che: 61 }, // v7jcp

	{ page: 615, style: 'white',  oid: 14,  view: 62, add: 60, che: 61 }, // v7deal/?style=white white
	{ page: 615, style: 'dark',   oid: 14,  view: 62, add: 60, che: 61 }, // v7deal/ dark

	{ page: 800, style: 'white',  oid: 18,  view: 75, add: 73, che: 74 }, // v7deal/?style=white white
	{ page: 800, style: 'dark',   oid: 18,  view: 75, add: 73, che: 74 }, // v7deal/ dark

	{ page: 783, style: 'white',  oid: 19,  view: 80, add: 78, che: 79 }, // v9/?style=white
	{ page: 783, style: 'dark',   oid: 19,  view: 80, add: 78, che: 79 }, // v9/?style=dark
];

for (let i in EFID) {
	if(EFID[i].page == pageID && EFID[i].style == pageStyle){
		oid = EFID[i].oid;
		view_id = EFID[i].view;
		add_id = EFID[i].add;
		che_id = EFID[i].che;
		break;
	}
}
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
document.addEventListener("DOMContentLoaded", function(){
	setTimeout(function(){
		EF.conversion({
			offer_id: oid,
			event_id: view_id
		});
		let uid = EF.urlParameter('uid');

		if(wp_user && wp_user == 'administrator'){
			console.log('Offer ID: '+oid);
			console.log('UID: '+ uid );
			console.log('Offer Page View: '+view_id);
			console.log('Add to Cart: '+add_id);
			console.log('Initiate Checkout: '+che_id);
		}
	}, 2000);
});