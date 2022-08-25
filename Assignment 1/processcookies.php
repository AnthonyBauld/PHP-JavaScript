<!DOCTYPE html>
<html>
    <?php
        /**
            * Anthony. Bauld (000754334).
            * September 24th, 2021.
            *
            * This software displays their name as well as the color of fortune cookies they requested. 
            * Each cookie should contain a unique message as well as a set of seven lucky numbers chosen at random from the user's desired range.
        */
    ?>
<head>
    <title>Assignment 1 - Anthony. Bauld</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> 
        /* 
            Creates different features within the body of the page like font style,
            font weight, background color, and displays within the middle of the screen.
        */
        body
        {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
            font-weight: normal;
            color: black;
            background-color: beige;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* 
            Creates a text box that will hold the username, fortune cookie randomized text, 
            and the lucky numbers.
        */
        .box
        {
            width: 100%;
            max-width: 900px;
            max-height: 100%;
            margin: 0, auto;
            padding: 20px;  
            box-shadow: 0px 0px 20px black;
            background-color: blanchedalmond;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        /* 
            Creates a hover over the fortune cookie text output.
        */
        p.cookies:hover
        {
            background-color:<?=$color?>;
        }
    </style>
</head>

<?php
    $message = " ";
    // Gets the username input and filters it.
    $username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    // Creates an if statement that returns a text statement if null.
    if($username === null)
    {
        // Display's a message if returned null.
        $message .= "Name parameter was currently not found.";
    }
    // Creates an else statement that returns a text statement if false.
    elseif ($username === false)
    {
        // Display's a message if returned false.
        $message .= "Username parameter was not string.";
    } 
    else
    {
        // Display's the inputted username if it does not return null/false.
        $message .= "Name: $username<br><br>";
    }

    // Create's an Array called cookies.
    $cookies = array("Never upset the driver of the car you're in they're the master of your destiny until you get home. "
    , "In the eyes of lovers, everything is beautiful. "
    , "All the world may not love a lover but they will be watching him. "
    , "For hate is never conquered by hate. Hate is conquered by love. "
    , "Fortune favors the brave. "
    , "You will be traveling and coming into a fortune. "
    , "Stop searching forever. Happiness is just next to you. "
    , "Because of your melodic nature, the moonlight never misses an appointment. "
    , "The human spirit is stronger then anything that can happen to it. "
    , "It is much easier to look for the bad, than it is to find the good. "
    , "Happinees comes from a good life. "
    , "A truly great person never puts away the simplicity of a child. "
    , "You will enjoy razon-sharp spiritual vision today. "
    , "An alien of some sort will be appearing to you shortly. "
    , "Excuses are easy to manufacture, and hard to sell. "
    , "Jealousy doesn't open doors, it closes them!. "
    , "The problem with resisting temptation is that it may never come again. "
    , "Good clothes open many doors. Go shopping. "
    , "Minor aches today are likely to pay off handsomely tomorrow. "
    , "Benefit by doing things that others give up on. "
    , "Sing and rejoice, fortune is smiling on you. "
    , "Money will come to you when you are doing the right thing. "
    , "Someone stole your fortune and replaced it with this one. Your luck sucks. Have a good day!. "
    , "The only certainty is that nothing is certain. "
    , "Your problem just got bigger. Think, what have you done. "
    , "It takes more than good memory to have good memories. "
    , "Did you remember to order your take out also?. "
    , "Nothing Shows A Man's Character More Than What He Laughs At. "
    , "A clear conscience is usually the sign of a bad memory. "
    , "Virtuous find joy while Wrongdoers find grieve in their actions. "
    , "A clear conscience is usually the sign of a bad memory. "
    , "IT IS NOT GOOD TO BE A USER BLESSINGS COME FROM BEING A GIVER NOT A TAKER. "
    , "You will die alone and poorly dressed. "
    , "You are often asked if it is in yet. "
    , "Life is a dancefloor,you are the DJ!. "
    , "Love Takes Pratice. "
    , "A merry heart does good like a medicine. "
    , "Get off to a new start - come out of your shell. "
    , "The dream you've been dreaming all your life isn't worth it. Find a new dream, and once you're sure you've found it, fight for it. "
    , "Use the force. "
    , "A good way to keep healthy is to eat more Chinese food. "
    , "An alien of some sort will be appearing to you shortly. "
    , "Enthusiastic leadership gets you a promotion when you least expect it. "
    , "You will be called to fill a position of high honor and responsibility. "
    , "You are contemplating some action which will bring credit upon you. "
    , "Let not your hand be stretched out to receive and shut when you should repay. "
    , "If you are afraid to shake the dice, you will never throw a six. "
    , "Fear can keep us up all night long, but faith makes one fine pillow. "
    , "Believing that you are beautiful will make you appear beautiful to others around you. "
    , "It takes ten times as many muscles to frown as it does to smile. ");

    // Gets the fortunecookies inputs and filters it.
    $fortunecookies = filter_input(INPUT_GET, "fortunecookies", FILTER_VALIDATE_INT);
    // Creates an if statement that returns a text statement if null.
    if($fortunecookies === null)
    {
        // Display's a message if returned null.
        $message .= "Fortunecookies parameter was currently not found.";
    } 
    // Creates an else statement that returns a text statement if false.
    else if ($fortunecookies === false)
    {
        // Display's a message if returned false.
        $message .= " Cookie parameter was not an int.";
    } 

    // Gets the luckynumber and luckynumber2 inputs and filters it.
    $luckynumber = filter_input(INPUT_GET, "luckynumber", FILTER_VALIDATE_INT);
    $luckynumber2 = filter_input(INPUT_GET, "luckynumber2", FILTER_VALIDATE_INT);
    // Creates an if statement that returns a text statement if null.
    if($luckynumber === null || $luckynumber2 === null)
    {
        // Display's a message if returned null.
        $message .= "Luckynumber parameter was currently not found.";
    } 
    // Creates an else statement that returns a text statement if false.
    else if ($luckynumber === false || $luckynumber2 === false)
    {
        // Display's a message if returned false.
        $message .= "Lucky Number parameter was not an int.";
    } 

    // Gets the color input and filters it.
    $color = filter_input(INPUT_GET, "color", FILTER_DEFAULT);
    // Creates an if statement that returns a text statement if null.
    if($color === null)
    {
        // Display's a message if returned null.
        $message .= "Color parameter was currently not found.";
    } 
    // Creates an else statement that returns a text statement if false.
    else if ($color === false)
    {
        // Display's a message if returned false.
        $message .= "Color parameter was not a string";
    }
?>

<body>
    <div class="box">
    <p><?=$message?></p>
        <?php
            // Creates a for loop that verifies the number of fortune cookies entered by the user.
            for ($count = 0; $count - $fortunecookies; $count++) 
            {
                // Displays a fortune cookie from the cookies Array at random.
                echo $cookies[array_rand($cookies)];
                // Creates a for loop that verifies the number of lucky numbers entered and outputs seven random integers.
                for ($num = 0; $num < 7; $num++) 
                {
                    // Creates a random integer from the values luckynumber and luckynumber2 and stores it in the randomNum variable.
                    $randomNum = rand($luckynumber, $luckynumber2). ".\n";
                    // Creates a output of one or more from the variable randomNum.
                    echo ($randomNum);
                }
                // Creates a output of one or more and breaks the line.
                echo "<br><br>";
            }
        ?>
    </div>
</body>

</html>
