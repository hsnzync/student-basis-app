window.registration = function() {
    var self                    = this;
    var $schools_select         = $('.js-schools');
    var $programmes_overview    = $('.js-programmes-overview');
    var $programmes_form        = $('.js-programmes-form');

    self.init = function()
    {
        $schools_select.on('change', self.loadProgrammes);
    };

    self.loadProgrammes = function()
    {
        var school = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'api/load-programmes?school=' + school,
            data: school
        }).done(function(json) {

            if($programmes_form.hasClass('hide')) {
                $programmes_form.removeClass('hide');
            }

            $programmes_overview.empty();
            $programmes_overview.html('<option selected="selected" value="">Selecteer je opleiding</option>');

            $.each(json.programmes, function(index, element) {
                
                $programmes_overview.append(
                    '<option value="'+ element.id +'">'+ element.title +'</option>'
                );
            });
        });
    };
}