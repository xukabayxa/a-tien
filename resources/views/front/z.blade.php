<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Thông tin chung</h4>
                <div class="ml-auto">
                    <% form.creator %> - <% form.created_time %>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Loại yêu cầu</label>
                            <select class="form-control select2" ng-model="form.type" ng-disabled="form.id" ng-change="form.changeTypeRequest();getParentInfo()">
                                <option value="">Loại yêu cầu</option>
                                <option ng-repeat="type in types" ng-value="type.id" ng-selected="form.type == type.id">
                                    <% type.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors.type[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-checkbox-section">
                            <div class="border-checkbox-group border-checkbox-group-primary mr-2">
                                <input class="border-checkbox" type="checkbox" id="xuat_thang" ng-model="form.is_export_direct">
                                <label class="border-checkbox-label" for="xuat_thang">Xuất thẳng</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_contract">
                        <div class="form-group custom-group">
                            <label class="form-label required-label" style="left: 40px">Chọn hợp đồng / đơn hàng</label>
                            <div class="input-group margin-bottom-10">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" ng-click="searchContract.open()" ng-disabled="form.id">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" placeholder="Hợp đồng..."
                                       value="<% form.parent.code %>" disabled>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors['contract_id'][0] %></strong>
                        </span>
                        </div>
                    </div>

                    <div class="col-md-6" ng-if="form.type == 16 || form.type == 17">
                        <div class="form-group custom-group">
                            <label  class="form-label required-label" style="left: 40px;">Chọn hợp đồng / đơn hàng</label>
                            <div class="input-group margin-bottom-10">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" ng-click="searchWrServiceContract.open()" ng-disabled="form.id">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" placeholder="Hợp đồng ..."
                                       value="<% form.parent.code %>" disabled>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors['contract_id'][0] %></strong>
                        </span>
                        </div>
                    </div>

                    <div class="col-md-6" ng-if="form.type == 14 || form.type == 15">
                        <div class="col-md-12">
                            <div class="form-group custom-group">
                                <label class="form-label required-label" style="left: 40px">Chọn hợp đồng hãng</label>
                                <div class="input-group margin-bottom-10">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button" ng-click="searchFirmContract.open()" ng-disabled="form.id">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Hợp đồng hãng..."
                                           value="<% form.parent.code %>" disabled>
                                </div>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><% errors['firm_contract_id'][0] %></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12" ng-if="form.type == 14" ng-if="form.parent.code">
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Nhóm VAT</label>
                                <select class="form-control" ng-model="form.firm_tab_vat_percent"
                                        ng-change="selectVatPercent()" ng-disabled="form.id">
                                    <option value="">Chọn nhóm VAT</option>
                                    <option ng-repeat="vat_percent in form.firm_contract.vat_percent_options" value="<% vat_percent %>" ng-selected="form.firm_tab_vat_percent == vat_percent">
                                        VAT <% vat_percent | my_number %>%
                                    </option>
                                </select>
                                <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.firm_tab_id">
                                    <strong><% errors.firm_tab_vat_percent %></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12" ng-if="form.type == 14">
                            <div class="form-group custom-group" ng-if="form.firm_tab_vat_percent">
                                <label class="form-label required-label">Chọn nhóm hàng hóa</label>
                                <select class="form-control" ng-select2 multiple ng-model="form.firm_tab_ids"
                                        ng-change="getParentInfo()" ng-disabled="form.id">
                                    <option value="">Chọn nhóm hàng hóa</option>
                                    <option ng-repeat="t in form.firm_contract_tab_selected" ng-value="t.id" ng-selected="arrayInclude(form.firm_tab_ids, t.id)">
                                        <% t.name %>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" ng-if="form.type == 15" ng-if="form.parent.code">
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Chọn nhóm hàng khuyến mại</label>
                                <select class="form-control" ng-select2 multiple ng-model="form.firm_tab_ids"
                                        ng-change="getParentInfo()" ng-disabled="form.id">
                                    <option value="">Chọn nhóm</option>
                                    <option ng-repeat="t in form.firm_contract_tab_selected" ng-value="t.id" ng-selected="arrayInclude(form.firm_tab_ids, t.id)">
                                        <% t.name %>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.type == 11">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Chọn hợp đồng dịch vụ</label>
                            <div class="input-group margin-bottom-10">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" ng-click="searchServiceContract.open()" ng-disabled="form.id">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" placeholder="Hợp đồng dịch vụ..."
                                       value="<% form.parent.code %>" disabled>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors['service_contract_id'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.type == 12">
                        <div class="form-group custom-group">
                            <label class="form-label">Khách hàng</label>
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Khách hàng"
                                       ng-value="form.customer.fullname" disabled>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" ng-click="addCustomers()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors['customer_id'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.is_return">
                        <div class="form-group custom-group">
                            <label class="form-label required-label" style="left: 40px">Chọn phiếu yêu cầu nhập hàng</label>
                            <div class="input-group mb-0">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" ng-click="searchProductImportRequest.open()" ng-disabled="form.id">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" placeholder="Yêu cầu nhập hàng..."
                                       value="<% form.product_import_request.code %>" disabled>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors['product_import_request_id'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.type == 7">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Gửi đến công ty</label>
                            <select class="form-control select2-dynamic" ng-model="form.export_company_id">
                                <option value="">Chọn công ty</option>
                                <option ng-repeat="c in companies" value="<% c.id %>" ng-selected="form.export_company_id == c.id">
                                    <% c.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.export_company_id">
                            <strong><% errors.export_company_id[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-12" ng-if="form.type == 7">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Phiếu yêu cầu chuyển hàng</label>
                            <div class="p-2 form-control d-flex flex-wrap align-items-center">
                                <div ng-if="!form.product_transfer_requests || !form.product_transfer_requests.length">Chưa chọn phiếu yêu cầu chuyển hàng</div>
                                <div ng-if="form.product_transfer_requests" ng-repeat="item in form.product_transfer_requests"
                                     class="m-1 px-2 py-1 btn btn-info">
                                    <a class="text-light" target="_blank" href="/admin/warehouse/product_transfer_requests/<% item.id %>/show"><% item.code %></a>
                                    <a class="text-light" href="javascript:void(0)" title="Hủy" ng-click="form.removeProductTransferRequest($index)" ng-if="!item.product_export_request_id">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                                <div class="m-1 px-2 py-1 btn btn-info">
                                    <a href="javascript:void(0)" class="text-light" title="Thêm phiếu yêu cầu chuyển hàng" ng-click="searchProductTransferRequest.open()">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="invalid-feedback d-block" role="alert"
                                  ng-if="errors && errors['product_transfer_requests']">
                            <strong><% errors['product_transfer_requests'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.type == 99">
                        <div class="form-group custom-group">
                            <label class="form-label" style="left: 40px;">Ghi nhận chi phí HĐ</label>
                            <div class="input-group mb-0">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" ng-click="searchAllContract.open()" ng-disabled="form.id">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" placeholder="Hợp đồng, đơn hàng..."
                                       value="<% form.contract_costable.code %>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" ng-if="form.type == 3">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Ngày cần mượn</label>
                            <input class="form-control date" ng-model="form.expected_borrow_date" type="text">
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.expected_borrow_date">
                            <strong><% errors.expected_borrow_date[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.type == 3">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Ngày trả</label>
                            <input class="form-control date" ng-model="form.return_date" type="text">
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.return_date">
                            <strong><% errors.return_date[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.is_return">
                        <div class="form-group">
                            <b>Nhà cung cấp: </b><% form.product_import_request.supplier.fullname %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.is_return">
                        <div class="form-group">
                            <b>Hợp đồng/đơn hàng mua: </b><% form.root_buy_contract.code %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer">
                        <div class="form-group">
                            <b>Khách hàng: </b><% form.parent.customer.code - form.customer_name || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer">
                        <div class="form-group">
                            <b>Tên viết tắt: </b><% form.customer_unit || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer">
                        <div class="form-group">
                            <b>CMT/MST: </b><% form.identity_card_number || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer">
                        <div class="form-group">
                            <b>Số điện thoại: </b><% form.customer_mobile || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer">
                        <div class="form-group">
                            <b>Địa chỉ: </b><% form.customer_address || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.customer_type == 2 && form.has_customer">
                        <div class="form-group">
                            <b>Người liên hệ: </b><% form.customer_contact_name || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.customer_type == 2 && form.has_customer">
                        <div class="form-group">
                            <b>Điện thoại liên hệ: </b><% form.customer_contact_phone || '_____' %>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_customer && form.has_customer">
                        <div class="form-group">
                            <b>Điạ chỉ giao hàng: </b><% form.delivery_place || '_____' %>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6" ng-if="form.need_warehouse">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Kho xuất</label>
                            <select class="form-control" ng-model="form.warehouse_id" ng-change="updateStock(form)" ng-disabled="!form.can_change_warehouse">
                                <option value="">Chọn kho</option>
                                <option ng-repeat="w in form.warehouses" value="<% w.id %>" ng-selected="form.warehouse_id == w.id">
                                    <% w.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.warehouse_id">
                            <strong><% errors.warehouse_id[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.need_warehouse_promo">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Kho xuất khuyến mại</label>
                            <select class="form-control" ng-model="form.promo_warehouse_id">
                                <option value="">Chọn kho</option>
                                <option ng-repeat="w in promo_warehouse_ids" value="<% w.id %>" ng-selected="form.promo_warehouse_id == w.id">
                                    <% w.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.promo_warehouse_id">
                            <strong><% errors.promo_warehouse_id[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.is_warehouse_transfer">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Kho nhập</label>
                            <select class="form-control" ng-model="form.import_warehouse_id">
                                <option value="">Chọn kho</option>
                                <option ng-repeat="w in form.warehouses" value="<% w.id %>" ng-selected="form.import_warehouse_id == w.id">
                                    <% w.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.import_warehouse_id">
                            <strong><% errors.import_warehouse_id[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_delivery">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Vận chuyển</label>
                            <select class="form-control" ng-model="form.transition_type">
                                <option value="">Chọn đối tượng vận chuyển</option>
                                <option ng-repeat="t in transition_types" value="<% t.id %>" ng-selected="t.id == form.transition_type">
                                    <% t.name %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors.transition_type">
                            <strong><% errors.transition_type[0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6" ng-if="form.has_delivery && form.transition_type == 2">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Số km dự kiến</label>
                            <input type="number" class="form-control" ng-model="form.total_km_expected" min="1">
                            <span class="invalid-feedback d-block" role="alert"
                                  ng-if="errors && errors['total_km_expected']">
                            <strong><% errors['total_km_expected'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 d-flex align-items-center">
                        <div class="form-group custom-group">
                            <div class="border-checkbox-section">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox" type="checkbox" id="need_install" ng-model="form.need_install" ng-disabled="form.install_request_id">
                                    <label class="border-checkbox-label m-0" for="need_install">Cần lắp đặt</label>
                                </div>
                            </div>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><% errors['need_install'][0] %></strong>
                            </span>
                        </div>
                    </div> -->
                    <div class="col-md-6" ng-if="form.install_plan_id">
                        <div class="form-group custom-group">
                            <label class="form-label required-label">Lịch lắp đặt</label>
                            <div class="form-control">
                                <a href="/admin/tech/install_plans/<% form.install_plan_id %>/show" target="_blank">
                                    <% form.install_plan.code %>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group custom-group">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" ng-model="form.note">
                            <span class="invalid-feedback d-block" role="alert"
                                  ng-if="errors && errors['note']">
                            <strong><% errors['note'][0] %></strong>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group custom-group">

                            <label class="form-label">File đính kèm: </label>

                            <div class="d-flex">
                                <div class="document-item" ng-repeat="d in form.documents">
                                    <a href="javascript:void(0)" class="remove" ng-click="deleteFile(d)">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <a href="<% d %>" target="_blank" class="fa fa-file-pdf-o fa-3x"></a>
                                    <a href="<% d %>" target="_blank" class="mt-1 text-ellipsis" title="<% getFileName(d) %>"><% getFileName(d) %></a>
                                </div>
                                <div class="document-item" ng-repeat="d in addition_attachments"
                                     title="<% d.name ? d.name : 'Chọn file' %>"
                                     ng-class="{'error': errors && errors['attachments.' + $index]}">
                                    <a href="javascript:void(0)" class="remove" ng-click="removeFile($index)"><i
                                            class="fa fa-times"></i></a>
                                    <label class="fa fa-file-o fa-3x mb-0 text-secondary cursor-pointer"
                                           for="document<% $index %>" ng-if="!d.name"></label>
                                    <label class="fa fa-file-pdf-o fa-3x mb-0 text-secondary cursor-pointer"
                                           for="document<% $index %>" ng-if="d.name"></label>
                                    <label class="mt-1 mb-0 text-secondary file-name cursor-pointer"
                                           for="document<% $index %>"><% d.name ? d.name : 'Chọn file' %></label>
                                    <input class="d-none attachments" data-index="<% $index %>" type="file"
                                           accept=".pdf" id="document<% $index %>" name="attachments[]">
                                </div>
                                <div class="document-item">
                                    <a href="javascript:void(0)" class="fa fa-plus fa-2x text-secondary"
                                       ng-click="addFile()"></a>
                                </div>
                            </div>
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['attachments']">
                            <strong><% errors['attachments'][0] %></strong>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Chi tiết</h4>
                <div style="width:180px" class="ml-auto mr-2" ng-if="!form.need_warehouse">
                    <select class="form-control" ng-model="form.warehouse_id" ng-change="updateStock(form)">
                        <option value="">Xem tồn</option>
                        <option ng-repeat="w in form.all_warehouses" value="<% w.id %>" ng-selected="w.id == form.stock_query">
                            <% w.name %>
                        </option>
                    </select>
                </div>
            </div>
            <div class="card-block" ng-if="form.has_contract || form.firm_contract.id || form.wr_service_contract.id">
                <ul class="nav nav-tabs  tabs nav-quotation" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#hang_hoa"
                           role="tab" aria-expanded="true" ng-class="{'text-danger': tabHasError('hang_hoa')}">
                            <i class="fa fa-exclamation-circle" ng-if="tabHasError('hang_hoa')" title="Vui lòng kiểm tra lại mục này"></i> Hàng hóa <span class="text-danger">(*)</span>
                        </a>
                    </li>
                    <li class="nav-item" ng-repeat="tab in form.tabs track by $index" ng-if="form.firm_tab_ids.length">
                        <a class="nav-link" data-toggle="tab" href="#tab_product<% $index %>" role="tab" aria-expanded="true"
                           ng-class="{'active': form.active_product == $index}" >
                            <% tab.name %>
                        </a>
                    </li>
                    <li class="nav-item" ng-if="form.contract.id && !form.check_exported">
                        <a class="nav-link" data-toggle="tab" href="#km" role="tab" aria-expanded="false">
                            Khuyến mại
                        </a>
                    </li>
                    <li class="nav-item" ng-if="form.contract.id && !form.check_exported && form.all_combos.length">
                        <a class="nav-link" data-toggle="tab" href="#tong_hop_km" role="tab" aria-expanded="false">
                            Tổng hợp hàng khuyến mại
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-custom" ng-if="form.contract.id || form.firm_contract.id || form.wr_service_contract.id">
                    <div class="tab-pane p-0 active" id="hang_hoa">
                        <div class="table-responsive">
                            <table class="table table-bordered no-more-tables table-head-border table-hover" ng-if="(form.contract.id || form.firm_contract.id || form.wr_service_contract.id) && form.check_exported">
                                <thead>
                                <tr>
                                    <th rowspan="2">STT</th>
                                    <th rowspan="2">
                                        <div class="border-checkbox-section" title="Cần xuất">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="checkAll" ng-model="form.check_all" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="checkAll"></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th rowspan="2" style="min-width: 250px">Tên hàng hóa</th>
                                    <th rowspan="2">Model</th>
                                    <th rowspan="2">Mã hàng hóa</th>
                                    <th rowspan="2">Đơn vị tính</th>
                                    <th colspan="<% form.need_check_warehouse ? 6 : 5 %>" class="text-center">Số lượng</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giá niêm yết</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giá bán</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Thành tiền bán</th>
                                    <th rowspan="2" ng-if="form.type == 17">Chiết khấu</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giảm giá</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Đơn giá sau giảm</th>
                                    <th rowspan="2">Hình ảnh</th>
                                </tr>
                                <tr>
                                    <th ng-if="form.need_check_warehouse">Tồn</th>
                                    <th>Đang giữ</th>
                                    <th>Hợp đồng</th>
                                    <th>Đã xuất</th>
                                    <th>Đang xuất</th>
                                    <th>Đề nghị</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="product in form.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid}">
                                    <td class="v-align-middle"><% $index + 1 %></td>
                                    <td class="v-align-middle text-center">
                                        <div class="border-checkbox-section">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-disabled="product.in_combo" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="v-align-middle">
                                        <div><% product.product_name %> <br/>
                                            <span style="font-weight: bold">Thương hiệu: </span> <% product.brand.name %>
                                        </div>
                                    </td>
                                    <td class="v-align-middle"><% product.model_name %></td>
                                    <td class="v-align-middle"><% product.code %></td>
                                    <td class="v-align-middle"><% product.unit_name %></td>
                                    <td class="v-align-middle text-center" ng-if="form.need_check_warehouse"><% product.in_stock | number:0 %></td>
                                    <td class="v-align-middle text-center"><% product.prepick_qty %></td>
                                    <td class="v-align-middle text-center"><% product.contract_qty | number:0 %></td>
                                    <td class="v-align-middle text-center"><% product.exported_qty | number:0 %></td>
                                    <td class="v-align-middle text-center"><% product.exporting_qty | number:0 %></td>
                                    <td class="v-align-middle">
                                        <input class="form-control short-quantity" type="number"
                                               ng-model="product.qty" ng-disabled="!product.need_export || form.firm_contract.id">
                                        <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                                <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                            </span>
                                    </td>
                                    <td class="v-align-middle" ng-if="form.type != 2 && form.type != 15"><% product.price | number:0 %></td>
                                    <td class="v-align-middle" ng-if="form.type != 2 && form.type != 15"><% product.price_after_extra | number:0 %></td>
                                    <td class="v-align-middle" ng-if="form.type != 2 && form.type != 15"><% product.total_amount_after_extra | number:0 %></td>
                                    <td class="v-align-middle" ng-if="form.type == 17"><% product.rebate_price | number:0 %></td>
                                    <td class="v-align-middle" ng-if="form.type != 2 && form.type != 15"><% (product.discount_price) | number:0 %></td>
                                    <td class="v-align-middle" ng-if="form.type != 2 && form.type != 15"><% product.allocated_price | number:0 %></td>
                                    <td class="text-center">
                                        <img width="50" height="50" ng-src="<% product.avatar %>">
                                    </td>
                                </tr>
                                <tr ng-if="form.vat_percent > 0 && form.type != 2 && form.type != 15">
                                    <td colspan="5" class="text-center"><b>Thành tiền</b></td>
                                    <td ng-if="form.need_check_warehouse"></td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% form.sum_amount_after_extra | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr ng-if="form.vat_percent > 0 && form.type != 2 && form.type != 15">
                                    <td colspan="5" class="text-center"><b>VAT (<% form.vat_percent | number:0 %>%)</b></td>
                                    <td ng-if="form.need_check_warehouse"></td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% form.sum_amount_after_extra_vat | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr ng-if="form.products.length && form.type != 2 && form.type != 15">
                                    <td colspan="5" class="text-center"><b>Tổng cộng</b></td>
                                    <td></td>
                                    <td class="text-center" ng-if="form.need_check_warehouse"><b><% form.sum_stock %></b></td>
                                    <td class="text-center"><b><% form.sum_prepick %></b></td>
                                    <td class="text-center"><b><% form.sum_contract %></b></td>
                                    <td class="text-center"><b><% form.sum_exported %></b></td>
                                    <td class="text-center"><b><% form.sum_exporting %></b></td>
                                    <td class="text-center"><b><% form.sum_qty %></b></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% form.sum_amount_after_extra_after_vat | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr ng-if="form.sale_invoice && form.type != 2 && form.type != 15 && form.type != 17">
                                    <td colspan="5" class="text-center"><b>Giảm giá (<% form.sale_invoice_percent | my_number %>%)</b></td>
                                    <td ng-if="form.need_check_warehouse"></td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% (form.sum_amount_after_extra * form.sale_invoice / form.cost_after_commission) | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr ng-if="form.type == 17 && form.rebate_price > 0">
                                    <td colspan="5" class="text-center"><b>Chiết khấu</b></td>
                                    <td colspan="7"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% form.rebate_price | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr ng-if="form.type == 17 && form.sale_invoice > 0">
                                    <td colspan="5" class="text-center"><b>Giảm giá</b></td>
                                    <td colspan="7"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b><% form.sale_invoice | number:0 %></b></td>
                                    <td colspan="3"></td>
                                </tr>

                                <tr ng-if="!form.products.length">
                                    <td colspan="15">Không có hàng hóa</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered no-more-tables table-head-border" ng-if="form.contract.id && !form.check_exported">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th rowspan="2">
                                        <div class="border-checkbox-section" title="Cần xuất">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="checkAll" ng-model="form.check_all" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="checkAll"></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th style="min-width: 250px">Tên hàng hóa</th>
                                    <th>Model</th>
                                    <th>Mã hàng hóa</th>
                                    <th>Thương hiệu</th>
                                    <th>Đơn vị tính</th>
                                    <th>Tồn</th>
                                    <th>Đang giữ</th>
                                    <th>Yêu cầu xuất</th>
                                    <th>Giá niêm yết</th>
                                    <th>Giảm giá</th>
                                    <th>Đơn giá bán</th>
                                    <th>Thành tiền</th>
                                    <th>Hình ảnh tham khảo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="product in form.products" ng-class="{'disabled': !product.need_export, 'invalid': product.is_change_price, 'invalid': !product.is_valid, 'odd-row': $index % 2 == 0}">
                                    <td class="v-align-middle text-center"><% $index + 1 %></td>
                                    <td class="v-align-middle text-center">
                                        <div class="border-checkbox-section">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-disabled="product.in_combo" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div><b><% product.product_name %></b></div>
                                    </td>
                                    <td><% product.model_name %></td>
                                    <td><% product.code %></td>
                                    <td><% product.brand.name %></td>
                                    <td><% product.unit_name %></td>
                                    <td class="text-center"><% product.in_stock | number:0 %></td>
                                    <td class="text-center"><% product.prepick_qty %></td>
                                    <td class="text-center">
                                        <input ng-if="!product.in_combo" class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                                        <span ng-if="product.in_combo"><% product.qty %></span>
                                        <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                                <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                            </span>
                                    </td>
                                    <td class="text-right"><% product.price | number:0 %></td>
                                    <td class="text-right"><% (product.price - product.allocated_price) | number:0 %></td>
                                    <td class="text-right"><% product.allocated_price | number:0 %></td>
                                    <td class="text-right"><% product.total_amount_allocated | number:0 %></td>
                                    <td class="text-center">
                                        <img width="50" height="50" ng-src="<% product.avatar %>">
                                    </td>
                                </tr>
                                <tr ng-if="form.products.length">
                                    <td colspan="7" class="text-center"><b>Thành tiền</b></td>
                                    <td class="text-center"><b><% form.sum_stock %></b></td>
                                    <td class="text-center"><b><% form.sum_prepick %></b></td>
                                    <td class="text-center"><b><% form.sum_qty %></b></td>
                                    <td colspan="3"></td>
                                    <td class="text-right"><b><% form.sum_amount_allocated | number:0 %></b></td>
                                    <td></td>
                                </tr>
                                <tr ng-if="form.products.length && form.vat_percent > 0">
                                    <td colspan="7" class="text-center"><b>VAT (<% form.vat_percent | number:0 %>%)</b></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td colspan="3"></td>
                                    <td class="text-right"><b><% form.vat_cost_allocated | number:0 %></b></td>
                                    <td></td>
                                </tr>
                                <tr ng-if="form.products.length && form.vat_percent > 0">
                                    <td colspan="7" class="text-center"><b>Tổng cộng</b></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td colspan="3"></td>
                                    <td class="text-right"><b><% form.sum_amount_allocated_after_vat | number:0 %></b></td>
                                    <td></td>
                                </tr>
                                <tr ng-if="!form.products.length">
                                    <td colspan="12">Không có hàng hóa</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane p-0" id="tab_product<% $index %>" ng-repeat="tab in form.tabs track by $index" ng-if="form.firm_tab_ids.length">
                        <div class="table-responsive">
                            <table class="table table-bordered no-more-tables table-head-border table-hover" ng-if="form.firm_contract.id && form.check_exported">
                                <thead>
                                <tr>
                                    <th rowspan="2">STT</th>
                                    <th rowspan="2">
                                        <div class="border-checkbox-section" title="Cần xuất">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="checkAll<% $index %>" ng-model="tab.check_all" ng-change="tab.updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="checkAll<% $index %>"></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th rowspan="2" style="min-width: 250px">Tên hàng hóa</th>
                                    <th rowspan="2">Model</th>
                                    <th rowspan="2">Mã hàng hóa</th>
                                    <th rowspan="2">Đơn vị tính</th>
                                    <th colspan="<% form.need_check_warehouse ? 6 : 5 %>" class="text-center">Số lượng</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giá niêm yết</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giá bán</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Thành tiền bán</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Giảm giá</th>
                                    <th rowspan="2" ng-if="form.type != 2 && form.type != 15">Đơn giá sau giảm</th>
                                    <th rowspan="2">Hình ảnh</th>
                                </tr>
                                <tr>
                                    <th ng-if="form.need_check_warehouse">Tồn</th>
                                    <th>Đang giữ</th>
                                    <th>Hợp đồng</th>
                                    <th>Đã xuất</th>
                                    <th>Đang xuất</th>
                                    <th>Đề nghị</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="product in tab.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid}">
                                    <td><% $index + 1 %></td>
                                    <td class="v-align-middle text-center">
                                        <div class="border-checkbox-section">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="tab_product_<% $parent.$index %>_<% $index %>"
                                                       ng-model="product.need_export" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="tab_product_<% $parent.$index %>_<% $index %>"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div><% product.contract_product.product_name %> <br/>
                                            <span style="font-weight: bold">Thương hiệu: </span> <% product.contract_product.brand.name %>
                                        </div>
                                    </td>
                                    <td><% product.contract_product.model_name %></td>
                                    <td><% product.contract_product.code %></td>
                                    <td><% product.contract_product.unit_name %></td>
                                    <td class="text-center" ng-if="form.need_check_warehouse"><% product.contract_product.in_stock | number:0 %></td>
                                    <td class="text-center"><% product.contract_product.prepick_qty %></td>
                                    <td class="text-center"><% product.contract_qty | number:0 %></td>
                                    <td class="text-center"><% product.exported_qty | number:0 %></td>
                                    <td class="text-center"><% product.contract_product.exporting_qty | number:0 %></td>
                                    <td>
                                        <input class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                                        <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                                <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                            </span>
                                    </td>
                                    <td ng-if="form.type != 2 && form.type != 15"><% product.contract_product.price | number:0 %></td>
                                    <td ng-if="form.type != 2 && form.type != 15"><% product.price_after_extra | number:0 %></td>
                                    <td ng-if="form.type != 2 && form.type != 15"><% product.total_amount_after_extra | number:0 %></td>
                                    <td ng-if="form.type != 2 && form.type != 15"><% (product.discount_price) | number:0 %></td>
                                    <td ng-if="form.type != 2 && form.type != 15"><% product.contract_product.allocated_price | number:0 %></td>
                                    <td class="text-center">
                                        <img width="50" height="50" ng-src="<% product.contract_product.avatar %>">
                                    </td>
                                </tr>
                                <tr ng-if="!form.products.length">
                                    <td colspan="15">Không có hàng hóa</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered no-more-tables table-head-border" ng-if="form.contract.id && !form.check_exported">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th rowspan="2">
                                        <div class="border-checkbox-section" title="Cần xuất">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="checkAll" ng-model="form.check_all" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="checkAll"></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th style="min-width: 250px">Tên hàng hóa</th>
                                    <th>Model</th>
                                    <th>Mã hàng hóa</th>
                                    <th>Thương hiệu</th>
                                    <th>Đơn vị tính</th>
                                    <th>Tồn</th>
                                    <th>Đang giữ</th>
                                    <th>Yêu cầu xuất</th>
                                    <th>Giá niêm yết</th>
                                    <th>Giảm giá</th>
                                    <th>Đơn giá bán</th>
                                    <th>Thành tiền</th>
                                    <th>Hình ảnh tham khảo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="product in tab.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid, 'odd-row': $index % 2 == 0, 'invalid': product.is_change_price}">
                                    <td class="v-align-middle text-center"><% $index + 1 %></td>
                                    <td class="v-align-middle text-center">
                                        <div class="border-checkbox-section">
                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-change="updateStock(form)">
                                                <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div><b><% product.product_name %></b></div>
                                    </td>
                                    <td><% product.model_name %></td>
                                    <td><% product.code %></td>
                                    <td><% product.brand.name %></td>
                                    <td><% product.unit_name %></td>
                                    <td class="text-center"><% product.in_stock | number:0 %></td>
                                    <td class="text-center"><% product.prepick_qty %></td>
                                    <td class="text-center">
                                        <input ng-if="!product.in_combo" class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                                        <span ng-if="product.in_combo"><% product.qty %></span>
                                        <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                                <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                            </span>
                                    </td>
                                    <td class="text-right"><% product.price | number:0 %></td>
                                    <td class="text-right"><% (product.price - product.allocated_price) | number:0 %></td>
                                    <td class="text-right"><% product.allocated_price | number:0 %></td>
                                    <td class="text-right"><% product.total_amount_allocated | number:0 %></td>
                                    <td class="text-center">
                                        <img width="50" height="50" ng-src="<% product.avatar %>">
                                    </td>
                                </tr>
                                <tr ng-if="!form.products.length">
                                    <td colspan="12">Không có hàng hóa</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane p-0" id="km">
                        <div class="table-responsive">
                            <table class="table table-bordered no-more-tables table-head-border">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="min-width: 250px">Chương trình</th>
                                    <th>Hàng hóa</th>
                                    <th>Đơn vị tính</th>
                                    <th>SL</th>
                                    <th style="min-width: 600px">Được khuyến mãi</th>
                                    <th class="text-center v-align-middle">
                                        <button class="btn btn-link text-success p-0" type="button"
                                                ng-click="searchComboCampaign.open()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat-start="c in form.combo_campaigns">
                                    <td rowspan="<% c.rowspan %>" class="text-center v-align-middle"><% $index + 1 %></td>
                                    <td rowspan="<% c.rowspan %>" class="v-align-middle">
                                        <a href="/admin/sale/combo_campaigns/<% c.id %>/show" target="_blank"><% c.code %></a>
                                    </td>
                                    <td colspan="3" class="p-0"></td>
                                    <td rowspan="<% c.rowspan %>" class="v-align-middle">
                                        <div class="border mb-2 promo-group p-2" ng-repeat="g in c.calculated_combo">
                                            <b><% g.options.length > 1 ? 'Được tặng 1 trong ' + g.options.length : 'Được tặng' %>:</b>
                                            <div ng-repeat="o in g.options">
                                                <div class="d-flex promo-group-item m-1 align-items-center">
                                                    <div class="radio radio-inline radio-inverse">
                                                        <label class="mt-2">
                                                            <input type="radio" ng-model="g.selected_option" value="<% o.combo_option_id %>" class="mr-2" ng-change="updateStockCombo(form)">
                                                        </label>
                                                    </div>
                                                    <div class="border mb-2 p-2">
                                                        <div class="d-flex p-2" ng-repeat="p in o.products">
                                                            <div class="promo-group-item-name ml-2">- <b><% p.code %></b> - <% p.product_name %></div>
                                                            <div class="ml-2"><% p.qty %></div>
                                                            <div class="ml-2"><% p.unit_name %></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="!c.calculated_combo || !c.calculated_combo.length">
                                            Chưa đủ điều kiện nhận khuyến mại
                                        </div>
                                    </td>
                                    <td rowspan="<% c.rowspan %>" class="text-center v-align-middle">
                                        <button class="btn btn-link text-danger p-0" type="button"
                                                ng-click="form.removeComboCampaign($index)">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr ng-repeat="p in c.valid_products">
                                    <td><% p.product_name %></td>
                                    <td><% p.contract_product.unit_name %></td>
                                    <td>
                                        <input class="form-control" ng-model="p.qty" ng-change="updateStockCombo(form)">
                                        <span class="invalid-feedback d-block" role="alert">
                                                <strong><% errors['combo_campaigns.' + $parent.$index + '.products.' + $index + '.qty'][0] %></strong>
                                            </span>
                                    </td>
                                </tr>
                                <tr ng-repeat-end></tr>
                                <tr ng-if="!form.combo_campaigns.length">
                                    <td colspan="7">Chưa chọn chương trình</td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <button class="btn btn-link text-success p-0" type="button"
                                                ng-click="searchComboCampaign.open()">
                                            <i class="fa fa-plus"></i> Thêm chương trình
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane p-0" id="tong_hop_km">
                        <div class="table-responsive">
                            <table class="table table-bordered no-more-tables table-head-border">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="min-width: 250px">Tên hàng hóa</th>
                                    <th>Mã hàng hóa</th>
                                    <th>Đơn vị tính</th>
                                    <th>Tồn</th>
                                    <th>Yêu cầu xuất</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="p in form.all_combos">
                                    <td class="text-center"><% $index + 1 %></td>
                                    <td><% p.product_name || p.product.name %></td>
                                    <td><% p.code || p.product.code %></td>
                                    <td><% p.unit_name %></td>
                                    <td class="text-center"><% p.in_stock | number:0 %></td>
                                    <td class="text-center"><% p.qty | number:0 %></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div ng-if="!form.contract.id && !form.firm_contract.id && !form.wr_service_contract.id">Chưa chọn hợp đồng</div>
                <div ng-if="(form.contract.id || form.firm_contract.id || form.wr_service_contract.id) && loading.contract">
                    <i class="fa fa-spin fa-spinner"></i> Đang tải dữ liệu
                </div>
                <span class="invalid-feedback d-block" role="alert"
                      ng-if="errors && errors['products']">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>

            <div class="card-block" ng-if="form.type == 11">
                <div class="table-responsive">
                    <table class="table table-bordered no-more-tables table-head-border" ng-if="form.service_contract.id || form.project_contract.id">
                        <thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div class="border-checkbox-section" title="Cần xuất">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="checkAll" ng-model="form.check_all" ng-change="updateStock(form)">
                                        <label class="border-checkbox-label m-0" for="checkAll"></label>
                                    </div>
                                </div>
                            </th>
                            <th rowspan="2" style="min-width: 250px">Tên hàng hóa</th>
                            <th rowspan="2">Model</th>
                            <th rowspan="2">Mã hàng hóa</th>
                            <th rowspan="2">Thương hiệu</th>
                            <th colspan="6" class="text-center">Số lượng</th>

                            <th rowspan="2">Giá niêm yết</th>
                            <th rowspan="2">Giá bán</th>
                            <th rowspan="2">Giá sau phân bổ</th>
                            <th rowspan="2">Giảm giá</th>
                            <th rowspan="2">Thành tiền</th>
                            <th rowspan="2">Đơn vị tính</th>
                            <th rowspan="2">Hình ảnh tham khảo</th>
                        </tr>
                        <tr>
                            <th>Tồn</th>
                            <th>Đang giữ</th>
                            <th>Hợp đồng</th>
                            <th>Đã xuất kho</th>
                            <th>Đang xuất kho</th>
                            <th>Đề nghị</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="product in form.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid}">
                            <td><% $index + 1 %></td>
                            <td class="v-align-middle text-center">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-change="updateStock(form)">
                                        <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div><% product.product_name %></div>
                            </td>
                            <td><% product.model_name %></td>
                            <td><% product.code %></td>
                            <td><% product.brand.name %></td>
                            <td class="text-center"><% product.in_stock | number:0 %></td>
                            <td class="text-center"><% product.prepick_qty %></td>
                            <td class="text-center"><% product.contract_qty | number:0 %></td>
                            <td class="text-center"><% product.exported_qty | number:0 %></td>
                            <td class="text-center"><% product.exporting_qty | number:0 %></td>
                            <td>
                                <input class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                    </span>
                            </td>
                            <td><% (product.price) | number:0 %></td>
                            <td><% (product.price_after_extra) | number:0 %></td>
                            <td><% product.allocated_price | number:0 %></td>
                            <td><% product.price_after_extra - product.allocated_price | number:0 %></td>
                            <td><% product.total_amount_after_extra | number:0 %></td>
                            <td><% product.unit_name %></td>
                            <td class="text-center">
                                <img width="50" height="50" ng-src="<% product.avatar %>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center"><b>Thành tiền</b></td>
                            <td ng-if="form.need_check_warehouse"></td>
                            <td colspan="5"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><b><% form.sum_amount_after_extra | number:0 %></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr ng-if="form.vat_percent > 0">
                            <td colspan="6" class="text-center"><b>VAT (<% form.vat_percent | number:0 %>%)</b></td>
                            <td ng-if="form.need_check_warehouse"></td>
                            <td colspan="5"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><b><% form.sum_amount_after_extra_vat | number:0 %></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr ng-if="form.vat_percent > 0">
                            <td colspan="6" class="text-center"><b>Tổng cộng</b></td>
                            <td class="text-center" ng-if="form.need_check_warehouse"><b><% form.sum_stock %></b></td>
                            <td class="text-center"><b><% form.sum_prepick %></b></td>
                            <td class="text-center"><b><% form.sum_contract %></b></td>
                            <td class="text-center"><b><% form.sum_exported %></b></td>
                            <td class="text-center"><b><% form.sum_exporting %></b></td>
                            <td class="text-center"><b><% form.sum_qty %></b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><b><% form.sum_amount_after_extra_after_vat | number:0 %></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr ng-if="form.sale_invoice > 0">
                            <td colspan="6" class="text-center"><b>Giảm giá</b></td>
                            <td ng-if="form.need_check_warehouse"></td>
                            <td colspan="5"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><b><% (form.sum_amount_after_extra * form.sale_invoice / form.cost_after_commission) | number:0 %></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr ng-if="!form.products.length">
                            <td colspan="15">Không có hàng hóa</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div ng-if="!form.service_contract.id">Chưa chọn hợp đồng</div>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>

            <div class="card-block" ng-if="form.type == 13">
                <div class="table-responsive">
                    <table class="table table-bordered no-more-tables table-head-border" ng-if="form.service_contract.id || form.project_contract.id">
                        <thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div class="border-checkbox-section" title="Cần xuất">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="checkAll" ng-model="form.check_all" ng-change="updateStock(form)">
                                        <label class="border-checkbox-label m-0" for="checkAll"></label>
                                    </div>
                                </div>
                            </th>
                            <th rowspan="2" style="min-width: 250px">Tên hàng hóa</th>
                            <th rowspan="2">Model</th>
                            <th rowspan="2">Mã hàng hóa</th>
                            <th rowspan="2">Thương hiệu</th>
                            <th colspan="6" class="text-center">Số lượng</th>
                            <th rowspan="2">Đơn giá</th>
                            <th rowspan="2">Thành tiền</th>
                            <th rowspan="2">Đơn vị tính</th>
                            <th rowspan="2">Hình ảnh tham khảo</th>
                        </tr>
                        <tr>
                            <th>Tồn</th>
                            <th>Đang giữ</th>
                            <th>Hợp đồng</th>
                            <th>Đã xuất kho</th>
                            <th>Đang xuất kho</th>
                            <th>Đề nghị</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="product in form.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid}">
                            <td><% $index + 1 %></td>
                            <td class="v-align-middle text-center">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-change="updateStock(form)">
                                        <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div><% product.product_name %></div>
                            </td>
                            <td><% product.model_name %></td>
                            <td><% product.code %></td>
                            <td><% product.brand.name %></td>
                            <td class="text-center"><% product.in_stock | number:0 %></td>
                            <td class="text-center"><% product.prepick_qty %></td>
                            <td class="text-center"><% product.contract_qty | number:0 %></td>
                            <td class="text-center"><% product.exported_qty | number:0 %></td>
                            <td class="text-center"><% product.exporting_qty | number:0 %></td>
                            <td>
                                <input class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                    </span>
                            </td>
                            <td class="text-right"><% product.price_after_extra | number:0 %></td>
                            <td class="text-right"><% product.total_amount_after_extra | number:0 %></td>
                            <td><% product.unit_name %></td>
                            <td class="text-center">
                                <img width="50" height="50" ng-src="<% product.avatar %>">
                            </td>
                        </tr>
                        <tr ng-if="form.products.length">
                            <td colspan="6" class="text-center"><b>Tổng cộng</b></td>
                            <td class="text-center"><b><% form.sum_stock %></b></td>
                            <td class="text-center"><b><% form.sum_prepick %></b></td>
                            <td class="text-center"><b><% form.sum_contract %></b></td>
                            <td class="text-center"><b><% form.sum_exported %></b></td>
                            <td class="text-center"><b><% form.sum_exporting %></b></td>
                            <td class="text-center"><b><% form.sum_qty %></b></td>
                            <td></td>
                            <td class="text-right"><b><% form.sum_amount | number:0 %></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr ng-if="!form.products.length">
                            <td colspan="15">Không có hàng hóa</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>

            <div class="card-block" ng-if="form.is_return">
                <table class="table table-bordered no-more-tables table-head-border" ng-if="form.product_import_request_id">
                    <thead>
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Cần trả</th>
                        <th rowspan="2">Tên hàng hóa</th>
                        <th rowspan="2">Model</th>
                        <th rowspan="2">Mã hàng hóa</th>
                        <th rowspan="2">Thương hiệu</th>
                        <th colspan="4" class="text-center">Số lượng</th>
                        <th rowspan="2">Đơn vị tính</th>
                        <th rowspan="2">Đơn giá</th>
                        <th rowspan="2">Thành tiền</th>
                        <th rowspan="2">Chi phí</th>
                    </tr>
                    <tr>
                        <th class="text-center">Tồn</th>
                        <th class="text-center">Đã nhập</th>
                        <th class="text-center">Đã trả</th>
                        <th class="text-center">Đề nghị trả</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="product in form.products" ng-class="{'disabled': !product.need_export, 'invalid': !product.is_valid}">
                        <td><% $index + 1 %></td>
                        <td class="v-align-middle text-center">
                            <div class="border-checkbox-section">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox" type="checkbox" id="product<% $index %>" ng-model="product.need_export" ng-change="updateStock(form)">
                                    <label class="border-checkbox-label m-0" for="product<% $index %>"></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div><% product.product_name %></div>
                        </td>
                        <td><% product.model_name %></td>
                        <td><% product.code %></td>
                        <td><% product.brand_name %></td>
                        <td class="text-center"><% product.in_stock | number:0 %></td>
                        <td class="text-center"><% product.imported_qty | number:0 %></td>
                        <td class="text-center"><% product.returned_qty | number:0 %></td>
                        <td class="text-center">
                            <input class="form-control short-quantity" type="number" ng-model="product.qty" ng-disabled="!product.need_export">
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                    <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                </span>
                        </td>
                        <td class="text-center"><% product.unit_name %></td>
                        <td class="text-center"><% product.allocated_price | number:0 %></td>
                        <td class="text-center"><% product.total_amount_allocated | number:0 %></td>
                        <td class="text-center"><% product.total_inland_cost |number:0 %></td>
                    </tr>
                    <tr ng-if="form.products.length">
                        <td colspan="6" class="text-center"><b>Thành tiền</b></td>
                        <td class="text-center"><b><% form.sum_stock %></b></td>
                        <td class="text-center"><b><% form.sum_imported %></b></td>
                        <td class="text-center"><b><% form.sum_returned %></b></td>
                        <td class="text-center"><b><% form.sum_qty %></b></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b><% form.sum_amount_allocated | number %></b></td>
                        <td class="text-right"><b><% form.sum_inland_cost_before_vat | number %></b></td>
                    </tr>
                    <tr ng-if="form.vat_percent > 0 || form.vat_percent_inland_cost">
                        <td colspan="6" class="text-center"><b>VAT(<% form.vat_percent %>%)</b></td>
                        <td colspan="6"></td>
                        <td class="text-right"><b><% form.vat_cost_allocated | number %></b></td>
                        <td class="text-right">
                            <b>VAT(<% form.vat_percent_inland_cost %>%) &nbsp;&nbsp;&nbsp;<% form.vat_inland_cost | number %></b>
                        </td>
                    </tr>
                    <tr ng-if="form.products.length">
                        <td colspan="6" class="text-center"><b>Tổng cộng</b></td>
                        <td colspan="6"></td>
                        <td class="text-right"><b><% form.sum_amount_allocated_after_vat | number %></b></td>
                        <td class="text-right"><b><% form.sum_inland_cost_after_vat | number %></b></td>
                    </tr>
                    <tr ng-if="!form.products.length">
                        <td colspan="11">Không có hàng hóa</td>
                    </tr>
                    </tbody>
                </table>
                <div ng-if="!form.product_import_request_id">Chưa chọn yêu cầu nhập hàng</div>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>

            <div class="card-block" ng-if="!form.has_parent">
                <table class="table table-bordered no-more-tables table-head-border" ng-if="form.type != 12">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên hàng hóa</th>
                        <th>Model</th>
                        <th>Mã hàng hóa</th>
                        <th>Thương hiệu</th>
                        <th>Tồn</th>
                        <th>Yêu cầu xuất</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Hình ảnh tham khảo</th>
                        <th class="text-center v-align-middle">
                            <button class="btn btn-link text-success p-0" type="button"
                                    ng-click="searchProduct()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="product in form.products">
                        <td><% $index + 1 %></td>
                        <td><% product.product_name %></td>
                        <td><% product.model.name %></td>
                        <td><% product.code %></td>
                        <td><% product.brand.name %></td>
                        <td class="text-center"><% product.in_stock | number:0 %></td>
                        <td>
                            <input class="form-control short-quantity" type="number" ng-model="product.qty">
                            <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['products.' + $index + '.qty']">
                                    <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                </span>
                        </td>
                        <td>
                            <select class="form-control select2-dynamic unit-chooser" ng-model="product.unit_id" ng-change="updateStock(form);updateStockCombo(form)">
                                <option ng-repeat="u in product.units" value="<% u.unit_id %>" ng-selected="product.unit_id == u.unit_id">
                                    <% u.name %> <% u.unit_coefficient != 1 ? '(x' + u.unit_coefficient + ')' : '' %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert"
                                  ng-if="errors && errors['products.' + $index + '.unit_id']">
                                    <strong><% errors['products.' + $index + '.unit_id'][0] %></strong>
                                </span>
                        </td>
                        <td class="text-right"><% product.price | number:0 %></td>
                        <td class="text-right"><% product.total_amount | number:0 %></td>
                        <td class="text-center">
                            <img width="50" height="50" ng-src="<% product.avatar %>">
                        </td>
                        <td class="text-center v-align-middle">
                            <button class="btn btn-link text-danger p-0" type="button"
                                    ng-click="form.removeProduct($index)">
                                <i class="fa fa-minus"></i>
                            </button>
                        </td>
                    </tr>
                    <tr ng-if="form.products.length">
                        <td colspan="5" class="text-center"><b>Tổng cộng</b></td>
                        <td class="text-center"><b><% form.sum_stock %></b></td>
                        <td class="text-center"><b><% form.sum_qty %></b></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b><% form.sum_amount | number:0 %></b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr ng-if="!form.products.length">
                        <td colspan="12">Không có hàng hóa</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered no-more-tables table-head-border" ng-if="form.type == 12">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên hàng hóa</th>
                        <th>Model</th>
                        <th>Mã hàng hóa</th>
                        <th>Thương hiệu</th>
                        <th>Giữ</th>
                        <th>Yêu cầu xuất</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Hình ảnh tham khảo</th>
                        <th class="text-center v-align-middle">
                            <button class="btn btn-link text-success p-0" type="button"
                                    ng-click="searchProduct()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="product in form.products">
                        <td><% $index + 1 %></td>
                        <td><% product.product_name %></td>
                        <td><% product.model.name %></td>
                        <td><% product.code %></td>
                        <td><% product.brand.name %></td>
                        <td class="text-center">
                            <span ng-if="form.customer_id"><% product.prepick_qty | number:0 %></span>
                            <span ng-if="!form.customer_id">-</span>
                        </td>
                        <td>
                            <input class="form-control short-quantity" type="number" ng-model="product.qty">
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong><% errors['products.' + $index + '.qty'][0] %></strong>
                                </span>
                        </td>
                        <td>
                            <select class="form-control select2-dynamic unit-chooser" ng-model="product.unit_id" ng-change="updateStock(form);updateStockCombo(form)">
                                <option ng-repeat="u in product.units" value="<% u.unit_id %>" ng-selected="product.unit_id == u.unit_id">
                                    <% u.name %> <% u.unit_coefficient != 1 ? '(x' + u.unit_coefficient + ')' : '' %>
                                </option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong><% errors['products.' + $index + '.unit_id'][0] %></strong>
                                </span>
                        </td>
                        <td class="text-right"><% product.price | number:0 %></td>
                        <td class="text-right"><% product.total_amount | number:0 %></td>
                        <td class="text-center">
                            <img width="50" height="50" ng-src="<% product.avatar %>">
                        </td>
                        <td class="text-center v-align-middle">
                            <button class="btn btn-link text-danger p-0" type="button"
                                    ng-click="form.removeProduct($index)">
                                <i class="fa fa-minus"></i>
                            </button>
                        </td>
                    </tr>
                    <tr ng-if="form.products.length">
                        <td colspan="5" class="text-center"><b>Tổng cộng</b></td>
                        <td class="text-center"><b><% form.sum_prepick %></b></td>
                        <td class="text-center"><b><% form.sum_qty %></b></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b><% form.sum_amount | number:0 %></b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr ng-if="!form.products.length">
                        <td colspan="12">Không có hàng hóa</td>
                    </tr>
                    </tbody>
                </table>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>

            <div class="card-block" ng-if="form.type == 7">
                <table class="table table-bordered no-more-tables table-head-border">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên hàng hóa</th>
                        <th>Model</th>
                        <th>Mã hàng hóa</th>
                        <th>Thương hiệu</th>
                        <th>Tồn</th>
                        <th>Yêu cầu xuất</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="product in form.products">
                        <td><% $index + 1 %></td>
                        <td><% product.product_name %></td>
                        <td><% product.model_name %></td>
                        <td><% product.code %></td>
                        <td><% product.brand_name %></td>
                        <td class="text-center"><% product.in_stock | number:0 %></td>
                        <td class="text-center"><% product.qty | number:0 %></td>
                        <td><% product.unit_name %></td>
                        <td class="text-right"><% product.price | number:0 %></td>
                        <td class="text-right"><% product.total_amount | number:0 %></td>
                    </tr>
                    <tr ng-if="form.products.length">
                        <td colspan="6" class="text-center"><b>Tổng cộng</b></td>
                        <td class="text-center"><b><% form.sum_qty %></b></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b><% form.sum_amount | number:0 %></b></td>
                    </tr>
                    <tr ng-if="!form.products.length">
                        <td colspan="10">Không có hàng hóa</td>
                    </tr>
                    </tbody>
                </table>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['products'][0] %></strong>
                </span>
            </div>
        </div>
    </div>
</div>
@include('partials.modals.searchProduct')
@include('partials.modals.searchCustomer')
