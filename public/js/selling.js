// checkout.js
document.addEventListener("DOMContentLoaded", function () {
    const successMessage = document.getElementById("success-message2");
    const paymentForm2 = document.getElementById("reservation-form2");
    const paymentFormError = document.getElementById("error-message2");

    paymentForm1.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Simulate an asynchronous payment processing (replace with actual payment logic)
        try {
            const response = await fetch(paymentForm2.action, {
                method: "POST",
                body: new FormData(paymentForm2),
            });

            if (response.ok) {
                const result = await response.json();

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
