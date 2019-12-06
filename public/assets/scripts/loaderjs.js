function myFunction() {
    //myVar = setTimeout(showPage, 3000);
	showPage();
  }

function showPage(){
	var loader = document.getElementById("loader");
	var div = document.getElementById("myDiv");

	if(loader!=null){

        loader.style.display = "none";

    }

	if(div!=null){

        div.style.display = "block";

    }
}

function showFrame(){
	console.log("frame loaded");
	var frameloader = document.getElementById("frame_loader");
    if(frameloader!=null){

        console.log("loader not null");
		frameloader.style.display = "none";

    }else{

		console.log("loader null");

}
}

