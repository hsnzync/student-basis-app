/**
 * Loading cards
 */
window.cards = function()
{
    var self        = this;
    var $load_btn   = $('.js-load-subjects');
    var $overview   = $('.js-subjects-overview');

    self.init = function()
    {
        limit = 6;
        self.loadSubjects();
        $load_btn.on('click', self.loadMoreSubjects);
    };

    self.loadSubjects = function()
    {
        var offset = $('[data-section=subjects-results]').length;

        $.ajax({
            type: 'POST',
            url: 'api/load-subjects?limit='+ limit +'&offset=' + offset,
        }).done(function(json) {
            $overview.append(json.html);
            console.log(json.load_more_btn);

            if(json.load_more_btn) {
                $load_btn.removeClass('hide');
            } else {
                $load_btn.addClass('hide');
            }

        });
    };

    self.loadMoreSubjects = function(e)
    {
        e.preventDefault();
        self.loadSubjects();
    };
}