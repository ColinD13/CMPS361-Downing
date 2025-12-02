<link rel="stylesheet" href="chatBotStyle.css">

<div class="chat-container">
    <h1>NFL Chat Bot</h1>
    <div id="chatbot">
        <div id="messages"></div>
    </div>
    <form id="chat-form" method="POST">
        <input type="text" name="user_input" id="user_input" placeholder="Ask Me something about NFL players" required>
        <button type="submit">Ask</button>
    </form>
</div>

<script>
    const form = document.getElementById("chat-form");
    const messages = document.getElementById("messages");

    messages.innerHTML += `<div class='bot-message'><strong>Chatbot:</strong> Welcome to the NFL chatbot!</div>`;

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const userInput = document.getElementById("user_input").value;
        messages.innerHTML += `<div class='user-message'><strong>You:</strong> ${userInput}</div>`;

        const response = await fetch("bot_logic.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ user_input: userInput })
        });

        const botResponse = await response.text();
        messages.innerHTML += `<div class='bot-message'><strong>Chatbot:</strong> ${botResponse}</div>`;
        form.reset();
    });

</script>
