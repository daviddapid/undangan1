const BTN_START = document.querySelector("#btn-start-scan");
const BTN_STOP = document.querySelectorAll("#btn-stop-scan");

BTN_START.addEventListener("click", initScanner);
BTN_STOP.forEach((btn) => {
    btn.addEventListener("click", stopScan);
});


// define rectangle scanner
let qrboxFunction = function (viewfinderWidth, viewfinderHeight) {
    let minEdgePercentage = 0.7; // 70%
    let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
    let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
    return {
        width: qrboxSize,
        height: qrboxSize,
    };
};

const CONFIG = {
    fps: 10, // Optional, frame per seconds for qr code scanning
    qrbox: qrboxFunction,
    aspectRatio: 1.0,
};
let DEVICES;
let HTML5_QR_CODE;
let CAMERA_ID;

// init and check device camera suport ?
// This method will trigger user permissions
function initScanner() {
    Html5Qrcode.getCameras()
        .then((devices) => {
            // console.log(devices);
            if (devices && devices.length) {
                CAMERA_ID = devices[0].id;

                // init Html5Qrcode objcet and start the scanner
                HTML5_QR_CODE = new Html5Qrcode("reader");
                startScan();
            }
        })
        .catch((err) => {
            // handle err
            console.log(err);
        });
}

function startScan() {
    HTML5_QR_CODE.start(
        CAMERA_ID,
        CONFIG,
        handleScanSuccess

        // handleScanError <- ignore error callback
    ).catch((err) => {
        // Start failed, handle it.
        console.log(err);
    });
}

// process of scaning barcode
function handleScanSuccess(decodedText, decodedResult) {
    // do something when code is read
    HTML5_QR_CODE.pause(true);
    if (!sameHost(decodedText, window.location)) {
        Swal.fire({
            icon: "error",
            title: "QR Code tidak valid",
            text: "QR Code tidak valid",
            timerProgressBar: true,
            timer: 3000,
            backdrop: false,
        }).then(() => {
            HTML5_QR_CODE.resume();
        });
    } else {
        // do fetch data here
        fetch(decodedText)
            // waktu mulai nge fetch, maka munculin modal loading
            .then((res) => {
                Swal.fire({
                    icon: "info",
                    title: "Harap Menunggu",
                    text: "QR Anda Sedang Kami Proses, Harap Menunggu",
                    timerProgressBar: true,
                    backdrop: false,
                    didOpen: () => Swal.showLoading(),
                });
                return res.json();
            })
            .then((data) => {
                let SWAL_CONFIG;
                console.log(data);

                if (data.status == "qr-not-valid") {
                    SWAL_CONFIG = {
                        icon: "error",
                        title: data.title,
                        text: data.message,
                        timer: 5000,
                        timerProgressBar: true,
                    };
                } else if (data.status == "ok") {
                    SWAL_CONFIG = {
                        icon: "success",
                        title: "Terima Kasih Telah Datang",
                        text: data.message,
                        timer: 5000,
                        timerProgressBar: true,
                    };
                } else if (data.status == "already-scanned") {
                    SWAL_CONFIG = {
                        icon: "success",
                        title: data.title,
                        text: data.message,
                        timer: 5000,
                        timerProgressBar: true,
                    };
                    console.log(data);
                } else if (data.status == "error") {
                    SWAL_CONFIG = {
                        icon: "error",
                        title: "Error",
                        text: "Harap Laporkan Ke Admin",
                        timer: 5000,
                        timerProgressBar: true,
                    };
                    console.log(data);
                }

                // if success then show swal success and after swal dismiss then resume the scanner
                Swal.fire(SWAL_CONFIG).then((result) => {
                    console.log(result);
                    HTML5_QR_CODE.resume();
                });
            });
    }
}
// its optional you can ignore this function
function handleScanError(errorMessage) {
    console.log(errorMessage);
}

function stopScan() {
    HTML5_QR_CODE.stop()
        .then((ignore) => {
            // QR Code scanning is stopped.
            console.log("scanner has been stoped");
            console.log(ignore);
        })
        .catch((err) => {
            // Stop failed, handle it.
            console.log(err);
        });
}


// utils
function sameHost(a, b) {
    const urlA = new URL(a);
    const urlB = new URL(b);
    return urlA.host == urlB.host;
}