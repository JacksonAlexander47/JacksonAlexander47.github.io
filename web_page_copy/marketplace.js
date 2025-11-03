
function Cart(){
	
    this.itemGroups = [];
	this.items = 0;
	this.totalPrice = 0;
	
	this.getTotalAmount = function(){
		
			 this.items = 0;
			 this.totalPrice = 0;
			
			for(let i = 0; i <this.itemGroups.length; i++){
				let currGroup = this.itemGroups[i];
				this.items = this.items + currGroup.numberOfItems;
				this.totalPrice = this.totalPrice + (currGroup.numberOfItems * currGroup.pricePerItem);
			}
			return 1;
	}
	
    this.showTotalAmount = function(){
        if (this.itemGroups.length == 0){
            document.write("<p> You have 0 item, for a total amount of 0$, in your cart! </p>");
        } 
		else  {
			this.getTotalAmount();
			let withTaxes = (this.totalPrice + (this.totalPrice * 0.05) + (this.totalPrice * 0.09975));
			withTaxes = withTaxes.toFixed(2);
			document.write("you have " + this.items + " items, for a total amount of " + this.totalPrice + " in your cart.");
			document.write("With taxes (QST and GST) your total is: " + withTaxes);
        }
    }
	
	this.addItemGroup = function (itemGroup){
		this.itemGroups.push(itemGroup);
	}
}

function itemGroup(name, pricePerItem, numberOfItems){
	this.name = name;
	this.pricePerItem = pricePerItem;
	this.numberOfItems = numberOfItems;
	
}



document.write("<h2> 1) Creating the cart </h2>")
let my_cart = new Cart()
my_cart.showTotalAmount();

document.write("<h2> 2) Adding 15 pants at 10.05$ each to the cart! </h2>")
let pants = new itemGroup("pants", 10.05, 15);
my_cart.addItemGroup(pants)
my_cart.showTotalAmount(); 

document.write("<h2> 3) Adding 1 coat at 99.99$ to the cart! </h2>")
let coat = new itemGroup("coat", 99.99, 1);
my_cart.addItemGroup(coat)
my_cart.showTotalAmount();