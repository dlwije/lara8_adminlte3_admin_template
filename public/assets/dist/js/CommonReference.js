var App_Copyright = "&copy    " + new Date().getFullYear() + " - DLW.&nbsp;&nbsp;All rights reserved";
var App_PageSize = "10";
var App_DecimalPoint = "2";

NewMasterListName = {
    "customer": "Customer",
    "item": "Item",
    "nonInventory": "Non Inventory GRN ",
    "nonInventoryIssue": "Non Inventory Issue ",
    "unitofmesure": "Unit Of Mesure",
    "vehicle": "Vehicle",
    "vehicletype": "Vehicle Type",
    "vendor": "Supplier",
    "servicetype": "Service Package",
    "servicetask": "Service Task",
    "Dealer": "Dealer",
    "vwarranty": "Vehicle Warranty",
    "employee": "Employee",
    "customerjob": "Job Order",
    "joborder": "Job Order",
    "mjoborder": "Mechanical Job Order",
    "topenjob": "Opened Job",
    "tstartjob": "Started Job",
    "trequestjob": "Inventory Requested Job",
    "tcompletejob": "Job Order",
    "GRN": "Goods Receive Note",
    "GRNRTN": "Goods Return",
    "invoice": "Invoice",
    "spinvoice": "Spare Parts Invoice",
    "stockcard": "Job Card",
    "mjobcard": "Mechanical Job Card",
    "porder": "Purchase Order",
    "pnlreport": "Profit and Loss",
    "SDReport": "Stock Details",
    "CDReport": "Customer Details",
    "PNLHReport": "Profit & Loss Hierarchy",
    "CCReport": "Cash Collection",
    "disReport": "Daily Item Issue",
};

NewMasterListNo = {
    "customer": 1,
    "item": 2,
    "unitofmesure": 3,
    "vehicle": 4,
    "vehicletype": 5,
    "vendor": 6,
    "servicetype": 7,
    "servicetask": 8,
    "Dealer": 9,
    "vwarranty": 10,
    "employee": 11,
    "nonInventory": 12,
    "nonInventoryIssue": 13,
    "customerjob": 101,
    "joborder": 106,
    "mjoborder": 1007,
    "topenjob": 1011,
    "tstartjob": 1012,
    "trequestjob": 1013,
    "tcompletejob": 1014,
    "GRN": 102,
    "GRNRTN": 103,
    "invoice": 104,
    "stockcard": 105,
    "porder": 106,
    "spinvoice": 107,
    "mjobcard": 108,
    "pnlreport": 301,
    "SDReport": 302,
    "CDReport": 303,
    "disReport": 304,
    "CCReport": 305,
    "PNLHReport": 306,
};

function APP_pageBack(MasterFileId){

    if(MasterFileId == NewMasterListNo.item)
        window.location.href = WebApiBaseUrl+"itemList";
    else if(MasterFileId == NewMasterListNo.customer)
        window.location.href = WebApiBaseUrl+"Customer_con/paginListView/";
    else if(MasterFileId == NewMasterListNo.vehicletype)
        window.location.href = WebApiBaseUrl+"Common_con/paginListView/"+NewMasterListNo.vehicletype;
    else if(MasterFileId == NewMasterListNo.unitofmesure)
        window.location.href = WebApiBaseUrl+"uomList";
    else if(MasterFileId == NewMasterListNo.vehicle)
        window.location.href = WebApiBaseUrl+"vehicleList";
    else if(MasterFileId == NewMasterListNo.customerjob)
        window.location.href = WebApiBaseUrl+"TransactionForm/Job_con/paginListView/"+NewMasterListNo.customerjob;
    else if(MasterFileId == NewMasterListNo.GRN)
        window.location.href = WebApiBaseUrl+"Common_con/paginListView/"+NewMasterListNo.GRN;
    else if(MasterFileId == NewMasterListNo.GRNRTN)
        window.location.href = WebApiBaseUrl+"Common_con/paginListView/"+NewMasterListNo.GRNRTN;
    else if(MasterFileId == NewMasterListNo.vendor)
        window.location.href = WebApiBaseUrl+"MasterForm/Vendor_con/paginListView";
    else if(MasterFileId == NewMasterListNo.servicetype)
        window.location.href = WebApiBaseUrl+"Common_con/paginListView/"+NewMasterListNo.servicetype;
    else if(MasterFileId == NewMasterListNo.Dealer)
        window.location.href = WebApiBaseUrl+"MasterForm/Dealer_con/paginListView/";
    else if(MasterFileId == NewMasterListNo.vwarranty)
        window.location.href = WebApiBaseUrl+"MasterForm/Warranty_con/paginListView/";
    else if(MasterFileId == NewMasterListNo.invoice)
        window.location.href = WebApiBaseUrl+"Common_con/paginListView/"+NewMasterListNo.invoice;
    else if(MasterFileId == NewMasterListNo.stockcard)
        window.location.href = WebApiBaseUrl+"TransactionForm/Stock_card_con/paginListView/";
    else if(MasterFileId == NewMasterListNo.porder)
        window.location.href = WebApiBaseUrl+"TransactionForm/POrder_con/paginListView/";
    else if(MasterFileId == NewMasterListNo.joborder)
        window.location.href = WebApiBaseUrl+"TransactionForm/Job_con/paginListView";
    else if(MasterFileId == NewMasterListNo.tcompletejob)
        window.location.href = WebApiBaseUrl+"TransactionForm/Job_con/TechnicianCompleteJobList/"+NewMasterListNo.tcompletejob;
    else if(MasterFileId == NewMasterListNo.employee)
        window.location.href = WebApiBaseUrl+"employeeList";
    else if(MasterFileId == NewMasterListNo.nonInventory)
        window.location.href = WebApiBaseUrl+"TransactionForm/NonInvenGRN_con/paginListView";
    else if(MasterFileId == NewMasterListNo.nonInventoryIssue)
        window.location.href = WebApiBaseUrl+"TransactionForm/NonInvenGRN_con/paginListViewNIIssue";
    else if(MasterFileId == NewMasterListNo.spinvoice)
		window.location.href = WebApiBaseUrl+"TransactionForm/Invoice_con/partsInvoiceListView";
    else if(MasterFileId == NewMasterListNo.mjobcard)
        window.location.href = WebApiBaseUrl+"TransactionForm/Mechanical_job_card_con/paginListView";
    else
        window.location.href = WebApiBaseUrl+"Login_con/Home";
}

function sweetAlertMsg(msgH,msgB,msgType){

    Swal.fire(
        msgH,
        msgB,
        msgType
    );
}

function ErrorValidationColor(ElementID,State){

    if(State==1)
        $('#'+ElementID).parent().addClass('has-error');
    else
        $('#'+ElementID).parent().removeClass('has-error');

}

function select2DropdownNormal(elementId, URL) {

    $("#"+elementId).select2({
        placeholder: 'Select...',
        // allowClear: true,
        ajax: {
            url: Template.ivm.baseUrl+""+URL,
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
}

function APP_FormatNumber(ElementId) {
    $('#'+ElementId).val(accounting.formatNumber($('#'+ElementId).val(),2));
}

function APP_FormatNumberValue(number) {

    return accounting.formatNumber(number,2);
}

function select2Dropdown(elementId,URL,ID,vendorID) {

    var element = "#"+elementId;
    $(element).select2({
        placeholder: 'Select...',
        // allowClear: true,
        ajax: {
            url: WebApiBaseUrl+""+URL,
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term || "",
                    page: params.page || 1,
                    resCount: 10,
                    vendor_id: vendorID
                }
            }
        }
    });
    $(".select2-container").tooltip({
        title: function() {
            return $(this).prev().attr("title");
        },
        placement: "auto",
        //container: 'body'
    });

    var elementSelect = $(element);

    if(typeof ID == "undefined" || ID == null) return;
    $.ajax({
        type: 'GET',
        url: WebApiBaseUrl+""+URL+"ById/",
        data:{'id':ID}

    }).then(function (data) {
        var jsonVal = JSON.parse(data);
        // console.log(jsonVal);
        // create the option and append to Select2
        var option = new Option(jsonVal[0].text, jsonVal[0].id, true, true);
        elementSelect.append(option).trigger('change');

        // manually trigger the `select2:select` event
        elementSelect.trigger({
            type: 'select2:select',
            params: {
                data: data
            }
        });
    });
}

function GetSelect2Val(ElementID) {

    if ($('#'+ElementID).select2('val') != null){

        return $('#'+ElementID).select2('data')[0].id;
    }
}

function APP_selectEmpty(element) {

    var elementSelect = $('#'+element);
    elementSelect.val(null).trigger('change');

}

function APP_getBoolean(value){
    switch(value){
        case false:
        case "false":
        case "0":
            return false;
        default:
            return true;
    }
}

function StopLoading () {

    $("#loadingDiv").fadeOut(500, function () {
        // fadeOut complete. Remove the loading div
        $("#loadingDiv").hide();
    })
}

function StartLoading () {

    $("#loadingDiv").fadeOut(500, function () {
        // fadeOut complete. Remove the loading div
        $("#loadingDiv").show();
    })
}

function checkEmail(emailVal) {

    var em = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return em.test(emailVal);
}
