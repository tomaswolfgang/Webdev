
function encrypt(str){
	key = 12;
	var encrypted = "";
	for(var i = 0; i<str.length; i++){
		var lshiftnum = (str.charAt(i).charCodeAt() + key + i) % 127;
		if(lshiftnum < 33){
			lshiftnum = lshiftnum + 33;
			var lettershift = String.fromCharCode(lshiftnum);
		}
		else{
			var lettershift = String.fromCharCode(lshiftnum);
		}
		encrypted = encrypted + lettershift;

	}

	return encrypted;
}

function isPrime(value) {
    for(var i = 2; i < value; i++) {
        if(value % i === 0) {
            return false;
        }
    }
    return value > 1;
}

