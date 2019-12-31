<div class="modal fade" id="memoryModal" tabindex="-1" role="dialog" aria-labelledby="memoryModalLabel" aria-hidden="true">
    <input type="hidden" id="momentId" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <input type="hidden" id="openCalendar">
            <div class="avatar">
                <img src="assets/img/logo.svg" alt="logo" height="30">
            </div>
            <div class="modal-header mt-4">
                <button type="button" class="btn btn-light mr-auto step-mover step-mover--backward d-none" data-steps="#moment-steps"><em class="fas fa-chevron-left"></em></button>
            </div>
            <div class="modal-body steps" id="moment-steps" data-steps-count="3">
                <div class="step show" data-step="1" data-action="saveMoment" data-btn-text="Next">
                    <div class="row form-group">
                        <div class="mw-100 pl-3 align-self-center">
                            <label class="text-primary">I am feeling</label>
                        </div>
                        <div class="col-md-8 feelings" id="momentFeeling">
                            @foreach ($feels as $feel)
                            <h1 class="far {{$feel->icon}} mr-1 text-light feeling" data-toggle="tooltip" data-placement="bottom" title="{{$feel->name}}" data-id="{{$feel->id}}"></h1>
                            @endforeach
                        </div>
                    </div>
                    <div class="row m-0 mb-4" id="selectedImages">
                        <div class="d-flex col-md-2 memory-image p-0 mr-2 bg-warning text-white" id="addMoreImages">
                            <input type="file" class="custom-file-input" id="test" accept="image/*" onchange="readImages(this);" style="width: 0;" multiple>
                            <label for="test" class="align-items-center justify-content-center d-flex" style="width: 100%;height: 100%;cursor: pointer;"><span class="fas fa-plus"></span></label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-link btn-sm text-warning pl-0" id="btnAddMessage">Add Message</button>
                    <div class="form-group d-none" id="formGroupMessage">
                        <textarea class="form-control memory-message handwriting p-0" id="momemtMessage" placeholder="Write a word about this moment"></textarea>
                    </div>
                </div>
                <div class="step" data-step="2" data-action="saveMomentReceiver" data-btn-text="Next">
                    <form id="formSchedule" class="need-custom-validation" data-action="">
                        <input type="hidden" name="update" value="schedule" />
                        <input type="hidden" name="moment_datetime" id="momentDatetime" value="" />
                        <div class="form-group">
                            <label for="formReceiverName">Okay, you want to share this moment with</label>
                            <input type="text" class="form-control" name="receiver_name" id="momentReceiverName" placeholder="Name" data-validations="required" data-display-name="Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" class="form-control" name="receiver_email" id="momentReceiverEmail" placeholder="Email" data-validations="required|email" data-display-name="Email">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="receiver_mobile" id="momentReceiverPhone" placeholder="Mobile" data-validations="required|digits:10" data-display-name="Mobile">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="formReceiverName">On <a href="#" id="displaySelectedDate" onclick="$('#openCalendar').click()"></a> at</label>
                            <div>
                                <div class="d-inline-flex">
                                    <select class="custom-select custom-select-sm" name="hour">
                                        <option>Hour</option>
                                        @for ($i = 0; $i <= 23; $i++)
                                        <option value="{{$i}}" @if($i == 0){{'selected'}}@endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <select class="custom-select custom-select-sm" name="minutes">
                                        <option>Min</option>
                                        @for ($i = 0; $i <= 59; $i++)
                                        <option value="{{$i}}" @if($i == 0){{'selected'}}@endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
                <div class="step" data-step="3" data-action="saveMomentSenderAndPay" data-btn-text="Pay {{config('constants.moment_price.IN.currency')}}{{config('constants.moment_price.IN.value')}}">
                    <form id="formMomentFrom" class="need-custom-validation" data-action="">
                        <input type="hidden" name="update" value="sender" />
                        <div class="form-group">
                            <label for="formMomentFromName">Awesome, all set, tell us about yourself</label>
                            <input type="text" class="form-control" name="sender_name" id="momentFromName" placeholder="Name" data-validations="required" data-display-name="Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="sender_mobile" id="momentFromMobile" placeholder="Mobile" data-validations="required|digits:10" data-display-name="Mobile">
                            <div class="invalid-feedback"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary step-mover step-mover--forward" data-steps="#moment-steps" id="btnMomentAction">Next</button>
            </div>
        </div>
    </div>
</div>