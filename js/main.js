window.addEventListener('scroll', () => {
	document.querySelector('nav').classList.toggle ('window-scroll', window.scrollY > 10)
})

const menu = document.querySelector("nav_menu");
const menuBtnopen = document.querySelector("open_nav-btn");
const menuBtnclose = document.querySelector("close_nav-btn");

const shownav = () =>{
	menu.style.display = "flex";
	menuBtnclose.style.display = "inline-block";
	menuBtnopen.style.display = "none";
}

menuBtnopen.addEventListener('click', shownav);

const closenav = () =>{
	menu.style.display = "none";	
	menuBtnclose.style.display = "none";
	menuBtnclose.style.display = "inline-block";
} 
closeBtn.addEventListener('click', closenav);

Date.prototype.toDateInputValue = (function(){
	var local = new Date(this);
	local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
	return local.toJSON().slice(0,10);
});
document.getElementByID('appdate').value = new Date().toDateInputValue();

const locationBtn = document.querySelector("location-btn");
locationBtn.onclick = () =>{

	var x= document.getElementById("location");
	function getlocation() {
	   	if(navigator.geolocation){
	   		navigator.geolocation.getCurrentPosition(showPosition);
	   	  }
	   	else{
	        alert("Sorry! your browser is not supporting")
	   	} 
	}
	     
	function showPosition(position){
	    var x = "Your current location is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " +    position.coords.longitude + ")";
	    document.getElementById("location").innerHTML = x;
	}

}