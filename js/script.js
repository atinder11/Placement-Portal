function addNewWEfield() {
    
    // console.log("Adding new field");

    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("weField");
    newNode.classList.add("mt-3");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter here");

    let weOb = document.getElementById("we");
    let weaddButtonOb = document.getElementById("weaddButton");

    weOb.insertBefore(newNode, weaddButtonOb);
}

function addNewEQfield() {
    // console.log("Adding new field");

    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("eqfield");
    newNode.classList.add("mt-3");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter here");

    let Eq = document.getElementById("eq");
    let eqaddButtonOb = document.getElementById("eqaddButton");

    Eq.insertBefore(newNode, eqaddButtonOb);
}

function addNewSfield() {


    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("sField");
    newNode.classList.add("mt-3");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter here");

    let Eq = document.getElementById("sF");
    let saddButtonOb = document.getElementById("sAddButton");

    Eq.insertBefore(newNode, saddButtonOb);
}

// generating cv

function generateCV() {
    // console.log("Adding new field");
    let nameField = document.getElementById("nameField").value;
    
    let nameT1 = document.getElementById("nameT1")

    nameT1.innerHTML = nameField;

    // direct

    document.getElementById("nameT2").innerHTML = nameField;

    // contact

    document.getElementById("contactT").innerHTML = document.getElementById("contactField").value;

    // address 
    
    document.getElementById("addressT").innerHTML = document.getElementById("addressField").value;

    // links
document.getElementById("emailT").innerHTML = document.getElementById("emailField").value;
    document.getElementById("fbT").innerHTML = document.getElementById("fbField").value;
    document.getElementById("instaT").innerHTML = document.getElementById("instaField").value;
    document.getElementById("linkedT").innerHTML = document.getElementById("linkedField").value;

    // objective

    document.getElementById("objectiveT").innerHTML = document.getElementById("objectiveField").value;
    
    // skills

    let skills = document.getElementsByClassName("sField");

    let str = "";

    for (let e of skills)
    {
        //Remember here back quote are used. 

        str = str + `<li> ${e.value} </li>`;
    }
    document.getElementById("sT").innerHTML = str;





    // Work Experience

    let wes = document.getElementsByClassName("weField");

    let str1 = "";

    for (let e of wes)
    {
        //Remember here back quote are used. 

        str1 = str1 + `<li> ${e.value} </li>`;
    }
    document.getElementById("weT").innerHTML = str1;


        // skills

    let skills1 = document.getElementsByClassName("eqfield");

    let str2 = "";

    for (let e of skills1)
    {
        //Remember here back quote are used. 

        str2 = str2 + `<li> ${e.value} </li>`;
    }
    document.getElementById("eqT").innerHTML = str2;


    // code for setting up the image



    let file = document.getElementById("imageField").files[0];
    // console.log(file);

    let reader = new FileReader()
    if (file) {
        reader.readAsDataURL(file);
        console.log("success1");
    }
    
    // adding a listener 
    reader.onloadend = function () { 
        document.getElementById("imgT").src = reader.result;
    };
    console.log("success2");

    // changing the css property of cv-form

    document.getElementById("cv-form").style.display = "none";
    document.getElementById("cv-template").style.display = "block";
 console.log("success3");
}

function previewFile() {
  const preview = document.querySelector('img');
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}


// printing cv 

function printCV() {
    window.print();
    
}

   