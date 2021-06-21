(function ($) {
    //Signup form validation
    $('#signup-form').validate({
        rules: {
              name: {
                required: true,
                maxlength: 150
            },
            email: {
                required: true,
                maxlength: 200
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 100
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                maxlength: 100,
                equalTo : "#register_password"
            },
        },
        messages: {
          name: {
                required: "Please enter your name",
                maxlength: "Maximum limit of characters exeeded"
            },
            email: {
                required: "Please enter valid email",
                maxlength: "Maximum limit of characters exeeded"
            },

            password: {
                required: "Please your password",
                minlength: "Minimum of 8 characters required",
                maxlength: "Maximum limit of characters exeeded"
            },
            password_confirmation: {
                required: "Confirm password is required",
                minlength: "Minimum of 8 characters required",
                maxlength: "Maximum limit of characters exeeded",
                equalTo: "Password and confirm password should match"
            }

        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#login-form').validate({
        rules: {
            email: {
                required: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Please enter valid email"
            },
            password: {
                required: "Please enter your password",
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#upload-form').validate({
        rules: {
            title: {
                required: true
            },
            description: {
                required: true,
            },
            category: {
                required: true,
            },
            play_list: {
                required: true,
            },
            tags: {
                required: true,
            },
            search_keys: {
                required: true,
            },
            media_thumbnail: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter title"
            },
            description: {
                required: "Please enter a briefe description",
            },
            category: {
                required: "Please choose category",
            },
            play_list: {
                required: "Please choose playlist",
            },
            tags: {
                required: "Please choose tags",
            },
            search_keys: {
                required: "Please enter search keys",
            },
            media_thumbnail: {
                required: "Please upload thumbnail image",
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    var $modal = $('#cropModal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".profile-image", function(e){

        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
            done(URL.createObjectURL(file));
            } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
            });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                var base64data = reader.result;
                    var url = window.location.origin+'/my_account/profile/upload';
                    $.ajax({
                    beforeSend: function(request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                    type: "POST",
                    dataType: "json",
                    url: url,
                    data: {'image': base64data},
                    success: function(data){
                        $modal.modal('hide');
                        if (data.status == 1) {
                            var file = window.location.origin+'/'+ data.data;
                            $('#profile_pic_img').attr('src', file);
                            toastr.success(data.messages.messageText);
                        } else {
                            toastr.error(data.messages.messageText);
                        }
                    }
                    });
                }
        });
    })

    $("#create_play_list_btn").click(function () {
        var $modal = $('#playlistModal');
        var url = window.location.origin+'/my_account/play_list/create';
        $.ajax({
            beforeSend: function(request) {
            request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            type: "POST",
            dataType: "json",
            url: url,
            data: {'title': $('#play_list_title_input').val()},
            success: function (data) {
                $modal.modal('hide');
                if (data.status == 1) {
                    toastr.success(data.messages.messageText);
                } else {
                    toastr.error(data.messages.messageText);
                }
            }
        });
    });
    /* Photo Viewer */
    $('[data-gallery=photoviewer]').click(function (e) {
        e.preventDefault();

        var items = [],
          options = {
            index: $(this).index(),
          };

        $('[data-gallery=photoviewer]').each(function () {
          items.push({
            src: $(this).attr('href'),
            title: $(this).attr('data-title')
          });
        });
        new PhotoViewer(items, options);
      });
    /* Photo Viewer */


})(jQuery);

$(function(){
    var current = window.location.origin + location.pathname;
    current = current.replace(/\/$/, "");
    $('#nav li a').each(function(){
        var $this = $(this);
        if ($this.attr('href') == current) {
            $this.addClass('active');
        }
    })
})

$(function(){
    var current = window.location.origin + location.pathname;
    current = current.replace(/\/$/, "");
    $('#nav_downloads li a').each(function(){
        var $this = $(this);
        if ($this.attr('href') == current) {
            $this.addClass('active');
        }
    })
})

function post_action(element) {
    var post_id = element.getAttribute('post_id');
    var input_action = element.getAttribute('input_action');
    if (input_action == 'like' || input_action == 'dislike' || input_action == 'add_playlist') {
        var post = {
            'post_id': post_id,
            'input_action': input_action
        }
        var url = window.location.origin+'/my_account/play_list/post_action';
        $.ajax({
            beforeSend: function(request) {
            request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            type: "POST",
            dataType: "json",
            url: url,
            data: post,
            success: function (data) {
                if (data.status == 1) {
                    toastr.success(data.messages.messageText);
                } else {
                    toastr.error(data.messages.messageText);
                }
            }
        });
    } else if (input_action == 'report_this') {
        var $modal = $('#reportMedia');
        $modal.modal('show');
        document.getElementById("report_media_entry_id").value = post_id;
    }

}

function editPlayList(id,title,img) {
    var $modal = $('#playlistModal');
    $modal.modal('show');
    document.getElementById("play_list_title_input").value = title;
    document.getElementById("playlist_update_id").value = id;
    $('#playlistModal').on('hidden.bs.modal', function () {
        document.getElementById("play_list_title_input").value = '';
        document.getElementById("playlist_update_id").value = '';
    });
}

function showLoader(form_id) {
    var form = $("#" + form_id);
    form.validate()
    if (form.valid()) {
        document.getElementById("app_loader").style.display = 'block';
        document.getElementById("app_loader").style.opacity = '.7';
    } else {

    }
}
