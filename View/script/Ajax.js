
let count=10;
// Ajax function to load data.
function loadMore(){
  $.ajax({
    url: "Controller/ajax-load.php",
    type: "POST",
    data: {
      count: count
    },
    success: function (data) {
      if(data){
        $(".content").append(data);
        count+=5;
      }
    },
    error: function(){
      $('.load-more').html('finished');
      $('.load-more').prop('disabled', true);
    }
  });
}

// Function call.
$('.load-more').on('click',loadMore);

// Ajax function to make post.
function addPost(e){
  e.preventDefault();
  let text = $('#text').val();
  let fd = new FormData();
  let files = $('#image')[0].files[0];
  fd.append('file', files);
  fd.append('text', text);
  $.ajax({
    url: "Controller/ajax-post.php",
    type: "POST",
    data: fd,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#image, #text").val("");
    }
  });
}
// Function call.
$(document).on("click", '#submit', addPost);

// Ajax function to load data of initial post when logged in.
function preloadData(){
  $.ajax({
    url: "Controller/ajax-preload.php",
    type: "POST",
    success: function (data) {
      $(".content1").html(data);
    }
  });
}

// Function call.
$(window).on('load', preloadData);

// Ajax function to search data.
function searchData(){
  let search_term = $(this).val();
  $.ajax({
    url: 'Controller/ajax-search.php',
    type: 'POST',
    data: {
      search: search_term
    },
    success: function (data) {
      $('.total').html(data);
    }
  })
}

// Function Call.
$('#search-name').on("keyup", searchData);

// Ajax function to load data.
function loadData(e) {
  e.preventDefault();
  $('.update-form').css({ "display": "block" });
};

// Function call.
$('.update').on('click', loadData);

// Ajax function to update profile information.
function updataData(e){
  e.preventDefault();
  let first_name = $('#firstname').val();
  let last_name = $('#lastname').val();
  $.ajax({
    url: 'Controller/ajax-update.php',
    type: 'POST',
    data: {
      first_name: first_name,
      last_name: last_name
    },
    success: function (data) {
      $('.in-b').html(data);
    }
  })
}

// Function call.
$('#submit-update').on('click', updataData);

// Function to clear form fields.
function clearForm(){
  $('#firstname').val("");
  $('#lastname').val("");
  $('.update-form').css({ "display": "none" });
}

// Function call.
$('#submit-update').on('click',clearForm)
