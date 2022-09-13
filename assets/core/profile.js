var profile = {
    edit: ko.observable(false),
    FilterName: ko.observableArray([]),
    FilterValue: ko.observable(""),
    panelHistory: ko.observable(false),
    pdff: ko.observable(false),
    showRemoveButton: ko.observable(false)
    // addNew: ko.observable(false),
}
profile.Id = ko.observable("");
profile.ktp = ko.observable("");
profile.fullname = ko.observable("");
profile.dob = ko.observable("");
profile.religion = ko.observable("");
profile.bankacc = ko.observable("");
profile.bankno = ko.observable("");
profile.gender = ko.observable("M");
profile.marital_status = ko.observable("");
profile.height = ko.observable("");
profile.weight = ko.observable("");
profile.phone = ko.observable("");
profile.email = ko.observable("");
profile.blood = ko.observable("");
profile.residence = ko.observable("");
profile.address = ko.observable("");
profile.img = ko.observable("");
profile.result = ko.observable("");
profile.Image_file = ko.observable("");
profile.isFile = ko.observable(false);

profile.father = ko.observable("");
profile.mother = ko.observable("");
profile.housband = ko.observable("");
profile.child = ko.observableArray([])
profile.childr = ko.observableArray([])
profile.edu = ko.observableArray([{Level: "", Name:"", Start:"", End:""}])
profile.lang = ko.observableArray([{Language: "", Write: "", Read: "", Speaking: ""}])
profile.work = ko.observableArray([{Company_name: "", Start: "", End: "", Employee_count:"", Salary:"", Resign_reason:""}])
profile.join = ko.observable("");
profile.fams = ko.observable("");
profile.startwork = ko.observable("");
profile.add = ko.observable(false);
profile.status = ko.observable("OPEN");

profile.setViewUpload = ko.observable(false);
profile.Id_history = ko.observable("");
profile.Id_profile = ko.observable ("");
profile.Name = ko.observable ("");
profile.Tlp = ko.observable ("");
profile.Emailhis = ko.observable ("");
profile.Dob_his = ko.observable ("");
profile.Address_his = ko.observable ("");
profile.Religion_his = ko.observable("");
profile.History = ko.observableArray ([]);
profile.Date_invite = ko.observable("");
profile.Time_invite = ko.observable("");
profile.score = ko.observable("");
profile.comment = ko.observable("");
profile.Image_file = ko.observable("");

profile.reportName = ko.observable("");
profile.setFile = ko.observable(false);

profile.el = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#3']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#4']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#5']").parent().removeClass("active");
}

profile.fd = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().addClass("active");
    $("ul#tab_aplicant").find("a[href$='#3']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#4']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#5']").parent().removeClass("active");
}

profile.ed = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#3']").parent().addClass("active");
    $("ul#tab_aplicant").find("a[href$='#4']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#5']").parent().removeClass("active");
}

profile.fls = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#3']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#4']").parent().addClass("active");
    $("ul#tab_aplicant").find("a[href$='#5']").parent().removeClass("active");
}

profile.ques = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#3']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#4']").parent().removeClass("active");
    $("ul#tab_aplicant").find("a[href$='#5']").parent().addClass("active");
}

profile.allRemove = function() {
    $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
    $("#1").addClass("tab-pane active");
    $("ul#tab_aplicant").find("a[href$='#2']").parent().removeClass("active");
    $("#2").removeClass().addClass("tab-pane")
    $("ul#tab_aplicant").find("a[href$='#3']").parent().removeClass("active");
    $("#3").removeClass().addClass("tab-pane")
    $("ul#tab_aplicant").find("a[href$='#4']").parent().removeClass("active");
    $("#4").removeClass().addClass("tab-pane")
    $("ul#tab_aplicant").find("a[href$='#5']").parent().removeClass("active");
    $("#5").removeClass().addClass("tab-pane")
}

profile.prepareaddEdu = function() {
    for(var i = 0; i< profile.edu().length; i++){
        $("#startdate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy"
        });
        $("#enddate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy"
        });
    }
}

profile.prepareaddWork = function() {
    for(var i = 0; i< profile.work().length; i++){
        $("#startdatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy"
        });
        $("#enddatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy"
        });
    }
}

profile.addChild = function(index) {
    profile.child.push({childname: ""});
}

profile.addChildr = function() {
    profile.childr.push({childrname: ""});
}

profile.addEdu = function() {
    profile.edu.push({Level: "", Name:"", Start:"", End:""})
    for(var i = 0; i< profile.edu().length; i++){
        $("#startdate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.edu()[i].Start
        });
        $("#enddate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.edu()[i].End
        });
    }
}

profile.addWork = function() {
    profile.work.push({Company_name: "", Start: "", End: "", Employee_count:"", Resign_reason:"", Salary:""})
    for(var i = 0; i< profile.work().length; i++){
        $("#startdatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.work()[i].Start
        });
        $("#enddatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.work()[i].End
        });
    }
}

profile.addLang = function() {
    profile.lang.push({Language: "", Write: "", Read: "", Speaking: ""})
}


profile.editEdu = function() {
    for(var i = 0; i< profile.edu().length; i++){
        $("#startdate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.edu()[i].Start
        });
        $("#enddate_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.edu()[i].End
        });
    }
}

profile.editWork = function() {
    for(var i = 0; i< profile.work().length; i++){
        $("#startdatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.work()[i].Start
        });
        $("#enddatework_"+i).kendoDatePicker({
            start: "decade",                          
            depth: "decade",                           
            format: "yyyy",
            value: profile.work()[i].End
        });
    }
}

profile.removeChild = function() {
    profile.child.remove(this);
}

profile.removeChildr = function() {
    profile.childr.remove(this);
}

profile.removeEdu = function(index) {
    profile.edu.remove(this);
}

profile.removeLang = function(index) {
    profile.lang.remove(this);
}

profile.removeWork = function(index) {
    profile.work.remove(this);
}

profile.Filter = function(){
    ajaxPost("/profile/getname", {}, function(res){
        var data = res.Data.Records;
        profile.FilterName([]);
        $.each(data, function(i, item){
            profile.FilterName.push(item.Name)
        })
    })
}
 
profile.addNew = function(){
     profile.edit(true);
     profile.add(true);
     $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
     $("#1").addClass("tab-pane active");
    $('#img-ex').attr("src","/static/img/no-image.png");
     profile.prepareaddWork();
     profile.prepareaddEdu();
     var form = document.getElementById("recruitmentForm");
     form.reset();
}

profile.cancelNew = function(){
     profile.edit(false);
     profile.allRemove();
     profile.fieldRemove();
     profile.panelHistory(false);
     profile.setFile(false);
     // $("#panelAppDashboard").show();
}

profile.addSchedule = function(){
}


profile.showHistory = function(Id){
   profile.panelHistory(true);
   profile.setFile(true)
   // console.log(Id);
    $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
    $("#1").addClass("tab-pane active");
        
        profile.loadHistory(Id);
}
profile.showFile = function(ind){
    // console.log(File)
    if(profile.setFile() == true){
        window.open("/static/file/"+profile.History()[ind].File, '_blank');
        // console.log("------>",File.File)
        // open.focus();
    }
}

profile.loadHistory = function(Id){
    var histo =  {
            "Id" : Id
    };
    profile.History([]);
    ajaxPost("/history/getdata",histo, function(res){
        if(res.IsError=="true"){
            swal("Error", res.Message, "error");
        }else{
            console.log(res.Data.Records[0]);
            var data = res.Data.Records[0].History;
            // console.log(data)
            profile.Id_history(res.Data.Records[0].Id);
            profile.Id_profile(res.Data.Records[0].Id_profile);
            profile.Name(res.Data.Records[0].Name);
            profile.Tlp(res.Data.Records[0].Tlp);
            profile.Emailhis(res.Data.Records[0].Email);
            profile.Dob_his(res.Data.Records[0].Dob);
            profile.Address_his(res.Data.Records[0].Address);
            profile.Religion_his(res.Data.Records[0].Religion);
            profile.Image_file(res.Data.Records[0].Image_file);
            var div =$("#img_profile")
            div.empty()
            var $image = $('<img alt="" src="/static/file/'+profile.Image_file()+'">')
            $image.appendTo(div)
            $.each(data, function(index, item) {
                profile.History.push(item)
                console.log(item)
                if(item.File != ""){
                    profile.isFile(true);
                }else{
                    profile.isFile(false);
                }
            });
        }
    })
}

profile.fieldRemove = function(){
    profile.ktp("");
    profile.fullname("");
    profile.dob("");
    profile.religion("");
    profile.bankacc("");
    profile.bankno("");
    profile.gender("M");
    profile.marital_status("");
    profile.height("");
    profile.weight("");
    profile.phone("");
    profile.email("");
    profile.blood("");
    profile.residence("");
    profile.address("");
    profile.img("");
    profile.result("");

    profile.father("");
    profile.mother("");
    profile.housband("");
    profile.child([]);
    profile.childr([]);
    profile.edu([{Level: "", Name:"", Start:"", End:""}]);
    profile.lang([{Language: "", Write: "", Read: "", Speaking: ""}]);
    profile.work([{Company_name: "", Start: "", End: "", Employee_count:"", Resign_reason:"", Salary:""}]);
    profile.join("");
    profile.fams("");
    profile.startwork("");

}

profile.loadMasterGrid = function(){
    var param =  {
        "Name" : profile.FilterValue(),
        "Address" : "",
    };
    var dataSource = [];
    var url = "/profile/getdata";
    $("#MasterProfile").html("");
    $("#MasterProfile").kendoGrid({
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
                            //gc.Init();
                            //rolesett.loading(false);
                            if (data.Data.Count == 0) {
                                return dataSource;
                            } else {
                                return data.Data.Records;
                            }
                        },
                        total: function(data){
                            if (data.Data.Count == 0) {
                                return 0;
                            } else {
                                return data.Data.Records.length;
                            }
                        },
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
                change: profile.getSelected,
                change: profile.getSelected2,
                selected: "column",
                columns: [
                {
                    title:"Name",
                    // width:150,
                    template: function(d){
                        return[
                            "<a href='#' onclick='profile.getSelected(\"" + d.Name+ "\")'>"+d.Name+"</a>"
                        ].join("");
                    }


                },
                {
                    field:"Address",
                    title:"Address",
                    width:350

                },
                {
                    field:"Phone",
                    title:"Telphone",
                    // width:50

                },
                {
                    field:"Status",
                    title:"Status",
                    attributes:{style:"text-transform:uppercase"}
                    // width:50

                },{
                    field:"Date_invite",
                    title:"Date"
                },{
                    field:"Time_invite",
                    title:"Time"
                },{
                    title: "Action",
                    width: 100,
                    template: function(d){
                        return  "<button class='btn btn-xs btn-info btn-flat' onclick='profile.showActionStatus(\"" + d.Name+"\")'><i class='fa fa-check'></i></button> <button class='btn btn-xs btn-success'onclick='profile.getSelected2(\"" +d.Name+ "\")'><i class='fa fa-search'></i></button> <button class='btn btn-xs btn-warning' onclick='profile.showHistory(\"" + d.Id+ "\")'><i class='fa fa-bars'></i></button>"
                    }
                }
            ]
    });
    loadingNOK();
}
profile.showActionStatus = function(name)
{
    profile.getSelected(name);
    profile.edit(false);
    $("#addStatus").modal("show", true);
    $("#selectStatus").change(function(value){
        // console.log($(this).val())
        if($(this).val() == "OPEN" || $(this).val() == "TEST"){
            profile.setViewUpload(true);
        }else{
            profile.setViewUpload(false);
        }
    });
}

profile.saveStatus = function() {
    swal("Save success");
    $("#addStatus").modal("hide");
}

profile.getSelected2 = function(d){
    $("#main").hide()
    $("#formReport").show()

    profile.reportName(d)
    console.log(d);
    $("ul#tab_aplicant_det").find("a[href$='#1']").parent().addClass("active");
    $("#1").addClass("tab-pane active");
       profile.pdff(true);
       profile.add(false);
       var param =  {
            "Name" : d
        };
        profile.child([]);
        profile.childr([]);
        profile.edu([]);
        profile.lang([]);
        profile.work([]);
        
        ajaxPost("/profile/getdata",param, function(res){
            if(res.IsError=="true"){
                swal("Error", res.Message, "error");
            }else{
                console.log(res)
                var data = res.Data.Records[0];
                profile.Id(data.Id);
                profile.ktp(data.Id_card);
                profile.fullname(data.Name);
                profile.dob(data.Dob);
                profile.religion(data.Religion);
                profile.bankacc(data.Bank_account);
                profile.bankno(data.Account_number);
                profile.gender(data.Gender);
                profile.marital_status(data.Marital_status);
                profile.height(data.Height);
                profile.weight(data.Weight);
                profile.phone(data.Phone);
                profile.email(data.Email);
                profile.blood(data.Blood);
                profile.residence(data.Residence_status);
                profile.address(data.Address);

                profile.father(data.Father);
                profile.mother(data.Mother);
                profile.housband(data.Husband_wife);
                
                profile.join(data.Why_join);
                profile.fams(data.Name_friend);
                profile.startwork(data.When_join);
                profile.Time_invite(data.Time_invite);
                profile.Date_invite(data.Date_invite);
                profile.Image_file(data.Image_file)
                profile.status(data.Status);
                $.each(data.Brother_sister, function(index, item) {
                    profile.child.push({childname: item});
                });

                $.each(data.Child, function(index, item) {
                    profile.childr.push({childrname: item})
                });

                $.each(data.Education, function(index, item) {
                    profile.edu.push({Level: item.Level, Name: item.Name, Start: item.Start, End: item.End})
                });

                $.each(data.Language, function(index, item) {
                    profile.lang.push({Language: item.Language, Write: item.Write, Read: item.Read, Speaking: item.Speaking})
                });

                $.each(data.Experience, function(index, item) {
                    profile.work.push({Company_name: item.Company_name, Start: item.Start, End: item.End, Employee_count: item.Employee_count, Salary: item.Salary, Resign_reason: item.Resign_reason })
                });
                profile.loadHistory(profile.Id());

                // console.log(data.History)

                profile.editEdu();
                profile.editWork();

                if(profile.Image_file() != ""){
                    $('#img-ex-det').attr("src","/static/file/"+profile.Image_file());
                    }
                else{
                    $('#img-ex-det').attr("src","/static/img/no-image.png");
                }
                


            }
        })
}

profile.getSelected = function(d){
    console.log(d);
    $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
    $("#1").addClass("tab-pane active");
       profile.edit(true);
       profile.add(false);
       var param =  {
            "Name" : d
        };
        profile.child([]);
        profile.childr([]);
        profile.edu([]);
        profile.lang([]);
        profile.work([]);
        
        ajaxPost("/profile/getdata",param, function(res){
            if(res.IsError=="true"){
                swal("Error", res.Message, "error");
            }else{
                console.log(res)
                var data = res.Data.Records[0];
                profile.Id(data.Id);
                profile.ktp(data.Id_card);
                profile.fullname(data.Name);
                profile.dob(data.Dob);
                profile.religion(data.Religion);
                profile.bankacc(data.Bank_account);
                profile.bankno(data.Account_number);
                profile.gender(data.Gender);
                profile.marital_status(data.Marital_status);
                profile.height(data.Height);
                profile.weight(data.Weight);
                profile.phone(data.Phone);
                profile.email(data.Email);
                profile.blood(data.Blood);
                profile.residence(data.Residence_status);
                profile.address(data.Address);

                profile.father(data.Father);
                profile.mother(data.Mother);
                profile.housband(data.Husband_wife);
                
                profile.join(data.Why_join);
                profile.fams(data.Name_friend);
                profile.startwork(data.When_join);
                profile.Time_invite(data.Time_invite);
                profile.Date_invite(data.Date_invite);
                profile.Image_file(data.Image_file)
                profile.status(data.Status);
                $.each(data.Brother_sister, function(index, item) {
                    profile.child.push({childname: item});
                });

                $.each(data.Child, function(index, item) {
                    profile.childr.push({childrname: item})
                });

                $.each(data.Education, function(index, item) {
                    profile.edu.push({Level: item.Level, Name: item.Name, Start: item.Start, End: item.End})
                });

                $.each(data.Language, function(index, item) {
                    profile.lang.push({Language: item.Language, Write: item.Write, Read: item.Read, Speaking: item.Speaking})
                });

                $.each(data.Experience, function(index, item) {
                    profile.work.push({Company_name: item.Company_name, Start: item.Start, End: item.End, Employee_count: item.Employee_count, Salary: item.Salary, Resign_reason: item.Resign_reason })
                });
                profile.loadHistory(profile.Id());

                // console.log(data.History)

                profile.editEdu();
                profile.editWork();

                if(profile.Image_file() != ""){
                    $('#img-ex').attr("src","/static/file/"+profile.Image_file());
                    }
                else{
                    $('#img-ex').attr("src","/static/img/no-image.png");
                }
                


            }
        })
}

profile.saveData = function(){

    var child = [];
    var childr = [];
    $.each(profile.child(), function(i, item){
        child.push(item.childname)
    })
    $.each(profile.childr(), function(i, item){
        childr.push(item.childrname)
    })

    var fileName= "";
    var formData = new FormData();
    if($("#getval")[0].files[0] != undefined){
        fileName = $("#getval")[0].files[0].name
        var fileSize = $("#getval")[0].files[0].size
        var fileType = fileName.split(".")[fileName.split(".").length-1]
    }
    formData.append("UploadFile", $("#getval")[0].files[0]);

    /*profile.History.push({  
        Date    : $("#datestatus").val(),
        Time    : $("#timestatus").val(),
        Score    : profile.score(),
        Comment    : profile.comment(),
        Status: profile.status(),
        File: fileName,
    })*/
    var param = {
        Id_card : profile.ktp(),
        Name    : profile.fullname(),
        Dob     : profile.dob(),
        Religion : profile.religion(),
        Bank_account: profile.bankacc(),
        Account_number: profile.bankno(),
        Gender  : profile.gender(),
        Marital_status: profile.marital_status(),
        Height  : profile.height(),
        Weight  : profile.weight(),
        Phone   : profile.phone(),
        Email   : profile.email(),
        Blood   : profile.blood(),
        Residence_status : profile.residence(),
        Address : profile.address(),
        Father  : profile.father(),
        Mother  : profile.mother(),
        Brother_sister :  child,
        Husband_wife : profile.housband(),
        Child : childr,
        Education : profile.edu(),
        Language    : profile.lang(),
        Experience  : profile.work(),
        Why_join : profile.join(),
        Name_friend     : profile.fams(),
        When_join : profile.startwork(),
        History  : profile.History(),
        Status  : "OPEN",
        Score    : profile.score(),
        Comment    : profile.comment(),
        Date_invite    : $("#datestatus").val(),
        Time_invite    : $("#timestatus").val(),
        Image_file     : fileName,
    }

    var validator = $("#recruitmentForm").data("kendoValidator");

    if(validator==undefined){
        validator= $("#recruitmentForm").kendoValidator().data("kendoValidator");
    }

    setTimeout(function(){ profile.validatorTab(); }, 100);

    if (validator.validate()) {
        model.Loading(true);
        ajaxPost("/profile/savedata",param, function(res){
            if(res.IsError=="true"){
                model.Loading(false);
                swal("Error", res.Message, "error");
            }else{
                model.Loading(false);
                swal("Success", res.Message, "success");
                $.ajax({
                    url: "/profile/getupload",
                    data: formData,
                    contentType: false,
                    dataType: "json",
                    mimeType: 'multipart/form-data',
                    processData: false,
                    type: 'POST',
                    beforeSend: function (jqXHR, settings) {
                      // model.Processing(true);
                    },
                    success: function (data) {
                        // model.Processing(false);
                        // if (!data.IsError) {
                        //     uP.GetDateHist();
                        //     $( "#remove").trigger( "click" );
                        //     swal("Success!", "File uploaded successfully.", "success");
                        // } else {
                        //     swal("Error!", "File Can't uploaded.", "error");
                        // }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Error!", errorThrown, "error");
                    }
                });
                profile.cancelNew();
                profile.loadMasterGrid();
            }
        });
    }    
}

profile.setHistory = function(){
    //swal("Tester Button");
    profile.setFile(false)
    var child = [];
    var childr = [];
    $.each(profile.child(), function(i, item){
        child.push(item.childname)
        // console.log(child)
    })
    $.each(profile.childr(), function(i, item){
        childr.push(item.childrname)
        // console.log(childr)
    })
   
    var random = Math.random()
    var formData = new FormData();
    if($("#file")[0].files[0] != undefined){
        // $("#file")[0].files[0].name = random+"-"+$("#file")[0].files[0].name
        console.log( random+"-"+$("#file")[0].files[0].name)
        var fileName = $("#file")[0].files[0].name
        var fileSize = $("#file")[0].files[0].size
        var fileType = fileName.split(".")[fileName.split(".").length-1]
    }
    if($("#getval")[0].files[0] != undefined){
        var fileName1 = $("#getval")[0].files[0].name
        var fileSize1 = $("#getval")[0].files[0].size
        var fileType1 = fileName.split(".")[fileName.split(".").length-1]
    }
     // if(profile.Time_invite() !="" || profile.Status()!= ""){
        // profile.History.push({
        //     Date: profile.Date_invite(),
        //     Time: profile.Time_invite(),
        //     Status: profile.status(),
        //     Score    : profile.score(),
        //     Comment    : profile.comment(),
        //     File: fileName,
        // })
    // }
    var dataname = random+"-"+$("#file")[0].files[0].name
    formData.append("UploadFile", $("#file")[0].files[0]);
    formData.append("FileName", dataname);
    console.log("------831",JSON.stringify(formData))
    profile.History.push({  
        Date    : $("#datestatus").val(),
        Time    : $("#timestatus").val(),
        Score    : profile.score(),
        Comment    : profile.comment(),
        Status: profile.status(),
        File: dataname,
    })
    var param = {
        Id : profile.Id(),
        Id_card : profile.ktp(),
        Name    : profile.fullname(),
        Dob     : profile.dob(),
        Religion : profile.religion(),
        Bank_account: profile.bankacc(),
        Account_number: profile.bankno(),
        Gender  : profile.gender(),
        Marital_status: profile.marital_status(),
        Height  : profile.height(),
        Weight  : profile.weight(),
        Phone   : profile.phone(),
        Email   : profile.email(),
        Blood   : profile.blood(),
        Residence_status : profile.residence(),
        Address : profile.address(),
        Father  : profile.father(),
        Mother  : profile.mother(),
        Brother_sister :  child,
        Husband_wife : profile.housband(),
        Child : childr,
        Education : profile.edu(),
        Language    : profile.lang(),
        Experience  : profile.work(),
        Why_join : profile.join(),
        Name_friend     : profile.fams(),
        When_join : profile.startwork(),
        // Result  : profile.result(),
        Status  : profile.status(),
        Score    : profile.score(),
        Comment    : profile.comment(),
        Date_invite    : $("#datestatus").val(),
        Time_invite    : $("#timestatus").val(),
        History: profile.History(),
        Image_file : fileName1,
    }

    console.log("Benar")
    ajaxPost("/profile/sethistory",param, function(res){
        if(res.IsError=="true"){
            swal("Error", res.Message, "error");
        }else{
            swal("Success", res.Message, "success");
            $.ajax({
                url: "/profile/getupload",
                data: formData,
                contentType: false,
                dataType: "json",
                mimeType: 'multipart/form-data',
                processData: false,
                type: 'POST',
                beforeSend: function (jqXHR, settings) {
                  // model.Processing(true);
                },
                success: function (data) {
                    // model.Processing(false);
                    // if (!data.IsError) {
                    //     uP.GetDateHist();
                    //     $( "#remove").trigger( "click" );
                    //     swal("Success!", "File uploaded successfully.", "success");
                    // } else {
                    //     swal("Error!", "File Can't uploaded.", "error");
                    // }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal("Error!", errorThrown, "error");
                }
            });
   
            profile.loadMasterGrid();
            $("#addStatus").modal("hide");
            // console.log("===--- File masuk")
        }
    });

   
}



profile.validatorTab = function() {
    var area_1 = $("#1").find("input[aria-invalid='true'], textarea[aria-invalid='true'], select[aria-invalid='true']");
    var area_2 = $("#2").find("input[aria-invalid='true']");
    var area_3 = $("#3").find("input[aria-invalid='true']");
    var area_4 = $("#4").find("input[aria-invalid='true'], select[aria-invalid='true']");
    var area_5 = $("#5").find("textarea[aria-invalid='true']");

    if (area_1.size() != 0){
        $("#click1").click();
        swal("Error...", "There is still error on tab 1", "error");
    } else if (area_2.size() != 0) {
        $("#click2").click();
        swal("Error...", "There is still error on tab 2", "error");
    } else if (area_3.size() != 0) {
        $("#click3").click();
        swal("Error...", "There is still error on tab 3", "error");
    } else if (area_4.size() != 0) {
        $("#click4").click();
        swal("Error...", "There is still error on tab 4", "error");
    } else if (area_5.size() != 0) {
        $("#click5").click();
        swal("Error...", "There is still error on tab 5", "error");
    } 
}

profile.saveDataUpdate = function() {
    var child = [];
    var childr = [];
    $.each(profile.child(), function(i, item){
        child.push(item.childname)
    })
    $.each(profile.childr(), function(i, item){
        childr.push(item.childrname)
    })
    var formData = new FormData();
    if($("#getval")[0].files[0] != undefined){
        var fileName = $("#getval")[0].files[0].name
        var fileSize = $("#getval")[0].files[0].size
        var fileType = fileName.split(".")[fileName.split(".").length-1]
        profile.Image_file(fileName)
    }
    formData.append("UploadFile", $("#getval")[0].files[0]);
    var last = profile.History().length - 1;
    var param = {
        Id      : profile.Id(),
        Id_card : profile.ktp(),
        Name    : profile.fullname(),
        Dob     : profile.dob(),
        Religion : profile.religion(),
        Bank_account: profile.bankacc(),
        Account_number: profile.bankno(),
        Gender  : profile.gender(),
        Marital_status: profile.marital_status(),
        Height  : profile.height(),
        Weight  : profile.weight(),
        Phone   : profile.phone(),
        Email   : profile.email(),
        Blood   : profile.blood(),
        Residence_status : profile.residence(),
        Address : profile.address(),
        Father  : profile.father(),
        Mother  : profile.mother(),
        Brother_sister :  child,
        Husband_wife : profile.housband(),
        Child : childr,
        Education : profile.edu(),
        Language    : profile.lang(),
        Experience  : profile.work(),
        Why_join : profile.join(),
        Name_friend     : profile.fams(),
        When_join : profile.startwork(),
        Image_file  :  profile.Image_file(),
        Status  : profile.History()[last].Status,
        Score    : profile.score(),
        Comment    : profile.comment(),
        Date_invite    : $("#datestatus").val(),
        Time_invite    : $("#timestatus").val(),
        History : profile.History(),
    }

    var validator = $("#recruitmentForm").data("kendoValidator");

    if(validator==undefined){
        validator= $("#recruitmentForm").kendoValidator().data("kendoValidator");
    }
    setTimeout(function(){ profile.validatorTab();; }, 100);

    if (validator.validate()) {
        // console.log("Masuk Kog");
        ajaxPost("/profile/savedata",param, function(res){
            if(res.IsError=="true"){
                swal("Error", res.Message, "error");
            }else{
                swal("Success", res.Message, "success");
                 $.ajax({
                    url: "/profile/getupload",
                    data: formData,
                    contentType: false,
                    dataType: "json",
                    mimeType: 'multipart/form-data',
                    processData: false,
                    type: 'POST',
                    beforeSend: function (jqXHR, settings) {
                      // model.Processing(true);
                    },
                    success: function (data) {
                        // model.Processing(false);
                        // if (!data.IsError) {
                        //     uP.GetDateHist();
                        //     $( "#remove").trigger( "click" );
                        //     swal("Success!", "File uploaded successfully.", "success");
                        // } else {
                        //     swal("Error!", "File Can't uploaded.", "error");
                        // }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Error!", errorThrown, "error");
                    }
                });
                profile.cancelNew();
                profile.loadMasterGrid();
            }
        });
    }
}

function readURL(event){
    $('#img-ex').attr("src","/static/img/no-image.png");
    if (event.target.files[0] != undefined){
        var getImagePath = URL.createObjectURL(event.target.files[0]);
        $('#img-ex').attr("src",getImagePath);
        profile.showRemoveButton(true);
    }
}

profile.datetimeStatus = function() {
    $("#dob").kendoDatePicker({
        format: "dd MMMM yyyy"
    });
    $("#datestatus").kendoDatePicker({
        format: "dd MMMM yyyy",
        value: new Date()
    });
    $("#timestatus").kendoTimePicker({
        value: new Date()
    });
    
}

profile.showPDF = function(event){
       profile.panelPdf(true);
   // console.log(d);
    $("ul#tab_aplicant").find("a[href$='#1']").parent().addClass("active");
    $("#1").addClass("tab-pane active");
        
        profile.loadPdf(Id);
    //  var URL2 = window.open("/static/pdf/Modul_Praktikum_Oracle-SQL.pdf" , '_blank');
    // URL2.focus();
    //location.href = URL2; 
}
profile.loadPdf = function(Id){
    var pdf =  {
            "Id" : Id
    };
    profile.profile([]);
    ajaxPost("/profile/getdata",pdf, function(res){
        if(res.IsError=="true"){
            swal("Error", res.Message, "error");
        }else{
            console.log(res.Data.Records[0]);
            var data = res.Data.Records[0].profile;
            // console.log(data)
           
            profile.Id = ko.observable("");
            profile.ktp(res.Data.Records[0].Id_card);
            profile.fullname(res.Data.Records[0].Name);
            profile.dob(res.Data.Records[0].Dob);
            profile.religion(res.Data.Records[0].Religion);
            profile.bankacc(res.Data.Records[0].Bank_account);
            profile.bankno(res.Data.Records[0].Account_number);
            profile.gender(res.Data.Records[0].Gender);
            profile.marital_status(res.Data.Records[0].Marital_status);
            profile.height(res.Data.Records[0].Height);
            profile.weight(res.Data.Records[0].Weight);
            profile.phone(res.Data.Records[0].Phone);
            profile.email(res.Data.Records[0].Email);
            profile.blood(res.Data.Records[0].Blood);
            profile.residence(res.Data.Records[0].Residence_status);
            profile.address(res.Data.Records[0].Address);
            profile.image_file(res.Data.Records[0].Image_file);
            var div =$("#img_profile")
            div.empty()
            var $image = $('<img alt="" src="/static/file/'+profile.Image_file()+'">')
            $image.appendTo(div)
        }
    })
}


profile.removeImgProfile = function(){
    $(".fileinput-new").find("#img-ex").attr( "src", "/static/img/no-image.png");
    profile.showRemoveButton(false);
}

profile.getBackMain = function(){
    $("#main").show()
    $("#formReport").hide()
}

profile.convertPDF = function(){
    var draw = kendo.drawing;

    draw.drawDOM($("#report"), {
        avoidLinks: true,
        paperSize: "A4"
    })
    .then(function(root) {
        return draw.exportPDF(root);
    })
    .done(function(data) {
        kendo.saveAs({
            dataURI: data,
            fileName: profile.reportName()+".pdf"
        });
    });
}

$(document).ready(function(){
    $("#formReport").hide()
    profile.child.push({childname: ""});
    profile.childr.push({childrname: ""});
    profile.loadMasterGrid();
    profile.Filter();
    profile.datetimeStatus();
    
});