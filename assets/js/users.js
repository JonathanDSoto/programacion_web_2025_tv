function editUser(target)
{
	console.log(target) 

	document.getElementById('name').value = target.dataset.name
	document.getElementById('lastname').value =  target.dataset.lastname
	document.getElementById('email').value =  target.dataset.email
	document.getElementById('user_id').value =  target.dataset.id
}

function removeUser(user_id)
{ 

	const userConfirmed = confirm("Are you sure you want to proceed?");

	if (userConfirmed) {
	  // Code to execute if the user clicked "OK"
	  console.log("User confirmed the action.");

	  document.getElementById('remove_user_id').value =  user_id 

	  document.getElementById('form_to_delete').submit()
	} else {
	  // Code to execute if the user clicked "Cancel"
	  console.log("User cancelled the action.");
	}

	
	
}