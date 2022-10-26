const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

function string_to_slug(str) {
 
    var res = str.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');

    return res;
}

$(() => {
    // Activity Logs
    if (window.location.href === route("user.activity_logs.index")) {
        const columns = [
            { data: "id" },
            { data: "description" },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "datetime");
                },
            },
            { data: "properties.ip" },
        ];
        c_index(
            $(".activitylog_dt"),
            route("user.activity_logs.index"),
            columns
        );

        $("#activity_logs_nav").addClass("active");
    }

    // Dashboard
    if (window.location.href === route("user.dashboard.index")) {
        $("#dashboard_nav").addClass("active");
    }

    // Profile
    if (window.location.href === route("profile.index")) {
        $("#profile_nav").addClass("active");
    }

    //Favorites;
    if (window.location.href === route("user.favorites.index")) {
        const columns = [
            { data: "id" },
            {
                data: "favoritable_name",
                render(data, type, row) {
                    
                    // redirect the user based on favoritable type
                    if(row.favoritable_type==`App\\Models\\Post`){
                        return `<a href='/barter/posts/${string_to_slug(row.favoritable_name)}' style='color:black'>${data}</a>`;
                    }else{
                        return `<a href='/barterers/${row.favoritable_id}' style='color:black'>${data}</a>`;
                    }

                },
            },
            {
                data: "favoritable_type",
                render(data) {
                    return handleFavoriteType(data);
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".favorite_dt"), route("user.favorites.index"), columns);

        $("#favorites_nav").addClass("active");
    }

    //Barterings;
    if (window.location.href === route("user.barters.index")) {
        const columns = [
            { data: "id" },
            {
                data: "featured_photo",
                render(data) {
                    return handleNullImage(data);
                },
            },
            { data: "post" },
            {
                data: "status",
                render(data) {
                    return handleBarterStatus(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "full");
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".barter_dt"), route("user.barters.index"), columns);

        $("#barter_nav").addClass("active");
    }
});
//========================================================= Custom Functions ========================

document.addEventListener("DOMContentLoaded", function (event) {
    // initiate global glightbox

    setTimeout(() => {
        GLightbox({
            selector: ".glightbox",
        });
    }, 1000);
});

// Like

async function like(post_id) {
    try {
        const res = await axios.post(route("user.likes.store"), {
            post_id,
        });
        let output = `  <span class="text-primary h5 ml-1" role="button" onclick="dislike(${post_id})">
        <i class="fas fa-thumbs-up fa-lg"></i>
    </span>`;

        $("#like_count-" + post_id).html(res.data.result);
        $("#like_icon-" + post_id).html(output); // change like to  dislike button
    } catch (e) {
        log(e);
        const responses = e.response.data.errors;
        if (responses) {
            const errors = Object.values(responses);
            errors.forEach((e) => {
                toastDanger(e);
            });
        } else {
            error(e.response.data.message);
        }
    }
}

async function dislike(post_id) {
    try {
        const res = await axios.delete(route("user.likes.destroy", post_id));

        let output = `  <span class="text-primary h5 ml-1" role="button" onclick="like(${post_id})">
                        <i class="far fa-thumbs-up fa-lg"></i>
                    </span>`;

        $("#like_count-" + post_id).html(res.data.result);
        $("#like_icon-" + post_id).html(output); // change dislike to like button
    } catch (e) {
        const responses = e.response.data.errors;
        if (responses) {
            const errors = Object.values(responses);
            errors.forEach((e) => {
                toastDanger(e);
            });
        } else {
            error(e.response.data.message);
        }
    }
}

// End Like

// Comment
async function addComment(post_id, event) {
    const keyPressed = event.keyCode || event.which;
    // if (keyPressed === 13) {
    event.preventDefault();
    if (isNotEmpty($("#comment_input-" + post_id))) {
        try {
            // execute
            const res = await axios.post(route("user.comments.store"), {
                post_id,
                comment: $("#comment_input-" + post_id).val(),
            });
            $("#comment_input-" + post_id).val("");
            const comment = res.data.result;
            let output = `<div class='bg-lighter rounded' id='comment_row-${
                comment.id
            }'>
                            <div class="d-flex justify-content-start align-items-center px-2 mt-2">
                            ${handleNullAvatar(comment.avatar, "", "30")}
                                        <div class="mx-3 w-100">
                                            <div class="px-2 float-right">
                                            <div class="dropdown dropdown d-flex justify-content-end text-right">
                                                    <a class='btn btn-sm btn-icon-only text-light'
                                                    href='#' role='button' data-toggle='dropdown'
                                                    data-display="static" aria-expanded='false'>
                                                    <i class='fas fa-ellipsis-v'></i>
                                                </a>
                                                
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
                                                <button class="dropdown-item" type="button" onclick='editComment(${JSON.stringify(
                                                    comment
                                                )})'>Edit</button>
                                                <button class="dropdown-item" type="button" onclick="removeComment(${
                                                    comment.post_id
                                                }, ${
                comment.id
            })">Delete</button>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="comment_body">
                                        <h4 class='font-weight-normal mt-2'>${
                                            comment.user
                                        }
                                            <span class="text-muted ml-1"> - just now </span>
                                        </h4>
                                        <h4 class='font-weight-normal'>${
                                            comment.comment
                                        }</h4>
                                    </div>
                                </div>
                            </div>
                         </div>
                        `;
            $("#d_comments-" + post_id).prepend(output); // append newly added comment
            $("#comment_count-" + post_id).html(comment.count); // update comment count
            $("div.emojionearea-editor").data("emojioneArea").setText("");
        } catch (e) {
            log(e);
            const responses = e.response.data.errors;
            if (responses) {
                const errors = Object.values(responses);
                errors.forEach((e) => {
                    toastDanger(e);
                });
            } else {
                error(e.response.data.message);
            }
        }
    }
    //}
}

function editComment(comment) {
    $("#m_comment").modal("show");
    $(".modal-header").removeClass("bg-info").addClass("bg-primary");
    $(".btn_update_comment").attr("data-id", comment.id);
    $("#comment").val(comment.comment);
    $("#post_id").val(comment.post_id);
}

async function updateComment(form, route_name, event) {
    // convert the first form in the parameter into a form data object
    const form_data = new FormData($(form)[0]);
    form_data.append("_method", "PUT");
    const model_id = event.target.getAttribute("data-id");

    try {
        // request
        const res = await axios.post(
            `${route(route_name, model_id)}`,
            form_data
        ); // fake update request

        const comment = res.data.result;

        let output = `
                        <div class="d-flex justify-content-start align-items-center px-2 mt-3" id="comment_row-${
                            comment.id
                        }">
                        ${handleNullAvatar(comment.avatar, "", "30")}
                            <div class="mx-3 w-100">
                                <div class="px-2 float-right">
                                    <div class="dropdown dropdown d-flex justify-content-end text-right">
                                            <a class='btn btn-sm btn-icon-only text-light'
                                            href='#' role='button' data-toggle='dropdown'
                                            data-display="static" aria-expanded='false'>
                                            <i class='fas fa-ellipsis-v'></i>
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
                                        <button class="dropdown-item" type="button" onclick='editComment(${JSON.stringify(
                                            comment
                                        )})'>Edit</button>
                                        <button class="dropdown-item" type="button" onclick="removeComment(${
                                            comment.post_id
                                        }, ${comment.id})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_body">
                                <h4 class='font-weight-normal'>${comment.user}
                                    <span class="text-muted ml-1"> - just now </span>
                                </h4>
                                <h4 class='font-weight-normal'>${
                                    comment.comment
                                }</h4>
                                </div>
                            </div>
                        </div>
        
                      `;
        $("#comment_row-" + comment.id).html(output);

        $("#m_comment").modal("hide");
        $(form)[0].reset(); // clear input field
        success("Your comment updated successfully");
    } catch (e) {
        log(e);
        error(e.response.data.message);
    }
}

async function removeComment(post, comment) {
    const result = await confirm();
    if (result.isConfirmed) {
        try {
            const res = await axios.delete(
                route("user.comments.destroy", comment),
                {
                    params: {
                        post,
                    },
                }
            );
            success("Your comment has deleted successfully");
            $("#comment_row-" + comment).remove(); // remove specific comment
            $("#comment_count-" + post).html(res.data.result); // update comment count
        } catch (e) {
            log(e);
            error(e.response.data.message);
        }
    }
}

async function showComments(research_paper) {
    $(".research_paper_form-" + research_paper).toggle();
    $("#d_comments-" + research_paper).toggle();
}

// End Comment
