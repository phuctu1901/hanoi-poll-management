@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="/assets/examples/css/dashboard/analytics.css">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/did/all">Định danh</a></li>
                <li class="breadcrumb-item active">Cấp định danh</li>

            </ol>

        </div>
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">

                <div class="col-12">
                    <div  class="card card-shadow card-md" style="margin-top: 30px;">
                        <div class="card-header card-header-transparent pb-15">
                            <p class="font-size-14 blue-grey-700 mb-0 text-uppercase">Thông tin định danh</p>
                        </div>
                        <div class="card-block px-90 col-12">
                            <div class="row">
                                <div class="col-md-12 col-lg-5">
                                    <div class="form-group d-flex justify-content-center">
                                        <div id="qrcode"></div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="text-center">
                                            <button id="connection_check" class="btn btn-warning">1. Kiểm tra kết nối</button>
                                            <button id="verification_create" class="btn btn-success">2. Gởi yêu cầu đến ứng dụng</button>
                                            <button id="verification_check" class="btn btn-success">3. Kiểm tra trạng thái</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <form id="citizen-info">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Địa chỉ thường trú: </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="address" placeholder=""
                                                       autocomplete="off" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Nội dung: </label>
                                            <div class="col-md-9 input-group" >
                                                <textarea cols="5" class="form-control" id="input_code" placeholder="Nội dung ý kiến" autocomplete="off"></textarea>
{{--                                                <span class="input-group-btn">--}}
{{--                                                <button class="btn btn-info" name="btn_check_id"  id="btn_check_id"> Kiểm tra</button>--}}
{{--                                            </span>--}}
                                            </div>
                                        </div>


{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-md-3 col-form-label">Họ và tên: </label>--}}
{{--                                            <div class="col-md-9">--}}
{{--                                                <input type="text" class="form-control" id="input_fullname" placeholder="Họ và tên đầy đủ" autocomplete="off" disabled/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <legend class="col-md-3 col-form-legend">Giới tính: </legend>--}}
{{--                                            <div class="col-md-9">--}}
{{--                                                <div class="radio-custom radio-default radio-inline">--}}
{{--                                                    <input type="radio"  name="gender" id="male" disabled/>--}}
{{--                                                    <label for="inputHorizontalMale">Name</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="radio-custom radio-default radio-inline">--}}
{{--                                                    <input type="radio" name="gender" id="female"  disabled--}}
{{--                                                    />--}}
{{--                                                    <label for="inputHorizontalFemale">Nữ</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-md-3 col-form-label">Ngày sinh: </label>--}}
{{--                                            <div class="col-md-9">--}}
{{--                                                <input type="text" class="form-control" id="dob" placeholder=""--}}
{{--                                                       autocomplete="off"  disabled/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <button type="button"  id="btn-submit" class="btn btn-primary">4. Gởi ý kiến</button>
                                                <button type="reset" class="btn btn-warning btn-outline">Đặt lại</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>


                            </div>

                        </div>
                    </div>
                    <!-- Panel Accordion -->

                    <!-- End Panel Accordion -->
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts-content')
    <script src="/global/vendor/footable/footable.min.js"></script>
    <script src="/assets/examples/js/dashboard/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/assets/js/qrcode.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    {{--    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}
    <script>
        $("#connection_check").prop("disabled", true);
        $("#verification_create").prop("disabled", true);
        $("#btn-submit").prop("disabled", true);
        $("#verification_check").prop("disabled", true);


        createConnection()

        $("#verification_create").click(function(event){
            event.preventDefault();
            var connectionId = $("#connection_check").data('button-data').connectionId

            // console.log(code)
            // $('#citizen-info').trigger("reset");
            // $("#input_code").val(code)
            $.ajax({
                type: 'POST',
                data: {connectionId: connectionId},
                url:"/api/verification/create",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    console.log(data.data)
                    //
                    $("#verification_check").data('button-data', {verificationId:data.data.verificationId})
                    $("#verification_check").prop("disabled", false);
                    // $("#verification_create").prop("disabled", false);

                    // $('#current_transaction').html(data);
                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });

        });

        $("#btn-submit").click(function(event){
            event.preventDefault();
            toastr.info('Đang lấy thông tin')
            const  code = $("#input_code").val()

          // createConnection();



        });
        // function issueCredential(connectionId, code) {
        //     $.ajax({
        //         type: 'POST',
        //         data: {connectionId: connectionId, code:code},
        //         url:"/api/credential/issue",
        //         success:function(data)
        //         {
        //             toastr.success('Lấy thông tin thành công')
        //             console.log(data)
        //         },
        //         error: function (err) {
        //             console.log(err)
        //             toastr.error('Lỗi truy vấn thông tin')
        //
        //         }
        //     });
        // }

        function getConnection(id){
            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/connection/get/"+id,
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    if(data.state === 'response'){
                        swal('Thành công', 'Đã kết nối đến người dân','success')
                        $("#verification_create").prop("disabled", false);
                        // $("#connection_check").prop("disabled", false);

                    }
                    else if (data.state === 'response'){
                        swal('Đang đợi kết nối', 'Vui lòng kết nối','info')
                    }
                    console.log(data)
                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }

        function createConnection(){
            toastr.info('Đang khởi tạo QR Code')
            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/connection/create",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    var inviationUrl = data.invitation_url
                    var connectionId = data.connection_id
                    console.log(connectionId)
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: inviationUrl,
                        width: 320,
                        height: 320,
                        colorDark : "#000000",
                        colorLight : "#ffffff",
                        correctLevel : QRCode.CorrectLevel.L
                    });
                    $("#connection_check").data('button-data', {connectionId:connectionId})

                    $("#connection_check").prop("disabled", false);

                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }


        $("#connection_check").click(function (event) {
            event.preventDefault();
            var connectionId = $("#connection_check").data('button-data').connectionId
            getConnection(connectionId);
        })

        function getVerification(id){
            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/verification/detail/"+id,
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    if(data.state === 'Accepted'){
                        swal('Thành công', 'Đã cung cấp thông tin','success')
                        $("#btn-submit").prop("disabled", false);
                        $("#address").val(data.proof.additionalProp1.value)
                        // $("#connection_check").prop("disabled", false);

                    }
                    else if (data.state === 'Invited'){
                        swal('Đang đợi cung cấp thông tin', 'Vui lòng kết nối','info')
                    }
                    console.log(data)
                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }

        $("#verification_check").click(function (event) {
            event.preventDefault();t
            var verificationId = $("#verification_check").data('button-data').verificationId
            getVerification(verificationId);
        })


        // $("#issue_credential").click(function (event) {
        //     event.preventDefault();
        //     var connectionId = $("#connection_check").data('button-data').connectionId
        //     var code = $("#input_code").val()
        //     issueCredential(connectionId, code)
        // })


    </script>


@endsection
