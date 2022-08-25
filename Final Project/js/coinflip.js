/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * December 10, 2021.
    *
    * Using .getbalance.php, and .updatebalance.php, this javascript software creates the backend that connects the .HTML to the PHP database and displays and updates the balance.
*/

window.addEventListener("load", function() {
    // Create's a variable called coin that grabs the coin div from the HTML file.
    let coin = document.querySelector(".coin");
    // Create's a variable called flipcoin that grabs the wager button from the HTML file.
    let flipcoin = document.querySelector("#wager");
    // Create's a variable called audio that grabs a .mp4 file.
    var audio = new Audio('sound/win.mp4');

    // Create's an addeventlistner that executes when you click on the flipcoin button.
    flipcoin.addEventListener("click", function() {
        // Create's a variable i that randomly selects a number using the Math.floor() function.
        let i = Math.floor(Math.random() * 2);
        // Sets the coin style to none.
        coin.style.animation = "none";
        // Sets the button to disable when the user clicks to prevent multiple bets at once.
        document.querySelector('#wager').disabled = true;
        // Create's a if statement that if i is equal to execute the coin (head) spin.
        if(i) {
            // Create's a setTimeout function that's set to 25ms.
            setTimeout(function() {
                // Sets the coin animation to spin forward for 7 seconds.
                coin.style.animation = "spin-heads 7s forwards";
            }, 25);
            // Create's a setTimeout function that's set to 7s.
            setTimeout(function() {
                // Displays the win in the bet div on the coinflip page.
                win.innerHTML = "+" + "$" + document.getElementById("bet").value;
                // Plays an audio to notify you that you've won.
                audio.play();
            }, 7000);
            // Create's a setTimeout function that's set to 15s.
            setTimeout(function() {
                // Sets the win div to nothing after 15s.
                win.innerHTML = "";
                // Enables the button to be clicked after the win has been removed.
                document.querySelector('#wager').disabled = false;
            }, 15000);
        // Create's a else statement that if i is not equal to execute the coin (tail) spin.
        } else {
            // Create's a setTimeout function that's set to 25ms.
            setTimeout(function() {
                // Sets the coin animation to spin forward for 7 seconds.
                coin.style.animation = "spin-tails 7s forwards";
            }, 25);
            // Create's a setTimeout function that's set to 7s.
            setTimeout(function() {
                // Displays the loss in the bet div on the coinflip page.
                loss.innerHTML = "-" + "$" + document.getElementById("bet").value;
            }, 7000);
            // Create's a setTimeout function that's set to 15s.
            setTimeout(function() {
                // Sets the loss div to nothing after 15s.
                loss.innerHTML = "";
                // Enables the button to be clicked after the win has been removed.
                document.querySelector('#wager').disabled = false;
            }, 15000);
        }
    })
})
