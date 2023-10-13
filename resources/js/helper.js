const helpers = {
    cutText(text, length) {
        if (text.split(" ").length > 1) {
            let string = text.substring(0, length);
            let splitText = string.split(" ");
            splitText.pop();
            return splitText.join(" ") + "...";
        } else {
            return text;
        }
    },
    formatDate(date, format) {
        return date;
    },
    capitalizeFirstLetter(string) {
        if (string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    },
    onlyNumber(number) {
        if (number) {
            return number.replace(/\D/g, "");
        } else {
            return "";
        }
    },
    formatCurrency(number) {
        if (number) {
            let formattedNumber = number.toString().replace(/\D/g, "");
            let rest = formattedNumber.length % 3;
            let currency = formattedNumber.substr(0, rest);
            let thousand = formattedNumber.substr(rest).match(/\d{3}/g);
            let separator;

            if (thousand) {
                separator = rest ? "." : "";
                currency += separator + thousand.join(".");
            }

            return currency;
        } else {
            return "";
        }
    },
    isset(obj) {
        return Object.keys(obj).length;
    },
    assign(obj) {
        return JSON.parse(JSON.stringify(obj));
    },
    delay(time) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve();
            }, time);
        });
    },
    randomNumbers(from, to, length) {
        let numbers = [0];
        for (let i = 1; i < length; i++) {
            numbers.push(Math.ceil(Math.random() * (from - to) + to));
        }

        return numbers;
    },
    replaceAll(str, find, replace) {
        return str.replace(new RegExp(find, "g"), replace);
    },
};

export default helpers;
