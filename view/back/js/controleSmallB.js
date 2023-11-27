let myForm = document.querySelector(".env");
myForm.addEventListener("submit", (e) => {
   
  let name = document.getElementById("inputName");
  let description = document.getElementById("inputdescription");
  let categorie = document.getElementById("inputCategorie");
  let location = document.getElementById("inputLocation");
 
  let testString = /^([a-zA-Z ])+$/;
  let testString2 = /^([a-zA-Z])+$/;
  let err = document.getElementById("error");
  err.style.color = "red";
  
  if ((name.value).length == 0) 
   {
     err.innerHTML = "name required";
     
    e.preventDefault();
  }
  if ((description.value).length == 0) 
   {
     err.innerHTML = "Description required";
     
    e.preventDefault();
  }
  if ((location.value).length == 0) 
   {
     err.innerHTML = "Loction required";
     console.log(err);
    e.preventDefault();
  }
  if ((categorie.value).length == 0) 
   {
     err.innerHTML = "Categorie required";
     console.log(err);
    e.preventDefault();
  }

 
 
 


});