function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
}

function isEmpty(str) {
  str = trim(str);
  return ((str == null) || (str.length == 0))
}

function isDigit(c) {
  return ((c >= "0") && (c <= "9"))
}

function isInteger(str) {  
  var i;
  for (i = 0; i < str.length; i++) {
	var c = str.charAt(i);
	if (!isDigit(c)) return false;
  }
  return true;
}

function yearModify(txtElement, btnElement) {
	
	switch(btnElement.name) {
		case 'plusy':
			if(isEmpty(txtElement.value)) {
				txtElement.value = '1';
			} else if(isInteger(txtElement.value)){
				if(txtElement.value < 2015) {
					txtElement.value ++;
				} else {
					
				}
			} else {
				txtElement.value = '';
			}
		break;

		case 'minusy': 
			if(isEmpty(txtElement.value)) {
				txtElement.value = '2012';
			} else if(isInteger(txtElement.value)){
				if(txtElement.value > 2012) {
					txtElement.value --;
				} else {
					alert('Elérted a legkorábbi dátumot!');
				}
			} else {
				txtElement.value = '';
			}
		break;

		default: 
	}
}

function monthModify(txtElement, btnElement) {
	
	switch(btnElement.name) {
		case 'plusm':
			if(isEmpty(txtElement.value)) {
				txtElement.value = '1';
			} else if(isInteger(txtElement.value)){
				if(txtElement.value < 12) {
					txtElement.value ++;
				} else {
				
				}
			} else {
				txtElement.value = '';
			}
		break;

		case 'minusm': 
			if(isEmpty(txtElement.value)) {
				txtElement.value = '1';
			} else if(isInteger(txtElement.value)){
				if(txtElement.value > 1) {
					txtElement.value --;
				} else {
					alert('Elérted a legkorábbi dátumot!');
				}
			} else {
				txtElement.value = '';
			}
		break;

		default: 
	}
}