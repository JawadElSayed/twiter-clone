const signupAPI = "http://localhost.."

// sign up 
const name = document.querySelector("#signup_name");
let username = document.querySelector("#signup_username");
let email = document.querySelector("#signup_email");
let password = document.querySelector("#signup_password");
let dob = document.querySelector("#signup_dob");
// document.getElementById("#submit_signup").addEventListener("click", signUp);

const signUp = () => {
    // fetch(signUp, {method: 'POST', body: new URLSearchParams({"name":signup_name.value,"username":signup_username.value,"email":signup_email.value,"password":signup_password.value,"dob":signup_dob.value})});
    console.log(name);

}

//pop up signup or signin forms on click
function goSignUp(){
    document.getElementById("signin_box").classList.add("invisible");
    document.getElementById("signup_box").classList.toggle("invisible");
}

function goSignIn(){
    document.getElementById("signup_box").classList.add("invisible");
    document.getElementById("signin_box").classList.toggle("invisible");
}

function setProfile(){
    document.getElementById("setup_profile").classList.toggle("invisible");
}

function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("inputFileToLoad").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        var newImage = document.createElement('img');
        newImage.src = srcData;

        document.getElementById("imgTest").innerHTML = newImage.outerHTML;
        // alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
        // console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }