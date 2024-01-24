var hasBotIntroduced = false;

function introduceBot() {
 var botName = "WILLEM";
   if (!hasBotIntroduced) {
       var chatLogs = $('.chat-logs');
       var message1 = "Hallo, ik ben Willem de chatbot.";
       var message2 = "Type het nummer in van de vraag die je wilt stellen.";
       var message22 = "bijvoorbeeld: 1 als je een vraag hebt over het verblijf.";
       var message3 = "1. Vragen verblijf";
       var message4 = "2. Vragen activiteiten";
       var message5 = "3. Vragen over de camping";
       var message6 = "4. Vragen over de omgeving";
       var message7 = "5. Vragen over de faciliteiten";
       var message8 = "6. Vragen over de prijzen";

       var fullMessage =  message1 + '<br>' + message2 + '<br>' + message22 + '<br>' + message3 + '<br>' + message4 + '<br>' + message5 + '<br>' + message6 + '<br>' + message7 + '<br>' + message8;
       chatLogs.append( botName +'<p class="bot-message">' + fullMessage + '</p>');
       hasBotIntroduced = true;
   }
}

$("#chat-circle").click(function() {    
   $("#chat-circle").hide();
   $(".chat-box").show();
   introduceBot();
})

$(".chat-box-toggle").click(function() {
   $("#chat-circle").show();
   $(".chat-box").hide();
})

$('form').submit(function(e) {
   e.preventDefault();
   var input = $('#chat-input');
   var message = input.val();
   input.val('');

   var userName = "GAST";
   var fullMessage = userName + '<br><p class="user-message">' + message + '</p>';
   $('.chat-logs').append('<div class="message">' + fullMessage + '</div>');

   // Check if the user typed "1"
   if (message.trim() === "1") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het verblijf: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else if 
   (message.trim() === "2") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het activiteiten: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else if
   (message.trim() === "3") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het camping: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else if
   (message.trim() === "4") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het omgeving: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else if
   (message.trim() === "5") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het faciliteiten: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else if
   (message.trim() === "6") {
       var botName = "WILLEM";
       var botMessage = "Hier zijn enkele veelgestelde vragen over het prijzen: ..."; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   else {
       var botName = "WILLEM";
       var botMessage = "U moet een nummer invullen om informatie te krijgen. Geem antwoord gevonden? kunt u ons mailen op: janwillem@hotmail.com"; 
       var fullBotMessage = botName + '<br><p class="bot-message">' + botMessage + '</p>';
       $('.chat-logs').append('<div class="message">' + fullBotMessage + '</div>');
   }
   

   // Scroll to the bottom of the chat logs
   $('.chat-logs').scrollTop($('.chat-logs')[0].scrollHeight);
});