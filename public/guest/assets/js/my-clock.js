// targeted date
const HARI_H = '2023-08-18 03:09:55'
const countDownDate = new Date(HARI_H)


$(document).ready(function () {
    setTimeout(() => {
        const [day_elm, hour_elm, minute_elm, second_elm] = document.querySelectorAll('.time')

        setInterval(() => {
            let now = new Date().getTime()
            let distance = countDownDate - now;

            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (distance < 0) {
                return
            }

            day_elm.innerHTML = days
            hour_elm.innerHTML = hours
            minute_elm.innerHTML = minutes
            second_elm.innerHTML = seconds
        }, 1000);

    }, 1000);
});
