const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');

// Get username and room from URL
/* const { username, room } = Qs.parse(location.search, {
  ignoreQueryPrefix: true,
}); */
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const { username, room } ={username:urlParams.get('username'),room:urlParams.get('room')};

console.log(username,room);

const ip="127.0.0.1"
const port="3000"
const url=`${ip}:${port}`;
console.log(url);
const socket = io(url);

// Join chatroom
socket.emit('joinRoom', { username, room });

// Get room and users
socket.on('roomUsers', ({ room, users }) => {
  outputRoomName(room);
  outputUsers(users);
});

// Message from server
socket.on('message', (message) => {
  console.log(message);
  outputMessage(message);

  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

// Message submit
chatForm.addEventListener('submit', (e) => {
  e.preventDefault();
  // Get message text  Agregamos la imagen de la IA aqui se activa el estado
  let msg = e.target.elements.msg.value;
  msg = msg.trim();
  if (!msg) {
    return false;
  }
  // Emit message to server
  socket.emit('chatMessage', msg);
  // Clear input
  e.target.elements.msg.value = '';
  e.target.elements.msg.focus();
}); 

// Output message to DOM
/* function outputMessage(message) {
  const div = document.createElement('li');
  div.classList.add('message');
  div.classList.add('chat');
  div.classList.add('incoming');
  const p = document.createElement('p');
  p.classList.add('meta');
  p.innerText = message.username;
  p.innerHTML += `<span>${message.time}</span>`;
  div.appendChild(p);
  const para = document.createElement('p');
  para.classList.add('text');
  para.innerText = message.text;
  div.appendChild(para);
  document.querySelector('.chat-messages').appendChild(div);
} */
function outputMessage(message) {
  const chatMessages = document.querySelector('.chat-messages');

  const messageContainer = document.createElement('li');
  messageContainer.classList.add('message', 'chat', 'incoming');

  const metaInfo = document.createElement('p');
  metaInfo.classList.add('meta');
  metaInfo.innerHTML = `<span>${message.time}</span>`;
  
  const username = document.createElement('span');
  username.classList.add('username');
  username.innerText = message.username;

  metaInfo.appendChild(username);
  messageContainer.appendChild(metaInfo); 

  const textContent = document.createElement('p');
  textContent.classList.add('text');
  textContent.innerText = message.text;

  messageContainer.appendChild(textContent);
  chatMessages.appendChild(messageContainer);
}

// Add room name to DOM
function outputRoomName(room) {
  console.log("Response Server",room);
  roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
  userList.innerHTML = '';
  users.forEach((user) => {
    const li = document.createElement('li');
    li.innerText = user.username;
    userList.appendChild(li);
  });
}

//Prompt the user before leave chat room
document.getElementById('leave-btn').addEventListener('click', () => {
  const leaveRoom = confirm('estas seguro que quieres abandonar el chat?');
  if (leaveRoom) {
    window.location = '/salas';
  } else {
  }
});
