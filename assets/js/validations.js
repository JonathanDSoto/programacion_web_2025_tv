function onlyLetters(event)
{
	const pressedKey = event.key;
	const letters = ["a", "á", "A","Á","e"];

	if(!letters.includes(pressedKey)){
	  	return false
	}

	//validate javascript regex email
}