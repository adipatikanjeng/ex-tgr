// Additional scripts by WEBARQ\Admin

function hideIndexActionButtons() {
    $("button.index-action").hide();
}

function initIndex() {
    console.log("Index scripts initialized.");
    $("button#index-delete").click(function() {
        $("input[name='action'").val("delete");
    });

    $("#index-checker-master").on("change", function() {
        $(".index-checker").prop("checked", $(this).is(":checked"));

        if ($(this).is(':checked')) {
            showIndexActionButtons();
        } else {
            hideIndexActionButtons();
        }
    });

    $("input.index-checker").on("change", function() {
        if ($(this).is(':checked')) {
            showIndexActionButtons();
        } else {
            uncheckIndexCheckerMaster();
            var toHide = true;
            $("input.index-checker").each(function() {
                if (this.checked) {
                    toHide = false;
                }
            });

            if (toHide) {
                hideIndexActionButtons();
            }
        }
    });
};

function showIndexActionButtons() {
    $("button.index-action").show("slow");
}

function uncheckIndexCheckerMaster() {
    $("input#index-checker-master").attr("checked", false);
}

function validatePassword() {
    var msg = ($("input[name='password_confirmation']").val() != $("input[name='password']").val())
    ? "Passwords don't match"
    : "";

    $("input[name='password_confirmation']").get(0).setCustomValidity(msg);
}

$(document).ready(function() {
    $("input[name='password']").change(function() {
        validatePassword();
    });

    $("input[name='password_confirmation']").keyup(function(e) {
        validatePassword();
    });

    $('.datepicker').pickadate({
       format: 'd mmmm yyyy',
       formatSubmit: 'yyyy-m-d',
   });
    $('.timepicker').pickatime();

    $('.summernote').summernote({
        height: 200,
    });
});
