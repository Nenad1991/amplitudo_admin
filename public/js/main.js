var dropFileForm = document.getElementById("dropFileForm");
var fileLabelText = document.getElementById("fileLabelText");

var uploadStatus = document.getElementById("uploadStatus");
var fileInput = document.getElementById("fileInput");

var droppedFiles;

function overrideDefault(event) {
  event.preventDefault();
  event.stopPropagation();
}

function fileHover() {
  dropFileForm.classList.add("fileHover");
}

function fileHoverEnd() {
  dropFileForm.classList.remove("fileHover");
}

function addFiles(event) {
  droppedFiles = event.target.files || event.dataTransfer.files;
  showFiles(droppedFiles);
}

function showFiles(files) {
  if (files.length > 1) {
    fileLabelText.innerText = files.length + " files selected";
    
  } else {
    fileLabelText.innerText = files[0].name;
     
  }
}

function uploadFiles(event) {
  event.preventDefault();
  changeStatus("Uploading...");

  var formData = new FormData();

  for (var i = 0, file; (file = droppedFiles[i]); i++) {
    formData.append(fileInput.name, file, file.name);
   
  }

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(data) {
    //handle server response and change status of
    //upload process via changeStatus(text)
    console.log(xhr.response);
  };
  xhr.open(dropFileForm.method, dropFileForm.action, true);
  xhr.send(formData);
}

function changeStatus(text) {
  uploadStatus.innerText = text;
    
}

function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#fileInput").change(function(){
        readURL(this);
    });


function readURL1(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image1').attr('src', e.target.result);
                
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

$("#fileInput1").change(function(){
    readURL1(this);
});





var dropFileForm1 = document.getElementById("dropFileForm1");
var fileLabelText1 = document.getElementById("fileLabelText1");

var uploadStatus1 = document.getElementById("uploadStatus1");
var fileInput1 = document.getElementById("fileInput1");

var droppedFiles1;

function overrideDefault1(event) {
  event.preventDefault();
  event.stopPropagation();
}

function fileHover1() {
  dropFileForm1.classList.add("fileHover1");
}

function fileHoverEnd1() {
  dropFileForm1.classList.remove("fileHover1");
}

function addFiles1(event) {
  droppedFiles1 = event.target.files || event.dataTransfer.files;
  showFiles1(droppedFiles1);
}

function showFiles1(files) {
  if (files.length > 1) {
    fileLabelText1.innerText = files.length + " files selected";
    
  } else {
    fileLabelText1.innerText = files[0].name;
     
  }
}

function uploadFiles1(event) {
  event.preventDefault();
  changeStatus("Uploading...");

  var formData = new FormData();

  for (var i = 0, file; (file = droppedFiles1[i]); i++) {
    formData.append(fileInput.name, file, file.name);
   
  }

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(data) {
    //handle server response and change status of
    //upload process via changeStatus(text)
    console.log(xhr.response);
  };
  xhr.open(dropFileForm1.method, dropFileForm1.action, true);
  
}

function changeStatus(text) {
  uploadStatus1.innerText = text;
   
    
}



$(document).ready(function(){
    $(".delete_post_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "posts/delete/"+ id + " ";
        $(".modal_delete_link").attr("action", delete_url);
        $("#deleteModal").modal('show');
    });
    
    $(".delete_career_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "careers/delete/"+ id + " ";
        $(".modal_delete_link").attr("action", delete_url);
        $("#deleteModal").modal('show');
    });
    
    $(".delete_product_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "products/delete/"+ id + " ";
        $(".modal_delete_link").attr("action", delete_url);
        $("#deleteModal").modal('show');
    });
    
    $(".delete_user_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "users/delete/"+ id + " ";
        $(".modal_delete_link").attr("action", delete_url);
        $("#deleteModal").modal('show');
    });
    
});





   