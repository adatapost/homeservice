<?php
include_once "lib/all.php";

?>

<form method="get" novalidate id="form1">
  <input type="number" data-no-required="Age required" data-no-range="Invalid range" name="no" required max="10" min="1" />
  <input type="email" data-email-required="required!!" data-email-email="Invalid email" required name="email" />
  <button>Submit</button>
</form>
<ul id="error-list"></ul>

<script>


var t = (function(frmId){
  let form = document.querySelector(frmId);
  let errorList = document.querySelector("#error-list");
  
  errorList.remove();
  form.addEventListener("submit",(event)=> {
    if(!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
  });  
  for(let item of form) {
    item.addEventListener('invalid', (e)=> {
      let ar = [];
      for(let a in e.target.dataset) {
        //console.log(a, e.target.dataset[a]);
        ar.push(e.target.dataset[a]);
        let li = document.createElement("li");
        li.appendChild(document.createTextNode(e.target.dataset[a]));
        errorList.appendChild(li);
        console.log(errorList);
      }
    });
  }
})("#form1");

</script>