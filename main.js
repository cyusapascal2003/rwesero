function validate_password() {

  var password = document.getElementById('password').value;
  var confirm_pwd = document.getElementById('confirm_pwd').value;

  if (password != confirm_pwd) {
    document.getElementById('confirm_error').style.color = 'red';
    document.getElementById('confirm_error').innerHTML
      = '⛔️ Use same password';
    document.getElementById('submit').disabled = true;
    document.getElementById('submit').style.opacity = (0.4);
  } else {
    document.getElementById('confirm_error').style.color = 'green';
    document.getElementById('confirm_error').innerHTML =
      '👍🏾 Password Matched';
    document.getElementById('submit').disabled = false;
    document.getElementById('submit').style.opacity = (1);
  }
}

function confirm_error() {
  if (document.getElementById('password').value != "" &&
    document.getElementById('confirm_pwd').value != "" &&
    document.getElementById('email').value != "") {
    alert("👏🏾 Your response has been submitted");
  } else {
    alert("😖 Please fill all the required fields");
  }
}

