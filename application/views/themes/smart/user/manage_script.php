<script src="<?=base_url()?>themes/smart/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>themes/smart/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script> 
<script src="<?=base_url()?>themes/smart/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>themes/smart/plugins/counterup/jquery.waypoints.min.js"></script>
<script src="<?=base_url()?>themes/smart/plugins/counterup/jquery.counterup.min.js"></script>  
<script src="<?=base_url()?>themes/smart/js/pages/material-select/getmdl-select.js"></script>
<script src="<?=base_url()?>themes/custom/js/users_manage.js"></script> 

<script type="">
    var userManageTable = undefined; 
    var __headerGroup = [
        { title:"USER ID"},
        { title:"NAME"},
        { title:"USER GROUP"}, 
        { title:"GENDER"}, 
        { title:"EMAIL"},
        { title:"LAST ACCESS"}, 
        { title:"STATUS"},
        { title:"ACTION"} 
    ];
    var userInfoData = undefined; 
    var getIgnoreSort = (c, ign) => (c.map( (m, i) => (ign.includes(m.title) ? i : -1) ).filter( f => f != -1 )); 
    $(document).ready( function (){ 
        loadUserManage();
        

    });
    $(document).on("show.bs.modal", "#modal--edituser", function(){
        $(".mdl-textfield__input").each( (m, e) => {
            let val = $(e).val();
            if( val ){
                $(e).closest("div").addClass("is-dirty")
            }else $(e).closest("div").removeClass("is-dirty")
        });

       
    })
    async function loadUserManage() {
        let userInfo = await gettingUserManage();
        let configTb = { createdRow : actionRow, columnDefs: [ {'targets': getIgnoreSort(__headerGroup, ["ACTION"] ), 'orderable': false, }] }
        userManageTable = settingWaitActionTable("#usertb4", __headerGroup, userInfo, configTb)
    }

    function settingWaitActionTable($this, col, data, option){
        return $($this).DataTable(Object.assign({
            columns : col, 
            data:data,
            dom: '<"top"<"head--left"lB><"head--right"f>><"tbox customscroll"t><"bottom"ip><"clear">',
            destroy:true,
            initComplete:tableLoad
        },option));
    }
    function tableLoad(settings, json){
        
         //$("select[name=usertb4_length]").attr('data-width','50px').selectpicker();   
    }
    function actionRow( row, data, dataIndex ) { 
        $(row).attr('id', parseInt(data[0]) ); 
        // $(row).find('td:eq(0)').text(data[0].padStart(4, '0'))
    }

    async function gettingUserManage(){
        //debugger;
        let perGroup  = await $.get("<?= base_url() ?>user/getuserInfo")
                              .fail( e => { Toast.fire({ icon: 'error', title: 'error insert data!' }); console.log(e) });  
        userInfoData = JSON.parse(perGroup);

        let setValue = userInfoData?.map( m => { 
            return setRowTable(m)
        });
        summaryDetailuserManage(userInfoData);
        return setValue;          
    }
    function setRowTable(m){
        return [
            m.id.padStart(4, '0'),
            `${m.firstname} ${m.lastname}`,
            m.usergroup, 
            m.gender,
            m.email,
            m.last_access,
            `<div class='div--forgroup'>
                <label class="switchToggle ${m.enable == 0 ? "dis" : ""}">
                    <input type="checkbox" ${m.enable == 1 ? "checked" : ""} onchange="switchStatus(this, ${m.id})">
                    <span class="slider aqua"></span> 
                </label>
                <span class="ms-1" dis--status="ENABLED"></span>
            </div>`,
            `<div class='div--forgroup jus--center'>
                <a href="javascript:void(0)" onclick="settingEdit('open', this, '${m.id}');" class="tblEditBtn"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" onclick="settingDelete(this, '${m.id}');" class="tblDelBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>`
        ]
    }
    function switchStatus(e, id){
        if( `<?php echo $this->session->userdata('sessUsrId')?>` == `${id}` ){
            Toast.fire({ icon: 'warning', title: 'You cannot disable yourself.' }); 
            $(e).prop("checked", "false");
        } 

        let isChecked = $(e)[0].checked;
        let toParent = $(e).closest("label.switchToggle");
        if(isChecked){
            toParent.removeClass("dis");
            $("+ span", toParent).attr("dis--status", "ENABLED");
            settingActive(e, id);
        }else{
            toParent.addClass("dis");
            $("+ span", toParent).attr("dis--status", "DISABLED");
            settingActive(e, id);
        } 
    }
    function summaryDetailuserManage(data){
        
        let total = data.length;
        let eanable = data.filter( f=>f.enable == 1).length;
        let disabled = data.filter( f=>f.enable != 1).length;
        let onday = data.filter( f=> moment(f.last_access).format("YYYY-MM-DD") == moment(new Date).format("YYYY-MM-DD") ).length;
        $("#detail--al").attr("data-value", total);
        $("#detail--ac").attr("data-value", eanable);
        $("#detail--ua").attr("data-value", disabled);
        $("#detail--ud").attr("data-value", onday);
        setTimeout( () => { $("[data-counter='counterup']").counterUp({ delay: 10, time: 1000, }) }, 2000); 
    }
    async function settingEdit(action, e, id){
        switch(action){
            case "open":
                let d = userInfoData.filter( f => f.id == id )
                $("#txtFirstName").val(d[0]?.firstname).addClass("is-dirty");
                $("#txtLastName").val(d[0]?.lastname).addClass("is-dirty");;
                $("#txtEmail").val(d[0]?.email).addClass("is-dirty");;
                $("#txtGender").val(d[0]?.gender).addClass("is-dirty");         
                
                $("#btn--savecahnge").attr("flag--id", id);
                $("#modal--edituser").modal("show");
                break;
            case "update":
                let isConfirm = await _ConfirmBox({confirmButtonText:"Yes, update it!"});
                if( isConfirm ){
                    let _id = $("#btn--savecahnge").attr("flag--id");
                    let first = $("#txtFirstName").val();
                    let last =  $("#txtLastName").val(); 
                    let email = $("#txtEmail").val();
                    let gender = $("#txtGender").val(); 
                    let parameter = { firstName : first, lastName : last, email : email, gender : gender } 
                    let res = await $.post("<?= base_url() ?>user/updateUserData", {id: _id, values : parameter })
                            .fail( e => { Toast.fire({ icon: 'error', title: 'error update data!' }); });
                    if(res){
                        userManageTable.cell( $(`#usertb4 tbody tr[id=${_id}]>td:nth-child(2)`) ).data(`${first} ${last}`).draw(false); 
                        userManageTable.cell( $(`#usertb4 tbody tr[id=${_id}]>td:nth-child(4)`) ).data(gender).draw(false);
                        userManageTable.cell( $(`#usertb4 tbody tr[id=${_id}]>td:nth-child(5)`) ).data(email).draw(false);
    
                        Toast.fire({ icon: 'success', title: 'update data done.' });     
                        $("#modal--edituser").modal("hide");     
                    }                        
                }
 
                break;
            default: break;                           
        } 
       
    }
    async function settingDelete(e, id){
        debugger;
        if( `<?php echo $this->session->userdata('sessUsrId')?>` == `${id}` ){
            Toast.fire({ icon: 'warning', title: 'You cannot remove yourself.' });  
            return;
        } 
        let btnAction = $(e);
        let rowAction = $(e).closest("tr");
        //let id = ckbox.attr("roleGroupId");
        let res = await $.post("<?= base_url() ?>user/updateUserDeleted", {id: id})
                         .fail( e => { Toast.fire({ icon: 'error', title: 'error remove data!' }); console.log(e) });
        roleTable.row(rowAction).remove().draw(false);
    }
    async function settingActive(e, id){
        debugger;
        let ckbox = $(e);
        //let id = ckbox.attr("roleGroupId");
        let res = await $.post("<?= base_url() ?>user/updateUserStatus", {id: id, active: ckbox[0].checked ? 1 : 0 })
                         .fail( e => { Toast.fire({ icon: 'error', title: 'error update data!' }); console.log(e) });
    }
</script>