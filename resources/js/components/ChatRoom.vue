<template>
    <div>
        <div class="chat-window">
            <div v-for="message in messages" :key="message.id" class="message">
                <strong>{{ message.user?.name || 'Guest' }}:</strong> {{ message.message }}
            </div>
        </div>
        <div class="chat-input">
            <input
                v-model="newMessage"
                type="text"
                placeholder="Type a message..."
                @keyup.enter="sendMessage"
            />
            <button @click="sendMessage">Send</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            messages: [], // Stores chat messages
            newMessage: '', // Input for new messages
        };
    },
    mounted() {
        this.fetchMessages(); // Load messages when the component is mounted
    },
    methods: {
        // Fetch messages from the server
        fetchMessages() {
            axios.get('/api/messages').then((response) => {
                this.messages = response.data;
            });
        },
        // Send a new message to the server
        sendMessage() {
            if (this.newMessage.trim() === '') return;

            axios
                .post('/api/messages', { message: this.newMessage })
                .then((response) => {
                    this.messages.push(response.data); // Add the new message to the list
                    this.newMessage = ''; // Clear the input field
                })
                .catch((error) => {
                    console.error('Error sending message:', error.response.data);
                });
        },
    },
};
</script>

<style>
.chat-window {
    height: 400px;
    overflow-y: auto;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
}
.message {
    margin-bottom: 5px;
}
.chat-input {
    display: flex;
    gap: 10px;
}
.chat-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.chat-input button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.chat-input button:hover {
    background-color: #0056b3;
}
</style>
