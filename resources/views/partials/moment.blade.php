<div class="modal fade" id="memoryModal" tabindex="-1" role="dialog" aria-labelledby="memoryModalLabel" aria-hidden="true">
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
                <div class="step show" data-step="1" data-action="saveMoment" data-btn-text="<em class='far fa-clock mr-2'></em>Schedule">
                    <div class="row form-group">
                        <div class="mw-100 pl-3 align-self-center">
                            <label class="text-primary">I am feeling</label>
                        </div>
                        <div class="col-md-8 feelings">
                            @foreach ($feels as $feel)
                            <h1 class="far {{$feel->icon}} mr-1 text-light feeling" data-toggle="tooltip" data-placement="bottom" title="{{$feel->name}}" data-id="{{$feel->id}}"></h1>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4" id="selectedImages">
                        
                    </div>
                    <button type="button" class="btn btn-link btn-sm text-warning pl-0" id="btnAddMessage">Add Message</button>
                    <div class="form-group d-none" id="formGroupMessage">
                        <textarea class="form-control memory-message handwriting p-0" placeholder="Write a word about this moment"></textarea>
                    </div>
                </div>
                <div class="step" data-step="2" data-action="saveMomentReceiver" data-btn-text="Next">
                    <div class="form-group">
                        <label for="formReceiverName">Okay, we will share this moment with</label>
                        <input type="text" class="form-control" id="formReceiverName" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formReceiverEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formReceiverPhone" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                        <label for="formReceiverName">On <span>January 1st, 2020</span> at</label>
                        <div>
                            <div class="d-inline-flex">
                                <select class="custom-select custom-select-sm">
                                    <option>Hour</option>
                                    @for ($i = 1; $i <= 24; $i++)
                                    <option value="{{$i}}" @if($i == 10){{'selected'}}@endif>{{$i}}</option>
                                    @endfor
                                </select>
                                <select class="custom-select custom-select-sm">
                                    <option>Minutes</option>
                                    @for ($i = 0; $i <= 59; $i++)
                                    <option value="{{$i}}" @if($i == 10){{'selected'}}@endif>{{$i}}</option>
                                    @endfor
                                </select>
                                <select class="custom-select custom-select-sm">
                                    <option selected>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step" data-step="3" data-action="saveMomentSenderAndPay" data-btn-text="Pay &#8377; 10">
                    <div class="form-group">
                        <label for="formMomentDatetime">Awesome, all set, tell us about yourself</label>
                        <input type="text" class="form-control" id="formMomentDatetime" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formMomentDatetime" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formMomentDatetime" placeholder="Mobile">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary step-mover step-mover--forward" data-steps="#moment-steps" id="btnMomentAction"><em class="far fa-clock mr-2"></em>Schedule</button>
            </div>
        </div>
    </div>
</div>