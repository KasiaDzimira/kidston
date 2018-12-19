// JavaScript Document

// dont include this code directly in page ...... should be in seperate file  
objects = document.getElementsByTagName("object");
	for (var i = 0; i < objects.length; i++)
	{
	objects[i].outerHTML = objects[i].outerHTML;
	}
