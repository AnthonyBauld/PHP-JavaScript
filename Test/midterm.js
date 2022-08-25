window.addEventLister("Load", function()
{
    let mole = false;
    const molehole = document.getElementById("molehole");
    const whack = document.getElementById("whack");
    const message = document.getElementById("message");
   
function moleText()
{
    document.getElementById("molehole").hide().delay(15000);
    if(molehole === delay(0))
    {
        mole = false;
    }
    else if (molehole === delay(15000))
    {
        mole = true;
        document.getElementById("molehole").innerHTML = "Mole!";
    }
}
whack.getElementById("click", function()
{
    moleText();
    if (mole === true)
    {
        message.innerHTML = "___Wins!";
        message.style.color = "blue";
    }
    else if (mole === false)
    {
        message.innerHTML = "___ Loses!";
        message.style.color = "red";
    }
})
})
