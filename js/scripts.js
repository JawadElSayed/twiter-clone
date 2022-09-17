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