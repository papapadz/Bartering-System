//===================================================================================
// Global Fn()

/**
 * convert html table to DataTable (Client Side)
 */
function convertToDataTable(dt, opt = "") {
    if (opt) {
        $(dt).dataTable({
            lengthChange: false,
            dom: "Bfrtip",
            pagingType: "numbers",
            buttons: {
                dom: {
                    button: {
                        className: "btn btn-dark btn-sm btn-rounded mb-2",
                    },
                },
                buttons: [
                    "copyHtml5",
                    "excelHtml5",
                    "csvHtml5",
                    "pdfHtml5",
                    "print",
                ],
                position: "bottom",
            },
        });
    } else {
        $(dt).dataTable();
    }
}

/**
 * convert time
 */
function convert_time(value) {
    let converted_time = new Date(
        "1970-01-01T" + value + "Z"
    ).toLocaleTimeString(
        {},
        { timeZone: "UTC", hour12: true, hour: "numeric", minute: "numeric" }
    );

    return converted_time;
}

/**
 * convert dateString to a DateAgo
 */
function calDateAgo(dString = null) {
    var d1 = new Date(dString);
    var d2 = new Date();
    var t2 = d2.getTime();
    var t1 = d1.getTime();
    var d1Y = d1.getFullYear();
    var d2Y = d2.getFullYear();
    var d1M = d1.getMonth();
    var d2M = d2.getMonth();

    var time_obj = {};
    time_obj.year = d2.getFullYear() - d1.getFullYear();
    time_obj.month = d2M + 12 * d2Y - (d1M + 12 * d1Y);
    time_obj.week = parseInt((t2 - t1) / (24 * 3600 * 1000 * 7));
    time_obj.day = parseInt((t2 - t1) / (24 * 3600 * 1000));
    time_obj.hour = parseInt((t2 - t1) / (3600 * 1000));
    time_obj.minute = parseInt((t2 - t1) / (60 * 1000));
    time_obj.second = parseInt((t2 - t1) / 1000);

    for (const obj_key in time_obj) {
        if (time_obj[obj_key] == 0) {
            delete time_obj[obj_key];
        }
    }
    var ago_text = "just now";

    if (typeof Object.keys(time_obj)[0] != "undefined") {
        var time_key = Object.keys(time_obj)[0];
        var time_val = time_obj[Object.keys(time_obj)[0]];
        time_key += time_val > 1 ? "s" : "";
        ago_text = time_val + " " + time_key + " ago";
    }

    return ago_text;
}

/**
 * handle display of data to form.selected input element
 */
function displayDataToSelectInputField(values, column, opt = "") {
    // if there is an optional param
    if (opt) {
        // if method is create
        if (opt.method == "create") {
            let output = `<option></option>`;
            if (values.length > 0) {
                values.forEach((value) => {
                    output += getColumnValue(column, value);
                });
            } else {
                output = `<option>No Data Found</option>`;
            }
            return output;
        }
        // if method is edit
        else {
            // check if the relational model are more than one
            let output = getCurrentColumnValue(column, opt.r_model);

            if (values.length > 0) {
                values.forEach((value) => {
                    output += getColumnValue(column, value);
                });
            } else {
                output = `<option>No Data Found</option>`;
            }

            return output;
        }
    }
}

/**
 * format Date Object
 */
function formatDate(date, opt) {
    if (opt == "full") {
        const formatted_date = new Date(date);
        return formatted_date.toLocaleDateString();
    }

    if (opt == "datetime") {
        const formatted_date = new Date(date);
        return formatted_date.toLocaleString();
    }

    if (opt == "dateString") {
        const formatted_date = new Date(date);
        return formatted_date.toDateString();
    }
}

/**
 * format Time
 */
function formatTime(time, opt = "12") {
    const timeString12hr = new Date(
        "1970-01-01T" + time + "Z"
    ).toLocaleTimeString("en-US", {
        timeZone: "UTC",
        hour12: true,
        hour: "numeric",
        minute: "numeric",
    });

    if (opt == "12") {
        return timeString12hr.toLocaleString([], { hour12: true });
    }
}

/**
 * get file extension
 */
function getFileExtension(file) {
    return file.split(".").pop();
}

/**
 * get current column value | for crud_edit / c_edit()
 */
function getCurrentColumnValue(column, value) {
    let output;
    if (column == "type") {
        output += `<option value='${value.id}'> Current ( ${value.type}  )</option>`;
    }
    if (column == "name") {
        output += `<option value='${value.id}'>Current ( ${value.name} )</option>`;
    }
    if (column == "fullname") {
        output += `<option value='${value.id}'> Current ( ${value.fname} ${value.lname} ) </option>`;
    }

    return output;
}

/**
 * get column value | for crud_create / c_create()
 */
function getColumnValue(column, value) {
    let output = "";
    if (column == "type") {
        output += `<option value='${value.id}'> ${value.type} </option>`;
    }
    if (column == "name") {
        output += `<option value='${value.id}'> ${value.name} </option>`;
    }
    if (column == "fullname") {
        output += `<option value='${value.id}'> ${value.fname} ${value.lname} </option>`;
    }

    return output;
}

/**
 * handle null avatar
 */
function handleNullAvatar(img, with_path = "", width = "50") {
    if (img && with_path) {
        return `<a href='/${with_path}/${img}' class='glightbox'><img class='img-fluid rounded-circle' src='/${with_path}/${img}' width='${width}' alt='avatar'></a>`;
    } else if (img && with_path == "") {
        return `<a href="${img}" class="glightbox">
                    <img class="img-fluid rounded-circle" src="${img}" width="${width}" alt="avatar">
                </a>`;
    } else {
        return `<img class='img-fluid rounded-circle' src='/img/noimg.svg' width='${width}' alt='avatar'>`;
    }
}

/**
 * handle null image
 */
function handleNullImage(img, with_path = "", width = "50") {
    if (img && with_path) {
        return `<a href='/${with_path}/${img}' class='glightbox'><img class='img-fluid' src='/${with_path}/${img}' width='${width}' alt='image'></a>`;
    } else if (img && with_path == "") {
        return `<a href="${img}" class="glightbox">
                    <img class="img-fluid" src="${img}" width="${width}" alt="image">
                </a>`;
    } else {
        return `<img class='img-fluid' src='/img/noimg.png' width='${width}' alt='image'>`;
    }
}

/**
 * handle favorite type
 */
function handleFavoriteType(type) {
    if (type == `App\\Models\\Post`) {
        return `<span class='badge badge-primary'>Post</span>`;
    } else if (type == `App\\Models\\User`) {
        return `<span class='badge badge-primary'>Barterer</span>`;
    } else {
        return `<span class='badge badge-primary'>Invalid Type</span>`;
    }
}

/**
 * handle file type
 */
function handleFileType(file) {
    const images = ["jpg", "png", "webp", "jpeg"];
    const docs = ["docx", "pdf", "xlsx", "txt"];

    if (file == "") {
        return "";
    }

    if (images.includes(file)) {
        return "images";
    }

    if (docs.includes(file)) {
        return "documents";
    }
}

/**
 * handle file upload using file Pond
 */

function initiateFilePond(
    element,
    file_type = ["image/png", "image/jpeg", "image/jpg", "image/webp"],
    label = `Drag & Drop your files or <span class="filepond--label-action"> Browse </span>`
) {
    // Register Plugins
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // FOR TMP FILE UPLOAD

    // Get a reference to the file input element
    const images = document.querySelectorAll(element);

    images.forEach((img) => {
        // Create a FilePond instance
        pond = FilePond.create(img, {
            labelIdle: label,
            acceptedFileTypes: file_type ?? [],
            maxFileSize: "3MB",
            storeAsFile: true,
            server: {
                url: `${baseUrl}/tmp_upload`,
                headers: {
                    "X-CSRF-TOKEN": `${token}`,
                },
                revert: "/revert",
            },
        });
    });
}

/**
 * handle paymentable type
 */
function handlePaymentableType(paymentable) {
    if (paymentable === "App\\Models\\Subscription") {
        return `<span class='badge badge-warning'>Pro Subscription ⚡</span>`;
    } else if (paymentable === "App\\Models\\FlashBarter") {
        return `<span class='badge badge-warning'>Flash Barter ⚡</span>`;
    } else if (paymentable === "App\\Models\\BoostedPost") {
        return `<span class='badge badge-warning'>Boost Post ⚡</span>`;
    } else {
        return `<span class='badge badge-warning'>Ads ⚡</span>`;
    }
}

/**
 * handle payment Status
 */
function handlePaymentStatus(status) {
    if (status === 0) {
        return `<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>`;
    } else if (status === 1) {
        return `<span class='badge badge-success'>Confirmed</span>`;
    } else {
        return `<span class='badge badge-danger'>Rejected</span>`;
    }
}

/**
 * handle post status
 */
function handlePostStatus(status) {
    if (status === 0) {
        return `<span class='badge badge-info'>Waiting for Approval <i class='fas fa-spinner ml-1'></i></span>`;
    } else if (status === 1) {
        return `<span class='badge badge-success'>Approved</span>`;
    } else {
        return `<span class='badge badge-danger'>Rejected</span>`;
    }
}

/**
 * handle editor - convert to tinyMCEditor
 */
function initiateEditor(
    selector,
    placeholder = "Tell us about your item material ⚡"
) {
    tinymce.init({
        selector: selector,
        height: 400,
        placeholder: placeholder,
        plugins: [
            "advlist",
            "autolink",
            "lists",
            "link",
            "charmap",
            "preview",
            "anchor",
            "searchreplace",
            "visualblocks",
            "code",
            "fullscreen",
            "table",
            "help",
            "wordcount",
            "emoticons",
        ],
        toolbar:
            "undo redo | blocks | " +
            "bold italic | alignleft aligncenter " +
            "alignright alignjustify | bullist numlist outdent indent | " +
            "removeformat | help | emoticons",
        content_style:
            "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
    });
}

/**
 * check if the boolean is true || false
 */
function isTrue(bool) {
    return bool
        ? `<span class='badge badge-danger'>No</span>`
        : `<span class='badge badge-success'>Yes</span>`;
}

/**
 * check if the input field is not empty
 */
function isNotEmpty(input) {
    if (input.val() == "") {
        input.addClass("is-invalid");
        return false;
    } else {
        input.removeClass("is-invalid");

        return true;
    }
}

/**
 * check if the status is approved
 */
function isApproved(status) {
    if (status === 0) {
        return `<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>`;
    } else if (data === 1) {
        return `<span class='badge badge-success'>Approved <i class='fas fa-check-circle ml-1'></i></span>`;
    } else {
        return `<span class='badge badge-danger'>Canceled <i class='fas fa-times-circle ml-1'></i></span>`;
    }
}

/**
 * check if the status is activated
 */
function isActivated(bool) {
    return bool == true
        ? `<span class='badge badge-success'>Activated <i class='fas fa-check-circle ml-1'></i></span>`
        : `<span class='badge badge-danger'>Deactivated</span>`;
}

/**
 * check if the status is available
 */
function isAvailable(bool) {
    return bool == true
        ? `<span class='badge badge-success'>Activated <i class='fas fa-check-circle ml-1'></i></span>`
        : `<span class='badge badge-danger'>Deactivated</span>`;
}

/**
 * check if the barter status is pending | accepted | rejected
 */
function handleBarterStatus(status) {
    if (status === 0) {
        return `<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>`;
    } else if (status === 1) {
        return `<span class='badge badge-success'>Accepted <i class='fas fa-check-circle ml-1'></i></span>`;
    } else {
        return `<span class='badge badge-danger'>Rejected <i class='fas fa-times-circle ml-1'></i></span>`;
    }
}
/**
 * check if the status is expired
 */
function isExpired(bool) {
    return bool == true
        ? `<span class='badge badge-danger'>Expired</span>`
        : `<span class='badge badge-success'>Active <i class='fas fa-check-circle ml-1'></i></span>`;
}

/**
 * check if the email is verified
 */
function isVerified(email_verified_at) {
    return email_verified_at
        ? `<span class='badge badge-success'>Verified <i class='fas fa-check-circle ml-1'></i></span>`
        : `<span class='badge badge-danger'>Unverified</span>`;
}

/**
 * print a response
 */
function log(response) {
    return console.log(response);
}

/**
 * prompt dialog box before attemptingto saving a model
 */
async function promptStore(
    event,
    form_element,
    title = "Do you want to Submit?",
    subtitle = ""
) {
    event.preventDefault();
    const res = await confirm(title, subtitle, "Yes");
    return res.isConfirmed ? $(form_element).submit() : false;
}

/**
 * prompt dialog box before attemptingto update a model
 */
async function promptUpdate(
    event,
    form_element,
    title = "Do you want to Update?",
    subtitle = ""
) {
    event.preventDefault();
    const res = await confirm(title, subtitle, "Yes");
    return res.isConfirmed ? $(form_element).submit() : false;
}

// show image on click
$(document).on("click", "#show_img", function () {
    let image = $(this).attr("src");
    Swal.fire({
        title: "",
        imageWidth: "100%",
        imageHeight: "100%",
        padding: "3em",
        imageUrl: `${image}`,
        backdrop: `
          rgba(0,0,123,0.4)
          left top
          no-repeat
        `,
    });
});

//==========================================================================================

// GLOBAL ALERTS

/**
 * throw a success message
 */
function success(msg) {
    Swal.fire({
        icon: "success",
        title: `${msg}`,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
}
/**
 * throw an error message
 */
function error(msg) {
    Swal.fire({
        icon: "error",
        title: `${msg}`,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
}

/**
 * prompt a confirmation dialog box
 */
function confirm(
    title = "Are you sure?",
    text = `You won't be able to revert this!`,
    confirmTxt = `Yes, delete it!`
) {
    return Swal.fire({
        title,
        text,
        imageUrl: window.location.origin + "/img/prompt/question.svg",
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: "Problem Solved",
        showCancelButton: true,
        confirmButtonColor: "#4085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: confirmTxt,
    }).then((result) => result);
}

/**
 * throw a success message
 */
function toastSuccess(message) {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        showDuration: "400",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    Command: toastr["success"](`${message} Successfully`, "Success");
}

/**
 * throw an error message
 */
function toastDanger(message = "Sorry, there was a problem.") {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "400",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    Command: toastr["error"](`${message}`, "Error");
}

/**
 * throw a warning message
 */
function toastWarning(message = "Please fill up all required fields ") {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-bottom-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: "400",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    Command: toastr["warning"](`${message}`, "Warning");
}
