// JavaScript Document

function login_reg()
{
	var error = false;
	var error_str = '';
	if(document.getElementById('fname').value == "" || document.getElementById('fname') == "First Name"){
		error_str = "First name must be filled";
		error=true;
	}
	if(document.getElementById('lname').value == "" || document.getElementById('fname') == "Last Name"){
		error_str = "Last Name must be filled";
		error=true;
	}
	if(error)
	{
		alert(error_str);
		return false;
	}
	else
		return true;
}