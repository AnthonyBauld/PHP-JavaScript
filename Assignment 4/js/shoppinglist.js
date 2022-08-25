/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * November 26th, 2021.
    *
    * Using .getlist.php and additems.php, this javascript software creates the backend that connects the .HTML to the PHP database and displays the shopping list items.
*/

window.addEventListener("load", function() {
    // Creates the "getlist" let variable, which retrieves data from getlist.php.
    let getlist = "getlist.php";
    // Creates the "list" let variable, which returns the list's reference.
    let list = document.getElementById("list");
    // Creates a fetch for the file "getlist.php.", which inludes the credentials.
    fetch(getlist, { credentials: 'include' })
        // Creates a .then that takes a response interface and reads it to completion before returning a promise with the result of processing the body text as JSON.
        .then(response => response.json())
        // Sets the .then to (success).
        .then(success)
    // Creates the success function, which will read the .PHP database and display the items and quantity to the list variable.
    function success(items) {
        // Creates a for each that sets the variable I to 0 and creates a count i++ with I higher than items.length.
        for (let i = 0; i < items.length; i++) {
            // Creates the "item" let variable and sets it to equal items[i].item, which assigns the variable "items" to the database "item".
            let item = items[i].item;
            // Creates the "item" let variable and sets it to equal items[i].quantity, which assigns the variable "quantity" to the database "quantity".
            let quantity = items[i].quantity;
            // Using the .innerHTML function, prints the variables "item" and "quantity" inside the list div.
            list.innerHTML += "<br>" + item + " " + "(" + quantity + ")";
        }
    }
    // Creates a varriable called "button", which returns the button reference.
    let button = document.getElementById("button");
    // When the user clicks the button, an addeventlistner called "button" is executed.
    button.addEventListener("click", function() {
        // Creates the "item" let variable, which returns the item references as well as the value entered.
        let item = document.getElementById("item").value;
        // Creates the "quantity" let variable, which returns the item references as well as the value entered.
        let quantity = document.getElementById("quantity").value;
        // Creates the success function, which will read the .PHP database and display the items and quantity that the user has entered.
        function success(items) {
            // Using the .innerHTML function, prints the variables "item" and "quantity" inside the list div.
            list.innerHTML += "<br>" + item + " " + "(" + quantity + ")";
            //
            console.log(items);
        }
        // Creates a get add that enter the new values entered from the item and quantity into the myphpadmin database.
        let getadd = "additems.php?item=" + item + "&quantity=" + quantity;
        // Creates a fetch for the file "getlist.php.", which inludes the credentials.
        fetch(getadd, { credentials: 'include' })
            // Creates a .then that takes a response interface and reads it to completion before returning a promise with the result of processing the body text as JSON.
            .then(response => response.text())
             // Sets the .then to (success).
            .then(success);
    });
})
