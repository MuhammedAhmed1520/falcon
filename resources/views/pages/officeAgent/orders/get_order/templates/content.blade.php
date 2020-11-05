<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">{{__('office_agent.order_number')}}</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold">{{__('office_agent.order_status')}}</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold">{{__('office_agent.order_date')}}</label>
                        <input type="date" class="date form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold">{{__('office_agent.order_type')}}</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('office_agent.distribute')}}</label>
                        <select class="form-control">
                            <option value="">-- choose --</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('office_agent.manager_emp')}}</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('office_agent.final_state')}}</label>
                        <select class="form-control">
                            <option value="">-- choose --</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="font-weight-bold">{{__('office_agent.replay')}}</label>
                        <textarea rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary">{{__('office_agent.send')}}</button>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12">
            <fieldset>
                <legend>{{__('office_agent.office_data')}}</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div>

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link text-uppercase active"
                                       id="nav-test-tab"
                                       data-toggle="tab"
                                       href="#nav-test" aria-controls="nav-test"
                                       aria-selected="true"
                                       role="tab">{{__('office_agent.company_details')}}</a>
                                    <a class="nav-item nav-link text-uppercase"
                                       id="nav-test2-tab"
                                       data-toggle="tab"
                                       href="#nav-test2" aria-controls="nav-test2"
                                       aria-selected="false"
                                       role="tab">{{__('office_agent.human_resource')}}</a>
                                    <a class="nav-item nav-link text-uppercase"
                                       id="nav-test3-tab"
                                       data-toggle="tab"
                                       href="#nav-test3" aria-controls="nav-test3"
                                       aria-selected="false"
                                       role="tab">{{__('office_agent.devices')}}</a>
                                    <a class="nav-item nav-link text-uppercase"
                                       id="nav-test4-tab"
                                       data-toggle="tab"
                                       href="#nav-test4" aria-controls="nav-test4"
                                       aria-selected="false"
                                       role="tab">{{__('office_agent.payment_details')}}</a>
                                    <a class="nav-item nav-link text-uppercase"
                                       id="nav-test5-tab"
                                       data-toggle="tab"
                                       href="#nav-test5" aria-controls="nav-test5"
                                       aria-selected="false"
                                       role="tab">{{__('office_agent.internal_attachment')}}</a>
                                </div>

                            </nav>
                            <!-- Tab panes -->

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade p-2 show active" id="nav-test"
                                     role="tabpanel" aria-labelledby="nav-test-tab">
                                    <div>
                                        <nav>
                                            <div class="nav nav-tabs" id="nav2-tab" role="tablist">
                                                <a class="nav-item nav-link text-uppercase active"
                                                   id="nav2-test-tab"
                                                   data-toggle="tab"
                                                   href="#nav2-test" aria-controls="nav2-test"
                                                   aria-selected="true"
                                                   role="tab">{{__('office_agent.company_details')}}</a>
                                                <a class="nav-item nav-link text-uppercase"
                                                   id="nav2-test2-tab"
                                                   data-toggle="tab"
                                                   href="#nav2-test2" aria-controls="nav2-test2"
                                                   aria-selected="true"
                                                   role="tab">{{__('office_agent.company_partners')}}</a>
                                                <a class="nav-item nav-link text-uppercase"
                                                   id="nav2-test3-tab"
                                                   data-toggle="tab"
                                                   href="#nav2-test3" aria-controls="nav2-test3"
                                                   aria-selected="true"
                                                   role="tab">{{__('office_agent.company_others')}}</a>
                                            </div>

                                        </nav>


                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade p-2 show active" id="nav2-test"
                                                 role="tabpanel" aria-labelledby="nav2-test-tab">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.company_name_ar')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.company_name_en')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.company_type')}}</label>
                                                        <select class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.first_name')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.parent_name')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.family_name')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.ssn')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.office_phone')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.mobile')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.email')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.email_confirmation')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>


                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.officer_name')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.officer_phone')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.license_number')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.license_ex_date')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.government')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.city')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.area')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.segment')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.street')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.building')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.floor')}}</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.company_branch')}}</label>
                                                        <select class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.contract')}}</label>
                                                        <select class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label
                                                            class="font-weight-bold">{{__('office_agent.iso_cert')}}</label>
                                                        <select class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <h3 class="font-weight-bold text-primary">
                                                            <i class="la la-archive text-black-50"></i>
                                                            {{__('office_agent.attachments')}}
                                                        </h3>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th width="80">#</th>
                                                                <th>{{__('office_agent.file')}}</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade p-2" id="nav2-test2"
                                                 role="tabpanel" aria-labelledby="nav2-test2-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>{{__('office_agent.user')}}</th>
                                                                <th>{{__('office_agent.ssn')}}</th>
                                                                <th>{{__('office_agent.notes')}}</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade p-2" id="nav2-test3"
                                                 role="tabpanel" aria-labelledby="nav2-test3-tab">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>{{__('office_agent.government')}}</th>
                                                                <th>{{__('office_agent.city')}}</th>
                                                                <th>{{__('office_agent.area')}}</th>
                                                                <th>{{__('office_agent.segment')}}</th>
                                                                <th>{{__('office_agent.street')}}</th>
                                                                <th>{{__('office_agent.building')}}</th>
                                                                <th>{{__('office_agent.floor')}}</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane fade p-2" id="nav-test2"
                                     role="tabpanel" aria-labelledby="nav-test2-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="font-weight-bold">{{__('office_agent.company_job')}}</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.first_name')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.parent_name')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.family_name')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.ssn')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-3">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.mobile')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.email')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="font-weight-bold">{{__('office_agent.gender')}}</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="font-weight-bold">{{__('office_agent.nationality')}}</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-3">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.grade')}}</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label
                                                class="font-weight-bold">{{__('office_agent.specialization')}}</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h3 class="font-weight-bold text-primary">
                                                <i class="la la-user text-black-50"></i>
                                                {{__('office_agent.employees')}}
                                            </h3>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>{{__('office_agent.company_job')}}</th>
                                                    <th>{{__('office_agent.first_name')}}</th>
                                                    <th>{{__('office_agent.parent_name')}}</th>
                                                    <th>{{__('office_agent.family_name')}}</th>
                                                    <th>{{__('office_agent.grade')}}</th>
                                                    <th>{{__('office_agent.specialization')}}</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-2" id="nav-test3"
                                     role="tabpanel" aria-labelledby="nav-test3-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">
                                                {{__('office_agent.devices')}}
                                            </label>
                                            <select class="form-control"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">
                                                {{__('office_agent.serial')}}
                                            </label>
                                            <input class="form-control">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>{{__('office_agent.name')}}</th>
                                                    <th>{{__('office_agent.serial')}}</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-2" id="nav-test4"
                                     role="tabpanel" aria-labelledby="nav-test4-tab">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>{{__('office_agent.user')}}</th>
                                                <th>{{__('office_agent.status')}}</th>
                                                <th>{{__('office_agent.date')}}</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-2" id="nav-test5"
                                     role="tabpanel" aria-labelledby="nav-test5-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">{{__('office_agent.notes')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">{{__('office_agent.file')}}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <button class="btn btn-primary">{{__('office_agent.add')}}</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>{{__('office_agent.file')}}</th>
                                                    <th>{{__('office_agent.user')}}</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12">
            <fieldset>
                <legend>{{__('office_agent.logger')}}</legend>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{__('office_agent.status')}}</th>
                                <th>{{__('office_agent.date')}}</th>
                                <th>{{__('office_agent.user')}}</th>
                                <th>{{__('office_agent.notes')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
