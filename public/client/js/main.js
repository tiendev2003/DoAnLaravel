const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});
(function() {
    var param = 'fbclid';
    if (location.search.indexOf(param + '=') !== -1) {
            var replace = '';
            try {
                    var url = new URL(location);
                    
                    console.log(url.pathname);
                    url.searchParams.delete(param);
                    console.log(url);

                    replace = url.href;
            } catch (ex) {
                    var regExp = new RegExp('[?&]' + param + '=.*$');
                    replace = location.search.replace(regExp, '');
                    console.log(replace);
                    replace = location.pathname + replace + location.hash;
                    console.log(replace);
            }
            history.replaceState(null, '', replace);
    }
})();