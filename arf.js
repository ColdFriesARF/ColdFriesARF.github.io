function range() {
	var slider = document.getElementById("dispense-amount");
	var amount = document.getElementById("amount");
	amount.innerHTML = "Dispense " + slider.value + " Cup(s)";

	slider.oninput = function () {
		amount.innerHTML = "Dispense " + this.value + " Cup(s)";
	}
}

document.getElementById("dispense").addEventListener("click", function() {
	confirm("Dispense " + document.getElementById("dispense-amount").value + " cup(s) of food?");
});
