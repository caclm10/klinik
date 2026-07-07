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
