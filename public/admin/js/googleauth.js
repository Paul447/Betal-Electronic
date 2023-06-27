import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-auth.js";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAbdAf2z-4SZcKyIv3yRFXmXnP0eilYefI",
    authDomain: "mirtyunjyaam.firebaseapp.com",
    projectId: "mirtyunjyaam",
    storageBucket: "mirtyunjyaam.appspot.com",
    messagingSenderId: "571766110559",
    appId: "1:571766110559:web:0fbcef21dfdc34cb2f1eea",
    measurementId: "G-RXDZBG360J"
};


// Initialize Firebase
const app = initializeApp(firebaseConfig);
const google_auth = getAuth(app);
const googel_provider = new GoogleAuthProvider(app);

const google = document.querySelector(".google")
google && google.addEventListener('click', (_e) => {

    signInWithPopup(google_auth, googel_provider)
        .then((result) => {
            // This gives you a Google Access Token. You can use it to access the Google API.
            const credential = GoogleAuthProvider.credentialFromResult(result);
            const token = credential.accessToken;
            // The signed-in user info.
            const user = result.user;

            const auth = getAuth();
            onAuthStateChanged(auth, (user) => {
                if (user) {
                    document.cookie = "userr=" + user
                    user.providerData.forEach((profile) => {
                        let profile_name = profile.displayName;
                        document.cookie = "profile_namee=" + profile_name;
                        let email = profile.email;
                        let profile_image = user.photoURL; // Retrieve profile image URL
                        console.log(profile_image);
                        document.cookie = "profile_imagee=" + profile_image;
                        document.cookie = "emaill=" + email;
                        location.reload();
                        var cookieValue = encodeURIComponent(document.cookie);
                        console.log(cookieValue);
                        window.location.href =
                            "/googleauth?cookie=" + cookieValue;
                    });
                }
            });
        }).catch((error) => {
            // Handle Errors here.
            const errorCode = error.code;
            const errorMessage = error.message;
            // The email of the user's account used.
            const email = error.customData.email;
            // The AuthCredential type that was used.
            const credential = GoogleAuthProvider.credentialFromError(error);
            alert(errorMessage);
        });
});
