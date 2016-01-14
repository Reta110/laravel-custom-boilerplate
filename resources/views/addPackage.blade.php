<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new Package</h4>
            </div>
            <div class="modal-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(array('url' => '/store')) !!}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                    </div>
                    <div class="form-group">
                        <label for="composer">Composer line</label>
                        <input type="text" class="form-control" name="composer" placeholder="Installation line" required="true">
                        <p class="help-block">Example: "laravelcollective/html": "5.1.*"</p>
                    </div>
                    <div class="form-group">
                                <label>
                                    Require-dev?
                                    <input type="checkbox" name="dev" value="1" >
                                </label>

                    </div>
                    <div class="form-group">
                        <label for="providers" >Providers</label>
                        <textarea class="form-control" rows="2" name="providers" placeholder="Providers lines"></textarea>
                        <p class="help-block">Example: Collective\Html\HtmlServiceProvider::class,</p>

                    </div>
                    <div class="form-group">
                        <label for="aliases">Aliases line</label>
                        <textarea class="form-control" rows="2" name="aliases" placeholder="Aliases lines"></textarea>
                        <p class="help-block">Example: 'Form' => Collective\Html\FormFacade::class,
                            'Html' => Collective\Html\HtmlFacade::class,</p>
                     </div>
                    <div class="form-group">
                        <label for="publish">Publish line</label>
                        <input type="text" class="form-control" name="publish" placeholder="Vendro publish line (Optional)">
                        <p class="help-block">Example: php artisan vendor:publish --provider="Davibennun\LaravelPushNotification\LaravelPushNotificationServiceProvider" --tag="config"</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">Website</label>
                        <input type="text" class="form-control" name="url" placeholder="Website / Documentation">
                        <p class="help-block">http://www.example.com</p>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Package</button>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>