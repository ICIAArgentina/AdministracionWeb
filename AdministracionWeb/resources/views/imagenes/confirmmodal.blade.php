<!--*****************************************************************************************-->
<!--*****************************************************************************************-->

<!-- MODAL -->
<div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog">

    <!-- MODAL CONTENT-->
        <div class="modal-content">
            <!-- MODAL HEADER-->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Confirma que desea eliminar la imagen?</h4>
            </div>
            <!-- MODAL BODY-->
            <div class="modal-body">
                {!! Form::open([
                    'method' => 'POST',
                    'url' => ['delete_img_portada']
                ]) !!}

                <div class="form-group">
                    {!! Form::hidden('path', null, ['class' => 'form-control', 'id' => 'path']) !!}
                </div>

                <p>La imagen ser&aacute; eliminada completamente del sistema. Si est&aacute; de acuerdo, pulse aceptar</p>

                {!! Form::submit('Aceptar', ['class' => 'btn btn-success'])  !!}

                <div class="pull-right">
                    <a href="{{ url('imagenes_portada') }}" class="btn btn-danger"></i>Cancel</a>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>