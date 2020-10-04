<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('labels.backend.renters.table.name'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('name', old('name'), ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.renters.table.name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('phone', trans('labels.backend.renters.table.phone'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('phone', old('phone'), ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.renters.table.phone'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">
        {{ Form::label('identity', trans('labels.backend.renters.table.identity'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('identity', old('identity'), ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.renters.table.identity'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
