window.addEventListener("load", function()
{
    const num1 = document.getElementById("n1");
    const num2 = document.getElementById("n2");
    let url = "code.php$num1param=&num2param=" + num1 + num2;

    document.getElementById("nameform").addEventListener("submit", function(event) 
    {
        event.preventDefault();
        fetch(url, { credentials: 'include' })
        .then(response=>response.json())
        .then(reply)

        function reply(results)
        {
            if(results[0] ===  -1)
            {
                document.getElementById("output").innerHTML = "---";
            }
            else
            {
                let sum = 0;
                for (let i = 0; i = results.length; i++) 
                {
                    sum += results[i];
                }
                document.getElementById("output").innerHTML = sum;
            }
        }
    })
})
