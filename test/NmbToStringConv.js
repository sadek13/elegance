


function removeDashes(str) {
    return str.replace(/-/g, ' ');
}

function numberToWords(num) {
    const a = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    const b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    const unit = ['thousand', 'million', 'billion'];

    function inWords(n) {
        if (n < 20) return a[n];
        if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? '-' + a[n % 10] : '');
        if (n < 1000) return a[Math.floor(n / 100)] + ' hundred' + (n % 100 === 0 ? '' : ' and ' + inWords(n % 100));
        for (let i = 0; i < unit.length; i++) {
            let divider = Math.pow(1000, i + 1);
            if (n < divider * 1000) {
                return inWords(Math.floor(n / divider)) + ' ' + unit[i] + (n % divider === 0 ? '' : ' ' + inWords(n % divider));
            }
        }
        return inWords(Math.floor(n / Math.pow(1000, unit.length))) + ' trillion' + (n % Math.pow(1000, unit.length) === 0 ? '' : ' ' + inWords(n % Math.pow(1000, unit.length)));
    }

    let integerPart = Math.floor(num);
    let decimalPart = num % 1;

    let words = inWords(integerPart);

    if (decimalPart > 0) {
        decimalPart = parseFloat(decimalPart.toFixed(2));
        decimalPart = parseInt(decimalPart.toString().split('.')[1]);
        if (words !== '') words += ' point ';
        words += inWords(decimalPart) + '';
    }

   words= removeDashes(words);
    return words;

}

console.log(numberToWords(123456.55)); // Outputs: one billion two hundred thirty-four million five hundred sixty-seven thousand eight hundred ninety and 55/100
