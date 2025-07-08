Query(function($){
    $('#sort').on('change', function(){
        let sort = $(this).val();
        $.ajax({
            url: appAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'ajax_sort_posts',
                sort: sort,
                paged: 1
            },
            success: function(response){
                $('#posts-container').html(response);
            }
        });
    });

    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        let paged = $(this).attr('href').split('paged=')[1];
        let sort = $('#sort').val();
        $.ajax({
            url: appAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'ajax_sort_posts',
                sort: sort,
                paged: paged
            },
            success: function(response){
                $('#posts-container').html(response);
                $('html, body').animate({ scrollTop: $('#posts-container').offset().top }, 300);
            }
        });
    });
});