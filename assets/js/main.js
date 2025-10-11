var operation = "";
var value = ""

function setNumber(number){

	console.log(number)
	document.getElementById('result').innerHTML = number
}

function setOperation(type){

	console.log(type)

	if (operation == "") {
		operation = type
		value = parseInt(document.getElementById('result').innerHTML)
	}else{

		if (operation == "plus") {
			result = value  + parseInt(document.getElementById('result').innerHTML)
			console.log(result)

			document.getElementById('result').innerHTML = result
		}
		

	}

	console.log(type)
}

/*let uno = 5;
var dos = 5.6;
tres = false;
cuatro = null;
Cuatro = 11;
cinco = "hola"
seis = undefined;

const PI = 3.14159265359;

autos = ["subaru","toyota","ford"]

persona = {

	name: "Jonathan",
	lastname: "Soto",
	email:"jsoto@uabcs.mx",
	preferences:["subaru","toyota","ford"]

}


+, - * / **


console.log(uno)
console.log(dos)
console.log(tres)
console.log(Cuatro)
console.log(cuatro)
console.log(autos)
console.log(persona)
console.log(cinco)
console.log(seis)*/