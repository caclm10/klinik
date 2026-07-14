const currencyFormatter = new Intl.NumberFormat("id-ID");

function formatRupiah(value) {
    const numericValue = Number.parseInt(String(value).replace(/\D+/g, ""), 10);

    if (!Number.isFinite(numericValue)) {
        return "Rp0";
    }

    return `Rp${currencyFormatter.format(numericValue)}`;
}

function syncPaymentTotal(form) {
    const amountInput = form.querySelector("[data-payment-amount]");
    const totalOutput = form.querySelector("[data-payment-total]");

    if (!amountInput || !totalOutput) {
        return;
    }

    const updateTotal = () => {
        const digitsOnly = String(amountInput.value).replace(/\D+/g, "");

        if (amountInput.value !== digitsOnly) {
            amountInput.value = digitsOnly;
        }

        totalOutput.textContent = formatRupiah(digitsOnly);
    };

    updateTotal();
    amountInput.addEventListener("input", updateTotal);
}

document.querySelectorAll("[data-payment-form]").forEach(syncPaymentTotal);

const alertDialog = document.getElementById("alert-dialog");
const alertMessageElement = alertDialog.querySelector(`[data-slot="message"]`);
const alertSubmitButton = alertDialog.querySelector(`[data-slot="submit"]`);

document.querySelectorAll("[data-alert]").forEach((element) => {
    if (alertDialog) {
        const message = element.getAttribute("data-alert");

        if (!message) {
            return;
        }

        element.addEventListener("submit", (event) => {
            event.preventDefault();

            if (alertMessageElement) {
                alertMessageElement.textContent = message;
            }

            alertDialog.showModal();
        });

        alertSubmitButton?.addEventListener("click", () => {
            element.submit();

            alertDialog.close();
        });
    } else {
        element.addEventListener("submit", (event) => {
            event.preventDefault();
        });
    }
});
