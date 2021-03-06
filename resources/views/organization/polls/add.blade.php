@extends('organization.layouts.master')

@section('main-content')
    <div class="main-content">
        <div class="content-wrapper">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-basic">Thêm cuộc thăm dò ý kiến mới </h4>
                            </div>
                            <div class="card-body">
                                <div class="px-3">

                                    <form class="form form-horizontal" action="{{url('/organization/poll/addRequest')}} "
                                          method="POST" role="form" enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        <div class="form-body">

                                            {{--                                            Tabs header--}}
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link " id="basic_info_tab" data-toggle="tab"
                                                       href="#basic_info" aria-controls="basic_info"
                                                       aria-expanded="true">Thông tin cơ bản</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="itinerary_tab" data-toggle="tab"
                                                       href="#itinerary" aria-controls="itinerary"
                                                       aria-expanded="false">Câu hỏi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="proof_request_tab" data-toggle="tab"
                                                       href="#proof_request" aria-controls="proof_request"
                                                       aria-expanded="true">Thông tin người dùng</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content px-1 pt-1">
                                                <div role="tabpanel" class="tab-pane" id="basic_info"
                                                     aria-labelledby="basic_info_tab" aria-expanded="true">
                                                    <h4 class="form-section"><i class="ft-user"></i> Thông tin chính
                                                    </h4>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Tiêu đề </label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   name="poll_name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Danh mục: </label>
                                                        <div class="col-md-9">
                                                            <select id="category_id" name="category_id"
                                                                    class="form-control">
                                                                <option value="0" selected="" disabled="">Chọn danh mục
                                                                </option>
{{--                                                                <option--}}
{{--                                                                    value="1">Hành chính công--}}
{{--                                                                </option>--}}
{{--                                                                <option--}}
{{--                                                                    value="2">An sinh - xã hội--}}
{{--                                                                </option>--}}
                                                                <?php foreach ($categories as $cartegory): ?>
                                                                <option
                                                                    value="{{$cartegory->id}}">{{$cartegory->name}}</option>
                                                                <?php endforeach; ?>
                                                            </select>

                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Thời gian: </label>
                                                        <div class="col-md-9">
                                                            <p id="basicExample">
                                                                <input name="start_at" type="text" class="date start"
                                                                       id="start_at"/>
                                                                <input type="text" class="time start"
                                                                       name="start_time"/> đến
                                                                <input type="text" class="time end" name="end_time"/>
                                                                <input name="end_at" type="text" class="date end"/>
                                                            </p>
                                                        </div>

                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Tổng quan: </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control"
                                                                      name="overview"></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Ảnh đại diện: </label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <a id="tour_thumb" data-input="tour_thumb_data"
                                                                   data-preview="tour_thumb_preview"
                                                                   class="btn btn-primary">
                                                                    <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                                <input id="tour_thumb_data" class="form-control"
                                                                       type="text"
                                                                       name="thumb">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane  active show" id="itinerary" role="tabpanel"
                                                     aria-labelledby="itinerary_tab" aria-expanded="false">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title center">Nội dung thăm dò</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-block" id="dynamic_field">
                                                                <div class="form-group">
                                                                <h4 class="form-section">Câu 1</h4>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control">Câu hỏi</label>
                                                                    <div class="col-md-9">

                                                                    <textarea id="question_content_1" rows="2"
                                                                              class="form-control poll-info"
                                                                              name="question_content[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control">Câu trả
                                                                        lời: </label>
                                                                    <div class="col-md-6">
                                                                        <ul class="list-group" id="question_1">
                                                                            <li id="question_1_option_1" class="list-group-item">
                                                                                <input type="text" class="form-control" name="option[]">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-3 pull-right">
                                                                        <div class="form-group row">
                                                                            <button type="button" name="add_option"
                                                                                    id="add_option"
                                                                                    onclick="add_option_func(1)"
                                                                                    class="btn btn-success pull-right">
                                                                                Thêm câu trả lời
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="option_len[]" id="option_len_1" value=1>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="form-group-row">
                                                            <div class="col-md-9 pull-right">
                                                                <button type="button" name="add_question"
                                                                        id="add_question"
                                                                        class="btn btn-success">Thêm câu hỏi
                                                                </button>
                                                                <button type="button" name="remove_question"
                                                                        id="remove_question"
                                                                        class="btn btn-warning">Xóa câu hỏi
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="question_number" name="question_number"
                                                           value=1>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="proof_request"
                                                     aria-labelledby="proof_request_tab" aria-expanded="true">
                                                    <h4 class="form-section"><i class="ft-info"></i> Thông tin yêu cầu người dùng cung cấp
                                                    </h4>


                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Tóm tắt: </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control"
                                                                      name="proof_request_desc" ></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Thông tin làm rõ: </label>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control"
                                                                      name="proof_request_content_re" id="proof_request_content_re" rows="10"></textarea>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <pre id="json-renderer_re"></pre>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Thông tin ẩn: </label>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control"
                                                                      name="proof_request_content_pre" id="proof_request_content_pre" rows="10"></textarea>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <pre id="json-renderer_pre"></pre>
                                                        </div>
                                                    </div>





                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="reset" class="btn btn-raised btn-warning mr-1">
                                                <i class="ft-x"></i> Reset
                                            </button>
                                            <button type="submit" class="btn btn-raised btn-primary">
                                                <i class="fa fa-check-square"></i> Save
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- // Basic form layout section end -->

    </div>
    </div>

@endsection
@section('js-content')
    <script>
        var msg = '{{Session::get('
    alert ')}}';
        var exist = '{{Session::has('
    alert ')}}';
        if (exist) {
            alert(msg);
        }
    </script>

    <link rel="stylesheet" type="text/css" href="/client-assets/global/vendor/timepicker/jquery-timepicker.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script type='text/javascript' src='/admin-assets/vendors/js/core/jquery-3.2.1.min.js'></script>
    <script type='text/javascript'
            src='https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js'></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script src="/client-assets/global/vendor/timepicker/jquery.timepicker.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.bootcss.com/datepair.js/0.4.16/datepair.js"></script>

    {{--    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>--}}
    <script>

        let i = 1;
        let questions = 1;

        function add_option_func(question_id) {
            $('#question_' + question_id).append(`
                                                    <li id="question_${question_id}_option_2" class="list-group-item">
                                                        <input type="text" class="form-control" name="option[]">
                                                    </li>`)
            var  tmp = $('#option_len_' + question_id).val()
            tmp =parseInt(tmp)
            var newVal = tmp++
            newVal = parseInt(newVal)
            $('#option_len_' + question_id).val(++newVal)
        }



        jQuery(function($) {


            const options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

            // initialize input widgets first
            $('#basicExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'g:ia'
            });

            $('#basicExample .date').datepicker({
                'format': 'd/m/yyyy',
                'autoclose': true,
                'language': 'vi'
            });

            // initialize datepair
            var basicExampleEl = document.getElementById('basicExample');
            var datepair = new Datepair(basicExampleEl);

            $(this).find('.poll-info').each(function(index) {
                console.log(index + ": " + $(this).attr('id'));
                CKEDITOR.replace($(this).attr('id'), options);

            });

            $(document).ready(function() {
                $('#add_question').click(function () {

                    questions++;
                    $('#dynamic_field').append(`
                                                                <div class="form-group" id="dynamic_field_${questions}">

                    <h4 class="form-section">Câu  ${questions}</h4>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control">Câu hỏi</label>
                                                                    <div class="col-md-9">

                                                                    <textarea id="question_content_${questions}" rows="2"
                                                                              class="form-control poll-info"
                                                                              name="question_content[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control">Câu trả
                                                                        lời: </label>
                                                                    <div class="col-md-6">
                                                                        <ul class="list-group" id="question_${questions}">
                                                                            <li class="list-group-item">
                                                                                <input type="text" class="form-control" name="option[]">
                                                                            </li>
                                                                        </ul>

                                                                    </div>
                                                                    <div class="col-md-3 pull-right">
                                                                        <div class="form-group row">
                                                                            <button type="button" name="add_option"
                                                                                    onclick="add_option_func(${questions})"
                                                                                    class="btn btn-success pull-right">
                                                                                Thêm câu trả lời
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <input type="hidden" name="option_len[]" id="option_len_${questions}" value="1">
                                                               </div>`);
                    // $('#dynamic_field').append('<div class="form-group row" id=dynamic_field_' + questions + ' > <label class="col-md-3 label-control">Câu hỏi ' + questions + '</label> <div class="col-md-9"> <input type="text" class="form-control" name="itinerary_name[]"><div class="input-group"> <a id=tour_image_' + questions + ' data-input=tour_image_data_' + questions + ' data-preview=tour_image_preview_' + questions + ' class="btn btn-primary"> <i class="fa fa-picture-o"></i> Choose </a> <input id=tour_image_data_' + questions + ' class="form-control itinerary-image-input" type="text" name="itinerary_image[]" data-id=' + questions + '> </div><img id=tour_image_preview_' + questions + ' style="margin-top:15px;max-height:100px;" > <textarea id="question_content_' + questions + '" rows="5" class="form-control tour-info" name="question_content[]"></textarea> </div> </div>');
                    // $('#dynamic_field').append('<div class="form-group row"  id=dynamic_field_' + questions + ' > <label class="col-md-3 label-control">Câu hỏi ' + questions + '</label> <div class="col-md-9">  <textarea id="question_content_' + questions + '" rows="5" class="form-control poll-info" name="question_content[]"></textarea> </div> </div>');
                    CKEDITOR.replace('question_content_' + questions, options);
                    // RefreshSomeEventListener_2();
                    $('#question_number').val(questions);


                });

                $('#remove_question').click(function() {
                    $('#dynamic_field_' + questions).remove();
                    questions--;
                    $('#question_number').val(questions);

                })
                $('#remove_option').click(function() {
                    $('#dynamic_field_' + questions).remove();
                    questions--;
                    $('#question_number').val(questions);

                })
                function printErrorMsg(msg) {

                    $(".print-error-msg").find("ul").html('');

                    $(".print-error-msg").css('display', 'block');

                    $(".print-success-msg").css('display', 'none');

                    $.each(msg, function(key, value) {

                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                    });

                }

            });
        });
    </script>
    <script src="/jquery.json-viewer/json-viewer/jquery.json-viewer.js"></script>

    <script>
        function IsJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
        $("#proof_request_content_re").change(function (){
            let content = $(this).val();
            if (IsJsonString(content)){
                content = JSON.parse(content)
                $('#json-renderer_re').jsonViewer(content);
            }
        });

        $("#proof_request_content_pre").change(function (){
            let content = $(this).val();
            if (IsJsonString(content)){
                content = JSON.parse(content)
                $('#json-renderer_pre').jsonViewer(content);
            }
        });
    </script>
@endsection
