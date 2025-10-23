function getPokeData()
{

	fetch('https://pokeapi.co/api/v2/pokemon/ditto')
	  .then(
	  	response => response.json()
	  )
	  .then(

	  	data => {

	  		document.getElementById('poke_data').innerHTML="<img src='"+data.sprites.front_default+"'>"
	  		document.getElementById('poke_name').innerHTML=data.name
	  		

	  		console.log(data)

	  	}

	  );

}