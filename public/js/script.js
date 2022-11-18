let dateInput = document.querySelector("#date-input");
let dateOut = document.querySelector("#date-out");
let dateIn = document.querySelector("#date-in");

let OutButton = document.querySelector("#out-button");
let InButton = document.querySelector("#in-button");

OutButton.addEventListener("click", function () {
    dateOut.value = dateInput.value;

    if (dateOut.value === "Pilih Tanggal :") {
        dateOut.value = null;
    }
});

InButton.addEventListener("click", function () {
    dateIn.value = dateInput.value;

    if (dateIn.value === "Pilih Tanggal :") {
        dateIn.value = null;
    }
});
