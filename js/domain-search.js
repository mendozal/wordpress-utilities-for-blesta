document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('ufb-domain-search-form');
    var input = document.getElementById('domain-input');
    var errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (event) {
        if (!isValidDomain(input.value.trim())) {
            event.preventDefault();
            errorMessage.textContent = 'Please enter a valid domain name (.com, .net, .com.py, etc.)';
            errorMessage.style.display = 'block';
        }
    });

    function isValidDomain(domain) {
        // Regular expression to match domain names, TLDs, and CCTLDs
        var domainRegex = /^[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,}$/;
        return domainRegex.test(domain);
    }
});
