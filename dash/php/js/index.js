var videos = ['video/Ladus.mp4', 'video/edus.mp4'];
var currentIndex = 0;

function myNewSrc() {
	var myVideo = document.getElementsByTagName('video')[0];
	myVideo.src = videos[currentIndex];
	myVideo.load();
}

function myAddListener() {
	var myVideo = document.getElementsByTagName('video')[0];
	currentIndex = (currentIndex + 1) % videos.length;
	myVideo.src = videos[currentIndex];
	myVideo.addEventListener('ended', myNewSrc, false);
}
