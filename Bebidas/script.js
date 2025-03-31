// Function to display the relevant fields based on the selected drink type
function showDrinkFields() {
    // Hide all drink type fields
    const allFields = document.querySelectorAll('.drinkFields');
    allFields.forEach(function(field) {
        field.style.display = 'none';
    });

    // Get the selected drink type from the dropdown
    const selectedDrink = document.getElementById('drinkType').value;

    // Show the corresponding fields based on the selected drink type
    if (selectedDrink === 'vinho') {
        document.getElementById('vinhoFields').style.display = 'block';
    }
        // If other drinks are added, you can add conditions for them
    // Example for "Refrigerante" and "Suco" (if they are added similarly)
    else if (selectedDrink === 'refrigerante') {
        document.getElementById('refrigeranteFields').style.display = 'block';
    }
    else if (selectedDrink === 'suco') {
        document.getElementById('sucoFields').style.display = 'block';
    }
}