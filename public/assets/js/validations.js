// text:|text_with_space:|digits:|float|alphanum:|alphanum_with_symbols:|email|fullname|min:|max:|image
$('body').on('submit', 'form.need-custom-validation', function(e) {
	e.preventDefault();
	$(this).addClass('custom-validated');
	var $_form = $(this),
	inputsToValidate = $(this).find('input[data-validations]'),
	i = 0;
	if (inputsToValidate.length != 0) {
		inputsToValidate.each(function() {
			i += 1;
			$(this).change();
			if (i == inputsToValidate.length) {
				if ($_form.find('.is-invalid').length == 0) {
					if ($_form.data('action') != "") {
						window[$_form.data('action')]();
					}
				}
			}
		});
	}
	else {
		if ($_form.data('action') != "") {
			window[$_form.data('action')]();
		}
	}
});

$('body').on('change', '.need-custom-validation input', function() {
	if ($(this).is(':visible')) {
		validate($(this));
	}
	else {
		$(this).removeClass('is-invalid');
	}
});

function validate(ele, image) {
	var displayName = ele.data('display-name'),
	validations = ele.data('validations'),
	validationMessage = "",
	continueValidationCheck = false;
	if (typeof validations == 'undefined') return;
	validations = validations.split('|'),
	validations.every(function(validation, index, arr) {
		if (validation == "required") {
			if (ele.val() == "") {
				ele.addClass('is-invalid');
				validationMessage = displayName + " is a required field.";
				continueValidationCheck = false
			}
			else {
				ele.removeClass('is-invalid');
				continueValidationCheck = true;
			}
		}
		else if (validation.startsWith('text')) {
			var regEx = /^[A-Za-z]*$/;
			if (validation.startsWith('text_with_space')) {
				regEx = /^[A-Za-z ]*$/;
			}
			if(regEx.test(ele.val())) {
				var sub = validation.split(':');
				if(typeof(sub[1]) == 'undefined'){
					sub[1] = 0;
				}
				if(sub[1] != 0){
					if (ele.val().length != parseInt(sub[1])) {
						ele.addClass('is-invalid');
						validationMessage = displayName + " should be " + sub[1] + " characters.";
						continueValidationCheck = false;
					}
					else {
						ele.removeClass('is-invalid');
						continueValidationCheck = true;
					}
				}
				else{
					ele.removeClass('is-invalid');
					continueValidationCheck = true;
				}
			}
			else{
				ele.addClass('is-invalid');
				validationMessage = displayName + " should contain only alphabets.";
				continueValidationCheck = false;
			}
		}
		else if (validation.startsWith('digits')) {
			if(/^[0-9]*$/.test(+ele.val())) {
				var sub = validation.split(':');
				if(typeof(sub[1]) == 'undefined'){
					sub[1] = 0;
				}
				if(sub[1] != 0){
					if (ele.val().length != parseInt(sub[1])) {
						ele.addClass('is-invalid');
						validationMessage = displayName + " should be " + sub[1] + " digits.";
						continueValidationCheck = false;
					}
					else {
						ele.removeClass('is-invalid');
						continueValidationCheck = true;
					}
				}
				else{
					ele.removeClass('is-invalid');
					continueValidationCheck = true;
				}
			}
			else{
				ele.addClass('is-invalid');
				validationMessage = displayName + " should only contain digits.";
				continueValidationCheck = false;
			}
		}
		else if (validation.startsWith('alphanum')) {
			var regEx = /^[A-Za-z0-9 ]*$/;
			if (validation.startsWith('alphanum_with_symbols')) {
				regEx = /^[A-Za-z0-9 #,.]*$/;
			}
			if(regEx.test(ele.val())) {
				var sub = validation.split(':');
				if(typeof(sub[1]) == 'undefined'){
					sub[1] = 0;
				}
				if(sub[1] != 0){
					if (ele.val().length != parseInt(sub[1])) {
						ele.addClass('is-invalid');
						validationMessage = displayName + " should be " + sub[1] + " characters.";
						continueValidationCheck = false;
					}
					else {
						ele.removeClass('is-invalid');
						continueValidationCheck = true;
					}
				}
				else{
					ele.removeClass('is-invalid');
					continueValidationCheck = true;
				}
			}
			else{
				ele.addClass('is-invalid');
				validationMessage = displayName + " should only contain alphanumeric characters.";
				continueValidationCheck = false;
			}
		}
		else if (validation.startsWith('float')) {
			if(/[0-9]+(\.[0-9][0-9]?)?/.test(+ele.val())) {
				ele.removeClass('is-invalid');
				continueValidationCheck = true;
			}
			else{
				ele.addClass('is-invalid');
				validationMessage = displayName + " should be a number.";
				continueValidationCheck = false;
			}
		}
		else if (validation == "fullname") {
			if (!isNameValid(ele.val())) {
				ele.addClass('is-invalid');
				validationMessage = "Please enter the full name.";
				continueValidationCheck = false;
			}
			else {
				ele.removeClass('is-invalid');
				continueValidationCheck = true;
			}
		}
		else if (validation.startsWith('max')) {
			var sub = validation.split(':');
			if (ele.val().length > parseInt(sub[1])) {
				ele.addClass('is-invalid');
				validationMessage = displayName + " maximum length is " + sub[1];
				continueValidationCheck = false;
			}
			else {
				ele.removeClass('is-invalid');
				continueValidationCheck = true;
			}
		}
		else if (validation == "email") {
			if (!isValidEmailAddress(ele.val())) {
				ele.addClass('is-invalid');
				validationMessage = "Please enter a valid email address.";
				continueValidationCheck = false;
			}
			else {
				ele.removeClass('is-invalid');
				continueValidationCheck = true;
			}
		}
		return continueValidationCheck;
	});
ele.parent().find('.invalid-feedback').html(validationMessage);

}

function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test(emailAddress);
}
function isNameValid(fullName) {
	if(fullName.indexOf(' ') == -1){
		return false;
	}
	else{
		var a = fullName.split(' ');
		if(a[1] == ""){
			return false;
		}
	}
	return true;
}