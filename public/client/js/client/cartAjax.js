calculateOrder();
function changeQuanity(id, value, price, iduser) {
    jQuery.ajax({
        type: "GET",
        url:
            "/shoplaptop/changeQuantity/" +
            id +
            "/" +
            value +
            "/" +
            iduser,
        success: function (result) {
            calculatePrice(id, value, price);
            calculateOrder();
            console.log("sucess");

            var element = document.getElementById("item" + id + "_total");
           
                var tet=new Intl.NumberFormat('VND').format(element.textContent);
                element.innerHTML=tet;
             
        },
        error: function (e) {
            alert("Error: ", e);
            console.log("Error", e);
        },
    });
}

function deleteFromCart(id, iduser) {
    jQuery.ajax({
        type: "GET",
        url: "/shoplaptop/detroy/" + id + "/" + iduser,
        success: function (result) {
            var element = document.getElementById("item" + id);
            element.parentNode.removeChild(element);
            calculateOrder();
        },

        error: function (e) {
            alert("Error: ", e);
            console.log("Error", e);
        },
    });
}

function calculatePrice(id, value, price) {
    var element = document.getElementById("item" + id + "_total");
    element.innerHTML = value * price;
}

function calculateOrder() {
    var element = document.getElementsByClassName("total");

    var res = 0;
    for (i = 0; i < element.length; i++) {
        var tien = element.item(i).innerHTML;

        res = res + parseFloat(tien.replaceAll(".", ""));
    }
    console.log(res + " tien");

    var element2 = document.getElementById("ordertotal");
    resConvert = accounting.formatMoney(res);
    element2.innerHTML = resConvert;
    for (i = 0; i < element.length; i++) {
       var tet=accounting.formatMoney(element.item(i).innerHTML);
    //    element.item(i).innerHTML=tet;
    }
}
