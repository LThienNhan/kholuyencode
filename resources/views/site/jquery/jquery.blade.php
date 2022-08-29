@extends('site.app')
@section('title', 'Jquery')
@section('content')
<section class="section-pagetop bg-dark">
<div class="container clearfix">
<h2 class="title-page">Jquery</h2>
</div>

</section>
<section class="section-content bg padding-y">
<center>
<!-- <input class="form-control" placeholder="Nhập đối số 1" value="" style="width:200px" type="number" id="value1"><br>
<input class="form-control" placeholder="Nhập đối số 2" value="" style="width:200px" type="number" id="value2">
Total: <label class="show"></label><br>
<button id='button' class="btn btn-success">Total</button> -->

<!-- lấy dự liệu từ ajax -->
Return Value: <div id="box"><h2>Click Get Value to load new content inside DIV box</h2></div>
<button id="button" class="btn btn-success">Get Value</button>
<a href="resources/views/site/jquery/jquerydb.blade.php"></a>
</center>

</section>

@push('scripts')
<script>
  //cách lấy dữ liệu thông qua router controller
$(document).ready(function(){
  $("#button").click(function(){
    $.ajax({
        type: "GET",
        contentType: "application/json",
        url: "{{route('get.ajax')}}",
        // data: JSON.stringify(search),
        dataType: 'json',
        cache: false,
        timeout: 600000,
        success: function (data) {
          console.log(data);
          $('#box').append(data.id);
          $('#box').append(data.name);
        },
        error: function (e) {

            var json = "<h4>Ajax Response</h4><pre>"
                + e.responseText + "</pre>";
            $('#feedback').html(json);

            // console.log("ERROR : ", e);
            $("#btn-search").prop("disabled", false);

        }
    });
  });
});

//tính tổng 2 giá trị 

// $(document).ready(function(){
//   $("#button").click(function(){
//     var value1 = $("#value1").val();
//     var value2 = $("#value2").val();
//     var total = parseFloat(value1) +  parseFloat(value2);
//     $('.show').html(total);
//   });
// });

//lấy giá trị từ trang khác

// $(document).ready(function(){
//     $("#button").click(function(){
//         $("#box").load("{{url('/jquerydb')}}", function(responseTxt, statusTxt, jqXHR){
//           if(statusTxt == "success"){
//                 var value = $("#value1").val();
//                 $('#box').html(value);
//             }
//             if(statusTxt == "error"){
//                 alert("Error: " + jqXHR.status + " " + jqXHR.statusText);
//             }
//         });
//     });
// }); 
</script>
@endpush

@stop
