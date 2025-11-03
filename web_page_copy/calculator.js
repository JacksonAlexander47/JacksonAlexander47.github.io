
function compute_days(){
	
    const dob = new Date(get_dob());
	const currentDate = new Date();
   
	const yearOfBirth = dob.getFullYear();
	const monthOfBirth = dob.getMonth() + 1;
	const dayOfBirth = dob.getDate();
	
	const currYear = currentDate.getFullYear();
	const currMonth = currentDate.getMonth() + 1;
	const currDay = currentDate.getDate();
	
	var numOfDays = 0;
	
	//computing the number of days in the year difference 
	for(let i = yearOfBirth; i < currYear; i++){
		if(i%4 == 0){
				if(!(i%100 == 0)){
					//is a leap year
					numOfDays = numOfDays + 366; 
				}
				else if(i%400 == 0){
					//is a leap year
					numOfDays = numOfDays + 366;
				}
			}
		else{
		//is not a leap year
		numOfDays = numOfDays + 365;
		}
		
	}
	
	//computing the number of days in the month difference
	for(let i = monthOfBirth; i < currMonth; i++){
		// if the month is sept april june or november add 30 days 
		if((i == 4)||(i == 6)||(i == 9)||(i == 11)){
			numOfDays = numOfDays + 30;
		}
		//if the month is february check if it is a leap year 
		else if(i == 2){
			if(currYear%4 == 0){
				if(!(currYear%100 == 0)){
					//is a leap year
					numOfDays = numOfDays + 29; 
				}
				else if(currYear%400 == 0){
					//is a leap year
					numOfDays = numOfDays + 29;
				}
			}
			//is not a leap year
			numOfDays = numOfDays + 28;
			
		}
		else{
			numOfDays = numOfDays + 31;
		}
	}
	
	//computing the number of days in the day difference
	numOfDays = numOfDays + (currDay - dayOfBirth);
    
    write_answer_days(numOfDays);
}



function compute_circle(){
    const screen = get_screen_dims();
	var width = screen.width;
	var height = screen.height;
	var shortest;
	
	if(width < height){
		shortest = width;
	}
	else{
		shortest = height;
	}
	
	let radius = shortest / 2;
	let area  = 3.14 * (radius ** 2);
	
    
    write_answer_circle("the radius of the circle is: " + radius + "/n the area of the circle is: " + area + "px^2");
}



function check_palindrome(){
    const text_input = get_palindrome();
    var reverse = "";
	var palindrome = true;
	for(let i = text_input.length - 1; i >= 0; i--){
		reverse += text_input[i];
	}
	
    // Add code here checking if text_input is a palindrome.
    // You must use a for loop
    // Hint: choose how to manage spaces and capital/lowercase letters!
    
    for(let i = 0; i < text_input.length; i++){
		if(!(text_input[i] == reverse[i])){
			palindrome = false;
		}
	}
	
    write_answer_palindrome("the input string is a palindrome: " + palindrome);
}



function create_fibo(){    
    const fibo_length = document.getElementById("fibo_length").value;
	var sequence = [0, 1];
	var comment = "";
	
	if(fibo_length < 0){
		comment = "invalid input";
		sequence = [0];
	}
	if(fibo_length == 0){
		sequence = [0];
	}
	if(fibo_length == 1){
		sequence = [0,1];
	}
	if(fibo_length > 1){
		for(let i = 2; i <= fibo_length;i++){
			sequence.push(sequence[i-1] + sequence[i-2]);
		}
	}
    
    // Add code here to compute the fibonacci sequence.
    // The two first elements are 0 and 1
    // The next elements are the sum of the two last elements
    // You must use arrays
    // What happens if the input number is negative?
    // What happens if the input number is 0 or 1?


    write_answer_fibo(sequence);
}

