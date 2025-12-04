<!DOCTYPE html>
<head>
    <title>w3-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with w3-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
    <header class = "header"> Ask Stu the Study Bot </header>
    <hr> 
    <div id = "messagearea">
        <input type="text" autocomplete = "off" title = "Type '?Commands? to see the words that I can recognize so far. Type '?Override? to get an email address to send your questions to." placeholder="Ask a question or hover over this textbox for more commands..." id="usermessage">
        <button type="button" id = "sendbutton" onclick="getUserMessage()">Send</button>
    </div>
    <p id = "chatbotrobotname"> Stu </p>
    <img src = "https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400" id = "stuIcon">
    <p id = "chatbotusername"> You </p>
    <img src = "https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX25634105.jpg" id = "userIcon">
    <script>
        var input = document.getElementById("usermessage");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("sendbutton").click();
            }
        }
        );
    </script>
    <button id = "back" onclick = "back();"> Back </button>
    <script src = "/js/websitejs.js"></script>
</body>
</html>