function createroomcheck() {
    location.href = '/html/createroomcheck.php';
}
function joinroom() {
    location.href = '/html/joinroomcheck.php';
}
function editroom() {
    location.href = '/html/editroomcheck.php';
}
function contactus() {
	location.href = '/html/contactus.php';
}
function websiteguide() {
	location.href = '/html/websiteguide.php';
}
function login() {
	location.href = '/html/login.php';
}
function studyresources() {
    location.href = '/html/studyresourcescheck.php'
}
function addstudyresource() {
    location.href = '/html/addstudyresource.php'
}
function chatbot() {
    location.href = '/html/chatbot.php';
}
function faqs() {
    location.href = '/html/faq.php';
}
function back() {
    location.href = '/index.html';
}
function getUserMessage() {
    var currentusermessage = document.getElementById("usermessage").value;
    document.getElementById("usermessage").value = "";
    const messagebox = document.createElement("div");
    const messagetext = document.createTextNode(currentusermessage);
    messagebox.style.color = "white";
    messagebox.style.backgroundColor = "black";
    messagebox.style.width = "40%";
    messagebox.style.wordWrap = "break-word";
    messagebox.style.marginLeft = "57.6%";
    messagebox.style.marginTop = "2%";
    messagebox.style.marginBottom = "4%";
    messagebox.style.padding = "1%";
    messagebox.style.textAlign = "center";
    messagebox.style.borderRadius = "25px";
    messagebox.appendChild(messagetext);
    messagearea.appendChild(messagebox)
    createResponse(currentusermessage);
}
function chatbotrespond(usersmessage) {
    var elem = document.getElementById('messagearea');
    elem.scrollTop += elem.scrollHeight;
    setTimeout(function() {
    var responsemessage = usersmessage;
    const messagebox2 = document.createElement("div");
    const messagetext2 = document.createTextNode(responsemessage);
    messagebox2.style.color = "white";
    messagebox2.style.backgroundColor = "#117481";
    messagebox2.style.width = "40%";
    messagebox2.style.wordWrap = "break-word";
    messagebox2.style.marginTop = "1.4%";
    messagebox2.style.marginBottom = "4%";
    messagebox2.style.marginLeft = "0.4%";
    messagebox2.style.padding = "1%";
    messagebox2.style.textAlign = "center";
    messagebox2.style.borderRadius = "25px";
    messagebox2.appendChild(messagetext2);
    messagearea.appendChild(messagebox2);
    var elem = document.getElementById('messagearea');
    elem.scrollTop += elem.scrollHeight;
    }, 300);
    elem = document.getElementById('messagearea');
    elem.scrollTop += elem.scrollHeight;
}
function search() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("informationtable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td") ; 
      for(j=0 ; j<td.length ; j++)
      {
        let tdata = td[j] ;
        if (tdata) {
          if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break ; 
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
}
function refresh() {
	location.href = '/html/joinroom.php'
}
function createResponse(usersmessage) {
    var usermessage = usersmessage.toLowerCase();
    
    const userquestions = [
    ["hi", "hey", "hello", "your name"],
    ["file not found"],
    ["purpose of this website", "purpose of this", "purpose of website", "this website for", "the website for", "this website", "what's this", "what this", "whats this", "what is this"],
    ["how are you", "how's it going", "what's up", "what's good"],
    ["thanks", "thank you", "cheers"],
    ["i got it", "got it", "i understand", "i get it", "ok", "okay"],
    ["make room", "make a room", "create room", "create a room", "make rooms", "create rooms", "make some rooms", "create some rooms"],
    ["join room", "join a room", "enter room", "enter a room", "join rooms", "enter rooms", "join some rooms", "enter some rooms"],
    ["edit room", "edit a room", "change room", "change a room", "edit rooms", "change rooms", "edit some rooms", "change some rooms", "change subject", "change unit", "change topic", "change name", "change creator", "change time", "change date", "change meet time", "change meet date", "change link", "change meet link", "change meeting link"],
    ["delete room", "remove room", "delete a room", "remove a room", "delete rooms", "remove rooms", "delete some rooms", "remove some rooms"],
    ["make account", "sign up", "signup", "login", "log in"],
    ["forgot password", "forget password", "forgot email", "forget email", "forgot my password", "forget my password", "forgot my email", "forget my email", "forgot the password", "forget the password", "forgot the email", "forget the email"],
    ["?commands?"],
    ["?override?"]
    ];
    const chatbotresponses = [
    ["Hello! My name is Stu. ", "Hi! My name is Stu. ", "Hey! My name is Stu. "],
    ["If you're asking what to do if it says \"File not found\" after clicking a link, this error occurs when the link isn't a real link. If you know the room's creator, try contacting them. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking what the purpose of this website is, it's a collaborative study tool for students around the world. You can join rooms created by others or create a room yourself. View the \"Website Guide\" page to learn how to do this."],
    ["I'm doing well, how are you? ", "I'm doing great, how are you? "],
    ["No problem! "],
    ["Glad I could help! Let me know if you have any more questions. "],
    ["If you're asking how to make a room, first go to the homepage. Then, create an account with the \"Sign Up\" page. Then, from the home page, click \"Create Room,\" fill out your credentials, and then fill out the form to make a room. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to join a room, first go to the homepage. From there, click \"Join Room\" and browse through the open rooms. Use the search bar to find anything specific, such as a person or subject. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to edit a room, first go to the homepage. From there, click \"Edit Room\" and log in with your credentials. Fill out the ID of the room you want to change, and then fill out the rest of the form to edit the room. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to delete a room, first go to the homepage. From there, click \"Edit Room\" and log in with your credentials. Where it says \"Delete Room,\" type \"YES.\" If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to make an account, first go to the homepage. Then, create an account with the \"Sign Up\" page. "],
    ["If you're saying you forgot your email or password, please email w3study.contact@gmail.com with the details you remember. "],
    ["I currently recognize the following words and phrases: hi, hey, hello, how are you, how's it going, what's up, what's good, thanks, thank you, cheers, i got it, got it, i understand, i get it, make room, make a room, create room, create a room, make rooms, create rooms, make some rooms, create some rooms, join room, join a room, enter room, enter a room, join rooms, enter rooms, join some rooms, enter some rooms, edit room, edit a room, change room, change a room, edit rooms, change rooms, edit some rooms, change some rooms, change subject, change unit, change topic, change name, change creator, change time, change date, change meet time, change meet date, change link, change meet link, change meeting link, make account, sign up, signup, login, log in, forgot password, forget password, forgot email, forget email, forgot my password, forget my password, forgot my email, forget my email, forgot the password, forget the password, forgot the email, forget the email, ?commands?, ?override?"],
    ["Email the following address: w3study.contact@gmail.com "]
    ];

    let responsemessage = "";
    
    for(let a = 0; a < userquestions.length; a++) {
        for (let b = 0; b < userquestions[a].length; b++) {
            if(usermessage.includes(userquestions[a][b])) {
                responsemessage += chatbotresponses[a][Math.floor(Math.random() * chatbotresponses[a].length)];
            }
        }
    }
    
    if(responsemessage === "") {
        responsemessage = "Sorry, I don't understand. I'm still learning new phrases. Try using different keywords, make sure you spelled everything correctly, or send your question to our team by emailing w3study.contact@gmail.com";
    }
    
    chatbotrespond(responsemessage);
}






































/*
/* IMPROVE STU'S ABILITY TO COMMUNICATE WITH USERS
function createResponse(usersmessage) {
    var usermessage = usersmessage.toLowerCase();
    
    const userquestions = [
    ["hi", "hey", "hello", "your name"],
    ["file not found"],
    ["purpose of this website", "purpose of this", "purpose of website", "this website for", "the website for", "this website", "what's this", "what this", "whats this", "what is this"],
    ["how are you", "how's it going", "what's up", "what's good"],
    ["thanks", "thank you", "cheers"],
    ["i got it", "got it", "i understand", "i get it", "ok"],
    ["make room", "make a room", "create room", "create a room", "make rooms", "create rooms", "make some rooms", "create some rooms"],
    ["join room", "join a room", "enter room", "enter a room", "join rooms", "enter rooms", "join some rooms", "enter some rooms"],
    ["edit room", "edit a room", "change room", "change a room", "edit rooms", "change rooms", "edit some rooms", "change some rooms", "change subject", "change unit", "change topic", "change name", "change creator", "change time", "change date", "change meet time", "change meet date", "change link", "change meet link", "change meeting link"],
    ["delete room", "remove room", "delete a room", "remove a room", "delete rooms", "remove rooms", "delete some rooms", "remove some rooms"],
    ["make account", "sign up", "signup", "login", "log in"],
    ["forgot password", "forget password", "forgot email", "forget email", "forgot my password", "forget my password", "forgot my email", "forget my email", "forgot the password", "forget the password", "forgot the email", "forget the email"],
    ["?commands?"],
    ["?override?"]
    ];
    const chatbotresponses = [
    ["Hello! My name is Stu. ", "Hi! My name is Stu. ", "Hey! My name is Stu. "],
    ["If you're asking what to do if it says \"File not found\" after clicking a link, this error occurs when the link isn't a real link. If you know the room's creator, try contacting them. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking what the purpose of this website is, it's a collaborative study tool for students around the world. You can join rooms created by others or create a room yourself. View the \"Website Guide\" page to learn how to do this."],
    ["I'm doing well, how are you? ", "I'm doing great, how are you? "],
    ["No problem! "],
    ["Glad I could help! Let me know if you have any more questions. "],
    ["If you're asking how to make a room, first go to the homepage, Then, create an account with the \"Sign Up\" page. Then, from the home page, click \"Create Room,\" fill out your credentials, and then fill out the form to make a room. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to join a room, first go to the homepage. From there, click \"Join Room\" and browse through the open rooms. Use the search bar to find anything specific, such as a person or subject. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to edit a room, first go to the homepage. From there, click \"Edit Room\" and log in with your credentials. Fill out the ID of the room you want to change, and then fill out the rest of the form to edit the room. If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to delete a room, first go to the homepage. From there, click \"Edit Room\" and log in with your credentials. Where it says \"Delete Room,\" type \"YES.\" If this wasn't your question, try using different keywords, or send a human your question by emailing w3study.contact@gmail.com. "],
    ["If you're asking how to make an account, first go to the homepage. Then, create an account with the \"Sign Up\" page. "],
    ["If you're saying you forgot your email or password, please email w3study.contact@gmail.com with the details you remember. "],
    ["I currently recognize the following words and phrases: hi, hey, hello, how are you, how's it going, what's up, what's good, thanks, thank you, cheers, i got it, got it, i understand, i get it, make room, make a room, create room, create a room, make rooms, create rooms, make some rooms, create some rooms, join room, join a room, enter room, enter a room, join rooms, enter rooms, join some rooms, enter some rooms, edit room, edit a room, change room, change a room, edit rooms, change rooms, edit some rooms, change some rooms, change subject, change unit, change topic, change name, change creator, change time, change date, change meet time, change meet date, change link, change meet link, change meeting link, make account, sign up, signup, login, log in, forgot password, forget password, forgot email, forget email, forgot my password, forget my password, forgot my email, forget my email, forgot the password, forget the password, forgot the email, forget the email, ?commands?, ?override?"],
    ["Email the following address: w3study.contact@gmail.com "]
    ];

    let responsemessage = "";
    
    for(let a = 0; a < userquestions.length; a++) {
        for (let b = 0; b < userquestions[a].length; b++) {
            var regex = '\\b';
            regex += userquestions[a][b];
            regex += '\\b';
            var result = new RegExp(regex, 'i').test(usermessage);
            if(result === true) {
                responsemessage += chatbotresponses[a][Math.floor(Math.random() * chatbotresponses[a].length)];
            }
        }
    }
    
    if(responsemessage === "") {
        responsemessage = "Sorry, I don't understand. I'm still learning new phrases. Try using different keywords, make sure you spelled everything correctly, or send your question to our team by emailing w3study.contact@gmail.com";
    }
    
    chatbotrespond(responsemessage);
}





/*
let responsemessage = "";
    
    function escapeRegExp(string) {
        return string.replace(/([.*+?^=!:${}()|[]\/\])/g, "\\$1");
    }
    function searchWholeWord(wholeWord, hostString) {
        var regex = '\\b';
        regex += escapeRegExp(wholeWord);
        regex += '\\b';
        var result = new RegExp(regex, 'i').test(hostString);
        return result
    }
    for(let a = 0; a < userquestions.length; a++) {
        for (let b = 0; b < userquestions[a].length; b++) {
            if(searchWholeWord(userquestions[a][b], usermessage) === true) {
                responsemessage += chatbotresponses[a][Math.floor(Math.random() * chatbotresponses[a].length)];
            }
        }
    }
    
    if(responsemessage === "") {
        responsemessage = "Sorry, I don't understand. I'm still learning new phrases. Try using different keywords, make sure you spelled everything correctly, or send your question to our team by emailing w3study.contact@gmail.com";
    }
    chatbotrespond(responsemessage);
}
*/
