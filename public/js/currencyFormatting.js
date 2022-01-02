var value = document.getElementById("currency").value;
var convertValue = new Intl.NumberFormat("id", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
})
document.getElementById("output").innerHTML = convertValue.format(value)