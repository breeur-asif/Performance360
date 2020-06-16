function validInput(e) {
  e = (e) ? e : window.event;
  a = document.getElementById('mobile');
  b = document.getElementById('referal');
  cPress = (e.which) ? e.which : e.keyCode;

  if (cPress > 31 && (cPress < 48 || cPress > 57)) {
    return false;
  } else if (a.value.length >= 10 ) {
    return false;
  } else if (b.value.length >= 10) {
    return false;
  }

  return true;
}	
