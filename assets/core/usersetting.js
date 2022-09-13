var usersett = {
    //
    titleModel : ko.observable("New User"),
    // loading : ko.observable(false),
    edit : ko.observable(true),
    //var field 
    Id : ko.observable(""),
    userName : ko.observable(""),
    fullName : ko.observable(""),
    email : ko.observable(""),
    password : ko.observable(""),
    confirmPassword : ko.observable(""),
    role : ko.observable(""),

    //var Filter
    filterUser : ko.observableArray([]),
    filterRole : ko.observableArray([]),

    //var List
    listUserName : ko.observableArray([]),
    listRole : ko.observableArray([]),
};

usersett.ClearField = function(){
    usersett.Id("");
    usersett.userName("");
    usersett.fullName("");
    usersett.email("");
    usersett.password("");
    usersett.confirmPassword("");
    usersett.role("");
}

usersett.Search = function(){
    usersett.GetDataUser();
}

usersett.Reset = function(){
    usersett.filterUser([]);
    usersett.filterRole([]);
    usersett.GetDataUser();
}

usersett.addNew = function(){
    $("#userModal").modal("show");
    usersett.titleModel("New User");
    $('#Status').bootstrapSwitch('state',true)
    usersett.edit(false);
    var validator = $("#AddUserSetting").kendoValidator().data("kendoValidator");
    validator.hideMessages();

}

usersett.SaveData = function(){
    var statusBool = $('#Status').bootstrapSwitch('state');
    var dropRole = $("#role").data("kendoDropDownList");
    var param = {
        "UserName": usersett.userName(),
        "FullName": usersett.fullName(),
        "Email": usersett.email(),
        "Enable": statusBool,
        "Password": usersett.password(),
        "Role": dropRole.text(),
    }
    var url = "/usersetting/savedata";
    var validator = $("#AddUserSetting").data("kendoValidator");
    if(validator==undefined){
       validator= $("#AddUserSetting").kendoValidator().data("kendoValidator");
    }
    if (validator.validate()) {
        ajaxPost(url, param, function(res){
            if(res.IsError != true){
                $("#userModal").modal("hide");
                usersett.ClearField();
                usersett.Reset();
                swal("Success!", res.Message, "success");
            }else{
                return swal("Error!", res.Message, "error");
            }
        });
    }
}

usersett.UpdateData = function(){
    var statusBool = $('#Status').bootstrapSwitch('state');
    var dropRole = $("#role").data("kendoDropDownList");
    var param = {
        "Id" : usersett.Id(),
        "UserName": usersett.userName(),
        "FullName": usersett.fullName(),
        "Email": usersett.email(),
        "Enable": statusBool,
        "Password": usersett.password(),
        "Role": dropRole.text(),
    }
    var url = "/usersetting/savedata";
    var validator = $("#AddUserSetting").data("kendoValidator");
    if(validator==undefined){
       validator= $("#AddUserSetting").kendoValidator().data("kendoValidator");
    }
    if (validator.validate()) {
        ajaxPost(url, param, function(res){
            if(res.IsError != true){
                $("#userModal").modal("hide");
                usersett.ClearField();
                usersett.Reset();
                swal("Success!", res.Message, "success");
            }else{
                return swal("Error!", res.Message, "error");
            }
        });
    }
}

usersett.EditData = function(idUser){
    var param = {
        "Id" : idUser,
    }
    var url = "/usersetting/getdata";
    ajaxPost(url, param, function(res){
        if(res.IsError != true){
            usersett.edit(true);
            usersett.titleModel("Update User");
            var dataUser = res.Data.Records[0];
            $("#userModal").modal("show");
            usersett.Id(dataUser.Id);
            usersett.userName(dataUser.Username);
            usersett.fullName(dataUser.Fullname);
            usersett.email(dataUser.Email);
            usersett.password(dataUser.Password);
            usersett.confirmPassword(dataUser.Password);
            usersett.role(dataUser.Roles);
            $('#Status').bootstrapSwitch('state', dataUser.Enable);
            $("#role").data("kendoDropDownList").text(dataUser.Roles);
        }else{
            return swal("Error!", res.Message, "error");
        }
    });
}

usersett.Cancel = function(){
    $("#userModal").modal("hide");
    usersett.ClearField();
}

usersett.filterUser.subscribe(function(value){
  if(model.View() != "false"){
   usersett.GetDataUser();
  }
});

usersett.filterRole.subscribe(function(value){
  if(model.View() != "false"){
   usersett.GetDataUser();
  }
});

usersett.FilterStatus = function(){
    if(model.View() != "false"){
        $('#StatusFilter').on('switchChange.bootstrapSwitch', function(event, state) {
            // if(state == false){
            //     rolesett.filterStatus("0");
            // }else{
            //    rolesett.filterStatus("1");
            // }
            usersett.GetDataUser();
        });
    }
}

usersett.GetDataUser = function(){
    var param =  {
        "UserName" : usersett.filterUser(),
        "Role" : usersett.filterRole(),
        "Status" : $('#StatusFilter').bootstrapSwitch('state'),
    };
    var dataSource = [];
    var url = "/usersetting/getdata";
    loadingOK();
    $("#MasterGridUser").html("");
    $("#MasterGridUser").kendoGrid({
            dataSource: {
                    transport: {
                        read: {
                            url: url,
                            data: param,
                            dataType: "json",
                            type: "POST",
                            contentType: "application/json",
                        },
                        parameterMap: function(data) {                                 
                           return JSON.stringify(data);                                 
                        },
                    },
                    schema: {
                        data: function(data) {
                            loadingNOK();
                            if (data.Data.Count == 0) {
                                return dataSource;
                            } else {
                                return data.Data.Records;
                            }
                        },
                        total: "Data.Count",
                    },
                    pageSize: 15,
                    serverPaging: true,
                    serverSorting: true,
                },
                resizable: true,
                sortable: true,
                pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5
                },
                columnMenu: true,
                columns: [
                {
                    field:"Username",
                    title:"User Name",
                    width:150,
                    template: "#if(model.Edit() != 'false'){#<a class='grid-select' href='javascript:usersett.EditData(\"#: Id #\")'>#: Username #</a>#}else{#<div>#: Username #</div>#}#"

                },
                {
                    field:"Fullname",
                    title:"Full Name",
                    width:100

                },
                {
                    field:"Enable",
                    title:"Enable",
                    width:50

                },
                {
                    field:"Email",
                    title:"Email",
                    width:100

                },
                {
                    field:"Roles",
                    title:"Roles",
                    width:100
                }]
    });
}

usersett.getUserName = function(){
    var param = {
    }
    var url = "/datamaster/getusername";
    usersett.listUserName([]);
    ajaxPost(url, param, function(res){
        var dataUser = Enumerable.From(res).OrderBy("$.username").ToArray();
        for (var u in dataUser){
            usersett.listUserName.push({
                "text" : dataUser[u].username,
                "value" : dataUser[u].username,
            });
        }
    });
}

usersett.getRole = function(){
    var param = {
    }
    var url = "/datamaster/getroles";
    usersett.listRole([]);
    ajaxPost(url, param, function(res){
        var dataRole = Enumerable.From(res).OrderBy("$.name").ToArray();
        for (var r in dataRole){
            usersett.listRole.push({
                "text" : dataRole[r].name,
                "value" : dataRole[r].name,
            });
        }
    });
}

$(document).ready(function () { 
    usersett.FilterStatus();
    $('#StatusFilter').bootstrapSwitch('state', true);
    usersett.getUserName();
    usersett.getRole();
    // usersett.GetDataUser();
    $("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();
});