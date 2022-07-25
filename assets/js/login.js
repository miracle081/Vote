const inp = document.querySelector("#inp");
const show = document.querySelector('#show');



show.addEventListener('click',()=>{
    if (inp.type != "password") {
        inp.type = "password"

        show.classList.toggle("fa-eye-slash")
    }
    else{
        inp.type = "text"
        show.classList.toggle("fa-eye-slash")
    }
})

