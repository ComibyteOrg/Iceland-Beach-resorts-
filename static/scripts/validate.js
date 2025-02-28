const form = document.querySelector('form')
const fullname = document.querySelector('.fullname')
const email = document.querySelector('.email')
const phone = document.querySelector('.phone')
const message = document.querySelector('.message')

form.addEventListener("submit", (e) =>{
    e.preventDefault();

    if(fullname.value == ''){
        document.querySelector('.f-error').innerHTML = "NAME IS REQUIRED";
        return false;
    }

    emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(!emailRegex.test(email.value) || email.value == ''){
        document.querySelector('.e-error').innerHTML = "VALID EMAIL IS REQUIRED";
        return false;
    }

    if(phone.value == '' || phone.length < 10){
        document.querySelector('.p-error').innerHTML = "VALID PHONE NUMBER IS REQUIRED";
        return false;
    }

    if(message.value == '' | message.length < 30){
        document.querySelector('.m-error').innerHTML = "MESSAGE MUST BE MORE THAN 30 LETTERS";
        return false;
    }

    form.submit()
})