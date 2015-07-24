!function(win) {

	function tryLogin(el){
		var errBox = ['err', el.getAttribute('id').replace('sub', '')].join('');
		removeErr(errBox);
		var u = $('usrnme').value, p = $('psswrd').value;
		if (u === '' || p === ''){
			err('Please fill out both the fields.', errBox);
		}
		else{
			with(el){
				value = 'Authenticating..';
				disabled = 'true';
			}
			ajax('garage/tools/auth/login.php', 'usrnme='+u+'&psswrd='+p, el, 'LOGIN', 'letsplay.php');
		}
	}

	win.addEventListener('load', function(){
		// startTimer();
		if ($('login')){
			$('sub889876').onclick = function(){tryLogin(this);};
			var logInputs = $('login').getElementsByTagName('input');
			for (var j = 0; logInputs[j]; j++){
				(function(g){
					g.addEventListener('keydown', function(event){var e = (window.event) ? window.event : event;if(e.keyCode===13){tryLogin($('sub889876'));}});
				})(logInputs[j]);
			}
		}
	});

}(window);