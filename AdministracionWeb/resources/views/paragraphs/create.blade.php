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
                 <h4 class="modal-title">Nuevo P&aacute;rrafo</h4>
            </div>
            <!-- MODAL BODY-->
            <div class="modal-body">
                {!! Form::open(['url' => 'paragraphs']) !!}

                <div class="form-group">
                        {!! Form::label('section_id', 'Secci&oacute;n:', ['class' => 'control-label']) !!}
                        {!! Form::select('section_id', $sections, $section_id, ['class' => 'form-control', 'id' => 'section_id_c']) !!}  
                </div>

                <div class="form-group">
                    {!! Form::label('order', 'Orden:', ['class' => 'control-label']) !!}
                    {!! Form::text('order', null, ['class' => 'form-control', 'id' => 'order_c']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'Contenido:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content_c']) !!}
                </div>

                {!! Form::submit('Aceptar', ['class' => 'btn btn-success'])  !!}

                <div class="pull-right">
                    <a href="{{ route('paragraphs.index') }}" class="btn btn-danger"></i>Cancel</a>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>