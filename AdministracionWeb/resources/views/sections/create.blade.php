<!--*****************************************************************************************-->
<!--*****************************************************************************************-->

<!-- MODAL -->
<div class="modal fade" id="createModal" role="dialog">
    <div class="modal-dialog">

    <!-- MODAL CONTENT-->
        <div class="modal-content">
            <!-- MODAL HEADER-->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Nueva Secci&oacute;n</h4>
            </div>
            <!-- MODAL BODY-->
            <div class="modal-body">
                {!! Form::open(['url' => 'sections']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'T&iacute;tulo:', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title_c']) !!}
                </div>

                {!! Form::submit('Aceptar', ['class' => 'btn btn-success'])  !!}

                <div class="pull-right">
                    <a href="{{ route('sections.index') }}" class="btn btn-danger"></i>Cancel</a>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>