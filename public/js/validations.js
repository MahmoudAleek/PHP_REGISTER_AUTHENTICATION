const username = document.getElementById('username');

function checkInputs(){
    const usernamevalue = username.value.trim;


    if(username === '' || username == null){
        setError(username,"full name is required ");
    }
    


}




function setError(input,message){
    const formControl = input.parentElement;
    const small = formControl.querySelector('#u-message');

    small.innerText = message;
}