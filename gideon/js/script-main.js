var felix = document.getElementById("felix");
function startDictation() {
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
        activateFelix();
        var recognition = new webkitSpeechRecognition();

        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.lang = "it-IT";
        recognition.start();

        recognition.onresult = function (e) {
            document.getElementById('transcript').value = e.results[0][0].transcript;
            recognition.stop();
            deactivateFelix();
            document.getElementById('labnol').submit();
        };

        recognition.onerror = function (e) {
            recognition.stop();
            deactivateFelix();
        }

    }
}
function activateFelix() {
	userMadeDecision = false;
	document.getElementById("felix").classList.remove("inactive");
	document.getElementById("felix").classList.add("active");
	setTimeout(function() {
		if (!userMadeDecision) {
			document.getElementById("felix").classList.remove("active");
			document.getElementById("felix").classList.add("inactive");
			setTimeout(function() {
				document.getElementById("felix").classList.remove("inactive");
			}, 750);
		}
	}, 5000);
}
function deactivateFelix() {
	userMadeDecision = true;
	document.getElementById("felix").classList.remove("active");
	document.getElementById("felix").classList.add("inactive");
	setTimeout(function() {
		document.getElementById("felix").classList.remove("inactive");
	}, 750);
}
