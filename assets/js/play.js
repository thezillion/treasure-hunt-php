!function() {

	function tryCheckAnswer(el){
		var errBox = ['err', el.getAttribute('id').replace('sub', '')].join('');
		removeErr(errBox);
		var a = $('amiright').value;
		if (a === ''){
			err('Please fill out the answer field.', errBox);
		}
		else{
			el.value = 'Checking..';
			el.disabled = 'true';
			ajax('backyard/hunt/checkAnswer.php', 'grs45665448g132dsgh3df12h3df='+a+'&lvl='+orfik.level.count, el, 'Is that right?', 'letsplay.php');
			$('amiright').select();
		}
	}

	win.addEventListener('load', function(){
		$('sub889878').onclick = function(){tryCheckAnswer(this);};
		$('amiright').addEventListener('keyup', function(){
			if (window.event.keyCode === 13)
				tryCheckAnswer($('sub889878'));
			if (window.event.keyCode === 32)
				this.value = this.value.replace(' ', '');
			if (this.value.toLowerCase() !== this.value)
				this.value = this.value.toLowerCase();
		});
	});

}();