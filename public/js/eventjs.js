$(document).ready(function() {

    $(".btn-create-post").on("click", function(e) {
        e.preventDefault();
        $(".modal-create-post").modal("show");
        $(".summernote").summernote("reset");
    });

    $('.summernote').summernote({
        placeholder: 'Ban dang nghi gi...',
        tabsize: 2,
        height: 500
    });

    $(".form-post").on("submit",function(e){
    	e.preventDefault();
    	var url = $(this).attr("url");
    	var getForm = $(this)[0];
  		var form = new FormData(getForm);
    	save(url, form);
    	$(".modal-create-post").modal("hide");
    });


    $(".btn-load-more").on("click",function(e){
    	e.preventDefault();
    	var url = $(this).attr("url");
    	var userId = $(this).attr("user-id"); 
    	var page = $(this).attr("page"); 
    	$(this).attr("page",parseInt(page)+1);
    	getPostByUserId(url, userId, page);
    });

});
