import Alpine from "alpinejs";

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

const dialogPilihPasien = document.getElementById("dialog-pilih-pasien");

if (dialogPilihPasien) {
    dialogPilihPasien.addEventListener("command", async (event) => {
        if (event.command !== "show-modal") return;

        const response = await fetch("/data-pasien", {
            headers: { "X-Requested-With": "XMLHttpRequest" },
        });
        const data = await response.json();

        console.log(data);
    });
}

Alpine.data("patientPicker", () => {
    async function fetchPatients(page = 1, search = "") {
        const url = `/data-pasien?search=${encodeURIComponent(search)}&page=${page}`;

        const response = await fetch(url, {
            headers: { "X-Requested-With": "XMLHttpRequest" },
        });
        const data = await response.json();

        return data;
    }
    return {
        paginator: {
            data: [],
            links: [],
            meta: {},
        },
        pasien: [],
        selectedPatientId: "",
        selectedPatientName: "",
        data: null,

        get paginationInfo() {
            return `${this.paginator.meta.from} - ${this.paginator.meta.to} dari ${this.paginator.meta.total} Data`;
        },

        async open() {
            this.$refs.dialog.showModal();

            this.paginator = await fetchPatients();

            console.log(this.paginator);
        },

        close() {
            this.$refs.dialog.close();
        },

        async goToPage(page) {
            if (page < 1 || page > this.paginator.meta.last_page) return;
            this.paginator = await fetchPatients(page);
        },
    };
});

Alpine.start();
