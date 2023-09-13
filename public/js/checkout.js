
// checkout.js
document.addEventListener("DOMContentLoaded", function () {
    const successMessage = document.getElementById("success-message");
    const paymentForm = document.getElementById("reservation-form");
    const paymentFormError = document.getElementById("error-message");

    paymentForm.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Simulate an asynchronous payment processing (replace with actual payment logic)
        try {
            const response = await fetch(paymentForm.action, {
                method: "POST",
                body: new FormData(paymentForm),
            });

            if (response.ok) {
                const result = await response.json();
                console.log(result);

                if (result.success) {
                    // Payment was successful, show the success message
                    successMessage.classList.remove("hidden");
                }else{
                    // Payment was unsuccessful, display the failure message
                    paymentFormError.classList.remove("hidden");
                }
            }
        } catch (error) {
            console.error("Payment failed:", error);
        }
    });
});






$(document).ready(function () {
    $('#payment-form').submit(function (e) {
        var valid = true;
        $('.error-message').text(''); // Clear existing error messages

        // Card Number Validation
        var cardNumber = $('#card_number').val();
        if (!/^[0-9]{13,19}$/.test(cardNumber)) {
            $('#card-number-error').text('Invalid card number');
            valid = false;
        }

        // Expiration Date Validation
        var expirationDate = $('#expiration_date').val();
        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expirationDate)) {
            $('#expiration-date-error').text('Invalid expiration date (MM/YY)');
            valid = false;
        }

        // CVV Validation
        var cvv = $('#cvv').val();
        if (!/^[0-9]{3,4}$/.test(cvv)) {
            $('#cvv-error').text('Invalid CVV');
            valid = false;
        }

        // Email Validation
        var email = $('#email').val();
        if (!/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(email)) {
            $('#email-error').text('Invalid email address');
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Prevent form submission if there are validation errors
        }
    });
});


function formatCardNumber(input) {
    // Remove any non-numeric characters
    var cardNumber = input.value.replace(/\D/g, '');

    // Format the card number with spaces or hyphens
    var formattedCardNumber = '';
    for (var i = 0; i < cardNumber.length; i++) {
        formattedCardNumber += cardNumber[i];
        if ((i + 1) % 4 === 0 && i < cardNumber.length - 1) {
            formattedCardNumber += ' '; // Add a space every four digits
        }
    }

    // Update the input value with the formatted card number
    input.value = formattedCardNumber;
}
