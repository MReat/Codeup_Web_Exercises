// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // TODO: change this to your favorite color from the list

var message = "";
	

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.


if (color == 'red') {
	console.log('RED! This is my favorite color!');
} else if (color == 'orange') {
	console.log('ORANGE --> This is a fruit...not my favorite color');

} else if (color == 'yellow') {
	console.log('They call me mellow YELLOW...but not my favorite color');
	
} else if (color == 'green') {
	console.log('GREEN Giant....Not my favorite though');
	
} else if (color == 'blue') {
	console.log('BLUE moon.....Not my color though');

} else {
	console.log('I do not know anything by that color');
}
			
	


var message = (color == favorite) ? console.log('Gratz computer...that is mine too.') : console.log('Not my favorite color.');




// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.