
var menusett = {
	Id : ko.observable(""),
	PageId : ko.observable(""),
    Parent:ko.observable(""),
    Title:ko.observable(""),
    Url:ko.observable(""),
    IndexMenu:ko.observable(0),
    saveData : ko.observable(false),
    updateData : ko.observable(false),
    resetData : ko.observable(false),
    DataMenu : ko.observableArray([]),
    listMenu : ko.observableArray([]),
    ListMenuTree : ko.observableArray([]),
    treelistView : ko.observableArray(),
    btnNew : ko.observable(true),
    btnEdit : ko.observable(false),
    btnRemove : ko.observable(false)
};

// settingUser.disabledField = function(){
//     $("#Parent").data("kendoDropDownList").enable(false);
//     $("#Index").data("kendoNumericTextBox").enable(false);
//     document.getElementById("Title").disabled=true;
//     document.getElementById("Url").disabled=true;
//     document.getElementById("Icon").disabled=true;
//     document.getElementById("slideThree").disabled=true;
//     document.getElementById("Haschild").disabled=true;
// }

menusett.enableField = function(){
	$("#Enable").bootstrapSwitch("toggleDisabled","false");
	$("#AppMenu").find("#parent").data("kendoDropDownList").enable(true);
	$("#AppMenu").find("#title").removeAttr("readonly","readonly");
	$("#AppMenu").find("#Url").removeAttr("readonly","readonly");
	$("#AppMenu").find("#index").removeAttr("readonly","readonly");
	
}

menusett.disableField = function(){
	$("#AppMenu").find("#parent").data("kendoDropDownList").enable(false);
	$("#AppMenu").find("#title").attr("readonly","readonly");
	$("#AppMenu").find("#Url").attr("readonly","readonly");
	$("#AppMenu").find("#index").attr("readonly","readonly");
	setTimeout(function(){ $("#Enable").bootstrapSwitch("toggleDisabled"); }, 100);
}

menusett.resetAppMenu = function(){
    menusett.Id("");
    menusett.PageId("");
    menusett.Parent("");
    menusett.Title("");
    menusett.Url("");
    menusett.IndexMenu(0);
    menusett.saveData(false);
    menusett.updateData(false);
    menusett.resetData(false);
    menusett.btnRemove(false);
    $('#Enable').bootstrapSwitch('state', true)
    $("#Url").siblings("span.k-tooltip-validation").hide(); 
    $("#title").siblings("span.k-tooltip-validation").hide(); 
    menusett.loadmenuMaster();
    menusett.btnNew(true);
}

menusett.saveAppmenu = function(){
	var url = "/menusetting/savemenutop";
	var Title = menusett.Title();
	var IndexMenu = menusett.IndexMenu();
	var Enable = $('#Enable').bootstrapSwitch('state');
	var d = new Date();
    var day = d.getDate();
    var month = d.getMonth()+1;
    var year = d.getFullYear();
    var Hours= d.getHours();
    var Minutes= d.getMinutes();
    var Seconds= d.getSeconds();
    var GenMenuId = year + "" + month+""+day +""+ Hours + ""+ Minutes + "" + Seconds

	if (IndexMenu == ""){
		IndexMenu = 0;
	}
	var param = {
		Id : GenMenuId,
		PageId : Title.toUpperCase().replace(/\s+/g, ''),
		Parent : menusett.Parent(),
		Title : Title,
		Url : menusett.Url(),
		IndexMenu : parseInt(IndexMenu),
		Enable : Enable
	};

	var validator = $("#AppMenu").data("kendoValidator");
    if(validator==undefined){
       validator= $("#AppMenu").kendoValidator().data("kendoValidator");
    }

     if (validator.validate()) {
     	ajaxPost(url, param, function (data) {
			if (data.IsError == false){
			    menusett.resetAppMenu();
			    // window.location.href = "/menusetting/default";
				swal("Success!", data.Message, "success");
			}else{
				return swal("Error!", data.Message, "error");
			}
		});
     }
	
}

menusett.updateAppmenu = function(){
	var url = "/menusetting/updatemenutop";
	var Title = menusett.Title();
	var IndexMenu = menusett.IndexMenu();
	var Enable = $('#Enable').bootstrapSwitch('state');

	if (IndexMenu == ""){
		IndexMenu = 0;
	}
	var param = {
		Id : menusett.Id(),
		PageId : menusett.PageId(),
		Parent : menusett.Parent(),
		Title : Title,
		Url : menusett.Url(),
		IndexMenu : parseInt(IndexMenu),
		Enable : Enable
	};
	ajaxPost(url, param, function (data) {
		if (data.IsError == false){
		    menusett.resetAppMenu();
		    // window.location.href = "/menusetting/default";
			swal("Success!", data.Message, "success");
		}else{
			return swal("Error!", data.Message, "error");
		}
	});
}

menusett.checkSelect = function(){
	var tv = $("#menu-list").data("kendoTreeView");
	selected = tv.select();
	item = tv.dataItem(selected);
    if (item === undefined) {
       	return swal("Confirmation!", "Please select menu.", "error");
    }else{
    	menusett.Id(item.Id);
    	menusett.saveData(false);
    	menusett.updateData(true);
    }
}

menusett.editdataMenulist = function(){
	menusett.checkSelect();
	menusett.enableField();
	menusett.btnEdit(false);
	menusett.btnNew(false);
	menusett.resetData(true);
	menusett.btnRemove(false);
}

menusett.newdataMenulist = function(){
	menusett.btnEdit(false);
	menusett.saveData(true);
	menusett.resetData(true);
    menusett.updateData(false);
    menusett.Id("");
    menusett.PageId("");
    menusett.Parent("");
    menusett.Title("");
    menusett.Url("");
    menusett.IndexMenu(0);
    // menusett.loadmenuMaster();
    // $("#Url").siblings("span.k-tooltip-validation").hide(); 
    // $("#title").siblings("span.k-tooltip-validation").hide(); 
    menusett.enableField();
}


menusett.deleteMunulist = function(){
	if (menusett.Id() == ""){
		return swal("Confirmation!", "Please select menu.", "error");
	}

	var param = {
		Id : menusett.Id()
	}
	var url = "/menusetting/deletemenutop";
	swal({
            title: "Are you sure?",
            text: "Are you sure remove this menu!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
			    ajaxPost(url, param, function(data){
					if (data.IsError == false){
						menusett.resetAppMenu();
						swal("Success!","Menu Success "+ menusett.Id() +" Delete","success");
						// window.location.href = "/menusetting/default";
					}else{
						swal("Error!",data.Message,"error");
					}
				});
            } else {
            	menusett.saveData(false);
			    menusett.updateData(false);
			    menusett.Id("");
			    menusett.PageId("");
			    menusett.Parent("");
			    menusett.Title("");
			    menusett.Url("");
			    menusett.IndexMenu(0);
			    menusett.loadmenuMaster();
			    $('#Enable').bootstrapSwitch('state', true)
			    $("#Url").siblings("span.k-tooltip-validation").hide(); 
			    $("#title").siblings("span.k-tooltip-validation").hide(); 
                swal("Cancelled", "Cancelled Delete Menu", "error");
            }
        });
}

menusett.convert = function (array){
    var map = {};
    for(var i = 0; i < array.length; i++){
        var obj = array[i];
        obj.Submenus= [];

        map[obj.Id] = obj;

        var parent = obj.Parent || '-';
        if(!map[parent]){
            map[parent] = {
                Submenus: []
            };
        }
        map[parent].Submenus.push(obj);
    }
    return map['-'].Submenus;
}


menusett.subMenuMaster = function(SubData, spacer){
	spacer += "--";
	for (var i in SubData){
			if (SubData[i].Submenus.length != 0 ){
				menusett.listMenu.push({
						"title" : spacer + " " + SubData[i].Title,
						"Id" : SubData[i].Id
					});
				menusett.subMenuMaster(SubData[i].Submenus, spacer);
			}else{
				menusett.listMenu.push({
						"title" : spacer + " " + SubData[i].Title,
						"Id" : SubData[i].Id
					});
			}
		}
}

menusett.subtreelist = function(SubData){
	for (var i in SubData){
			if (SubData[i].Submenus.length != 0 ){
				menusett.treelistView.push({
						"Id" : SubData[i].Id,
						"title" : SubData[i].Title,
						"url" : "#",
						"pageid" : SubData[i].PageId,
						"Parent" : SubData[i].Parent,
						"indexmenu" : SubData[i].IndexMenu,
						"enable" : SubData[i].Enable,
					});
				menusett.subtreelist(SubData[i].Submenus);
			}else{
				menusett.treelistView.push({
						"Id" : SubData[i].Id,
						"title" : SubData[i].Title,
						"url" : "#",
						"pageid" : SubData[i].PageId,
						"Parent" : SubData[i].Parent,
						"indexmenu" : SubData[i].IndexMenu,
						"enable" : SubData[i].Enable,
					});
			}
		}
}

menusett.loadmenuMaster = function(){
	menusett.disableField();
	var url = "/menusetting/getselectmenu";
	var param = {
	};
	menusett.listMenu([{title: "[TOP LEVEL]", Id: ""}]);
	menusett.treelistView([]);
	ajaxPost(url, param, function (data) {
		var dataMenu = data.Data.Records;
		var sortdataMenu =  Enumerable.From(dataMenu).OrderBy("$.Parent").ThenBy("$.IndexMenu").ToArray();
		var dataTree =  menusett.convert(sortdataMenu);
		var spacer = "--";
		var listSubmenu = [];

		for (var i in dataTree){
			if (dataTree[i].Submenus.length  != 0 ){
				menusett.listMenu.push({
						"title" : spacer + " " + dataTree[i].Title,
						"Id" : dataTree[i].Id
					});
				menusett.subMenuMaster(dataTree[i].Submenus, spacer);
				//=================== 
				menusett.treelistView.push({
					"Id" : dataTree[i].Id,
					"title" : dataTree[i].Title,
					"url" : "#",
					"pageid" : dataTree[i].PageId,
					"Parent" : dataTree[i].Parent,
					"indexmenu" : dataTree[i].IndexMenu,
					"enable" : dataTree[i].Enable,
				});
				menusett.subtreelist(dataTree[i].Submenus);

			}else{
				menusett.listMenu.push({
						"title" : spacer + " " + dataTree[i].Title,
						"Id" : dataTree[i].Id
					});

				menusett.treelistView.push({
					"Id" : dataTree[i].Id,
					"title" : dataTree[i].Title,
					"url" : "#",
					"pageid" : dataTree[i].PageId,
					"Parent" : dataTree[i].Parent,
					"indexmenu" : dataTree[i].IndexMenu,
					"enable" : dataTree[i].Enable,
				});

			}
		}

		var sortdataTree =  menusett.convert(menusett.treelistView());
		// var sortdataTree = Enumerable.From(dataTree).OrderBy("$.Parent").ThenBy("$.IndexMenu").ToArray();
		menusett.ListMenuTree(sortdataTree);

		var inline = new kendo.data.HierarchicalDataSource({
            data: menusett.ListMenuTree(),
            schema: {
                model: {
                    children: "Submenus"
                }
            }
        });

		// $("#menu-list").replaceWith("<div id='menu-list'></div>");
		// var treeview = $("#menu-list").kendoTreeView({
		// 	animation: false,
		// 	template: "&nbsp;&nbsp;<span>#= item.Title #</span>",
		// 	select: menusett.selectDirFolder,
		// 	dataSource: inline,
	 //    }).data("kendoTreeView");
	 //    treeview.expand(".k-item");	
	 	var treeview = $("#menu-list").kendoTreeView({
            animation: false,
            template: kendo.template($("#menulist-template").html()),
            dataTextField: "title",
            dataSource:inline,
            select: menusett.selectDirFolder,
            loadOnDemand: false
        }).data("kendoTreeView");
        treeview.expand(".k-item");
        loadingNOK();
	});
}    

menusett.selectDirFolder = function(e){
	menusett.btnEdit(true);
	menusett.btnRemove(true);
	menusett.btnNew(false);

	var data = $('#menu-list').data('kendoTreeView').dataItem(e.node);
	var param = {
		Id : data.Id
	}
	var url = "/menusetting/getselectmenu";
	ajaxPost(url, param, function(data){
		if (data.IsError == false){
			var dataMenu =  data.Data.Records[0];
			menusett.Id(dataMenu.Id);
			menusett.PageId(dataMenu.PageId);
			menusett.Parent(dataMenu.Parent);
		    menusett.Title(dataMenu.Title);
		    menusett.Url(dataMenu.Url);
		    menusett.IndexMenu(dataMenu.IndexMenu);
		    $('#Enable').bootstrapSwitch('state', dataMenu.Enable)
		}else{
			swal("Error!",data.Message,"error");
		}
	});
}
$(document).ready(function () { 
	menusett.loadmenuMaster();
});