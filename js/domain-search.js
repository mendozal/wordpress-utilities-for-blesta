document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('ufb-domain-search-form');
    var input = document.getElementById('domain-input');

    form.addEventListener('submit', function (event) {
        if (!isValidDomain(input.value.trim())) {
            event.preventDefault();
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    input.addEventListener('blur', function () {
        if (!isValidDomain(input.value.trim())) {
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    function isValidDomain(domain) {
        var domainRegex = /^[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,}$/;
        return domainRegex.test(domain);
    }
});
