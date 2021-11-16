@extends('template.master')
@section('title','New User')

@section('content')
    <link href="{{ asset('assets/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css"/>
    <div class="container-fluid" id="Emp_add_view">
        <div class="row">
            @if(Session::has('info_message'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-warning margin-separator"></i> {{ Session::get('info_message') }}
                </div>
            @endif

            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}
                </div>
            @endif
                <div class="col-md-12">
                    @include('errors.errors-forms')
                </div>

            <div class="offset-md-3 col-md-6">
                <form action="{{url('users/store')}}" method="post">
                    @csrf
                    <!-- Default box -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Create Employee</h3>
                            <div class="card-tools">
                                <a class="btn btn-sm btn-success no-shadow" href="{{ route('employeeList') }}">  <i class="fas fa-hand-o-left"></i>Go Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="">
                                    <div class="form-group">
                                        <label class="control-label">Employee No</label>
                                        <input type="text" id="ID_EmpNo" class="form-control" data-bind="value:EmpNo" placeholder="Enter employee no or leave it to auto generate">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label><span style="color: red;">*</span>
                                        <input type="text" id="ID_firstName" class="form-control" data-bind="value:firstName" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" id="ID_lastName" class="form-control" data-bind="value:lastName" placeholder="Enter your last name">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="">

                                    <div class="form-group">
                                        <div class="" id="ID_activeCheck">
                                            <input type="checkbox" id="ID_itemActive" data-bind="checked:isActive">
                                            <label for="ID_itemActive" class="custom_check">Is Active</label>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm float-right" onclick="javascript:Emp.ivm.formSubmit();"><i class="fas fa-save"></i> Submit</button>

                                        <button id="ID_Delete" class="btn btn-danger btn-sm float-right" style="margin-right: 5px" onclick="javascript:Emp.ivm.DeleteConfirm();"><i class="icon-cancel-square"></i> Delete</button>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            Emp.init();
            $('#ID_itemActive').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%'
            });
        });
        Emp = {
            ivm: null,
            init: function (){
                Emp.ivm = new Emp.EmpViewModel();
                ko.applyBindings(Emp.ivm,$('#Emp_add_view')[0]);
                Emp.ivm.getEditView();
            },
            EmpViewModel: function (){

                var self = this;

                self.isNew = ko.observable(true);
                self.itemID = ko.observable("");

                self.EmpNo = ko.observable("");
                self.firstName = ko.observable("");
                self.lastName = ko.observable("");
                self.isActive = ko.observable(true);

                /*var MsgHead = CommonMsg.ivm.toastMsgHead;
                var MsgContent = CommonMsg.ivm.toastMsgContent;*/

                self.formSubmit = function () {

                    if(self.isNew()){
                        self.insertEmpData();
                    }else{

                        self.updateVenData();
                    }

                };
                self.insertEmpData = function () {

                    $.ajax({
                        url: '{{route('employeeCreateSubmit')}}',
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "emp_no": self.EmpNo(),
                            "first_name": self.firstName(),
                            "last_name": self.lastName(),
                        },
                        beforeSend: function (jqXHR, settings) { StartLoading(); },
                        success: function (responseData) {
                            StopLoading();
                            self.clearForm();
                            sweetAlertMsg('Success',responseData.message,'success')
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            StopLoading();

                            var errors = jqXHR.responseJSON.message;

                            var errorList = "<ul>";

                                $.each(errors, function (i, error) {
                                    errorList += '<li class="text-left text-danger">' + error + '</li>';
                                })

                            errorList +="</ul>"

                            sweetAlertMsg('Form validation Error',errorList,'warning');
                        }
                    });
                }

                self.getEditView = function () {

                    var id = App_GetParameterByName();
                    var type = CommonMsg.ivm.isNumeric(id);

                    if(id != null && id!='' && type=='number'){

                        self.designChange(false);
                        self.itemID(id);
                    }else{

                        self.designChange(true);
                        return;
                    }
                    StartLoading();
                    try{
                        var dataParamList = {
                            "itemid": self.itemID()
                        };
                        var ApiObject = {
                            url:'MasterForm/Employee_con/selectEmpData',
                            data: dataParamList,
                            successFuntion: self.getEditViewResult,
                            errorFunction: APP_SubmitionError
                        };

                        APP_CommonApiData(ApiObject);
                    }catch (e){

                        StopLoading();
                    }
                };

                self.clearForm = function () {

                    self.EmpNo("");
                    self.firstName("");
                    self.lastName("");
                };

                self.designChange = function (state) {

                    if(state){

                        $('#ID_Delete').attr('style','display:none');
                        $('#ID_activeCheck').attr('style','display:none');
                    }else{
                        // $('#account_row').attr('style','display:none');
                    }
                }
            }
        }
    </script>
@endpush
