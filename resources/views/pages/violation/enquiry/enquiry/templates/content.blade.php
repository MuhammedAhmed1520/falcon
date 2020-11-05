<div class="container-fluid" style="min-height: 100vh">
    {{Form::open([
        'method'=>'post',
        'route'=>'handleViolationEnquiry'
    ])}}
    <div class="row mt-5">
        <div class="col-md-12 mt-5">
            <h2 class="font-weight-bold ">
                دفع المخالفات البيئية
            </h2>
        </div>
        <div class="col-md-12 mt-5">
            <b class="mb-2">نوع الاستعلام</b>
            <br><br>
            @foreach($categories as $category)
                <div class="radio d-inline-block pl-2">
                    <input type="radio" id="{{$category->type}}" name="category_id" value="{{$category->id}}"
                           @if($loop->first) checked @endif >
                    <label for="{{$category->type}}">
                        {{$category->title}}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="col-md-5 mt-5 person">
            <b class="mb-2">الرقم المدني للمخالف
                <star>*</star>
            </b>
            <br><br>
            <input type="text" class="form-control" name="ssn" autocomplete="off" value="{{old('ssn')}}">
            @if($errors->has('ssn'))
                <span class="text-danger">{{$errors->first('ssn')}}</span>
            @endif
        </div>

        <div class="col-md-12"></div>

        <div class="col-md-5 mt-3 not_person" style="display: none">
            <b class="mb-2">طريقة الاستعلام عن المخالف
                <star>*</star>
            </b>
            <br><br>
            <select class="form-control" name="type">
                <option value="ssn">بالاستعلام عن طريق الرقم المدني</option>
                <option value="license">بالاستعلام عن طريق رقم الترخيص</option>
                <option value="name">بالاستعلام عن طريق باسم الشركة</option>
            </select>
            @if($errors->has('type'))
                <span class="text-danger">{{$errors->first('type')}}</span>
            @endif
        </div>

        <div class="col-md-12"></div>

        <div class="col-md-5 mt-3 not_person" style="display: none">
            <b class="mb-2">البيان
                <star>*</star>
            </b>
            <br><br>
            <input type="text" class="form-control" name="data" autocomplete="off" value="{{old('data')}}">
            @if($errors->has('data'))
                <span class="text-danger">{{$errors->first('data')}}</span>
            @endif
        </div>
        @if(env('GOOGLE_RECAPTCHA_KEY'))
            <div class="col-md-12 mt-4"> 
                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}" data-callback="correctCaptcha"></div>
            @if($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{$errors->first('g-recaptcha-response')}}</span>
            @endif
            </div>
        @endif
        
        <div class="col-md-12  text-center">
            <button type="submit" id="s_btn" class="btn btn-primary disabled" disabled="">
                استعلام
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>