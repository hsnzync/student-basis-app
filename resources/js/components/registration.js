/**
 * Registration form interaction
 */
window.registration = function() {
    var self = this;
    var $schools_select = $(".js-schools");
    var $grade_overview = $(".js-grade-overview");
    var $grade_form = $(".js-grade-form");

    self.init = function() {
        $schools_select.on("change", self.loadProgrammes);
    };

    self.loadProgrammes = function() {
        var school = $(this).val();

        $.ajax({
            type: "POST",
            url: "api/load-programmes?school=" + school,
            data: school
        }).done(function(json) {
            if ($grade_form.hasClass("hide")) {
                $grade_form.removeClass("hide");
            }

            $grade_overview.empty();
            $grade_overview.html(
                '<option selected="selected" value="">Selecteer je opleiding</option>'
            );

            $.each(json.grades, function(index, element) {
                $grade_overview.append(
                    '<option value="' +
                        element.id +
                        '">' +
                        element.title +
                        "</option>"
                );
            });
        });
    };
};
