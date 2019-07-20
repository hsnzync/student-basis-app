/**
 * Loading cards
 */
window.cards = function()
{
    var self        = this;
    var $load_btn   = $('.js-load-subjects');
    var $overview   = $('.js-subjects-overview');

    self.init = function(id)
    {
        limit = 6;
        user_id = id;
        
        self.loadSubjects();
        $load_btn.on('click', self.loadMoreSubjects);
    };

    self.loadSubjects = function()
    {
        var offset = $('[data-section=subjects-results]').length;
        
        $.ajax({
            type: 'POST',
            url: 'api/load-subjects?limit='+ limit +'&offset=' + offset + '&id=' + user_id,
        }).done(function(json) {
            $overview.append(json.html);

            if(json.load_more_btn) {
                $load_btn.removeClass('hide');
            } else {
                $load_btn.addClass('hide');
            }

            if(json.loading_count <= 6) {
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