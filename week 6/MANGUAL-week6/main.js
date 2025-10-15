/*
        notes
        notes
    notes


    object.method(paramater);

*/
/*pop up*/
window.alert("Hello, World");

/* write a message on the screen in <body>*/

document.write("CIS123");

/* process the order by which it was coded */


//console.log("hello, programmer");

/* to continue comment you can use*/
// to continue the comment



/* 
    creates an object that is my name,
    also known as creating a Variable
    A Variable is an object  that  varies (changes)
        a variable is a container (Object)  that holds (stores) data
    var myname <OLD way, no memorize
    let myname < NEW way, memorize
    const myname <also a new way; 21st style
    let myname = "Angel Mangual"

*/


let myName;
/*easy way of doing this with the pop up window below */
myName = window.prompt("What's your name earth-ling?");

console.log("Hello, " + myName);

//window.prompt("Enter your name");


/* Tell JavaScript which <form> to submiit to pa attetion to
2. wait & detect whem submit is clicked
3. then un the rest of code
4.
*/

//1. create an object represtmting the <formm>
// create a variable (let) pointin to the <form>
let theForm = document.querySelector("#formContact");

// 2. create an event listiner to detect 

theForm.addEventListener("submit", function (event){sendMessage(event);});

// 3. define the meaning of sendMessage, andrun more code
function sendMessage(event){
    event.preventDefault();

        //4.deal with defsult then read the <input> and process and output 
        // default is to refresh or move to another file
        //donot want
        //so, first add event.prevent default();

            let txtName=document.querySelector("#inputName").value;
            let txtEmail=document.querySelector("#inputEmail").value;
            let txtMessage=document.querySelector("#inputMessage").value;

        window.alert("Thank you" + txtName + ". We will repond to you (" + txtEmail + ") and answer your message: " + txtMessage);

}// end sendMessage()

