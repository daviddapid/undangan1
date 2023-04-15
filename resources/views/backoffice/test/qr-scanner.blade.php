@extends('backoffice.layouts.app')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h1>TEST QR</h1>
    <div style="width: 500px" id="reader"></div>

    <button id="btn-stop-cam">Stop Cam</button>
    <button id="btn-start-cam">Start Cam</button>
  </div>
@endsection

@section('script')
  <script>
    // ================ 
    // WITH DEVICE ID
    // ===============
    // This method will trigger user permissions
    Html5Qrcode.getCameras().then(devices => {
      /**
       * devices would be an array of objects of type:
       * { id: "id", label: "label" }
       * devices[0] => camera depan ?
       * device[1] => camera belakang ?
       */
      console.log(devices);
      if (devices && devices.length) {
        var cameraId = devices[0].id;
        // .. use this to start scanning.
        const html5QrCode = new Html5Qrcode("reader");
        const config = {
          fps: 10, // Optional, frame per seconds for qr code scanning
          qrbox: {
            width: 250,
            height: 250
          }
        }

        document.querySelector('#btn-start-cam').addEventListener('click', () => {
          html5QrCode.start(
              cameraId, config,
              // Optional, if you want bounded box UI
              (decodedText, decodedResult) => {
                // do something when code is read
                console.log('decodedText: ' + decodedText)
                console.log('decodedResult: ' + JSON.stringify(decodedResult))
              },
              (errorMessage) => {
                // parse error, ignore it.
              })
            .catch((err) => {
              // Start failed, handle it.
            });
        });

        document.querySelector('#btn-stop-cam').addEventListener('click', () => {
          html5QrCode.stop().then((ignore) => {
            // QR Code scanning is stopped.
          }).catch((err) => {
            // Stop failed, handle it.
          });
        })
      }
    }).catch(err => {
      // handle err
    });
  </script>
@endsection
