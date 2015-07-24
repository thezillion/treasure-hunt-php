var win = window, doc = document, nav = navigator, view = 'login';
// win.addEventListener('load', function(){
	function $(x){return doc.getElementById(x);}
	function tag(x){return doc.getElementsByTagName(x);}
	function cla(x){return doc.getElementsByClassName(x);}
	function querySel(x){return doc.querySelector(x);}
	function goto(lnk){return win.location.href = lnk;}
	function t(code, time){return setTimeout(code, time);}
	function parentOf(el){return el.parentNode;}

	function ajax(pg, params, el, val, redirectURL){
		var xhr = (win.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"),
		errBox = ['err', el.getAttribute('id').replace('sub', '')].join('');
		with(xhr){
			open('post', pg, true);
			setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			send(params);
			addEventListener('readystatechange', function(){
				if (xhr.readyState == 4 && xhr.status == 200){
					with(el){
						value = val;
						disabled = false;
					}
					var errStr = JSON.parse(xhr.responseText);
					if (errStr.msgType == "error"){
						err(errStr.msg, errBox);
					}
					else if (errStr.msgType == "success"){
						msg(errStr.msg, errBox);
						t(function(){goto(redirectURL)}, 500);
					}
					else{
						err('No data received. Please try again.', errBox);
					}
				}
				else if (xhr.status == 404){
					with(el){
						value = val;
						disabled = false;
					}
					err('Connection refused', errBox);
				}
			});
		}
		console.log(xhr);
	}

	function err(error, elId){
		with($(elId)){
			setAttribute('class', 'err o1 errred');
			innerHTML = error;
		}
	}
	function msg(message, elId){
		with($(elId)){
			setAttribute('class', 'err o1 errblue');
			innerHTML = message;
		}
	}
	function removeErr(elId){
		$(elId).setAttribute('class', $(elId).className.replace('o1', 'o0'));
	}

	function clearHelpBox(el){
		parentOf(el).getElementsByClassName('helpBox')[0].className = 'helpBox o0';
		t(function(){parentOf(el).getElementsByClassName('helpBox')[0].className += ' dn';}, 500);
	}

	function showHelpBox(el){
		parentOf(el).getElementsByClassName('helpBox')[0].className = 'db helpBox o1';
	}

	function toNumber(x) {
		return -(-(x));
	}

	function startTimer (argument) {
		setInterval(function() {
			var d = new Date(),
			then_d = new Date("February 21, 2014 00:00:00"),
			diff = (then_d.getTime() - d.getTime()),
			dd = parseInt((diff / (1000*60*60*24)) % 31),
			hh = parseInt((diff / (1000*60*60)) % 24),
			mm = parseInt((diff / (1000*60)) % 60),
			ss = parseInt((diff / 1000) % 60);
			ss = (ss < 10) ? 0 + ss.toString() : ss;
			mm = (mm < 10) ? 0 + mm.toString() : mm;
			hh = (hh < 10) ? 0 + hh.toString() : hh;
			dd = (dd < 10) ? 0 + dd.toString() : dd;
			$('dd').innerHTML = dd;
			$('hh').innerHTML = hh;
			$('mm').innerHTML = mm;
			$('ss').innerHTML = ss;
		}, 500);
	}
// }, false);