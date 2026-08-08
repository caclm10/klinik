import Alpine from "alpinejs";
import {
    BarController,
    BarElement,
    CategoryScale,
    Chart,
    Legend,
    LinearScale,
    Tooltip,
} from "chart.js";

Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend,
);

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

function initVisitsChart() {
    const canvas = document.getElementById("visitsChart");

    if (!canvas) {
        return;
    }

    const labels = JSON.parse(canvas.dataset.labels);
    const maleData = JSON.parse(canvas.dataset.male);
    const femaleData = JSON.parse(canvas.dataset.female);

    const rootStyles = getComputedStyle(document.documentElement);
    const femaleColor =
        rootStyles.getPropertyValue("--color-muted-foreground").trim() ||
        "#737373";
    const maleColor =
        rootStyles.getPropertyValue("--color-primary").trim() || "#1591dc";

    new Chart(canvas, {
        type: "bar",
        data: {
            labels,
            datasets: [
                {
                    label: "Perempuan",
                    data: femaleData,
                    backgroundColor: femaleColor,
                    borderRadius: 6,
                },
                {
                    label: "Laki-laki",
                    data: maleData,
                    backgroundColor: maleColor,
                    borderRadius: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "bottom",
                },
            },
            scales: {
                x: {
                    border: {
                        display: false,
                    },
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: true,
                    },
                },
                y: {
                    border: {
                        display: false,
                    },
                    beginAtZero: true,
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: true,
                        drawBorder: false,
                    },
                },
            },
        },
    });
}

initVisitsChart();

Alpine.data("entityPicker", (path) => {
    console.log("Entity Picker Path:", path);

    async function fetchData(page = 1, search = "") {
        const url = `/${path}?search=${encodeURIComponent(search)}&page=${page}`;

        const response = await fetch(url, {
            headers: { "X-Requested-With": "XMLHttpRequest" },
        });
        const data = await response.json();

        return data;
    }

    return {
        open: false,
        paginator: {
            data: [],
            links: [],
            meta: {},
        },
        items: [],
        selectedItemId: "",
        selectedItemName: "",
        data: null,

        get paginationInfo() {
            return `${this.paginator.meta.from} - ${this.paginator.meta.to} dari ${this.paginator.meta.total} Data`;
        },

        async open() {
            this.$dispatch("open:entity-picker");

            this.$refs.dialog.showModal();

            this.paginator = await fetchData();
        },

        close() {
            this.$refs.dialog.close();

            this.$dispatch("close:entity-picker");
        },

        async search(value) {
            console.log("Searching for:", value);
            this.paginator = await fetchData(1, value);
        },

        async goToPage(page) {
            if (page < 1 || page > this.paginator.meta.last_page) return;
            this.paginator = await fetchData(page);
        },

        selectItem(item) {
            this.selectedItemId = item.id;
            this.selectedItemName = item.name;
            this.close();
        },
    };
});

Alpine.start();
