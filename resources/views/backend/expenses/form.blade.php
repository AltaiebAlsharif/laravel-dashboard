<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('who_pay', trans('labels.backend.expenses.table.who_pay'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('who_pay', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.who_pay'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('amount', trans('labels.backend.expenses.table.amount'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('amount', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.amount'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('pay_date', trans('labels.backend.expenses.table.pay_date'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('pay_date', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.pay_date'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('building_id', trans('labels.backend.expenses.table.building_id'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('building_id', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.building_id'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('buildings_details_id', trans('labels.backend.expenses.table.buildings_details_id'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('buildings_details_id', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.buildings_details_id'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('expense_type_id', trans('labels.backend.expenses.table.expense_type_id'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('expense_type_id', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.table.expense_type_id'), 'required' => 'required']) }}
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
