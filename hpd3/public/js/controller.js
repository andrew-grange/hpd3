$(function(){

  //binds the myFormOnSubmit method below to run as part of your form's onsubmit method
  $('#LoginForm').submit(myFormOnSubmit);

  //runs when the form is trying to submit
  function myFormOnSubmit(event) {
      event.stopPropagation();
      event.preventDefault();
      console.log(window.location);
      window.location.href = `${window.location.href}login?name=${event.target[0].value}&policy=${event.target[1].value}`
  }
});