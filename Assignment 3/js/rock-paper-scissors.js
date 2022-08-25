/*
* I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
* Due: November 11th, 2021.
*
* This JavaScript constructs a rock, paper, scissors game using variables, if statements, 
* and switch-case statements to pick a winner at random using RNG.
*/

window.addEventListener("load", function() {
    // Sets a constant variable "color" to the color specified by the user in the form.
    const color = document.getElementById("color");
    // Sets a constant variable "rock" which will be called upon within the rock-paper-sissors game.
    const rock = document.getElementById("rock");
    // Sets a constant variable "paper" which will be called upon within the rock-paper-sissors game.
    const paper = document.getElementById("paper");
    // Sets a constant variable "scissors" which will be called upon within the rock-paper-sissors game.
    const sissors = document.getElementById("scissors");
    // // Sets a constant variable "result" which will be called upon within the rock-paper-sissors game.
    const result = document.getElementById("result");
    // Sets a let variable "userCount" which will be called upon within the rock-paper-sissors game to change the result count.
    let userCount = 0;
    // Sets a let variable "computerCount" which will be called upon within the rock-paper-sissors game to change the result count.
    let computerCount = 0;
    // Gets the HTML Element "formID" and add's an event "submit". Once clicked hides the form and displays the rock-paper-sissors game.
    document.getElementById("formID").addEventListener("submit", function(event) {
        // If the variable value is true, signalling to the operation that caused the event to be dispatched that it needs to be cancelled 
        // while performing a listener for the event with passive set to false.
        event.preventDefault();
        // Hides the HTML Element "hide".
        document.getElementById("hide").style.display = "none";
        // Display's the HTML Element "hide2".
        document.getElementById("hide2").style.display = "block";
    })
    /*
    * When the user wins, the game shows the winning text and changes the colour to the colour the user specified in the form.
    */
    function winner() {
        // Create's a counter that increases by one every time the user wins.
        userCount++;
        // Gets "userscore" from the form and sets the variable userCount to this HTML Element.
        document.getElementById("userscore").innerHTML = userCount;
        // Gets "computerscore" from the form and sets the variable computerCount to this HTML Element.
        document.getElementById("computerscore").innerHTML = computerCount;
        // Sets the variable user to retrieve the source "name" within the form document.
        let user = document.forms.formID.name;
        // Sets the variable "username" to the "name" value.
        let username = user.value;
        // Sets the "color" variable from the HTML Element "color".
        let color = document.getElementById("color").value;
        // Set the "result" variable from the "color" variable.
        result.style.color = color
        // Sets the HTML Element "result" to print the winning text.
        result.innerHTML = "Congratulations " + username + ", You win!";
        // Creates an if statement that executes when "userCount" reaches a total of three.
        if (userCount === 3) {
            // Sets the HTML Element "result" to print the final winning text.
            document.getElementById("result").innerHTML = "Congratulations, You win the game!";
            // Sets the HTML Element "rock" picture to disply none.
            document.getElementById("rock").style.display = "none";
            // Sets the HTML Element "paper" picture to disply none.
            document.getElementById("paper").style.display = "none";
            // Sets the HTML Element "scissors" picture to disply none.
            document.getElementById("scissors").style.display = "none";
            // Sets the HTML Element "help" section to display none.
            document.getElementById("help").style.display = "none";
        }
    }
    /*
    * When the computers wins, the game shows the losing text and changes the colour to the colour the user specified in the form.
    */
    function loser() {
        // Create's a counter that increases by one every time the computer wins.
        computerCount++;
        // Gets "userscore" from the form and sets the variable userCount to this HTML Element.
        document.getElementById("userscore").innerHTML = userCount;
        // Gets "computerscore" from the form and sets the variable computerCount to this HTML Element.
        document.getElementById("computerscore").innerHTML = computerCount;
        // Sets the variable user to retrieve the source "name" within the form document.
        let user = document.forms.formID.name;
        // Sets the variable "username" to the "name" value.
        let username = user.value;
        // Sets the "color" variable from the HTML Element "color".
        let color = document.getElementById("color").value;
        // Set the "result" variable from the "color" variable.
        result.style.color = color
        // Sets the HTML Element "result" to print the losing text.
        document.getElementById("result").innerHTML = "Oh no! " + username + ", You Lose!";
        // Creates an if statement that executes when "computerCount" reaches a total of three.
        if (computerCount === 3) {
            // Sets the HTML Element "result" to print the final losing text.
            document.getElementById("result").innerHTML = "Unfortunately, you have lost the game :(";
            // Sets the HTML Element "rock" picture to disply none.
            document.getElementById("rock").style.display = "none";
            // Sets the HTML Element "paper" picture to disply none.
            document.getElementById("paper").style.display = "none";
            // Sets the HTML Element "scissors" picture to disply none.
            document.getElementById("scissors").style.display = "none";
            // Sets the HTML Element "help" section to display none.
            document.getElementById("help").style.display = "none";
        }
    }
    /*
    * When the user and computer draw, the game shows the draw text and changes the colour to the colour the user specified in the form.
    */
    function draw() {
        // Sets the variable user to retrieve the source "name" within the form document.
        let user = document.forms.formID.name;
        // Sets the variable "username" to the "name" value.
        let username = user.value;
        // Sets the "color" variable from the HTML Element "color".
        let color = document.getElementById("color").value;
        // Set the "result" variable from the "color" variable.
        result.style.color = color
        // Sets the HTML Element "result" to print the draw text.
        document.getElementById("result").innerHTML = "Unfortunately, it was a draw!";
    }
    /*
    * Sets the variables for rock, paper, and scissors within the variable "rps".
    *
    * @returns rps[randomNum]
    */
    function getComputerResults() {
        // Sets a constant variable "rock", "paper", "scissors" which will be called upon within rockpapersissors function.
        const rps = ['rock', 'paper', 'scissors'];
        // Sets a constant variable "randomNum" which will generator a random number from 1-3 using the Math.Random() function.
        const randomNum = Math.floor(Math.random() * 3);
        // Returns the variable "rps" that will select a random variable using "randomNum" from "rps".
        return rps[randomNum];
    }
    /*
    * When the variable "rps" randomly picks ['rock, paper, scissors,'] it creates the primary game rock, paper, 
    * scissors by utilising a switch-case statement to decide the outcome.
    *
    * @param {userResults} userResults
    */
    function rockpapersissors(userResults) {
        // Sets the value of the constant variable "computerResults" to "getComputerResults."
        const computerResults = getComputerResults();
        // Create's a switch statement that will execute one of many code blocks using both "userResult" and "computerResult". 
        switch (userResults + computerResults) {
            // When rock beats scissors the user wins.
            case "rockscissors":
                // When paper beats rock the user wins.
            case "paperrock":
                // When scissors beats paper the user wins.
            case "scissorspaper":
                // Display's a console message to test if the user wins.
                console.log("Console Test: User Wins!");
                // Gets the winner funtion and sets the "userResults" and "computerResults".
                winner(userResults, computerResults);
                // Ends the switch statement with a break.
                break;
                // When rock beats paper the computer wins.
            case "rockpaper":
                // When paper beats scissors the computer wins.
            case "paperscissors":
                // When scissors beats rock the computer wins.
            case "scissorsrock":
                // Display's a console message to test if the computer wins.
                console.log("Console Test: Computer Wins!");
                // Gets the loser funtion and sets the "userResults" and "computerResults".
                loser(userResults, computerResults);
                // Ends the switch statement with a break.
                break;
                // When user and computer both get rock draw the game.
            case "rockrock":
                // When user and computer both get rock draw the game.
            case "paperpaper":
                // When user and computer both get rock draw the game.
            case "scissorsscissors":
                // Display's a console message to test when both user and computer draw.
                console.log("Console Test: Draw!");
                // Gets the draw funtion and sets the "userResults" and "computerResults".
                draw(userResults, computerResults);
                // Ends the switch statement with a break.
                break;
        }
    }
    /*
    * Creates the main function that will be used when "rock", "paper", or "scissors" are clicked.
    */
    function main() {
        // Create's a "rock" event listner that create's a function when the user clicks.
        rock.addEventListener('click', function(event) {
            // If the variable value is true, signalling to the operation that caused the event to be dispatched that it needs to be cancelled 
            // while performing a listener for the event with passive set to false.
            event.preventDefault();
            // Sets the "rockpapersissors" function when the "rock" is clicked.
            rockpapersissors("rock");
        })
        // Create's a "paper" event listner that create's a function when the user clicks.
        paper.addEventListener('click', function(event) {
            // If the variable value is true, signalling to the operation that caused the event to be dispatched that it needs to be cancelled 
            // while performing a listener for the event with passive set to false.
            event.preventDefault();
            // Sets the "rockpapersissors" function when the "paper" is clicked.
            rockpapersissors("paper");
        })
        // Create's a "sissors" event listner that create's a function when the user clicks.
        sissors.addEventListener('click', function(event) {
            // If the variable value is true, signalling to the operation that caused the event to be dispatched that it needs to be cancelled 
            // while performing a listener for the event with passive set to false.
            event.preventDefault();
            // Sets the "rockpapersissors" function when the "scissors" is clicked.
            rockpapersissors("scissors");
        })
    }
    // Invokes the "main" function.
    main();
});
// Creates a DOMContentLoaded that triggers when the HTML pages has been fully loaded.
document.addEventListener("DOMContentLoaded", function() {
    // Creates a var variable called "accordian" that is set from the HTML Element "accordion".
    var accordion = document.getElementsByClassName("accordion");
    // Creates a var variable called "helppanel" that is set from the HTML Element "helppanel".
    var helppanel = document.getElementsByClassName('helppanel');
    // Creates a for statement that sets the var "I" => 0, and creates a count for "I", and if "I" is greater than the accordion length.
    for (var i = 0; i < accordion.length; i++) {
        // If the accordion HTML Element is clicked set the function. 
        accordion[i].onclick = function() {
            // Creates a var variable called "setClasses" that contains the classList 'active'.
            var setClasses = !this.classList.contains('active');
            // Sets the class to 'active' and 'remove'.
            setClass(accordion, 'active', 'remove');
            // Sets the class to 'active' and 'remove'.
            setClass(helppanel, 'show', 'remove');
            // Creates an if statement that runs "setClasses".
            if (setClasses) {
                // "classList" will toggle 'active'.
                this.classList.toggle("active");
                // If the next sibling in the HTML element classList 'shows', otherwise, it will be null.
                this.nextElementSibling.classList.toggle("show");
            }
        }
    }
    /*
    * Creates a function called setClass that will use variables "e", "className", and "fontName"
    */
    function setClass(e, className, fontName) {
        // Creates a for statement that sets the var "I" => 0, and creates a count for "I", and if "I" is greater than the accordion length.
        for (var i = 0; i < e.length; i++) {
            e[i].classList[fontName](className);
        }
    }
})
