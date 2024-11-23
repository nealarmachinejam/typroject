function showForm(type) {
    // Hide all forms
    var forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.style.display = 'none';
    });
  
    // Show the selected form
    var selectedForm = document.getElementById(type + 'Form');
    if (selectedForm) {
        selectedForm.style.display = 'block';
    } else {
        alert('Form not available');
    }
}

function submitForm(formId) {
    var form = document.getElementById(formId);

    // Validate form fields
    // var donorNameInput = form.querySelector('input[name="donor_name"]');
    // if (!donorNameInput || donorNameInput.value.trim() === '') {
    //     alert('Please enter your name.');
    //     return;
    // }

    // Create FormData object
    var formData = new FormData(form);

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define what happens on successful data submission
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Display a success message
                alert(xhr.responseText);
                // Optionally, you can reset the form after successful submission
                form.reset();
            } else {
                // Display an error message if submission fails
                alert('Error: ' + xhr.status);
            }
        }
    };

    // Specify the POST request to the donate_process.php file
    xhr.open("POST", "php/donate_process.php", true);

    // Send the form data to the server
    xhr.send(formData);
}

function closeForm(formId) {
    var form = document.getElementById(formId);
    if (form) {
        form.style.display = 'none'; // Hide the form
    }
}

// Call the closeForm function with the ID of the form you want to close
closeForm('foodForm'); // Example: Close the foodForm
closeForm('booksForm');
closeForm('clothesForm');

// function validateAndSubmit(formId) {
//     var form = document.getElementById(formId);

//     // Get the donor name input field
//     var donorNameInput = form.querySelector('input[name="donor_name"]');
//     if (!donorNameInput || donorNameInput.value.trim() === '') {
//         alert('Please enter your name.');
//         return;
//     }

//     // Here you can add more validation for other fields if needed

//     // If all validation passes, submit the form
//     submitForm(formId);
// }
// function showForm(type) {
//     // Hide all forms
//     var forms = document.querySelectorAll('form');
//     forms.forEach(form => {
//       form.style.display = 'none';
//     });
  
//     // Show the selected form
//     var selectedForm = document.getElementById(type + 'Form');
//     if (selectedForm) {
//       selectedForm.style.display = 'block';
//     } else {
//       alert('Form not available');
//     }
//   }
//   function submitForm(formId) {
//     var form = document.getElementById(formId);

//     // // Validate form fields
//     // var donorName = form.elements['donor_name'].value;
//     // var foodName = form.elements['food_name'].value;
//     // // Add validation for other fields as needed

//     // // Check if any field is empty
//     // if (donorName === '' || foodName === '') {
//     //     alert('Please fill in all required fields.');
//     //     return; // Prevent form submission
//     // }
//     var formData = new FormData(form);

//     // Create an XMLHttpRequest object
//     var xhr = new XMLHttpRequest();

//     // Define what happens on successful data submission
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 // Display a success message
//                 alert(xhr.responseText);
//                 // Optionally, you can reset the form after successful submission
//                 form.reset();
//             } else {
//                 // Display an error message if submission fails
//                 alert('Error: ' + xhr.status);
//             }
//         }
//     };

//     // Specify the POST request to the donate_process.php file
//     xhr.open("POST", "php/donate_process.php", true);

//     // Send the form data to the server
//     xhr.send(formData);
// }


// // Define a function to close the form
// function closeForm(formId) {
//     var form = document.getElementById(formId);
//     form.style.display = 'none'; // Hide the form
// }

// // Call the closeForm function with the ID of the form you want to close
// closeForm('foodForm'); // Example: Close the foodForm
// closeForm('booksForm');
// closeForm('clothesForm');

// function validateAndSubmit(formId) {
//     var form = document.getElementById(formId);

//     // Get the donor name input field
//     var donorNameInput = form.querySelector('input[name="donor_name' + formId.slice(0, -4) + '"]');

//     // Check if the donor name is empty
//     if (donorNameInput.value.trim() === '') {
//         alert('Please enter your name.');
//         return;
//     }

//     // Here you can add more validation for other fields if needed

//     // If all validation passes, submit the form
//     form.submitForm();
// }