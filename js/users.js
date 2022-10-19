



const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");


searchBtn.onclick = () =>{
	searchBar.classList.toggle("active");
	searchBar.focus();
	searchBtn.classList.toggle("active");
}

searchBar.onkeyup = ()=>{
	let searchTerm = searchBar.value;

	let xhr = new XMLHttpRequest();
	xhr.open("POST", "../patient/users-list.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				//usersList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm" + searchTerm);
}

setInterval(()=>{

	let xhr = new XMLHttpRequest();
	xhr.open("GET", "../patient/users-list.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				//usersList.innerHTML = data;
			}
		}
	}
	xhr.send();
}, 500);



const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

form.onsubmit = (e) =>{
	e.preventDefault();
}

sendBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "../includes/chat-logic.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){			

			}
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);

}

