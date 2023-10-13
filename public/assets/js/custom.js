(function($) {
    "use strict";

    $(".select2").select2({});

    $(document).on("focus", ".select2.select2-container", function(e) {
        var initalFocusEvent = e.originalEvent; //don't re-open on close focus event
        var targetIsInput = e.target && $(e.target).is("input"); // don't open when focused from input
        var relTargetIsInput =
            e.relatedTarget && $(e.relatedTarget).is("input");
        var anyTargetIsInput = targetIsInput || relTargetIsInput;

        // only open on original attempt - close focus event should not fire open
        if (initalFocusEvent && !anyTargetIsInput) {
            $(this)
                .siblings("select")
                .select2("open");
        }
    });
})(jQuery);
