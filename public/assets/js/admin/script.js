const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    // Dashboard
    if (window.location.href === route("admin.dashboard.index")) {
        $("#dashboard_nav").addClass("active");
    }

    // Profile
    if (window.location.href === route("profile.index")) {
        $("#profile_nav").addClass("active");
    }

    // Activity Logs
    if (window.location.href === route("admin.activity_logs.index")) {
        const columns = [
            {
                data: "id",
            },
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
            route("admin.activity_logs.index"),
            columns
        );

        $("#activity_logs_nav").addClass("active");
    }

    //Category;
    if (window.location.href === route("admin.categories.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "name" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".category_dt"), route("admin.categories.index"), columns);

        $("#post_management_nav").addClass("active");
        $("#category").addClass("text-primary");
    }

    //Post;
    if (window.location.href === route("admin.posts.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "featured_photo",
                render(data) {
                    return handleNullImage(data);
                },
            },
            { data: "owner" },
            { data: "title" },
            { data: "category" },
            {
                data: "status",
                render(data) {
                    return handlePostStatus(data);
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
        c_index($(".post_dt"), route("admin.posts.index"), columns);

        $("#post_management_nav").addClass("active");
        $("#post").addClass("text-primary");
    }

    // Manage Payment Methods
    if (window.location.href === route("admin.payment_methods.index")) {
        const columns = [
            { data: "type" },
            { data: "account_name" },
            { data: "account_no" },
            {
                data: "is_activated",
                render(data) {
                    return isActivated(data);
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".payment_method_dt"),
            route("admin.payment_methods.index"),
            columns
        );

        $("#payment_management_nav").addClass("active");
        $("#payment_method").addClass("text-primary");
    }

    //Payment;
    if (window.location.href === route("admin.payments.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "transaction_no" },
            {
                data: "user",
            },
            {
                data: "paymentable_name",
            },
            {
                data: "paymentable_type",
                render(data) {
                    return handlePaymentableType(data);
                },
            },
            {
                data: "status",
                render(data) {
                    return handlePaymentStatus(data);
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
        c_index($(".payment_dt"), route("admin.payments.index"), columns);

        $("#payment_management_nav").addClass("active");
        $("#payment_transaction").addClass("text-primary");
    }

    // Subscription
    if (window.location.href === route("admin.subscriptions.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "transaction_no" },
            {
                data: "user",
            },
            {
                data: "due",
                render(data) {
                    return formatDate(data, "full");
                },
            },
            {
                data: "is_expired",
                render(data) {
                    return isExpired(data);
                },
            },
            {
                data: "status",
                render(data) {
                    return handlePaymentStatus(data);
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
        c_index(
            $(".subscription_dt"),
            route("admin.subscriptions.index"),
            columns
        );

        $("#add_ons_nav").addClass("active");
        $("#subscription").addClass("text-warning");
    }

    // Boosted Post
    if (window.location.href === route("admin.boosted_posts.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "transaction_no" },
            {
                data: "user",
            },
            {
                data: "post",
            },
            {
                data: "due",
                render(data) {
                    return formatDate(data, "full");
                },
            },
            {
                data: "is_expired",
                render(data) {
                    return isExpired(data);
                },
            },
            {
                data: "status",
                render(data) {
                    return handlePaymentStatus(data);
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
        c_index(
            $(".boosted_post_dt"),
            route("admin.boosted_posts.index"),
            columns
        );

        $("#add_ons_nav").addClass("active");
        $("#boosted_post").addClass("text-warning");
    }

    // Flash Barter
    if (window.location.href === route("admin.flash_barters.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "transaction_no" },
            {
                data: "user",
            },
            {
                data: "post",
            },
            {
                data: "due",
                render(data) {
                    return formatDate(data, "full");
                },
            },
            {
                data: "is_expired",
                render(data) {
                    log(data);
                    return isExpired(data);
                },
            },
            {
                data: "status",
                render(data) {
                    return handlePaymentStatus(data);
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
        c_index(
            $(".flash_barter_dt"),
            route("admin.flash_barters.index"),
            columns
        );

        $("#add_ons_nav").addClass("active");
        $("#flash_barter").addClass("text-warning");
    }

    //Ads
    if (window.location.href === route("admin.ads.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "transaction_no" },
            {
                data: "user",
            },
            {
                data: "ad",
            },
            {
                data: "due",
                render(data) {
                    return formatDate(data, "full");
                },
            },
            {
                data: "is_expired",
                render(data) {
                    return isExpired(data);
                },
            },
            {
                data: "status",
                render(data) {
                    return handlePaymentStatus(data);
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
        c_index($(".ad_dt"), route("admin.ads.index"), columns);

        $("#add_ons_nav").addClass("active");
        $("#ad").addClass("text-warning");
    }

    //Barterer;
    if (window.location.href === route("admin.barterers.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "avatar",
                render(data) {
                    return handleNullAvatar(data);
                },
            },
            { data: "name" },
            {
                data: "subscription",
                render(data) {
                    if (data == "Pro") {
                        return `<span class='badge badge-warning'>${data} Account ⚡</span>`;
                    }
                    return `<span class='badge badge-primary'>${data} Account </span>`;
                },
            },
            {
                data: "email_verified_at",
                render(data) {
                    return isVerified(data);
                },
            },
            {
                data: "is_activated",
                render(data) {
                    return isActivated(data);
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
        c_index($(".barterer_dt"), route("admin.barterers.index"), columns);

        $("#auth_management_nav").addClass("active");
        $("#barterer").addClass("text-primary");
    }
    //Admin;
    if (window.location.href === route("admin.admins.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "avatar",
                render(data) {
                    return handleNullAvatar(data);
                },
            },
            { data: "name" },

            {
                data: "is_activated",
                render(data) {
                    return isActivated(data);
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
        c_index($(".admin_dt"), route("admin.admins.index"), columns);

        $("#auth_management_nav").addClass("active");
        $("#admin").addClass("text-primary");
    }
});

//=========================================================
// Custom Functions()

document.addEventListener("DOMContentLoaded", function (event) {
    // initiate global glightbox

    setTimeout(() => {
        GLightbox({
            selector: ".glightbox",
        });
    }, 1000);
});

function getPostByStatus(status) {
    if (status.value) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "featured_photo",
                render(data) {
                    return handleNullImage(data);
                },
            },
            { data: "owner" },
            { data: "title" },
            { data: "category" },
            {
                data: "status",
                render(data) {
                    return handlePostStatus(data);
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

        c_index(
            $(".post_dt"),
            route("admin.posts.index", {
                status: status.value,
            }),
            columns,
            null,
            true
        );
    }
}

// Tool Tip
$('[data-toggle="tooltip"]').tooltip({
    html: true,
});
