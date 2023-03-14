let searchForm = document.querySelector(".header_1 .search-form");

document.querySelector("#search-btn").onclick = () => {
    searchForm.classList.toggle("active");
    navbar_1.classList.remove("active");
    username.classList.remove("active");
};

let navbar_1 = document.querySelector(".header_1 .navbar_1");

document.querySelector("#menu-btn").onclick = () => {
    navbar_1.classList.toggle("active");
    searchForm.classList.remove("active");
    username.classList.remove("active");
};
let username = document.querySelector(".user-name");

document.querySelector("#user-btn").onclick = () => {
    username.classList.toggle("active");
    searchForm.classList.remove("active");
    navbar_1.classList.remove("active");
};

window.onscroll = () => {
    searchForm.classList.remove("active");
    navbar_1.classList.remove("active");
};

if (window.location.hash && window.location.hash == "#_=_") {
    window.location.hash = "";
}


(function () {
    let queryString = window.location.search;
    let params = new URLSearchParams(queryString);
    console.log(params.get('fbclid')); 
    
})();

(function () {
    var param = "fbclid";
    if (location.search.indexOf(param + "=") !== -1) {
        var replace = "";
        try {
            var url = new URL(location);   
            url.searchParams.delete(param);
            replace = url.href;
        } catch (ex) {
            var regExp = new RegExp("[?&]" + param + "=.*$");
            replace = location.search.replace(regExp, "");
            replace = location.pathname + replace + location.hash;
        }
        history.replaceState(null, "", replace);
    }
})();

// --
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertBefore('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});
// ---
$(document).ready(function() {
  $(".item .contentBox .price").each(function() {
      var value = accounting.formatMoney($(this).text()) + ' VND';
      $(this).html(value);
  });

});
