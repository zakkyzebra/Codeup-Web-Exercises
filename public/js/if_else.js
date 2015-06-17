// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'blue'; 

document.write(color + "! ");

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.
// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.
if(color == 'red'){
	document.write("red is the color of blood!<br>");
} else if (color == 'blue'){
	document.write("blue is the color of the sky!<br>");
} else if (color == 'orange'){
	document.write("orange is the color of oranges!<br>");
} else if (color == 'yellow'){
	document.write("yellow is the color of yellow crayons!<br>");
} else if (color == 'green'){
	document.write("green is the color of healthy grass!<br>");
} else {
	document.write("i actually dont know what color indigo or violet is therefore cant make a comparison, because i am too deep into my code to be bothered to look it up!<br>");
}

if(color == favorite){
	document.write("hey thats my favorite color!")
}

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.