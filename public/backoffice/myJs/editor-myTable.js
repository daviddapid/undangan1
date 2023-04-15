// INI HANYA BERLAKU JIKA NOMOR KURSI ITU BERDIRI BARENG TABLE GUEST,
// JIKA NOMOR KURSI BERDIRI SENDIRI DAN KONEK KE GUEST MELALUI RELASI MAKA TIDAK BISA

// define class that wrap the edit-ables column/field
const CLASS_NAME_COLUMN = ".david-edit-ables";
// define class that contain the value of edit-ables column/field
const CLASS_NAME_VALUE = ".david-inline-value";

// get all element that contained CLASS_NAME_COLUM
const EDIT_ABLE_ELEMENTS = document.querySelectorAll(CLASS_NAME_COLUMN);
// console.log(EDIT_ABLE_ELEMENTS);

let clicked = 0;
EDIT_ABLE_ELEMENTS.forEach((element) => {
    let input_value;

    element.addEventListener("dblclick", (e) => {
        clicked++;
        // ubah ini jadi function supaya bisa pass params input_value
        let ELEMENT_BACK_BEFORE = `
        <div class="d-flex align-items-center justify-content-between">
            <span class="david-inline-value">${input_value}</span>
            <i class='bx bx-edit-alt david-inline-editx'></i>
        </div>`;

        // set the current or old value
        let old_value = element.querySelector(CLASS_NAME_VALUE).innerHTML;
        if (clicked <= 1) {
            // define input type text, for edit the column with
            const INPUT_TEXT = `<input type="text" class="form-control " value="${old_value}">`;

            // ubah td:text menjadi -> INPUT_TEXT
            $(element).html(INPUT_TEXT);

            // get the current element input for edit
            let input_element = element.querySelector("input");
            // set input_value(for td:text) with value from current input
            input_value = input_element.value;

            console.log(input_value);
            console.log(element.dataset.guest_id);
            input_element.addEventListener("keypress", async (e) => {
                if (e.key === "Enter") {
                    // define the data that should pass to request body
                    let data = {
                        guest_id: element.dataset.guest_id,
                        nomor_kursi: input_element.value,
                    };

                    let response = await fetch("/api/tamu/nomor-kursi", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data),
                    });

                    let respon_json = await response.json();
                    if (respon_json.status == "success") {
                        input_value = respon_json.nomor_kursi;
                        $(element).html(ELEMENT_BACK_BEFORE);
                    }
                    console.log(response);
                    console.log(respon_json);
                    console.log(respon_json.nomor_kursi);
                }
            });
        } else {
            console.log(ELEMENT_BACK_BEFORE);
        }
    });
});

// function tableEditorEdit() {
//     let element = event.target;
//     let siblingElement = element.previousElementSibling;
//     console.log(siblingElement);
//     const inputElementText = `<input type="text" class="form-control" value="${siblingElement.textNode}">`;

//     $(element.parentElement).html(inputElementText);
//     console.log();
// }
