<div class="modal" tabindex="-1" id="modal--edituser" data-bs-backdrop="static">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content" style="border: 10px solid var(--header-color);">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="input--group row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFirstName">
                                    <label class="mdl-textfield__label">First Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtLastName">
                                    <label class="mdl-textfield__label">Last Name</label>
                                </div>
                            </div>                            
                        </div>
                        <div class="input--group row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtEmail">
                                    <label class="mdl-textfield__label">Email</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtGender" value="" readonly tabIndex="-1">
                                    <label for="txtGender" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="txtGender" class="mdl-textfield__label">Gender</label>
                                    <ul data-mdl-for="txtGender" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="male">Male</li>
                                        <li class="mdl-menu__item" data-val="female">Female</li> 
                                    </ul>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn--savecahnge" onclick="settingEdit('update', this, '')">Save changes</button>
            </div>
        </div>
    </div>
</div>