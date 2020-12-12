var slider1 = {
	ImagesUrls: [],
	currentImageIndex:0,
	showPrevBtn: document.getElementById('show-prev-btn'),
	showNextBtn: document.getElementById('show-next-btn'),
	slideImage: document.getElementById('slide-img'),

	start: function() {
		var that = this;

		//subscribe to events
		this.showPrevBtn.addEventListener('click', function(e) {
			that.onShowPrevBtnClick(e)
			//this onShowPrevBtnClick
		} );
		this.showNextBtn.addEventListener('click', this.onShowNextBtnClick);

		//create images array
		this.ImagesUrls.push('/img/Gnom.jpg');
		this.ImagesUrls.push('/img/zal.jpg');
		this.ImagesUrls.push('/img/ironhorse.jpg');
		this.ImagesUrls.push('/img/wall0.jpg');

		this.slideImage.src = this.ImagesUrls[this.currentImageIndex];
		this.showPrevBtn.disabled = true;
	},

	onShowPrevBtnClick: function (e) {
		this.currentImageIndex--;
		this.slideImage.src = this.ImagesUrls[this.currentImageIndex];
		this.showNextBtn.disabled = false;

		//disable prev btn if we need
		if (this.currentImageIndex === 0 ){
			this.showPrevBtn.disabled = true;
		}
	},
	onShowNextBtnClick: function (e){
		this.currentImageIndex++;
		this.slideImage.src = this.ImagesUrls[this.currentImageIndex];
		this.showPrevBtn.disabled = false;

		//disable next btn if we need
		if (this.currentImageIndex === (this.ImagesUrls.length - 1) ){
			this.showNextBtn.disabled = true;
		}

	}
}