/** Functions to validate the WebTunes registration forms
 * @author: mosser@polytech.unice.fr
 */


function reportError(id, msg) {
	var not = document.getElementById("notification");
	not.className = "col-md-offset-3 col-md-6 alert alert-dismissible alert-danger text-center";
	not.innerHTML =  msg;

	var d = document.getElementById(id);
	d.parentNode.parentNode.className += " has-error";
}

function effaceErreur(id) {
	var not = document.getElementById("notification");
	not.className += " hidden";

	var d = document.getElementById(id);
	d.parentNode.parentNode.className = "form-group";

}

function checkPseudo() {
	var p = document.getElementById("pseudo");
	var txt = p.value;
	var regex = /^[a-z]([a-zA-Z])+$/;
	if (!regex.test(txt)) {
		reportError("pseudo","Pseudo invalide");
		return false;
	}
	effaceErreur("pseudo");
    return true
}

function isValid() {
    return checkPseudo();
}

function effacement() {
	var ret = confirm("Effacement ?");
	if (ret) {
		effaceErreur("pseudo");
	}
	return ret;
}
