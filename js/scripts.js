const signupAPI = "http://localhost.."

// sign up 
// const name = document.querySelector("#signup_name");
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

function changeLikeImage(){
    if (document.getElementById("likeimg").src == "file:///Users/macbookpro/Desktop/twiter-clone/assets/heart.png"){
        document.getElementById("likeimg").src = "assets/red-heart.png";
    } else {
        document.getElementById("likeimg").src = "assets/heart.png";
    }
}

// // encode image file to base64
// function encodeImageFileAsURL() {

//     var filesSelected = document.getElementById("inputFileToLoad").files;
//     if (filesSelected.length > 0) {
//       var fileToLoad = filesSelected[0];

//       var fileReader = new FileReader();

//       fileReader.onload = function(fileLoadedEvent) {
//         var srcData = fileLoadedEvent.target.result; // <--- data: base64

//         var newImage = document.createElement('img');
//         newImage.src = srcData;

//         document.getElementById("imgTest").innerHTML = newImage.outerHTML;
//         // alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
//         // console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
//       }
//       fileReader.readAsDataURL(fileToLoad);
//     }
//   }

// // ---------- send signup data to the api ----------
// const form = {
//     name: document.querySelector("#signup_name"),
//     username: document.querySelector("#signup_username"),
//     email: document.querySelector("#signup_email"),
//     password: document.querySelector("#signup_password"),
//     dob: document.querySelector("#signup_dob"),
//     submit: document.querySelector("#submit_signup"),
//   };
//   let button = form.submit.addEventListener("click", (e) => {
//     e.preventDefault();
//     const signupAPI = "https://localstorage...";
  
//     fetch(signupAPI, {
//       method: "POST",
//       headers: {
//         Accept: "application/json, text/plain, */*",
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify({
//         name: form.name.value,
//         username: form.username.value,
//         email: form.dob.value,
//         password: form.password.value,
//         dob:form.dob.value,
//       }),
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         console.log(data);
//         // code here //
//         if (data.error) {
//           alert("Error Password or Username"); /*displays error message*/
//         } else {
//           window.open(
//             "signup.html"
//           ); /*opens the target page while Id & password matches*/
//         }
//       })
//       .catch((err) => {
//         console.log(err);
//       });
//   });

//   //----------- send signin data to api ----------------
//   const signin_form = {
//     username: document.querySelector("#signin_username"),
//     password: document.querySelector("#signin_password"),
//     submit: document.querySelector("#submit_signin"),
//   };
//   let signin_button = signin_form.submit.addEventListener("click", (e) => {
//     e.preventDefault();
//     const signinAPI = "https://localstorage...";
  
//     fetch(signinAPI, {
//       method: "POST",
//       headers: {
//         Accept: "application/json, text/plain, */*",
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify({
//         username: signin_form.username.value,
//         password: signin_form.password.value,
//       }),
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         console.log(data);
//         // code here //
//         if (data.error) {
//           alert("Error Password or Username"); /*displays error message*/
//         } else {
//           window.open(
//             "index.html"
//           ); /*opens the target page while Id & password matches*/
//         }
//       })
//       .catch((err) => {
//         console.log(err);
//       });
//   });

