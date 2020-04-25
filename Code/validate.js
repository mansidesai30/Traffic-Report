$(document).ready(function() {
$("#register").click(function() {
var name = $("#users_email").val(); //fetch the data into datatype
var password = $("#users_pass").val();//fetch the data into datatype
var cpassword = $("#users_pass1").val();//fetch the data into datatype
var  ut = $("#users_type").val();//fetch the data into datatype
if (name == '' || password == '' || cpassword == '' || ut == '') //check the condition if empty found
 {
alert("Please fill all fields...!!!!!!"); // print the alert message
} else if ((password.length) < 4) { //check for password length
alert("Password should atleast 4 character in length...!!!!!!"); //print the alert message
} else if (!(password).match(cpassword)) { //check for matching the password
alert("Your passwords don't match. Try again?"); //print the alert message
} else {
$.post("validateregister.php", //validation on form action
{ 
name1: name,
pass1: password,
pass2: cpassword,
ut1: ut,
}, function(data) //data taken in fucntion
{
if (data == 'You have Successfully Registered.....') //if data found you have successfully registered
{
$("form")[0].reset(); //if not reset all 
}
alert(data); //print an alert
});
}
});
});