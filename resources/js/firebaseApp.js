import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCy-Gf0enGC8oQr2cwAuhnuWZzkzQ1QWWA",
  authDomain: "dayaartz-2023.firebaseapp.com",
  projectId: "dayaartz-2023",
  storageBucket: "dayaartz-2023.appspot.com",
  messagingSenderId: "758351346798",
  appId: "1:758351346798:web:372f03c9dd6d201aae7a7f",
  measurementId: "G-N7GC3N79E3"
};

// Initialize Firebase
const firebaseApp = initializeApp(firebaseConfig);
export default firebaseApp