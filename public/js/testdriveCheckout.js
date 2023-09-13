// checkout.js
document.addEventListener("DOMContentLoaded", function () {
    const successMessage = document.getElementById("success-message1");
    const paymentForm1 = document.getElementById("reservation-form1");
    const paymentFormError = document.getElementById("error-message1");

    paymentForm1.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Simulate an asynchronous payment processing (replace with actual payment logic)
        try {
            const response = await fetch(paymentForm1.action, {
                method: "POST",
                body: new FormData(paymentForm1),
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
