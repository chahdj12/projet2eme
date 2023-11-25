let myForm = document.querySelector(".env");
myForm.addEventListener("submit", (e) => {
    let stock = document.getElementById("inputStock").value;
    let price = document.getElementById("inputPrice").value;
  let name = document.getElementById("inputName");
  let description = document.getElementById("inputDescription");
 
  let testString = /^([a-zA-Z ])+$/;
  let err = document.getElementById("error");
  err.style.color = "red";
  
  if (testString.test(name.value) == false) 
   {
     err.innerHTML = "name must be letters";
     console.log(err);
    e.preventDefault();
  }

 
  if ((!stock.replace(/\s+/, "").length)) {
    err.innerHTML = "Stock must be numbers";
    e.preventDefault();
  }
  if ((!price.replace(/\s+/, "").length)) {
    err.innerHTML = "Price must be numbers";
    e.preventDefault();
  }
  if (description.length==0) {
    err.innerHTML = "Description required";
    e.preventDefault();
  }


});