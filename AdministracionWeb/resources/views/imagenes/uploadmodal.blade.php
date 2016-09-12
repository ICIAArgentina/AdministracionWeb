<!--*****************************************************************************************-->
<!--*****************************************************************************************-->

<!-- MODAL -->
<div class="modal fade" id="uploadModal" role="dialog">
    <div class="modal-dialog">

    <!-- MODAL CONTENT-->
        <div class="modal-content">
            <!-- MODAL HEADER-->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Subir nueva imagen</h4>
            </div>
            <!-- MODAL BODY-->
            <div class="modal-body">
                @if(Session::has('success'))
                    <div class="alert-box success">
                        <h3>{!! Session::get('success') !!}</h3>
                    </div>
                @endif

                <strong>Seleccione una imagen para subir</strong>
                <p>(&Eacute;sta imagen formar&aacute; parte de las im&aacute;genes de la portada)</p>

                {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                    <div class="pull-right">
                        {!! Form::submit('Subir imagen', ['class'=>'send-btn btn btn-success from-control']) !!}
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            {!! Form::file('image') !!}
                            <p class="errors">{!!$errors->first('image')!!}</p>
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                        </div>
                    </div>
                    <div id="success"> </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>