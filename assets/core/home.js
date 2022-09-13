var dashboard = {
  // varible field
  filterTradeDatedaily: ko.observable(""),
  filterTradeDateTotal: ko.observable(""),
  filterDateMenu : ko.observable(""),
};

dashboard.searchData = function () {
  dashboard.getDataGridDailynlv();
}

dashboard.resetData = function () {
  $('#statusnvl').bootstrapSwitch('state', true)
  dashboard.filterTradeDatedaily("");
  dashboard.getDataGridDailynlv();
}

dashboard.searchDataSum = function () {
  dashboard.getDataGriddDailyTotal();
}

dashboard.resetDataSum = function () {
  $('#statusaccTotal').bootstrapSwitch('state', true)
  dashboard.filterTradeDateTotal("");
  dashboard.getDataGriddDailyTotal();
}

dashboard.getDataGridDailynlv = function () {
  var TradeDate = "";
  var statusNlv = 1;
  tnlv = $('#statusnvl').bootstrapSwitch('state');
  if (!tnlv)
    statusNlv = 0
  if (dashboard.filterDateMenu() != "") {
    TradeDate = moment(new Date(dashboard.filterDateMenu())).format("YYYY-MM-DD");
  } else {
    return swal("Confirmation!", "Please choose Trade Date.", "error");
  }

  var param = {
    TradeDate: $("#datePickerMenu").val(),
    Status: statusNlv
  };

  if ($("#datePickerMenu").val() != "") {
    var ondate = ($("#datePickerMenu").val()).toString();
  } else {
    var ondate = "All Date";
  }
  var dataSource = [];
  var url = "/reconsummary/dailynlvsummary";
  $("#MasterGridDaily").html("");
  $("#MasterGridDaily").kendoGrid({
    dataSource: {
      transport: {
        read: {
          url: url,
          data: param,
          dataType: "json",
          type: "POST",
          contentType: "application/json",
        },
        parameterMap: function (data) {
          return JSON.stringify(data);
        },
      },
      schema: {
        data: function (data) {
          if (data.Data.Count == 0) {
            return dataSource;
          } else {
            return data.Data.Records;
          }
        },
        total: "Data.Count",
      },
      pageSize: 10,
      // serverPaging: true,
      // serverSorting: true,
    },
    resizable: true,
    sortable: true,
    pageable: {
      refresh: true,
      pageSizes: true,
      buttonCount: 5
    },
    excel: {
      allPages: true
    },
    excelExport: function (e) {
      console.log(e);
      //e.workbook.fileName = "daily nlv summary All Dates";
      if ($("#datePickerMenu").val()) {
        e.workbook.fileName = "daily nlv summary " + ($("#datePickerMenu").val()).toString() + ".xlsx";
      } else {
        e.workbook.fileName = "daily nlv summary All Dates.xlsx";
      }
    },
    columnMenu: true,
    columns: [
      {
        field: "AccountId",
        title: "Account ID",
        width: 150,
        locked: true,
        lockable: false,
      },
      {
        field: "AccountName",
        title: "Account Name",
        width: 200,
        locked: true,
      },
      {
        field: "Cad",
        title: "CAD",
        width: 100,
        template: "#= kendo.toString(Cad, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Chf",
        title: "CHF",
        width: 100,
        template: "#= kendo.toString(Chf, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Eur",
        title: "EUR",
        width: 100,
        template: "#= kendo.toString(Eur, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Gbp",
        title: "GBP",
        width: 100,
        template: "#= kendo.toString(Gbp, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Jpy",
        title: "JPY",
        width: 100,
        template: "#= kendo.toString(Jpy, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Usd",
        title: "USD",
        width: 100,
        template: "#= kendo.toString(Usd, 'N2') #",
        attributes: {"class": "align-right"}
      },
    ]
  });
}

dashboard.getDataGriddDailyTotal = function () {
  var TradeDate = "";
  var statusNlv = 1;
  tnlv = $('#statusaccTotal').bootstrapSwitch('state');
  if (!tnlv)
    statusNlv = 0
  if (dashboard.filterDateMenu() != "") {
    TradeDate = moment(new Date(dashboard.filterDateMenu())).format("YYYY-MM-DD");
  } else {
    return swal("Confirmation!", "Please choose Trade Date.", "error");
  }

  var param = {
    TradeDate: $("#datePickerMenu").val(),
    Status: statusNlv
  };
  var ondate = ($('#datePickerMenu').val()).toString();
  var dataSource = [];
  var url = "/reconsummary/dailytotalfeesummary";
  $("#MasterGridDailyTotal").html("");
  $("#MasterGridDailyTotal").kendoGrid({
    dataSource: {
      transport: {
        read: {
          url: url,
          data: param,
          dataType: "json",
          type: "POST",
          contentType: "application/json",
        },
        parameterMap: function (data) {
          return JSON.stringify(data);
        },
      },
      schema: {
        data: function (data) {
          if (data.Data.Count == 0) {
            return dataSource;
          } else {
            return data.Data.Records;
          }
        },
        total: "Data.Count",
      },
      pageSize: 10,
      // serverPaging: true,
      // serverSorting: true,
    },
    resizable: true,
    sortable: true,
    pageable: {
      refresh: true,
      pageSizes: true,
      buttonCount: 5
    }, excel: {
      allPages: true
    },
    excelExport: function (e) {
      if ($("#TradeDatedel").val()) {
        e.workbook.fileName = "daily total summary " + ($("#datePickerMenu").val()).toString() + ".xlsx";
      } else {
        e.workbook.fileName = "daily total summary All Dates.xlsx";
      }
    },
    columnMenu: true,
    columns: [
      {
        field: "AccountId",
        title: "Account ID",
        width: 150,
        locked: true,
        lockable: false,
      },
      {
        field: "AccountName",
        title: "Account Name",
        width: 200,
        locked: true,
      },
      {
        field: "Cad",
        title: "CAD",
        width: 100,
        template: "#= kendo.toString(Cad, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Chf",
        title: "CHF",
        width: 100,
        template: "#= kendo.toString(Chf, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Eur",
        title: "EUR",
        width: 100,
        template: "#= kendo.toString(Eur, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Gbp",
        title: "GBP",
        width: 100,
        template: "#= kendo.toString(Gbp, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Jpy",
        title: "JPY",
        width: 100,
        template: "#= kendo.toString(Jpy, 'N2') #",
        attributes: {"class": "align-right"}
      },
      {
        field: "Usd",
        title: "USD",
        width: 100,
        template: "#= kendo.toString(Usd, 'N2') #",
        attributes: {"class": "align-right"}
      },
    ]
  });
}


$(document).ready(function () {
      var param = {};
      ajaxPost("/dashboard/getcurrentdate", param, function (res) {
          
          var d = new Date(res.Data.CurrentDate);
          var DefaultDate = new Date(res.Data.CurrentDate);
          var day = moment(d).format("ddd");
          if (day != "Mon"){
              DefaultDate.setDate(DefaultDate.getDate()-1);
          }else{
              DefaultDate.setDate(DefaultDate.getDate()-3);
          }

          $('#menuDate').html("");
          $divDate = $('#menuDate');
          $datePicker = $("<input type='text' data-bind='value:filterDateMenu'  id='datePickerMenu'/>");
          $datePicker.appendTo($divDate);
          $("#datePickerMenu").kendoDatePicker({
              value: moment(DefaultDate).format("YYYY-MM-DD"),
              format: 'yyyy-MM-dd'
            });
          dashboard.filterTradeDatedaily(new Date(moment(DefaultDate).format("YYYY-MM-DD")));
          dashboard.filterTradeDateTotal(new Date(moment(DefaultDate).format("YYYY-MM-DD")));
          dashboard.filterDateMenu(new Date(moment(DefaultDate).format("YYYY-MM-DD")));

          dashboard.getDataGridDailynlv();
          dashboard.getDataGriddDailyTotal();
          $("#export-daily-nlv").click(function (e) {
            var grid = $("#MasterGridDaily").data("kendoGrid");
            grid.saveAsExcel();
          });
          $("#export-deily-summary").click(function (e) {
            var grid = $("#MasterGridDailyTotal").data("kendoGrid");
            grid.saveAsExcel();
          });
      });
});