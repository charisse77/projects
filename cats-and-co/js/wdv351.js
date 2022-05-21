// WDV351

//Cookie functions//
	
function setCookie(cName, cValue, exDays){
    const d = new Date();
    d.setTime(d.getTime() + (exDays*24*60*60*1000));
    let expires = 'expires=' + d.toUTCString();
    document.cookie = cName + '=' + cValue + ';' + expires + ';path=/'
}

// //looking for a piece of information in a cookie and returning its value 
function getCookie(cName){
    let name = cName + "=";
    let ca = document.cookie.split(';');
    for(let i=0; i<ca.length; i++){
        let c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1);
        }
        if(c.indexOf(name) == 0){
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cName){
    let yesterday = 4 * 60 * 60 * 1000
    let expireDate = new Date()
    expireDate.setTime(expireDate.getTime() - yesterday)
    document.cookie = cName + "=nothing; expires=" + expireDate.toGMTString()
}



//End Cookie Functions//

function pageLoad(){
//Begin Regular Functions//


//End Regular Functions//
    
}//end page load


